<!DOCTYPE html>
<html lang="en">
<?php
// include_once "./Model/connect.php";
// include_once "./Model/hanghoa.php";
set_include_path(get_include_path().PATH_SEPARATOR.'./Model');
spl_autoload_register();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Trang chủ</title>
</head>

<body>
    <?php
        include_once "./View/header.php";
    ?>
    <div class="container">
        <div class="row">
        <?php
            $ctrl = 'home';
            //điều hướn đến những trang khác
            if(isset($_GET['action'])){
                $ctrl = $_GET['action'];
            }
                include_once "Controller/$ctrl.php"
        ?>  
        </div>
    </div>
    <?php
        include_once "./View/footer.php";
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>