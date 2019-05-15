<?php

if (isset($_GET['page']))
{
    $activePage = $_GET['page'] . ".php";
}

if (isset($activePage))
{
    include $activePage;
}
else
{
    include "home.php";
}


?>

