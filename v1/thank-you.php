<?php

use Foodboard\Config;
use Foodboard\CheckoutService;

session_start();
require_once __DIR__ . '/Config/Config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Food order wizard with online payment">
	<meta name="author" content="UWS">
	<title>Order Summary | Souled Out Youth</title>

    <!-- Favicon -->
    <link href="../img/favicon.png" rel="shortcut icon">

    <!-- Google Fonts - Jost -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Font Icons -->
    <link href="../vendor/icomoon/css/iconfont.min.css" rel="stylesheet">

    <!-- Vendor CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/dmenu/css/menu.css" rel="stylesheet">
    <link href="../vendor/hamburgers/css/hamburgers.min.css" rel="stylesheet">
    <link href="../vendor/mmenu/css/mmenu.min.css" rel="stylesheet">
    <link href="../vendor/magnific-popup/css/magnific-popup.css" rel="stylesheet">
    <link href="../vendor/float-labels/css/float-labels.min.css" rel="stylesheet">

    <!-- Main CSS -->
    <link href="./../css/style.css" rel="stylesheet">
    <!-- MAIN JS -->
	<script src="./../js/jquery.js"></script>
    <script src="./../data/attendants.json"></script>
	<script>
		$(document).ready(function() {
            const urlParams = new URLSearchParams(window.location.search);
            const TableNum = urlParams.get('order-table');
			const Username = urlParams.get('name');
            var actual_table = parseInt(TableNum) - 1
            if (actual_table < 0 || TableNum == '' || TableNum == null || Username == null || Username == '') {
               alert('Invalid URL / Table No. please scan the QR Code instead.');
               document.getElementsByTagName('html')[0].remove();
            }
            $('#username').text(Username);
			$('#tableNum').text(`Table ${TableNum} - `);
            
            $.getJSON('./../data/attendants.json', function(conf) {
                console.log(Username);
                console.log(conf[actual_table].data[Username]);
                if (conf[actual_table].data[Username]) {
                    conf[actual_table].data[Username] = "Ordered";
                    console.log(conf[actual_table].data[Username]);
                }
            })
            
            $.ajax({
                contentType: 'application/json',
                url: 'endpoint/ajax/update-data.php',
                type: 'POST',
                data: JSON.stringify({
                    username: Username,
                    tableNum: actual_table,
                }),
                success: function (data) {
                    var parsed_data = JSON.parse(data);
                    if (parsed_data.status == 'ok') {
                        console.log(parsed_data.status);
                    } else {
                         console.log("Error occurred while parsing");
                    }
                }
            });
        });
	</script>
</head>
<body>
    <!-- Preloader -->
    <div id="preloader">
        <div data-loader="circle-side"></div>
    </div>
    <!-- Preloader End -->

    <!-- Page -->
    <div id="page">

        <!-- Header -->
        <header class="main-header sticky">
			<div class="container" style="justify-content:center;display:flex;">
				<div class="row">
					<img src="../img/LogoPreset.png" style="width:60px">
				</div>
				<div style=display:none class="row">
					<div class="col-lg-3 col-6">
						<img src="../img/LogoPreset.png" style="width:60px">
					</div>
					<div class="col-lg-9 col-6">
						<ul id="menuIcons">
							<li><a href="#"><i class="icon icon-support"></i></a></li>
							<li><a href="#"><i class="icon icon-shopping-cart2"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</header>
        <!-- Header End -->

        <!-- Sub Header -->
        <div class="sub-header">
            <div class="container">
                <h1>Order Confirmed</h1>
            </div>
        </div>
        <!-- Sub Header End -->

        <!-- Main -->
        <main>
            <div class="confirm-wrap">
                <!-- Container -->
                <div class="container">
                    <!-- Row -->
                    <div class="row">
                        <!-- Left Sidebar -->
                        <div class="col-lg-12" id="mainContent" style="text-align:center">
                            <!-- Filter Area -->
                            <h3>Thank you!<br> Your order is being dished.</h3>
                            <center>
                                <img src="./../img/casual-life-3d-boy-cook.png">
                            </center>
                            <h3>Customer details:</h3>
                            
                                <div>
                                    <strong id="tableNum"></strong><span id="username"></span>
                                </div>
                            <p class="mb-0"><a href="https://rccgrhn.org" class="btn-2">Back to Home</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Main End -->

        <!-- Footer -->
        <footer class="main-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h5 class="footer-heading">Souled Out Youth Church</h5>
                        <ul class="list-unstyled contact-links">
                            <li><i class="icon icon-map-marker"></i><a href="https://www.google.com/maps/place/RCCG+Nottingham+(Rehoboth+House)/@52.9745147,-1.1741484,15z/data=!4m6!3m5!1s0x4879e9c3e6da8407:0xd82c75dd56e9676c!8m2!3d52.9745147!4d-1.1741484!16s%2Fg%2F11d_7v6ngz" class="footer-link" target="_blank">Address: Unit 1, The Dome, Ryan Business Park, Radford Rd, New Basford, Nottingham NG7 7DH, United Kingdom</a>
                            </li>
                            <li><i class="icon icon-envelope3"></i><a href="mailto:support@icwebpro.net" class="footer-link">Mail: contact@rhnrccg.org</a></li>
                            <li><i class="icon icon-phone2"></i><a href="tel:+447404438945" class="footer-link">Phone: +447404438945</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2">
                        <h5 class="footer-heading">Find Us On</h5>
                        <ul class="list-unstyled social-links">
                            <li><a href="https://facebook.com" class="social-link" target="_blank"><i class="icon icon-facebook"></i></a></li>
                            <li><a href="https://twitter.com" class="social-link" target="_blank"><i class="icon icon-twitter"></i></a></li>
                            <li><a href="https://instagram.com" class="social-link" target="_blank"><i class="icon icon-instagram"></i></a></li>
                            <li><a href="https://pinterest.com" class="social-link" target="_blank"><i class="icon icon-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-8">
                        <ul id="subFooterLinks">
                            <li><a href="https://www.linkedin.com/in/olamide-olufade-452847119/">With <i class="fa fa-heart pulse"></i> by Olamide</a></li>
                            <li><a href="https://www.linkedin.com/in/olamide-olufade-452847119/" target="_blank">Let's connect</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <div id="copy">© 2019 icWebPro Limited</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer End -->

    </div>
    <!-- Page End -->

    <!-- Vendor Javascript Files -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/easing/js/easing.min.js"></script>
    <script src="../vendor/parsley/js/parsley.min.js"></script>
    <script src="../vendor/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="../vendor/price-format/js/jquery.priceformat.min.js"></script>
    <script src="../vendor/theia-sticky-sidebar/js/ResizeSensor.min.js"></script>
    <script src="../vendor/theia-sticky-sidebar/js/theia-sticky-sidebar.min.js"></script>
    <script src="../vendor/mmenu/js/mmenu.min.js"></script>
    <script src="../vendor/magnific-popup/js/jquery.magnific-popup.min.js"></script>
    <script src="../vendor/float-labels/js/float-labels.min.js"></script>
    <script src="../vendor/jquery-wizard/js/jquery-ui-1.8.22.min.js"></script>
    <script src="../vendor/jquery-wizard/js/jquery.wizard.js"></script>
    <script src="../vendor/isotope/js/isotope.pkgd.min.js"></script>
    <script src="../vendor/scrollreveal/js/scrollreveal.min.js"></script>
    <script src="../vendor/lazyload/js/lazyload.min.js"></script>
    <script src="../vendor/sticky-kit/js/sticky-kit.min.js"></script>

    <!-- Main Javascript File -->
    <script src="../js/scripts.js"></script>

</body>

</html>
<?php session_destroy(); ?>