<?php
class hoadon{
    //phương thức insert vào bảng hoá đơn trước
    //vì có hoá đơn mới có được chi tiết hoá đơn
    //chi tiết hoá đơn có được là do có hoá đơn và khách hàng
    function  insertHoadon($makh){
        $date=new DateTime('now');
        $ngay=$date->format('Y-m-d');//trong database là năm tháng ngày
        $db=new connect();
        $query="insert into hoadon(masohd,makh,ngaydat,tongtien) values(Null,$makh,'$ngay',0)";
        $db->exec($query);
    //insert xong thì lấy mã vừa insert đưa vào hoá đơn
        $select="select masohd from hoadon order by masohd desc limit 1";
        $mahh=$db->getInstance($select);
        return $mahh[0];
    }
    //phương thức chèn vào bản chi tiết
    function insertCThoadon($masohd, $mahh, $soluongmua, $thanhtien){
        $db=new connect();
        $query="insert into cthoadon(masohd, mahh, soluongmua,thanhtien, tinhtrang)
                    values($masohd, $mahh, $soluongmua,$thanhtien,0)";
                    // echo $query;
                    //thực thi câu lệnh insert theo dạng tiêu chuẩn là exec, bảo mật là prepare
                    $db->exec($query);

    }
    //phương thức updateTien trong hoá đơn
    function updateTien($masohd,$makh,$total){
        $db=new connect();
        $query="update hoadon set tongtien=$total WHERE masohd=$masohd and makh=$makh";
        $db->exec($query);
    }
    //phương thức trừ số lượng tồn kho
    //hiển thị thông tin của khách hàng trên hoá đơn
    function getHoadonKH($masohd){
        $db=new connect();
        $select="select b.masohd,b.ngaydat,a.tenkh,a.diachi,a.sodienthoai from khachhang a INNER JOIN 
                 hoadon b on a.makh=b.makh WHERE masohd=$masohd";
                    $result = $db->getInstance($select);
                    return $result;
    }
    //hiển thị thông tin của sản phẩm
    function getHoaDonCTHD($masohd){
        $db=new connect();
        $select="select DISTINCT a.tenhh, b.dongia, c.soluongmua from hanghoa a, cthanghoa b,
                    cthoadon c WHERE a.mahh=b.idhanghoa and a.mahh=c.mahh and c.masohd=$masohd";
                $result=$db->getList($select);
                return $result;
    }
}