<?php
class chia_page{
    //tính số trang
    function findPage($count,$limit){
        $page=(($count%$limit)==0?($count/$limit):ceil($count/$limit));
        return $page;
    }
    //trang bắt đầu
    function startPage($limit){
        if(!isset($_GET['page']) || $_GET['page']==1){
            $start = 0;
        }
        else{
            $start=($_GET['page']-1)*$limit;
        }
        return $start;
    }
    //sale
    function salePage($count_s,$limit_s){
        $page_sale = (($count_s%$limit_s)==0?($count_s/$limit_s):ceil($count_s/$limit_s));
        return $page_sale;
    }
    //trang bắt đầu
    function startSale($limit_s){
        if(!isset($_GET['$page_sale']) || $_GET['$page_sale']==1){
            $start_s = 0;
        }
        else{
            $start_s=($_GET['$page_sale']-1)*$limit_s;
        }
        return $start_s;
    }

}
