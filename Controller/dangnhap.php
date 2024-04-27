<?php
$act = "login";
if(isset($_GET['act'])){
    $act = $_GET['act'];
}
switch ($act) {
    case 'login':
        include_once "./View/dangnhap.php";
        break; 
    case 'login_act':
        //gán thông tin qua user,pass
        $user = '';
        $pass = '';
        $email = '';
        if(isset($_POST['tkdangnhap']) && isset($_POST['mkdangnhap']) && isset($_POST['email'])){
            $user = $_POST['tkdangnhap'];
            $pass = $_POST['mkdangnhap'];
            $email = $_POST['email'];
            $saltF = 'G456#@';
            $saltL = 'Fa34%!';
            $passnew = md5($saltF.$pass.$saltL);
            $kh = new user();
            $logkh = $kh->logKH($user,$passnew,$email);
            if($logkh){
                //đăng nhập thành công thì lưu vào trong sesion
                $_SESSION['makh'] = $logkh['makh'];
                $_SESSION['tenkh'] = $logkh['tenkh'];
                echo "<script>alert('Đăng nhập thành công')</script>";
                echo "<meta http-equiv='refresh' content='0;url=./index.php?action=home'/>";
                exit;                
            }
            else{
                echo "<script>alert('Đăng nhập thất bại')</script>";
            }
        }
        break;   
        case 'dangxuat':
            unset($_SESSION['makh']);
            unset($_SESSION['tenkh']);
            echo "<meta http-equiv='refresh' content='0;url=./index.php?action=home'/>";
            break;  
    default:
        break;
}

