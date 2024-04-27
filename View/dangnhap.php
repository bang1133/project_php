<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    body {
        /* background: rgba(128, 0, 128, 0.3) */
    }

    .container_login {
        position: absolute;
        top: 15%;
        left: 40%;
        width: 330px;
        height: 450px;
        background-color: #fff;
        display: flex;
        flex-direction: column;
        margin: auto;
        border-radius: 10px;
        transition: transform 0.3s ease;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
        /* z-index: 999; */
    }
    .container_login:hover {
        transform: scale(1.1);
        transition: transform 0.3s ease;
        box-shadow: 0 0 30px rgba(0, 0, 0, 2.5);

    }
    .title {
        text-align: center;
        color: cyan;
        position: relative;
        top: 20px;

    }

    form span,
    input,
    button,
    p {
        /* margin: 5   px; */
    }

    .btn-dangnhap {
        width: 90%;
        height: 30px;
        /* margin-top: 15px; */
        position: relative;
        left: 10px;
        top: 10px;
        background-color: cyan;
        font-weight: bold;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border-radius: 5px;
        background: linear-gradient(to right, rgba(255, 0, 255, 0.5), rgba(0, 128, 0, 0.5));
        border: none;
    }

    .user,
    .pass,
    .email {
        width: 82%;
        height: 35px;
        padding-left: 25px;

    }

    .text-foot {
        position: relative;
        top: 20px;
    }

    .icon-input {
        position: relative;
        left: 20px;
    }

    .icon-input i {
        position: absolute;
        top: 10px;
        left: 15px;
        pointer-events: none;
        color: #888;
    }

    .text {
        color: #888;
        margin: auto;
        position: relative;
        left: 25px;

    }

    .btn-dangnhap:focus {
        border: 2px solid aqua;
        border-radius: 10px;

    }

    .user,
    .pass,
    .email:focus {
        outline: none;
    }

    @media only screen and (max-width: 600px) {
        .container_login {
            width: 70%;
            height: 350px;
            left: 15%;
        }

        .user,
        .pass,
        .email {
            width: 85%;
        }
    }
</style>

<body>  
    <!-- đăng nhập -->
    <div class="container_login" id="form_dangnhap">
        <a id="icon_close" href="" style="color: red;margin-left: 285px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
            </svg>
        </a>
        <h2 class="title">Đăng nhập</h2>
        <form action="index.php?action=dangnhap&act=login_act" method="post">
            <span>Tài khoản</span> <br>
            <div class="icon-input">
                <i class="fa fa-user user-icon"></i>
                <input class="user" name="tkdangnhap" type="text" placeholder="Tên đăng nhập">
            </div>
            <span>Mật khẩu</span>
            <div class="icon-input">
                <i class="fa fa-lock lock-icon"></i>
                <input class="pass" name="mkdangnhap" type="password" placeholder="Mật khẩu"> <br>
            </div>
            <span>Gmail</span>
            <div class="icon-input">
                <i class="fa fa-lock lock-icon"></i>
                <input class="email" name="email" type="text" placeholder="Email"> <br>
            </div>
            <input name="submit" class="btn-dangnhap" type="submit" value="Đăng nhập">
            <p class="text-foot">Bạn chưa có tài khoản ? <a href="index.php?action=dangky" id="dangky-link">Đăng kí tại
                    đây</a></p>
        </form>
    </div>
</body>

</html>