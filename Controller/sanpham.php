<?php
$act = "sanpham";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'sanpham':
        include_once "./View/sanpham.php";
        break;
    case 'sale':
        include_once "./View/sanpham.php";
        break;
    case 'chitiet':
        include_once "./View/chitiet.php";
        break;
    case 'timkiem':
        include_once "./View/sanpham.php";
        break;



}
