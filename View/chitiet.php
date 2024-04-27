<script type="text/javascript">
    function chonsize(a) {
        document.getElementById("size").value = a;
    }
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</script>
<section>
    <div class="row">
        <div class="col-lg-12">
            <h3 class="mb-5 font-weight-bold text-center p-3 text-danger">CHI TIẾT SẢN PHẨM</h3>
        </div>
    </div>
    <article class="col-12">
        <div class="card">
            <div class="container-fluid">
                <div class="wrapper row">
                    <form action="index.php?action=giohang&act=giohang_act" method="post">
                        <input type="hidden" name="action" value="giohang&add_cart" />
                        <div class="preview col-md-4">
                            <div class="tab-content" style="">
                                <?php
                                    if (isset($_GET['id'])) {
                                        $id = $_GET['id'];
                                        $hh = new hanghoa();
                                    }
                                ?>
                                <?php
                                    $hinh = $hh->getImage($id);
                                    $set = $hinh->fetch();
                                ?>
                                <div class="tab-pane active" id="">
                                    <img  src="./Content/img/<?php echo $set['hinh'] ?>" alt="" width="200px" height="350px">
                                <?php
                                    $hh = new hanghoa();
                                    $sp = $hh->getID($id);
                                    $tenhh = $sp['tenhh'];
                                    $mota = $sp['mota'];
                                    $dongia = $sp['dongia'];
                                ?>
                                </div>

                            </div>
                        </div>
                        <div class="details col-md-6">
                        <input type="hidden" name="mahh" value="<?php echo $id; ?>" />
                            <h3 class="product-title" name="tenhh">
                                <?php
                                    echo $tenhh
                                ?>
                            </h3>
                            <p class="product-description">
                                <?php echo $mota ?>
                            </p>
                                <h4 class="price" name="dongia">Giá bán:
                                    <?php echo number_format($dongia) ?> đ
                                </h4>
                            </select>
                            Số Lượng:
                            <input type="number" id="soluong" name="soluong" min="1" max="100" value="1" size="10" />
                            </h5>
                            <div class="action">
                                <button class="add-to-cart btn btn-info" type="submit" data-toggle="modal"
                                    data-target="#myModal">MUA NGAY
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- </div> -->
    </article>
</section>

<p class="float-left"><b>Bình luận </b></p>
<hr>
</div>
<form action="" method="post">
    <div class="row">

        <input type="hidden" name="txtmahh" value="" />
        <textarea class="input-field" type="text" name="comment" rows="2" cols="70" id="comment"
            placeholder="Thêm bình luận">  </textarea>
        <input type="submit" class="btn btn-primary" id="submitButton" style="float: right;" value="Bình Luận" />

    </div>

</form>
<div class="row">
    <p class="float-left"><b>Các bình luận</b></p>
    <hr>
</div>
<div class="row">
    <br />
</div>

</div>
</section>