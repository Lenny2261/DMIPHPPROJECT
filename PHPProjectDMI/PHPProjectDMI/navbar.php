<?php
session_start();
if($_SESSION['login_user'] != null){
    if($_SESSION['user_role'] == "Employee")
    {
        $items = array("home", "orders", "menu", "logout");
    }
    else{
        $items = array("home", "order", "logout");
    }
}
else{
    $items = array("home", "order", "login");
}

foreach ($items as $item)
{
    echo '<li><a href="?page=' . $item . '"> ' . $item . '</a></li>';
}
?>