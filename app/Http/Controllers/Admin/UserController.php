<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\storeRequest;
use App\Http\Requests\updateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Password;
use App\Mail\Welcomemail;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->roles[0]['name'] == 'Admin') {
            $users = User::paginate(10);
        } else {
            $users = User::where('id', Auth::user()->id)->get();
        }

        // count of user with status active
        $activeCount = User::where('status', 'active')->count();
        // count of user with status inactive
        $inactiveCount = User::where('status', 'deactive')->count();
        return view('admin.users.index', ['users' => $users, 'activeCount' => $activeCount, 'inactiveCount' => $inactiveCount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->status = 'active';
        $user->save();
        // attach role default user
        $user->roles()->attach(2);
        // send verification link
        $user->sendEmailVerificationNotification();
        // reset password link
        Password::sendResetLink($request->only(['email']));
        // send welcome mail
        Mail::to($user->email)->send(new Welcomemail($user,$request->password));

        $request->session()->flash('success', 'Created successfully');

        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ['user' => User::find($id)];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.users.edit', ['user' => User::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateRequest $request, $id)
    {
        $user = User::findOrFail($id);

        if (!$user) {
            $request->session()->flash('error', 'You can not edit this error');
        }

        $user->name = $request->name;
        $user->email = $request->email;

        // check if password is not empty and length min 8 max 255 if false then throw error

        if ($request->password != '' && strlen($request->password) >= 8 && strlen($request->password) <= 255) {
            $user->password = bcrypt($request->password);
        } else if(strlen($request->password) > 0 ){
            $request->session()->flash('error', 'Password must be 8 characters long');
            return redirect(route('admin.users.edit', $id));
        }

        $user->save();

        $request->session()->flash('success', 'Updated successfully');

        if (Auth::user()->roles[0]['name'] == 'Admin') {
            return redirect(route('admin.users.index'));
        } else {
            return redirect(url('/'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {

        User::destroy($id);
        $request->session()->flash('success', 'Deleted successfully');

        return redirect(route('admin.users.index'));
    }

    public function changeStatus(Request $request)
    {
        $request->user_id = (int)$request->user_id;
        $user = User::find($request->user_id);

        if (!$user) {
            $request->session()->flash('error', 'You can not edit this error');
        }

        $user->status = $request->status;
        $user->save();

        $request->session()->flash('success', 'Updated successfully');
        $activeCount = User::where('status', 'active')->count();
        $inactiveCount = User::where('status', 'deactive')->count();

        return ['message' => 'success','activeCount' => $activeCount, 'inactiveCount' => $inactiveCount];
    }
}
