<?php
class hanghoa
{
    //phương thức lấy hàng hoá mới nhất
    function giayNew()
    {
        //kết nối database
        $db = new connect();
        //truy vấn để lấy 
        $select = "select a.mahh,a.tenhh,b.hinh,b.dongia,c.mausac,a.soluotxem,b.giamgia from hanghoa a, cthanghoa b, mausac c
                     where a.mahh=b.idhanghoa and b.idmau=c.Idmau and b.giamgia=0  order by a.mahh DESC limit 8";
        $result = $db->getList($select);
        return $result;
    }
    //pấy hàng sale
    function getHangsale()
    {
        //kết nối với database
        $db = new connect();
        //lấy thứ cần lấy
        $select = "select a.mahh,a.tenhh,b.hinh,b.dongia,c.mausac,a.soluotxem,b.giamgia from hanghoa a,cthanghoa b,mausac c
        where a.mahh=b.idhanghoa and b.idmau=c.Idmau and b.giamgia!=0 order by a.mahh DESC limit 8";
        //query thực hiện câu lệnh select(mà query để trong connect)
        $result = $db->getList($select);
        return $result;

    }
    //lấy toàn bộ  sản phẩm
    function getAll()
    {
        $db = new connect();
        $select = "select a.mahh, a.tenhh, b.hinh, b.dongia,  a.soluotxem, b.giamgia from hanghoa a, cthanghoa b, mausac c
        WHERE a.mahh=b.idhanghoa and b.idmau=c.Idmau order by a.mahh DESC";
        $result = $db->getList($select);
        return $result;
    }
    // lấy full hàng sale
    function saleAll()
    {
        $db = new connect();
        $select = "select a.mahh, a.tenhh, b.hinh, b.dongia,  a.soluotxem, b.giamgia from hanghoa a, cthanghoa b, mausac c
        WHERE a.mahh=b.idhanghoa and b.idmau=c.Idmau and b.giamgia!=0 order by a.mahh DESC";
        $result = $db->getList($select);
        return $result;
    }
    function gethanghoaPage($start, $limit)
    {
        $db = new connect();
        $select = "select a.mahh, a.tenhh, b.hinh, b.dongia,  a.soluotxem, b.giamgia from hanghoa a, cthanghoa b, mausac c
        WHERE a.mahh=b.idhanghoa and b.idmau=c.Idmau order by a.mahh DESC limit " . $start . "," . $limit;
        $result = $db->getList($select);
        return $result;
    }
    function getSalepage($start1, $limit_s)
    {
        $db = new connect();
        $select = "select a.mahh, a.tenhh, b.hinh, b.dongia,  a.soluotxem, b.giamgia from hanghoa a, cthanghoa b, mausac c
        WHERE a.mahh=b.idhanghoa and b.idmau=c.Idmau and b.giamgia!=0 order by a.mahh DESC limit " . $start1 . "," . $limit_s;
        $result = $db->getList($select);
        return $result;
    }
    //lấy sản phẩm theo id
    function getID($id)
    {
        $db = new connect();
        $select = "SELECT DISTINCT b.mahh, b.tenhh, b.mota, a.dongia from cthanghoa a, hanghoa b
                             WHERE a.idhanghoa=b.mahh and b.mahh= $id";
        $result = $db->getInstance($select);
        return $result;
    }

    //lấy hình ảnh
    function getImage($id)
    {
        $db = new connect();
        $select = "SELECT a.hinh from cthanghoa a WHERE a.idhanghoa=$id";
        $result = $db->getList($select);
        return $result;
    }
    //lấy hình dựa vào id hàng,màu,size
    function getHinh($mahh)
    {
        $db = new connect();
        $select = "SELECT DISTINCT a.hinh FROM cthanghoa a WHERE a.idhanghoa = $mahh";
        $result = $db->getInstance($select);
        return $result;
    }
    //search
    function selectTimKiem($tenhh)
    {
        $db = new connect();
        $select="select a.mahh,a.tenhh,a.soluotxem,b.dongia,b.hinh 
                 from hanghoa a, cthanghoa b
                 WHERE a.mahh=b.idhanghoa and a.tenhh like '%$tenhh%' ORDER by a.mahh DESC ";
        $result = $db->getList($select);
        return $result;
    }
}
