<?php
include("config.php");
session_start();

if($_SESSION['user_role'] != "Employee") {
    header("location: index.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($db,$_POST['title']);
    $desc = mysqli_real_escape_string($db,$_POST['desc']);
    $price = mysqli_real_escape_string($db,$_POST['price']);
    $category = mysqli_real_escape_string($db,$_POST['category']);

    $sql = "Insert Into `menu` (`Title`,`Desc`,`Price`,`Category`) Values ('" . $title . "', '" . $desc . "', '" . $price . "', '" . $category . "')";
    $result = mysqli_query($db,$sql);
    header("location: index.php?page=menu");
}

?>

<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Martha's Brew Stand</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="css/owl.carousel.css" />

    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <link rel="stylesheet" href="css/font-awesome.min.css" />

    <link rel="stylesheet" href="css/animate.min.css" />

    <link rel="stylesheet" href="css/main.css" />

    <link rel="stylesheet" href="css/responsive.css" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />


    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
    <script src="js/jquery.nav.js"></script>
    <!--<script src="js/jquery.sticky.js"></script>-->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/main.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <section id="hero-area">
        <img class="img-responsive" src="images/header.jpg" alt="" />
    </section>

    <nav id="navigation">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <nav class="navbar navbar-default">
                            <div class="container-fluid">

                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand" href="#">
                                        <h2>Martha's Brew</h2>
                                    </a>

                                </div>

                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav navbar-right" id="top-nav">
                                        <?php
                                        include 'navbar.php';
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <section id="price">
        <div class="container">
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("config.php");

                        $sql = "SELECT * FROM `menu`";
                        $result = mysqli_query($db,$sql);

                        while ($row = mysqli_fetch_array($result)) {
                            echo '<tr>';
                            echo '<td>' . $row['Title'] . '</td>';
                            echo '<td>' . $row['Desc'] . '</td>';
                            echo '<td>' . $row['Price'] . '</td>';
                            echo '<td>' . $row['Category'] . '</td>';
                            echo '<td><a href="?page=removemenu&id=' . $row['ID'] . '">Remove</a></td>';
                            echo '</tr>';
                        }
                        ?>

                    </tbody>
                </table>
                <br />
                <br />
                <form action="menu.php" method="post">
                    <label class="">Add A Menu Item</label>
                    <br />
                    <input type="text" class="form-control" name="title" placeholder="Title" />
                    <br />
                    <textarea type="text" class="form-control" name="desc" placeholder="Description"></textarea>
                    <br />
                    <input type="text" class="form-control" name="price" placeholder="Price" />
                    <br />
                    <input type="text" class="form-control" name="category" placeholder="Category" />
                    <br />
                    <button class="btn btn-primary" type="submit" style="float: right">Add</button>
                </form>
            </div>
        </div>
    </section>


    <footer id="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="block">
                        <p>
                            John Mahoney
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>

<script>
    $(document).ready(function () {
        $('.table').DataTable();
    });
</script>
