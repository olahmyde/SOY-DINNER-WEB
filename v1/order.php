<?php

use Foodboard\Config;

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
	<title>Order your food | Souled Out Youth</title>
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
	<link href="./../css/order.css" rel="stylesheet">
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
            $('#header-name').text(Username.split(' ')[0]);
			$('#userNameCashPayment').val(Username);
			$('#tableNum').val(TableNum);
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
						<!-- Menu -->
						<nav id="menu" class="main-menu">
							<ul>
								<li><span><a href="https://ultimatewebsolutions.net/foodboard/">Home</a></span></li>
								<li>
									<span><a href="#">Order <i class="fa fa-chevron-down"></i></a></span>
									<ul>
										<li>
											<span><a href="#">Pay online</a></span>
											<ul>
												<li><a href="../pay-with-card-online/">Demo 1 - Filtering</a></li>
												<li><a href="../pay-with-card-online/order-2.php">Demo 2 - Sticky navigation</a></li>
											</ul>
										</li>
										<li>
											<span><a href="#">Pay with cash</a></span>
											<ul>
												<li><a href="../pay-with-cash-on-delivery/">Demo 1 - Filtering</a></li>
												<li><a href="../pay-with-cash-on-delivery/order-2.php">Demo 2 - Sticky navigation</a></li>
											</ul>
										</li>
									</ul>
								</li>
								<li><span><a href="../faq.html">Faq</a></span></li>
								<li><span><a href="../contacts.html">Contacts</a></span></li>
							</ul>
						</nav>
						<!-- Menu End -->
					</div>
				</div>
			</div>
		</header>
		<!-- Header End -->

		<!-- Sub Header -->
		<div class="sub-header">
			<div class="container">
				<h1>What would you like, <span id="header-name"></span>? <img src="./../img/room-service.png" style="margin-left:10px;width:40px"></h1>
			</div>
		</div>
		<!-- Sub Header End -->

		<!-- Main -->
		<main>
			<!-- Order -->
			<div class="order">
				<!-- Container -->
				<div class="container">
					<!-- Row -->
					<div class="row">
						<!-- Left Sidebar -->
						<div class="col-lg-8" id="mainContent">
							<!-- Filter Area -->
							<div class="row filter-box filters">
								<div class="filter-box-header">
									<h3>Instructions</h3>
									<!-- <span class="filter-box-link isotope-reset">Reset Filters</span> -->
								</div>
								<div class="col-md-6 col-sm-6">
									<div>This service is based on first-come first-serve, that is, if you order first, you get served first. To use this service, simply select the size of the food you want and then add to basket. Remember to click <b>"Complete my order"</b> to send your order through.</div>
									<!-- <select style="display:none" id="category" class="wide price-list" name="category">
										<option value="">Show all</option>
										<option value=".pizza">Pizzas </option>
										<option value=".burger">Burgers</option>
										<option value=".vegetarian">Vegetarian</option>
									</select> -->
								</div>
								<!-- <div class="col-md-6 col-sm-6">
									<div class="search-wrap">
										<img src="https://i0.wp.com/chopbellehfull.com/wp-content/uploads/2021/02/Nigerian-Fried-Rice-2-e1614074713183.jpg?fit=721%2C1080&ssl=1" style="height:100px;width:400px;" class="img-fluid lazy" alt="">
									</div>
								</div> -->
							</div>
							<!-- Filter Area End -->
							
							<!-- Grid -->
							<div class="row grid">
								<!-- Grid Item 01 -->
								<div id="gridItem01" class="col-xl-6 col-lg-6 col-md-6 col-sm-6 isotope-item pizza">
									<div class="item-body">
										<figure>
											<img src="../img/food/jollof-rice-640x426.jpg" class="img-fluid lazy" alt="">
											<a href="#modalDetailsItem01" class="item-body-link modal-opener">
												<div class="ribbon-discount"><span>Spicy</span></div>
												<div class="item-title">
													<h3>Jollof Rice</h3>
													<small>(Served with chicken)</small>
												</div>
											</a>
										</figure>
										<ul>
											<li>
												<a href="#modalOptionsItem01" class="item-size modal-opener">Select food size</a>
											</li>
											<li>
												<a href="javascript:;" class="add-options-item-to-cart"><i class="icon icon-food"></i></a>
											</li>
										</ul>
									</div>
								</div>
								<!-- Grid Item 02 -->
								<div id="gridItem02" class="col-xl-6 col-lg-6 col-md-6 col-sm-6 isotope-item  pizza">
									<div class="item-body">
										<figure>
											<!-- <div class="ribbon-discount"><span>- 10%</span></div> -->
											<img src="../img/food/nigerian-fried-rice-recipe-img-10.jpg" data-src="../img/food/nigerian-fried-rice-recipe-img-10.jpg" class="img-fluid lazy" alt="">
											<a href="#modalDetailsItem02" class="item-body-link modal-opener">
												<div class="item-title">
													<h3>Fried Rice</h3>
													<small>(Served with chicken)</small>
												</div>
											</a>
										</figure>
										<ul>
											<li>
												<a href="#modalOptionsItem02" class="item-size modal-opener">Select food size</a>
											</li>
											<li>
												<a href="javascript:;" class="add-options-item-to-cart"><i class="icon icon-food"></i></a>
											</li>
										</ul>
									</div>
								</div>
								<!-- Grid Item 03 -->
								<div id="gridItem03" class="col-xl-6 col-lg-6 col-md-6 col-sm-6 isotope-item  pizza">
									<div class="item-body">
										<figure>
											<img src="../img/food/gizdodo.jpg" data-src="../img/food/gizdodo.jpg" class="img-fluid lazy" alt="">
											<a href="#modalDetailsItem03" class="item-body-link modal-opener">
												<div class="ribbon-discount"><span>Spicy</span></div>
												<div class="item-title">
													<h3>Gizdodo</h3>
													<small>Regular gizzard & dodo</small>
												</div>
											</a>
										</figure>
										<ul>
											<li>
											</li>
											<li>
												<a id="custom-order-btn" href="javascript:;" class="add-options-item-to-cart">Add to plate<img src="../img/tray-white.png" style="margin-left:10px;width:20px"></a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<!-- Grid End -->
							
							<div class="container">
								<hr class="hr-text" data-content="DESSERT">
							</div>
							  
							<div class="row grid">
								<!-- Grid Item 04 -->
								<div id="gridItem04" class="col-xl-6 col-lg-6 col-md-6 col-sm-6 isotope-item  pizza">
									<div class="item-body">
										<figure>
											<img src="../img/food/51uNZ8zTTAL.jpg" data-src="../img/food/51uNZ8zTTAL.jpg" class="img-fluid lazy" alt="">
											<a href="#modalDetailsItem04" class="item-body-link modal-opener">
												<div class="ribbon-discount"><span style="background-color:rgb(71, 193, 233)">Cold</span></div>
												<div class="item-title">
													<h3>Dessert</h3>
													<small>Ice cream + Cake</small>
												</div>
											</a>
										</figure>
										<ul>
											<li>
											</li>
											<li>
												<a id="custom-order-btn" href="javascript:;" class="add-options-item-to-cart">Add to plate<img src="../img/tray-white.png" style="margin-left:10px;width:20px"></a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- Left Sidebar End -->
						<!-- Right Sidebar -->
						<div class="col-lg-4" id="sidebar">
							<!-- Order Container -->
							<div id="orderContainer" class="theiaStickySidebar">
								<!-- Form -->
								<form method="POST" id="orderForm" name="orderForm" onsubmit="return confirmGuestOrder(event);">

									<!-- Step 1: Order Summary -->
									<div id="#orderSummaryStep" class="step">
										<div class="order-header">
											<h3>Order Summary 1/2</h3>
										</div>

										<div class="order-body">
											<!-- Cart Items -->
											<div style="margin-bottom: 20px;" class="row">
												<div class="col-md-12">
													<div class="order-list">
														<ul id="itemList">
															<!-- Cart Items / will be generated by js -->
														</ul>
													</div>
												</div>
											</div>
											<!-- Cart Items End -->
											
											<!-- Delivery Fee -->
											<div style=display:none class="row">
												<div class="col-md-12 col-sm-12">
													<label class="cbx radio-wrapper no-edges">
														<input type="radio" value="delivery" name="transfer" checked> <span class="checkmark"></span>
														<span class="radio-caption">Delivery Time</span><span class="option-price format-price transfer">(ASAP)</span>
													</label>
												</div>
											</div>
											<!-- Delivery Fee -->
											
											<!-- Total -->
											<div style=display:none class="row total-container">
												<div class="col-md-12 p-0">
													<span class="totalTitle">Total</span><span class="totalValue format-price float-right">0.00</span>
													<input type="hidden" id="totalOrderSummary" class="total format-price" name="total" value="" data-parsley-errors-container="#totalError" data-parsley-empty-order="" disabled />
												</div>
											</div>
											<div id="totalError"></div>
											<!-- Total End -->
											<!-- Forward Button -->
											<div class="row">
												<div class="col-md-12">
													<button type="button" name="forward" class="btn-form-func forward">
														<span class="btn-form-func-content">Continue Order</span>
														<span class="icon"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
													</button>
												</div>
											</div>
											<!-- Forward Button End -->
										</div>
									</div>
									<!-- Step 1: Order Summary End -->

									<!-- Step 2: Checkout -->
									<div class="step">
										<div class="order-header">
											<h3>Order Summary 2/2</h3>
										</div>
										<div id="personalDetails" data-return-url='<?php echo Config::THANKYOU_URL; ?>' data-currency='<?php echo Config::CURRENCY; ?>'>
											<div class="order-body">
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label for="userNameCashPayment">Full Name</label>
															<input readonly id="userNameCashPayment" class="form-control" name="username" type="text" data-parsley-pattern="^[a-zA-Z\s.]+$" required value="" />
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label for="messageCashPayment">Any instructions?</label>
															<input id="messageCashPayment" class="form-control" name="message" type="text" data-parsley-pattern="^[a-zA-Z0-9\s.:,!?']+$" />
															<input id="tableNum" class="form-control" name="tableNum" type="hidden" value="" />
														</div>
													</div>
												</div>
												<div style="display:none" class="row total-container">
													<div class="col-md-12 p-0">
														<span class="totalTitle">Total</span><span class="totalValue format-price float-right">0.00</span>
													</div>
												</div>
												<div class="row">
													<div class="col-6 pr-0">
														<div class="form-group">
															<input type="checkbox" id="cbxCashPayment" class="inp-cbx" name="terms" value="yes" checked />
															<label class="cbx terms" for="cbxCashPayment">
																<span>
																	<svg width="12px" height="10px" viewbox="0 0 12 10">
																		<polyline points="1.5 6 4.5 9 10.5 1"></polyline>
																	</svg>
																</span>
																<span>Deliver ASAP</span>
															</label>
														</div>
													</div>
													<div class="col-6 pl-0">
														<a href="javascript:;" class="modify-order backward">Modify Order</a>
													</div>
												</div>
												<div id="errorMsg" style="display:none;color:#f25c04;font-size:10px;text-align:center;margin-bottom:10px;"><span>An error occured, please try again.</span></div>
												<div class="row">
													<div class="col-md-12">
														<button type="submit" name="submit" id="submitOrder" class="btn-form-func">
															<span class="btn-form-func-content">Submit</span>
															<span class="icon"><i class="fa fa-check" aria-hidden="true"></i></span>
														</button>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<button type="button" name="backward" class="btn-form-func btn-form-func-alt-color backward">
															<span class="btn-form-func-content">Back</span>
															<span class="icon"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
														</button>
													</div>
												</div>
												<div class="row footer">
													<div class="col-md-12 text-center">
														<small>Copyright © SOY Dinner 2023.</small>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- Step 2: Checkout End -->

								</form>
								<!-- Form End -->
							</div>
							<!-- Order Container End -->
						</div>
						<!-- Right Sidebar End -->
					</div>
					<!-- Row End -->
				</div>
				<!-- Container End -->
			</div>
			<!-- Order End -->

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

		<!-- Notification Messages -->
		<div class="addedToCartMsg">Added to your plate</div>
		<div class="alreadyInCartMsg">Already on your plate</div>

	</div>
	<!-- Page End -->

	<!-- Modal Warning Qty min. Limit -->
	<div id="modalWarningQtyMinLimit" class="modal-popup zoom-anim-dialog mfp-hide">
		<div class="small-dialog-header">
			<h3>Warning</h3>
		</div>
		<div class="content">
			<h6 class="mb-0">Quantity minimum limit is: 1 !</h6>
		</div>
		<div class="footer">
			<div class="row">
				<div class="col-4 pr-0">
					<button type="button" class="btn-modal-close">Got it</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal Warning Qty min. Limit End -->

	<!-- Modal Warning Qty max. Limit -->
	<div id="modalWarningQtyMaxLimit" class="modal-popup zoom-anim-dialog mfp-hide">
		<div class="small-dialog-header">
			<h3>Warning</h3>
		</div>
		<div class="content">
			<h6 class="mb-0">Quantity maximum limit is: 10 !</h6>
		</div>
		<div class="footer">
			<div class="row">
				<div class="col-4 pr-0">
					<button type="button" class="btn-modal-close">Got it</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal Warning Qty max. Limit End -->

	<!-- Modal Options for Item 01 -->
	<div id="modalOptionsItem01" class="modal-popup zoom-anim-dialog mfp-hide">
		<div class="small-dialog-header">
			<h3>Jollof Rice</h3>
			<div class="addedToCartMsgInModal">Added to plate</div>
			<div class="alreadyInCartMsgInModal">Already on plate</div>
		</div>
		<div class="content">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<label class="cbx radio-wrapper">
						<input type="radio" value="Small portion" name="size-options-item-01">
						<span class="checkmark"></span>
						<span class="radio-caption">Small portion</span><span class="option-price format-price"></span>
					</label>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<label class="cbx radio-wrapper">
						<input type="radio" value="Medium portion" name="size-options-item-01" checked>
						<span class="checkmark"></span>
						<span class="radio-caption">Medium portion</span><span class="option-price format-price"></span>
					</label>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<label class="cbx radio-wrapper">
						<input type="radio" value="Large portion" name="size-options-item-01">
						<span class="checkmark"></span>
						<span class="radio-caption">Large portion</span><span class="option-price format-price"></span>
					</label>
				</div>
			</div>
			<!-- <div class="row">
				<div class="col-md-12 col-sm-12">
					<input type="hidden" id="item01ExtraTitle" name="item01ExtraTitle" value="Extra Cheese" />
					<input type="checkbox" id="item01Extra" class="inp-cbx" name="item01Extra" value="3.50" />
					<label class="cbx mb-0" for="item01Extra">
						<span>
							<svg width="12px" height="10px" viewbox="0 0 12 10">
								<polyline points="1.5 6 4.5 9 10.5 1"></polyline>
							</svg>
						</span>
						<span>Extra Cheese</span><span class="option-price format-price">2.00</span>
					</label>
				</div>
			</div> -->
		</div>
		<!-- Content End -->
		<div class="footer">
			<div class="row">
				<div class="col-4 pr-0">
					<button type="button" class="btn-modal-close">Close</button>
				</div>
				<div class="col-8">
					<button type="button" class="btn-modal add-options-item-to-cart">Add to Plate</button>
				</div>
			</div>
		</div>
		<!-- Footer End -->
	</div>
	<!-- Modal Options for Item 01 End -->

	<!-- Modal Options for Item 02 -->
	<div id="modalOptionsItem02" class="modal-popup zoom-anim-dialog mfp-hide">
		<div class="small-dialog-header">
			<h3>Fried Rice</h3>
			<div class="addedToCartMsgInModal">Added to plate</div>
			<div class="alreadyInCartMsgInModal">Already on plate</div>
		</div>
		<div class="content">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<label class="cbx radio-wrapper">
						<input type="radio" value="Small portion" name="size-options-item-02">
						<span class="checkmark"></span>
						<span class="radio-caption">Small portion</span><span class="option-price format-price"></span>
					</label>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<label class="cbx radio-wrapper">
						<input type="radio" value="Medium portion" name="size-options-item-02" checked>
						<span class="checkmark"></span>
						<span class="radio-caption">Medium portion</span><span class="option-price format-price"></span>
					</label>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<label class="cbx radio-wrapper">
						<input type="radio" value="Large portion" name="size-options-item-02">
						<span class="checkmark"></span>
						<span class="radio-caption">Large portion</span><span class="option-price format-price"></span>
					</label>
				</div>
			</div>
			<!-- <div class="row">
				<div class="col-md-12 col-sm-12">
					<input type="hidden" id="item02ExtraTitle" name="item02ExtraTitle" value="Extra Cheese" />
					<input type="checkbox" id="item02Extra" class="inp-cbx" name="item02Extra" value="3.50" />
					<label class="cbx" for="item02Extra">
						<span>
							<svg width="12px" height="10px" viewbox="0 0 12 10">
								<polyline points="1.5 6 4.5 9 10.5 1"></polyline>
							</svg>
						</span>
						<span>Extra Cheese</span><span class="option-price format-price">2.00</span>
					</label>
				</div>
			</div> -->
		</div>
		<!-- Content End -->
		<div class="footer">
			<div class="row">
				<div class="col-4 pr-0">
					<button type="button" class="btn-modal-close">Close</button>
				</div>
				<div class="col-8">
					<button type="button" class="btn-modal add-options-item-to-cart">Add to Plate</button>
				</div>
			</div>
		</div>
		<!-- Footer End -->
	</div>
	<!-- Modal Options for Item 02 End -->

	<!-- Modal Options for Item 03 -->
	<div id="modalOptionsItem03" class="modal-popup zoom-anim-dialog mfp-hide">
		<div class="small-dialog-header">
			<h3>Gizdodo</h3>
			<div class="addedToCartMsgInModal">Added to plate</div>
			<div class="alreadyInCartMsgInModal">Already on plate</div>
		</div>
		<div class="content">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<label class="cbx radio-wrapper">
						<input type="radio" value="Small portion" name="size-options-item-03">
						<span class="checkmark"></span>
						<span class="radio-caption">Small portion</span><span class="option-price format-price"></span>
					</label>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<label class="cbx radio-wrapper">
						<input type="radio" value="Medium portion" name="size-options-item-03">
						<span class="checkmark"></span>
						<span class="radio-caption">Medium portion</span><span class="option-price format-price"></span>
					</label>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<label class="cbx radio-wrapper">
						<input type="radio" value="Large portion" name="size-options-item-03" checked>
						<span class="checkmark"></span>
						<span class="radio-caption">Large portion</span><span class="option-price format-price"></span>
					</label>
				</div>
			</div>
			<!-- <div class="row">
				<div class="col-md-12 col-sm-12">
					<input type="hidden" id="item03ExtraTitle" name="item03ExtraTitle" value="Extra Cheese" />
					<input type="checkbox" id="item03Extra" class="inp-cbx" name="item03Extra" value="2.00" />
					<label class="cbx" for="item03Extra">
						<span>
							<svg width="12px" height="10px" viewbox="0 0 12 10">
								<polyline points="1.5 6 4.5 9 10.5 1"></polyline>
							</svg>
						</span>
						<span>Extra Cheese</span><span class="option-price format-price">2.00</span>
					</label>
				</div>
			</div> -->
		</div>
		<!-- Content End -->
		<div class="footer">
			<div class="row">
				<div class="col-4 pr-0">
					<button type="button" class="btn-modal-close">Close</button>
				</div>
				<div class="col-8">
					<button type="button" class="btn-modal add-options-item-to-cart">Add to plate</button>
				</div>
			</div>
		</div>
		<!-- Footer End -->
	</div>
	<!-- Modal Options for Item 03 End -->
	
	<!-- Modal Options for Item 04 -->
	<div id="modalOptionsItem04" class="modal-popup zoom-anim-dialog mfp-hide">
		<div class="small-dialog-header">
			<h3>Gizdodo</h3>
			<div class="addedToCartMsgInModal">Added to plate</div>
			<div class="alreadyInCartMsgInModal">Already on plate</div>
		</div>
		<div class="content">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<label class="cbx radio-wrapper">
						<input type="radio" value="Small portion" name="size-options-item-04">
						<span class="checkmark"></span>
						<span class="radio-caption">Small portion</span><span class="option-price format-price"></span>
					</label>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<label class="cbx radio-wrapper">
						<input type="radio" value="Medium portion" name="size-options-item-04">
						<span class="checkmark"></span>
						<span class="radio-caption">Medium portion</span><span class="option-price format-price"></span>
					</label>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<label class="cbx radio-wrapper">
						<input type="radio" value="Large portion" name="size-options-item-04" checked>
						<span class="checkmark"></span>
						<span class="radio-caption">Large portion</span><span class="option-price format-price"></span>
					</label>
				</div>
			</div>
			<!-- <div class="row">
				<div class="col-md-12 col-sm-12">
					<input type="hidden" id="item03ExtraTitle" name="item03ExtraTitle" value="Extra Cheese" />
					<input type="checkbox" id="item03Extra" class="inp-cbx" name="item03Extra" value="2.00" />
					<label class="cbx" for="item03Extra">
						<span>
							<svg width="12px" height="10px" viewbox="0 0 12 10">
								<polyline points="1.5 6 4.5 9 10.5 1"></polyline>
							</svg>
						</span>
						<span>Extra Cheese</span><span class="option-price format-price">2.00</span>
					</label>
				</div>
			</div> -->
		</div>
		<!-- Content End -->
		<div class="footer">
			<div class="row">
				<div class="col-4 pr-0">
					<button type="button" class="btn-modal-close">Close</button>
				</div>
				<div class="col-8">
					<button type="button" class="btn-modal add-options-item-to-cart">Add to plate</button>
				</div>
			</div>
		</div>
		<!-- Footer End -->
	</div>
	<!-- Modal Options for Item 03 End -->

	<!-- Modal Details for Item 01 -->
	<div id="modalDetailsItem01" class="modal-popup zoom-anim-dialog mfp-hide">
		<div class="small-dialog-header">
			<h3>Jollof Rice</h3>
		</div>
		<div class="content pb-1">
			<figure><img src="../img/food/jollof-rice-640x426.jpg" alt="" class="img-fluid"></figure>
			<h6 class="mb-1">Nigerian jollof rice</h6>
			<p>Jollof rice is a staple in West African cuisine. It's made from rice, tomatoes, onions, peppers, and other seasonings. </p>
		</div>
		<div class="footer">
			<div class="row">
				<div class="col-4 pr-0">
					<button type="button" class="btn-modal-close">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal Details for Item 1 End -->

	<!-- Modal Details for Item 02 -->
	<div id="modalDetailsItem02" class="modal-popup zoom-anim-dialog mfp-hide">
		<div class="small-dialog-header">
			<h3>Fried Rice</h3>
		</div>
		<div class="content pb-1">
			<figure><img src="../img/food/nigerian-fried-rice-recipe-img-10.jpg" alt="" class="img-fluid"></figure>
			<h6 class="mb-1">Nigerian jollof rice</h6>
			<p>Fried rice is a dish of cooked rice that has been stir-fried in a wok or a frying pan and is usually mixed with other ingredients such as vegetables, seafood, or meat.</p>
		</div>
		<div class="footer">
			<div class="row">
				<div class="col-4 pr-0">
					<button type="button" class="btn-modal-close">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal Details for Item 02 End -->

	<!-- Modal Details for Item 03 -->
	<div id="modalDetailsItem03" class="modal-popup zoom-anim-dialog mfp-hide">
		<div class="small-dialog-header">
			<h3>Gizdodo</h3>
		</div>
		<div class="content pb-1">
			<figure><img src="../img/food/gizdodo.jpg" alt="" class="img-fluid"></figure>
			<h6 class="mb-1">Gizzard + Dodo</h6>
			<p>Gizdodo is a Nigerian delicacy of peppered gizzards and plantains tossed in a delicious sauce of tomatoes, onions, hot peppers and bell peppers.</p>
		</div>
		<div class="footer">
			<div class="row">
				<div class="col-4 pr-0">
					<button type="button" class="btn-modal-close">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal Details for Item 03 End -->
	
	<!-- Modal Details for Item 04 -->
	<div id="modalDetailsItem04" class="modal-popup zoom-anim-dialog mfp-hide">
		<div class="small-dialog-header">
			<h3>Dessert</h3>
		</div>
		<div class="content pb-1">
			<figure><img src="../img/food/51uNZ8zTTAL.jpg" alt="" class="img-fluid"></figure>
			<h6 class="mb-1">Ice Cream + Cake</h6>
			<p>For dessert, a bowl of ice cream and a slice of cake to go along with it.</p>
		</div>
		<div class="footer">
			<div class="row">
				<div class="col-4 pr-0">
					<button type="button" class="btn-modal-close">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal Details for Item 04 End -->

	
	<!-- Back to top button -->
	<div id="toTop"><i class="icon icon-chevron-up"></i></div>

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

	<!-- Order Javascript File -->
	<script src="assets/js/order.js"></script>

	<!-- Main Javascript File -->
	<script src="../js/scripts.js"></script>
</body>

</html>