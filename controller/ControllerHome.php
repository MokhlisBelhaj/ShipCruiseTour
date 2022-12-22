<?php
class ControllerHome
{
    public function index($page)
    {
        include('views/' . $page . '.php');
    }
}

