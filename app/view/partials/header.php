<!-- ADMIN NAVBAR -->
<?php
use App\Controller\PageController;
$controller = new PageController();
$role = $_SESSION['role'] ?? null;
if(!isset($role)){
    $controller->guestNavbar();  
}
?>
            
         
           






