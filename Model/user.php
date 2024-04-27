<?php
class user{
    //ktra tk có tồn tại ko
    function checkTK($username,$email){
        $db =  new connect();
        $select = "SELECT a.username, a.email FROM khachhang a WHERE a.username='$username' or a.email='$email'";
        $result = $db->getList($select);
        return $result;
    }
    //insert vào database
    function insertKH($tenkh,$username,$matkhau,$email,$diachi,$sodienthoai){
        $db = new connect();
        $query = "INSERT INTO khachhang( makh,tenkh,username,matkhau,email,diachi,sodienthoai)
         VALUES (NULL, '$tenkh','$username','$matkhau','$email','$diachi','$sodienthoai')";
         //exec
         $result =$db->exec($query);
         return $result;
    }
    function logKH($user,$pass,$email){
        $db = new connect();
        $select = "SELECT a.makh, a.tenkh, a.email FROM khachhang a 
                   WHERE a.username ='$user' AND a.matkhau ='$pass' AND a.email ='$email'";
        $result = $db->getInstance($select);
        return $result;
    }
    //đăng xuất
    function outKH(){
        
    }
}

?>