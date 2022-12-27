<?php

class DB{
    static public function connect() {
        $db = new PDO("mysql:host=localhost;dbname=shipcruisetour","root","");
        $db->exec("set names utf8");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $db;
    }
}
?>