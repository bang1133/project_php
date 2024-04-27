<?php
class connect
{
    var $db = null;
    function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=thuctap';
        $user = 'root';
        $pass = '';
        try {
            $this->db = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (\Throwable $th) {
            echo "NO";
            echo $th;
        }
    }
    //
    function getList($select)
    {
        $result = $this->db->query($select);
        return $result;
    }
    //phương thức truy vấn
    function exec($query)
    {
        $result=$this->db->exec($query);
        return $result;
    }
    function getInstance($select)
    {
        $results = $this->db->query($select); 
        $result = $results->fetch();
        return $result;
    }

}
