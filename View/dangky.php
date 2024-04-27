<style>
    .container-login {
        position: absolute;
        top: 20%;
        left: 30%;
        width: 570px;
        height: 455px;
        background-color: #000;
        flex-direction: column;
        border-radius: 10px;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);

    }

    .title {
        text-align: center;
        color: #fff;
    }

    form span,
    input,
    button,
    p {
        margin: 10px;
    }


    .user,
    .pass {
        width: 82%;
        height: 30px;
        padding-left: 25px;

    }

    .text-foot {
        position: relative;
        top: 30px;
    }

    .icon-input {
        position: relative;
    }

    input {
        background-color: #000;
    }

    .icon-input i {
        position: absolute;
        top: 20px;
        left: 15px;
        pointer-events: none;
        color: #fff;
    }

    .text {
        color: #fff;
        margin: auto;
        position: relative;
        left: 25px;
    }

    .nhap_dangky {
        color: #fff;
        border: none;
        border-bottom: 3px solid aqua;
        width: 220px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        position: relative;
        left: 25px;
    }

    #btn-dangky:hover {
        transform: scale(1.1);
        transition: transform 0.3s ease;
        box-shadow: 0 0 30px rgba(0, 0, 0, 2.5);
    }

    #btn-dangky {
        width: 170px;
        height: 35px;
        font-weight: bold;
        border: none;
        border-radius: 10px;
        background: linear-gradient(to right, rgba(255, 0, 255, 0.5), rgba(0, 128, 0, 0.5));
        position: relative;
        left: 165px;
        bottom: 20px;
    }

    .nhap_dangky:focus {
        outline: none;

    }

    #btn-dangky:focus {
        border: 3px solid #fff;
        border-radius: 10px;

    }

    /* .container-login{
        position: absolute;
        z-index: 0;
    } */
    .row {
        /* display: block; */
        display: inline-block;
        padding: 15px;
    }
</style>
<!-- đăng kí -->
<div class="container-login" id="form-dangky">
    <h2 class="title">Đăng ký</h2>
    <form method="post" action="index.php?action=dangky&act=sign_data">
        <!-- ten_nguoidung -->
        <div class="row">
            <span class="text">Họ và tên</span> </br>
            <input class="nhap_dangky" type="text" name="tendangky" id="ten_dangky" pattern="[\p{L}\s]+"
                title="Vui lòng điền đúng định dạng"> </br>
            <!-- ten_taikhoan -->
            <span class="text">Tên tài khoản</span> </br>
            <input class="nhap_dangky" type="text" name="tkdangky" id="tk_dangky"> </br>
            <!-- matkhau -->
            <span class="text">Mật khẩu</span> </br>
            <input class="nhap_dangky" type="password" name="passdangky" id="pass_dangky"> </br>
        </div>
        <div class="row">
            <!-- email  -->
            <span class="text">Email</span> </br>
            <input class="nhap_dangky" type="email" name="maildangky" id="mail_dangky"> </br>
            <!-- địa chỉ -->
            <span class="text">Địa chỉ</span> </br>
            <input class="nhap_dangky" type="text" name="diachiadangky" id=""> </br>
            <!-- sdt -->
            <span class="text">Số điện thoại</span> </br>
            <input class="nhap_dangky" name="sdtdangky" id=""> </br>
        </div>
        <input id="btn-dangky" name="submit" type="submit" value="Đăng kí">
        <a style="color:#fff;position: relative;top: 30px;text-decoration:underline; vertical-align: 10px;"
            href="index.php?action=dangnhap">Quay lại đăng nhập</a>
    </form>
</div>