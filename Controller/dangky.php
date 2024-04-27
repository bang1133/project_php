<?php
$act = "sign";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'sign':
        include_once "./View/dangky.php";
        break;
    case 'sign_data':
        $tenkh = '';
        $username = '';
        $matkhau = '';
        $email = '';
        $diachi = '';
        $sodienthoai = '';
        if (isset($_POST['submit'])) {
            $tenkh = $_POST['tendangky'];
            $username = $_POST['tkdangky'];
            $matkhau = $_POST['passdangky'];
            $email = $_POST['maildangky'];
            $diachi = $_POST['diachiadangky'];
            $sodienthoai = $_POST['sdtdangky'];
            $saltF = "G456#@";
            $saltL = "Fa34%!";
            $passnew = md5($saltF.$matkhau.$saltL);
            $kh = new user();
            $check = $kh->checkTK($username,$email)->rowCount();
            if($check > 0){
                echo "<script> alert('Username hoặc Email đã tồn tại !')</script>";
            }
            else{
                $newkh = $kh->insertKH($tenkh,$username,$passnew,$email,$diachi,$sodienthoai);
                if($newkh!==false){
                    echo" <script>alert('Đăng ký thành công')</script>";
                    // include_once "./View/dangnhap.php";
                }
                else if(empty($tenkh) || empty($username) || empty($passnew) 
                        || empty($email) || empty($diachi) || empty($sodienthoai)) {
                    echo "<script>alert('Chưa điền đủ thông tin')</script>";
                }
                else{
                    echo "<script>alert('Đăng ký không thành công ')</script>";
                    include_once "./View/dangky.php";
                }
            }
        }
        break;
    default:
        # code...
        break;
}

?>
