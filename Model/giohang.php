    <?php
    class giohang
    {
        // Phương thức thêm vào giỏ hàng
        function addGiohang($mahh, $soluong)
        {
            //thiếu hình,tên,đơn giá,thành tiền
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array(); //dạng mảng vì có thể mua nhiều sản phẩm
            }
            $sanpham = new hanghoa();
            $sp = $sanpham->getID($mahh);
            $tenhh = $sp['tenhh'];
            $dongia = $sp['dongia'];
            //lấy hình
            $hinh = $sanpham->getHinh($mahh);
            $img = $hinh['hinh'];
            $total = $soluong * $dongia;
            $flag = false;
            foreach($_SESSION['cart'] as $key => $item){
                if($item['mahh'] == $mahh){
                    $flag = true;
                    $soluong += $_SESSION['cart'][$key]['soluong'];
                    $this->updateHH($key,$soluong);
                }
            }
            if($flag == false){
                //tạo đối tượng
                $item = array(  
                    'mahh' => $mahh,
                    'tenhh' => $tenhh,
                    'hinh' => $img, 
                    'soluong' => $soluong,
                    'dongia' => $dongia,
                    'thanhtien' => $total
                );
                //add sản phẩm vào giỏ hàng
                $_SESSION['cart'][] = $item; 
            }
        }
        
        function updateHH($index, $soluong)
        {
            if ($soluong <= 0) {
                unset($_SESSION['cart'][$index]);
            } else {
                $_SESSION['cart'][$index]['soluong'] = $soluong;
                $tiennew = $_SESSION['cart'][$index]['soluong'] * $_SESSION['cart'][$index]['dongia'];
                $_SESSION['cart'][$index]['thanhtien'] = $tiennew;
            }
        }
        
        function getTotal()
        {
            $subtotal = 0;
            foreach ($_SESSION['cart'] as $item) {
                $subtotal += $item['thanhtien'];
            }
            $subtotal = number_format($subtotal, 2);
            return $subtotal;
        }
    }
