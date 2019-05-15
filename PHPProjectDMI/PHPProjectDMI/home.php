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
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <h1 class="heading wow fadeInUp" data-wow-duration="300ms" data-wow-delay="300ms">
                            our
                            <span>MENU</span>
                        </h1>
                        <p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="400ms">This is a list of our award winning coffees. All of them have been praised around the worlds for their great taste. We pride ourselves in our top of the line blends.</p>
                        <div class="pricing-list">
                            <div class="title">
                                <h3>
                                    Featured
                                    <span>on the week</span>
                                </h3>
                            </div>
                            <ul>
                                <li class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="300ms">
                                    <div class="item">
                                        <div class="item-title">
                                            <h2>The Bog Standard Brew</h2>
                                            <div class="border-bottom"></div>
                                            <span>$ 5.00</span>
                                        </div>
                                        <p>The brew made for the one who enjoys the standard cup of joe. The bog standard is just black coffee that tastes like no other.</p>
                                    </div>
                                </li>
                                <li class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="400ms">
                                    <div class="item">
                                        <div class="item-title">
                                            <h2>Martha's Custom Brew</h2>
                                            <div class="border-bottom"></div>
                                            <span>$ 10.00</span>
                                        </div>
                                        <p>Martha's custom brew is a brew that she found in the depths of the jungle of africa. She has honed this brew thorugh countless trials to become the best coffee in the universe.</p>
                                    </div>
                                </li>
                                <li class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="500ms">
                                    <div class="item">
                                        <div class="item-title">
                                            <h2>Espresso</h2>
                                            <div class="border-bottom"></div>
                                            <span>$ 5.00</span>
                                        </div>
                                        <p>The coffee for someone who needs to stay awake. Forget 5 hour energy with this brew you'll be going for hours on end. (Not FDA approved)</p>
                                    </div>
                                </li>
                                <li class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="600ms">
                                    <div class="item">
                                        <div class="item-title">
                                            <h2>Americano</h2>
                                            <div class="border-bottom"></div>
                                            <span>$ 15.00</span>
                                        </div>
                                        <p>The Americano dream is to have this coffee. You will be in coffee heaven for the short amount of time it takes you to guzzle down this delicacy.</p>
                                    </div>
                                </li>
                                <li class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="700ms">
                                    <div class="item">
                                        <div class="item-title">
                                            <h2>Latte</h2>
                                            <div class="border-bottom"></div>
                                            <span>$ 6.00</span>
                                        </div>
                                        <p>This type of latte is the embodiment of the of bliss. Known as ambrosea (the nector of the gods) this blend has won mutilple coffee awards.</p>
                                    </div>
                                </li>
                                <li class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="800ms">
                                    <div class="item">
                                        <div class="item-title">
                                            <h2>Cappuccino</h2>
                                            <div class="border-bottom"></div>
                                            <span>$ 7.00</span>
                                        </div>
                                        <p>Your standard cappuccino.</p>
                                    </div>
                                </li>
                            </ul>
                            <a class="btn btn-default pull-right wow bounceIn" data-wow-duration="500ms" data-wow-delay="1200ms" href="?page=order" role="button">Place Order</a>
                        </div>
                    </div>
                </div>
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
