<link rel="stylesheet" href="./Content/css/header.css">
<script src="./Content/css/login.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<header>
    <section class="col">
        <div class="container">
            <div class="row-12" id="mid-header">
                <a href="" id="logo">
                    <img style="margin-right: 150px;position: relative;top: 25px;" src="./Content/img/logo.jpg" alt="">
                </a>
                <ul>
                    <a href="index.php">
                        <li>Trang Chủ</li>
                    </a>
                    <a href="index.php?action=sanpham">
                        <li>Sản Phẩm</li>
                    </a>
                    <a href="index.php?action=sanpham&&act=sale">
                        <li>Sale</li>
                    </a>
                    <a href="">
                        <li>Chia sẻ</li>
                    </a>
                </ul>
                <div id="icon-header" style="right:20px;">
                    <?php
                    session_start();
                    ?>
                    <div style="display: flex;">
                        <?php
                        if (isset($_SESSION['makh'])) {
                            echo '<b style="color: red;width:150px;position:relative;right: 20px;top:10px;"> ' . $_SESSION['tenkh'] . '</b>';
                            echo '<a href="index.php?action=dangnhap&act=dangxuat" style="width: 100px; position:relative;top:10px;">Đăng Xuất</a>';
                            echo '<a href="index.php?action=giohang" style="position:relative;right: 10px;;font-size:26px;">
                                        <span class="bi bi-cart4 "></span>
                                      </a>';
                        } else {
                            echo '<a href="index.php?action=dangnhap" style="position:relative;right:150px;"><span class="bi bi-person-circle"></span></a>';
                            echo ' <a href="index.php?action=giohang" style="position:relative;right:150px;bottom:3px;font-size:26px;">
                                            <span class="bi bi-cart4 "></span>
                                       </a>';
                            echo '';
                        }
                        ?>
                    </div>
                    <!-- search -->
                    <form class="form-inline" action="index.php?action=sanpham&act=timkiem" method="POST">
                        <div class="input-group" style="position: relative;bottom:25px;left:20px;">
                            <div class="input-group-prepend">
                                <button style="height: 35px;border:none;background:#fff ;" type="submit"
                                    value="Tìm Kiếm">
                                    <i style="color:#fff;position:absolute;top:45px;left: 170px;"
                                        class="bi bi-search"></i>
                                </button>
                                <input type="text" name="txtsearch" placeholder="Tìm Kiếm" style="height:40px;width: 200px;border:none;border-radius:20px;background:black;color:#fff;" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- carosell -->
        <div id="carouselExampleIndicators" style="margin-top: 30px;" class="carousel slide" data-bs-ride="carousel"
            data-bs-interval="3000">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./Content/img/nen1.jpg" style="width:1500px; height: 500px;  class=" d-block w-100"
                        alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./Content/img/nen2.jpg" style=" height: 501px; " class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./Content/img/nen3.jpg" style="height: 500px;" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
</header>