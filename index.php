<?php
ob_start();
require_once 'views/includes/header.php';
require_once './autoload.php';
$home = new ControllerHome();
$pages=['accuiel','about','cruis','contactUs','admin','SignUp','SingIn','dashboard','ajouteport'];
if (isset($_GET['page'])){
    if (in_array($_GET['page'],$pages)){
        $page = $_GET['page'];
        $home->index($page);

    }else {
        include('views/includes/404.php');
    }
} 
else {
    $home->index('accuiel');
}
require_once 'views\includes\footer.php';


?>