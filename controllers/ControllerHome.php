<?php
class ControllerHome
{
    public function index($page)
    {
        include('views/' . $page . '.php');
    }
    function admin(){
        $login = new adminController;
        $login->login();
        include('views/admin.php');
    }
}