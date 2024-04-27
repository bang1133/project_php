<section class="col-12">
    <div    >
        <!-- New giày nam -->
        <h3
            style=" color: red; font-family:Georgia, 'Times New Roman', Times, serif;font-weight: bold; text-align: center; margin-top: 60px;">
            Hàng New
        </h3>
        <div class="row">
            <?php
            $hh = new hanghoa();
            $result = $hh->giayNew(); // gọi dữ liệu đổ về view
            while ($set = $result->fetch()): // set là array[....,...]
                ?>
                <!--Grid column-->
                <div class="col-lg-3 col-md-4 mb-3 text-center">
                    <a href="index.php?action=sanpham&act=chitiet&id=<?php echo $set['mahh'] ?>">
                        <div class="view overlay z-depth-1-half">
                            <img style="width:222px; height: 222px;" src="Content\img\<?php echo $set['hinh']; ?>"
                                class="img-fluid" alt="">
                            <div class="mask rgba-white-slight"></div>
                        </div>
                        <h5 class="my-4 font-weight-bold" style="color: red;">
                            <?php echo number_format($set['dongia']); ?><sup><u>đ</u></sup></br>
                        </h5>
                        <span style="color:#000; font-weight:bold;">
                            <?php echo $set['tenhh'] ?>
                        </span></br>
                    </a>
                    <button class="btn btn-danger" id="may4" value="lap 4">New</button>
                    <h5>Số lượt xem:
                        <?php echo $set['soluotxem']; ?>
                    </h5>
                </div>

                <?php
            endwhile;
            ?>
        </div>
        <!-- hàng sale -->
        <h3
            style="color: red; font-family:Georgia, 'Times New Roman', Times, serif; font-weight: bold; text-align: center; margin-top: 60px;">
            Sale HOT
        </h3>
        <div class="row">
            <?php
            $hh = new hanghoa();
            $result = $hh->getHangsale();
            while ($set = $result->fetch()):
                ?>
                <div class="col-lg-3 col-md-4 mb-3 text-center">
                    <a href="index.php?action=sanpham&act=chitiet&id=<?php echo $set['mahh'] ?>" style="font-weight:bold;">

                        <div class="view overlay z-depth-1-half">
                            <img style="width:222px; height: 222px;" src="Content\img\<?php echo $set['hinh']; ?>"
                                class="img-fluid" alt="">
                            <div class="mask rgba-white-slight"></div>
                        </div>
                        <h5 class="my-4 font-weight-bold">
                            <font color="red">
                                <?php echo number_format($set['dongia']) ?><sup><u>đ</u></sup>
                            </font>
                            <strike>
                                <?php echo number_format($set['giamgia']) ?>
                            </strike><sup><u>đ</u></sup>
                        </h5>
                        <span style="color:red;">
                            <?php echo $set['tenhh'] ?>
                        </span></br>
                    </a>
                    <button class="btn btn-danger" id="may4" value="lap 4">New</button>
                    <h5>Số lượt xem:
                        <?php echo $set['soluotxem']; ?>
                    </h5>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>