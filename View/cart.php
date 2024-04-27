
<div class="table-responsive">
    <?php
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    ?>
        <form action="index.php?action=giohang&act=update" method="post">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td colspan="5">
                            <h2 style="color: red;">THÔNG TIN GIỎ HÀNG</h2>
                        </td>
                    </tr>
                    <tr class="table-success">
                        <th>Số TT</th>
                        <th>Thông Tin Sản Phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tùy Chọn Của Bạn</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        $j = 0;
                            foreach ($_SESSION['cart'] as $key => $item):
                                
                        $j++;
                    ?>
                        <tr>
                            <td>
                                <?php echo $j; ?>
                            </td>
                            <td>
                                <div class="tab-pane active" id="">
                                    <img  src="./Content/img/<?php echo $item['hinh'] ?>" alt="" width="200px" height="150px">    
                                </div>                    
                            <td>
                                Đơn Giá:
                                <?php echo $item['dongia'] ?>
                            </td>
                            <td>
                            Số Lượng:
                                <input type="text" name="newqty[<?php echo $key ?>]" value=" <?php echo $item['soluong'] ?> " /><br />
                            </td>
                            <td>
                                <a href="index.php?action=giohang&act=xoa&id=<?php echo $key ?>">
                                    <button type="button"class="btn btn-danger">Xóa</button>
                                </a>
                                <button type="submit" class="btn btn-secondary">Sửa</button>
                            </td>
                    <?php
                        endforeach;
                    ?>
                    <tr>
                        <td colspan="3">
                            <b>Tổng Tiền</b>
                        </td>
                        <td style="float: right;">
                            
                        </td>
                    <td>
                        <a href="index.php?action=thanhtoan">Thanh toán</a>
                        :<b>
                                <?php
                                $gh = new giohang();
                                echo $gh->getTotal();
                                ?>
                                <sup><u>đ</u></sup>
                            </b>
                    
                    </td>
                    </tr>
                </tbody>
            </table>
        </form>
        <?php
    } else {
        echo "<script>alert('Giỏ hàng của bạn chưa có hàng')</script>";
        echo "<meta http-equiv='refresh' content='0;url=./index.php?action=home'/>";
    }

    ?>
</div>
</div>