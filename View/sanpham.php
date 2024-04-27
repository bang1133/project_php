<link rel="stylesheet" href="./Content/css/sanpham.css">
<!-- Trang Sản Phẩm -->
<style>
    .product-image {
        height: 200px;
        object-fit: cover;
    }
</style>
<?php
$hh = new hanghoa();
//xác định toàn bộ sản phẩm có trong sql
$count = $hh->getAll()->rowCount();
//giới hạn sản phẩm cho từng trang sản phẩm
$limit = 6;
// xác định số trang cần có
$trang = new chia_page();
$page = $trang->findPage($count, $limit);
//lấy trang bắt đầu
$start = $trang->startPage($limit);
//lấy giá tri hiện tại
$value_cur = isset($_GET['page']) ? $_GET['page'] : 1;
?>
<!-- này của trang sale đừng nhìn -->
<!-- Trang Sale -->
<?php
$hs = new hanghoa();
$count_s = $hs->saleAll()->rowCount();
// giới hạn sản phẩm cho trang sale
$limit_s = 6;
// xác định số trang cần có 
$trang_sale = new chia_page();
$page_sale = $trang_sale->salePage($count_s, $limit_s);
//lấy trang Start
$start1 = $trang_sale->startSale($limit_s);
//lấy trang Sale hiện tại
$sale_curr = isset($_GET['page_sale']) ? $_GET['page_sale'] : 1;
?>
<?php
$ac = 1;
if (isset($_GET['action'])) {
    if (isset($_GET['act']) && isset($_GET['act']) == 'sale') {
        $ac = 2;
    } else {
        $ac = 1;
    }
}
?>
<!-- search -->
<?php
$ac = 1;
if (isset($_GET['action'])) {
    if (isset($_GET['act']) && $_GET['act'] == "sale") {
        $ac = 2;
    } else {
        $ac = 1;
    }
}
?>
<?php
if (isset($_GET['act']) && $_GET['act'] == "timkiem") {
    $ac = 3;
} 
?>
<div class="row-12 p-4">
    <?php
    if ($ac == 1) {
        echo '<h5 style="text-align:center;background:#000; width: 100%;color:#fff;">Toàn Bộ Sản Phẩm</h5>';
    }
    if ($ac == 2) {
        echo '<h5 style="text-align:center;">Tất cả sản phẩm <b style="color:red;">SALE</b></h5>';
    }
    if ($ac == 3) {
        echo '<h5 style="text-align:center;"><b style="color:red;">Sản Phẩm Tìm Kiếm</b></h5>';
    }
    ?>
    <div class="row p-2" style="display: flex;
                align-items: center;
                justify-content: center;">
        <?php
        $hh = new hanghoa();
        if ($ac == 1) {
            // $result = $hh->getAll();
            $result = $hh->gethanghoaPage($start, $limit);
        }
        if ($ac == 2) {
            $result = $hh->getSalepage($start1, $limit_s);
        }
        if ($ac == 3) {
            if (isset($_POST['txtsearch'])) {
                $tk = $_POST['txtsearch'];
                //thực hiện truy vấn tìm kiếm
                $result = $hh->selectTimKiem($tk);
            }
        }
        while ($set = $result->fetch()):
            ?>
            <div class="col-lg-4 col-md-4 mb-3 text-center">
                <a href="index.php?action=sanpham&act=chitiet&id=<?php echo $set['mahh'] ?>" style="font-weight:bold;">
                    <div class="view overlay z-depth-1-half">
                        <img src="Content\img\<?php echo $set['hinh'] ?>" class="img-fluid product-image" alt="">
                    </div>
                    <?php
                    // Sản phẩm toàn bộ
                    if ($ac == 1) {
                        if ($set['giamgia'] != 0) {
                            $conlai = $set['dongia'] - $set['giamgia'];
                            echo '<h5 class="my-4 font-weight-bold" style="color: red;">' . number_format($conlai) . '<sup><u>đ</u></sup></br></h5>';
                        } else {
                            echo '<h5 class="my-4 font-weight-bold" style="color: red;">' . number_format($set['dongia']) . '<sup><u>đ</u></sup></br></h5>';
                        }
                    }
                    // Sản phẩm SALE
                    if ($ac == 2) {
                        echo '<h5 class="my-4 font-weight-bold">
                                <font color="red">' . number_format($set['dongia']) . '<sup><u>đ</u></sup></font>
                                <strike>' . number_format($set['giamgia']) . '</strike><sup><u>đ</u></sup>
                                </h5>';
                    }
                    ?>
                    <span style="color:red;font-weight: bold;">
                        <?php echo $set['tenhh']; ?>
                    </span></br>
                </a>
                <button class="btn btn-danger" id="may4" value="lap 4">New</button>
                <h5>Số lượt xem:
                    <?php echo $set['soluotxem'] ?>
                </h5>
            </div>
            <?php
        endwhile;
        ?>
    </div>
</div>
<!-- Sản Phẩm -->
<?php if ($ac == 1): ?>
    <div class="col-md-auto offset-md-5">
        <ul class="pagination">
            <?php
            if ($value_cur > 1 && $page > 1) {
                echo ' <li> <a href="index.php?action=sanpham&page=' . ($value_cur - 1) . '">Prev</a></li>';
            }
            for ($i = 1; $i <= $page; $i++):
                ?>
                <li><a href="index.php?action=sanpham&page=<?php echo $i ?>">
                        <?php echo $i ?>
                    </a></li>
                <!-- next -->
                <?php
            endfor;
            if ($value_cur < $page && $page > 1) {
                echo '<li><a href="index.php?action=sanpham&page=' . ($value_cur + 1) . '">Next</a></li>';
            }
            ?>
        </ul>
    </div>
<?php endif; ?>
<!-- Sale -->
<?php if ($ac == 2): ?>
    <div class="col-md-auto offset-md-4">
        <ul class="pagination">
            <?php
            if ($sale_curr > 1) {
                echo '<li><a href="index.php?action=sanpham&act=sale&page_sale=' . ($sale_curr - 1) . '">Prev</a></li>';
            }
            for ($i = 1; $i <= $page_sale; $i++) {
                echo '<li><a href="index.php?action=sanpham&act=sale&page_sale=' . $i . '">' . $i . '</a></li>';
            }
            if ($sale_curr < $page_sale) {
                echo '<li><a href="index.php?action=sanpham&act=sale&page_sale=' . ($sale_curr + 1) . '">Next</a></li>';
            }
            ?>
        </ul>
    </div>
<?php endif; ?>