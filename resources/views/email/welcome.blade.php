<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<style>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");
*,
*:after,
*:before {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
  font-family: "Poppins", sans-serif;
}
body {
  background-color: rgb(244, 246, 248);
  padding: 40px;
  min-height: 100vh;
  max-width: 1100px;
  margin: auto;
  display: flex;
  align-items: center;
}
.relative__container {
  width: 100%;
  position: relative;
}
.full__width img {
  width: 100%;
  height: 460px;
  border-radius: 1.5rem;
  box-shadow: rgba(31, 75, 255, 0.28) 0px 48px 100px 0px;
}
.object__fit img {
  object-fit: cover;
  display: block;
}
.absolute {
  padding: 10px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: left;
  width: 80%;
}
.icon {
  width: 57px;
  height: 57px;
  margin-bottom: 6px;
  stroke: #8f98bb;
  filter: drop-shadow(0px 12px 12px #1c274f);
}
h1 {
  font-size: 38px;
  margin-bottom: 14px;
  color: #fff;
}
p {
  font-size: 18px;
  margin-bottom: 30px;
  line-height: 28px;
  color: rgba(255, 255, 255, 0.75);
}
.button {
  background-color: rgba(255, 255, 255, 0.1);
  color: #fff;
  border: 2px solid #fff;
  border-radius: 0.5rem;
  padding: 10px 28px;
  text-decoration: none;
  display: inline-block;
  transition: 0.25s;
}
.button:hover {
  background-color: rgba(255, 255, 255, 0.2);
  box-shadow: rgba(17, 12, 46, 0.2) 0px 48px 60px 0px;
}
.button:active {
  background-color: rgba(255, 255, 255, 0);
  box-shadow: none;
}
@media (max-width: 600px) {
  body {
    padding: 10px;
  }
  .full__width img {
    width: 100%;
    height: 420px;
    border-radius: 0.75rem;
  }
  .absolute {
    padding: 20px;
    width: 100%;
    text-align: center;
  }
  .icon {
    width: 53px;
    height: 53px;
    margin-bottom: 16px;
  }
  h1 {
    font-size: 28px;
  }
  p {
    font-size: 16px;
    line-height: 22px;
    width: 100%;
  }
  .button {
    display: block;
  }
}

.card-title{
    color: #fff !important;
}
</style>

</head>
<body>
    <div class="relative__container">
        <div class="full__width object__fit">
          <img src="https://res.cloudinary.com/diod8pjhj/image/upload/v1670218349/bluegears2_sswjhb.jpg" alt="background picture">
          <div class="absolute">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 512 512">
              <path d="M436.67 184.11a27.17 27.17 0 01-38.3 0l-22.48-22.49a27.15 27.15 0 010-38.29l50.89-50.89a.85.85 0 00-.26-1.38C393.68 57 351.09 64.15 324.05 91c-25.88 25.69-27.35 64.27-17.87 98a27 27 0 01-7.67 27.14l-173 160.76a40.76 40.76 0 1057.57 57.54l162.15-173.3a27 27 0 0126.77-7.7c33.46 8.94 71.49 7.26 97.07-17.94 27.49-27.08 33.42-74.94 20.1-102.33a.85.85 0 00-1.36-.22z" fill="none" stroke-linecap="round" stroke-miterlimit="10" stroke-width="20" />
              <path d="M224 284c-17.48-17-25.49-24.91-31-30.29a18.24 18.24 0 01-3.33-21.35 20.76 20.76 0 013.5-4.62l15.68-15.29a18.66 18.66 0 015.63-3.87 18.11 18.11 0 0120 3.62c5.45 5.29 15.43 15 33.41 32.52M317.07 291.3c40.95 38.1 90.62 83.27 110 99.41a13.46 13.46 0 01.94 19.92L394.63 444a14 14 0 01-20.29-.76c-16.53-19.18-61.09-67.11-99.27-107" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="20" />
              <path d="M17.34 193.5l29.41-28.74a4.71 4.71 0 013.41-1.35 4.85 4.85 0 013.41 1.35h0a9.86 9.86 0 008.19 2.77c3.83-.42 7.92-1.6 10.57-4.12 6-5.8-.94-17.23 4.34-24.54a207 207 0 0119.78-22.6c6-5.88 29.84-28.32 69.9-44.45A107.31 107.31 0 01206.67 64c22.59 0 40 10 46.26 15.67a89.54 89.54 0 0110.28 11.64 78.92 78.92 0 00-9.21-2.77 68.82 68.82 0 00-20-1.26c-13.33 1.09-29.41 7.26-38 14-13.9 11-19.87 25.72-20.81 44.71-.68 14.12 2.72 22.1 36.1 55.49a6.6 6.6 0 01-.34 9.16l-18.22 18a6.88 6.88 0 01-9.54.09c-21.94-21.94-36.65-33.09-45-38.16s-15.07-6.5-18.3-6.85a30.85 30.85 0 00-18.27 3.87 11.39 11.39 0 00-2.64 2 14.14 14.14 0 00.42 20.08l1.71 1.6a4.63 4.63 0 010 6.64L71.73 246.6a4.71 4.71 0 01-3.41 1.4 4.86 4.86 0 01-3.41-1.35l-47.57-46.43a4.88 4.88 0 010-6.72z" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="20" />
            </svg>
            <div class="card-header">
                <h4 class="card-title"> Your Login Credentials</h4>
                <h5 class="card-title">Email : <span id="userId">{{ $user->email}}</span></h5>
                <h5 class="card-title">Password : <span id="userName">{{ $user->password}}</span></h5>
            </div>
          </div>
        </div>
      </div>
</body>
</html>
