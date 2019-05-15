<?php
include("config.php");

if($_GET['success'] == 'yes'){
    $error = "Order has been successfully created";
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $coffee = mysqli_real_escape_string($db,$_POST['coffee']);
    $pickup = mysqli_real_escape_string($db,$_POST['pickup']);
    $phone = mysqli_real_escape_string($db,$_POST['phone']);
    $paid = mysqli_real_escape_string($db,$_POST['paid']);
    $make = mysqli_real_escape_string($db,$_POST['make']);
    $model = mysqli_real_escape_string($db,$_POST['model']);
    $color = mysqli_real_escape_string($db,$_POST['color']);
    $tip = mysqli_real_escape_string($db,$_POST['tip']);
    $total = mysqli_real_escape_string($db,$_POST['total']);
    $request = mysqli_real_escape_string($db,$_POST['request']);

    if($coffee == "" || $pickup == "" || $phone == "" || $total == ""){
        $error = "Failed make sure you have all required fields filled.";
    }
    else{
        if($paid == "on"){
            $paid = 1;
        }
        else{
            $paid = 0;
        }
        $coffee = explode(',', $coffee)[0];
        $sql = "Insert Into `order` (`Coffee`,`Phone`,`PickupTime`,`Requests`,`Tip`,`Total`,`Status`,`Paid`,`CarMake`,`CarModel`,`CarColor`,`DateCreated`) Values ('" . $coffee . "', '" . $phone . "', '" . $pickup . "', '" . $request
            . "', '" . $tip . "', '" . $total . "', 'Pending', '" . $paid . "', '" . $make . "', '" . $model . "', '" . $color . "', NOW())";
        $result = mysqli_query($db,$sql);
        header("location: index.php?page=order&success=yes");
    }
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

    <script src="js/vendor/modernizr-2.6.2.min.js"></script>

    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
    <script src="js/jquery.nav.js"></script>
    <!--<script src="js/jquery.sticky.js"></script>-->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/main.js"></script>
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
            <form action="order.php" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <label>
                            <div style="color: red">
                                <?php echo $error ?>
                            </div> * means the field is required
                        </label>
                        <br />
                        <label>Select Coffee *</label>
                        <select class="form-control" name="coffee" id="coffee" onchange="changetotal()">
                            <?php
                            include("config.php");

                            $sql = "SELECT * FROM `menu`";
                            $result = mysqli_query($db,$sql);

                            while ($row = mysqli_fetch_array($result)) {
                                echo '<option value="'. $row['Title'] . ',' . $row['Price'] . '">' . $row['Title'] . ' Category: ' . $row['Category'] . ' $' . $row['Price'] .  '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label>Enter Pickup Time *</label>
                        <input type="datetime-local" class="form-control" placeholder="Pickup Time" name="pickup" />
                    </div>
                    <div class="col-md-6">
                        <label>Enter Phone Number *</label>
                        <input type="text" class="form-control" name="phone" />
                    </div>
                </div>

                <label>Requests</label>
                <textarea type="text" class="form-control" name="request"></textarea>
                <br />
                <label>Enter Your Car (Optional)</label>
                <div class="row">
                    <div class="col-md-6">
                        <label>Car Make</label>
                        <input type="text" class="form-control" name="make" />
                        <label>Car Model</label>
                        <input type="text" class="form-control" name="model" />
                    </div>
                    <div class="col-md-6">
                        <label>Car Color</label>
                        <input type="text" class="form-control" name="color" />
                    </div>
                </div>
                <br />
                <label>Pay Now?</label>
                <input type="checkbox" onclick="paynow()" name="paid" id="paid" />
                <div class="row" hidden id="payment">
                    <div class="col-md-6">
                        <label>Card Number</label>
                        <input type="text" class="form-control" name="number" />
                        <label>CVV</label>
                        <input type="text" class="form-control" name="ccv" />
                    </div>
                    <div class="col-md-6">
                        <label>Month/Year</label>
                        <input type="text" class="form-control" name="mmyy" placeholder="MM/YY" />
                        <label>Billing Zip</label>
                        <input type="text" class="form-control" name="bzip" />
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <label>Tip</label>
                        <input name="tip" id="tip" value="0" type="number" step="0.01" class="form-control" oninput="addtip()" />
                        <label>Total</label>
                        <input name="total" id="total" readonly class="form-control" />
                    </div>
                </div>
                <br />
                <button type="submit" class="btn btn-primary" style="float: right;">Order!</button>
            </form>
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
        window.onload = changetotal;

        function changetotal() {

            if ($("#tip").val() != "" || $("#tip").val() != 0 || isNaN($("#tip").val()) == false) {
                var total = Number($("#coffee").val().split(',')[1]) + Number($("#tip").val());
                $("#total").val(total);
            }
            else {
                $("#total").val($("#coffee").val().split(',')[1] + '.00');
            }
        }

        function addtip() {
            if ($("#tip").val() != "" || $("#tip").val() != 0 || isNaN($("#tip").val()) == false) {
                var total = Number($("#coffee").val().split(',')[1]) + Number($("#tip").val());
                $("#total").val(total);
            }
            else {
                $("#total").val($("#coffee").val().split(',')[1] + '.00');
            }
        }

        function paynow() {
            if ($("#paid").prop("checked") == true) {
                $("#payment").removeAttr("hidden");
            }
            else {
                $("#payment").attr("hidden", true);
            }
        }
</script>
