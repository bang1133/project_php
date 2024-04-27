<?php

$act = "thanhtoan";
if(isset($_GET['act'])){
    $act = $_GET['act'];
}
switch ($act) {
    case 'thanhtoan':
        //controller yêu cầu model chèn dữ liệu database thì mới có thông tin hiển thị lện order
        $hd = new hoadon();
        if(isset($_SESSION['makh']))
        {
            $makh = $_SESSION['makh'];
            $sohd = $hd->insertHoadon($makh);
            $_SESSION['masohd'] = $sohd;
            //tiến hành thêm vào bảng chi tiết hoá đơn
            // duyệt qua giỏ hàng, đem thông tin từng món hành add vào database
            $total = 0;
            foreach($_SESSION['cart'] as $key => $item){
                //viết phương thức chèn vào hoá đơn
                $hd->insertCThoadon($sohd,$item['mahh'],$item['soluong'],$item['thanhtien']);
                //chèn dữ liệu vào hoá đơn xong thì update lại tổng thành tiền và số lượng trong kho
                $total += $item['thanhtien'];
                //update lại hàng hoá
            }
            $hd->updateTien($sohd,$makh,$total);

        }
        include_once("./View/order.php");
        break;
    
    default:
        # code...
        break;
}