    <?php
    // nếu như người dùng chưa có giỏ hàng thì phải tạo
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    $act = "giohang";
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
    }
    switch ($act) {
        case 'giohang':
        include_once "./View/cart.php";
                break;
        case 'giohang_act':
                $mahh = 0;  
                $size = 0;
                if (isset($_POST['mahh'])) {
                    $mahh = $_POST['mahh'];
                    $soluong = $_POST['soluong'];
                    $gh = new giohang();
                    $gh->addGiohang($mahh,$soluong);
                    echo "<meta http-equiv='refresh' content='0;url=./index.php?action=giohang'/>";
                }
            break;
            case 'xoa':
                #nhận key
                if(isset($_GET['id'])){
                    $id =$_GET['id'];
                    unset($_SESSION['cart'][$id]);
                    echo "<meta http-equiv='refresh' content='0;url=./index.php?action=giohang'/>";
                }
                break;
                case 'update':
                        if(isset($_POST['newqty'])){
                            $newsoluong = $_POST['newqty'];
                            foreach($newsoluong as $key => $value){
                                if($_SESSION['cart'][$key]['soluong'] != $value){
                                    $gh= new giohang();
                                    $gh->updateHH($key,$value);
                                    echo "<meta http-equiv='refresh' content='0;url=./index.php?action=giohang'/>";
                                }
                            }
                        }
                    break;
        default:
            # code...
            break;
    }
