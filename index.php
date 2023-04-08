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
      <link href="img/favicon.png" rel="shortcut icon">
      <!-- Google Fonts - Jost -->
      <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700&display=swap" rel="stylesheet">
      <!-- Font Awesome CSS -->
      <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <!-- Custom Font Icons -->
      <link href="vendor/icomoon/css/iconfont.min.css" rel="stylesheet">
      <!-- Vendor CSS -->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="vendor/dmenu/css/menu.css" rel="stylesheet">
      <link href="vendor/hamburgers/css/hamburgers.min.css" rel="stylesheet">
      <link href="vendor/mmenu/css/mmenu.min.css" rel="stylesheet">
      <link href="vendor/magnific-popup/css/magnific-popup.css" rel="stylesheet">
      <link href="vendor/float-labels/css/float-labels.min.css" rel="stylesheet">
      <!-- jQuery File -->
      <script src="js/jquery.js"></script>
      <script src="data/attendants.json"></script>
      <!-- Main CSS -->
      <link href="css/home.css" rel="stylesheet">
      <script>
         $(window).on("load", function() {
            'use strict';
            $('[data-loader="circle-side"]').fadeOut();
            $('#preloader').delay(350).fadeOut('slow');
            var $hero = $('.hero-home .content');
            var $hero_v = $('#hero_video .content ');
            $hero.find('h3, p, form').addClass('fadeInUp animated');
            $hero.find('.btn-1').addClass('fadeIn animated');
            $hero_v.find('.h3, p, form').addClass('fadeInUp animated');
            $(window).scroll();
         })

         function getValue(elem) {
            var button_value = $(elem).attr('value');
            $('#username').val(button_value);
         }
         $(document).ready(function() {
            const urlParams = new URLSearchParams(window.location.search);
            const TableNum = urlParams.get('order-table');
            var actual_table = parseInt(TableNum) - 1
            if (actual_table < 0 || TableNum == '' || TableNum == null) {
               alert('Invalid URL / Table No. please scan the QR Code instead.');
               document.getElementsByTagName('html')[0].remove();
            }
            $('#table_num').text(TableNum);
            $.getJSON('data/attendants.json', function(data) {
               if (data.length < TableNum) {
                  alert('Invalid URL / Table No. please scan the QR Code instead.');
                  document.getElementsByTagName('html')[0].remove();
               }
               var get_attendants = data[actual_table].data;
               if (!get_attendants || get_attendants == undefined) {
                  alert('Invalid URL / Table No.');
                  document.getElementsByTagName('html')[0].remove();
               }
               var key_value = Object.keys(get_attendants);
               console.log(key_value);
               for (var i = 0; i < key_value.length; i++) {
                  $('#option-list').prepend(`
                     <label>
                        <input type="radio" id="username${i}" name="username-select" onclick="getValue(this)" value="${key_value[i]}" />
                        <span>${key_value[i]}</span>
                     </label>
					`)
               }
               // Sumit name and validate
               $('#orderFrm').submit(function(e) {
                  e.preventDefault();
                  console.log('Clicked');
                  var username = $('#username').val();
                  if (username == null || username == '') {
                     $('#errorMessage').text('You must select a name before you can continue.');
                     //window.location.reload();
                     return false;
                  }
                  console.log(username);
                  var user_status = get_attendants[username];
                  if (user_status == "Ordered") {
                     //console.log('User already ordered prior to now');
                     $('#errorMessage').text('Error - You have already placed an order!')
                     //window.location.reload();
                     return false
                  } else {
                     window.location.href = `v1/order.php?order-table=${TableNum}&name=${username}`
                  }
               });
            });
            $('#start-btn').click(function() {
               $('.modal').show();
            })
            $('#closeBtn').click(function() {
               $('.modal').hide();
            })
         });
      </script>
   </head>
   <body>
      <!-- Preloader -->
      <div id="preloader">
         <div data-loader="circle-side"></div>
      </div>
      <div id="page">
         <main>
            <!-- Hero -->
            <div class="hero-home bg-mockup hero-bottom-border">
               <div class="content">
                  <img id="soy-logo" src="img/LogoPreset.png">
                  <!-- <div id="main-title"><p>DINNER</p><p>DINNER</p></div> -->
                  <div class="glitch-wrapper">
                     <div class="glitch-noise" data-glitch="SOY DINNER">SOY DINNER</div>
                  </div>
                  <!-- <h1 class="animated-element">Table 5</h1> -->
                  <p class="animated-element">You can use this platform to order your food </p>
                  <a id="start-btn" role="button" class="btn-1 medium animated-element">Get Started <img style="width:40px;margin-left:10px" src="img/cooking.gif">
                  </a>
                  <!-- <a href="#orderFood" class="mouse-frame nice-scroll"><div class="mouse"></div></a> -->
               </div>
            </div>
            <!-- Hero End -->
            <!-- The Modal -->
            <div id="myModal" class="modal">
               <!-- Modal content -->
               <div class="modal-content">
                  <div id=modal-header class="modal-header" style="border: 0px;">
                     <span id=closeBtn style="color:black" class="close">x</span>
                     <h3></h3>
                  </div>
                  <div class="modal-body" style="margin-bottom:10%;">
                     <div data-v-2756568a data-v-1c530256 role=group aria-labelledby=eligstatement>
                        <center>
                           <img class="c5f9b9d86 c1a85fa46" id="prompt-logo-center" style="margin-left: 10vw;" src="img/dining.png" alt="Table">
                           <div id=text src="" style="margin-top:30px;width:auto;text-align:center;color:black;font-size:25px;font-weight:900">Table No - <span id="table_num"></span>
                           </div>
                           <div style="font-size:16px">This is a first-come first-serve process. Orders are dished based on who orders first. Please select your name below and click the button to begin. <br>
                              <br>
                           </div>
                           <div class="container">
                              <form id="orderFrm" method="POST" action="">
                                 <input type="hidden" id=username name="username" value="">
                                 <div id=option-list style=display:block;width:100%;float:left;text-align:left>
                                    
                                 </div>
                                 <div id="errorMessage"></div>
                                 <div style="margin-top:10%;text-align:center;width:100%">
                                    <div class="cf4658d39" style="width:100%">
                                       <button id=continue-btn style="width:100%" role="button" type="submit" name="action" value="default" class="c1d51edb7 c3e1f488b cac1b9771 c2a64c88b _button-login-id">Continue</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </center>
                        <div></div>
                        <div style="margin-top:20px;text-align:center" _ngcontent-yvi-c7 class=pre-copy-right>
                           <span _ngcontent-yvi-c7>NB: You can only place your order once.</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </main>
         <!-- Main End -->
      </div>
      <!-- Page End -->
      <!-- Back to top button -->
      <div id="toTop">
         <i class="icon icon-chevron-up"></i>
      </div>
      <!-- Vendor Javascript Files -->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
      <script src="vendor/easing/js/easing.min.js"></script>
      <script src="vendor/parsley/js/parsley.min.js"></script>
      <script src="vendor/nice-select/js/jquery.nice-select.min.js"></script>
      <script src="vendor/price-format/js/jquery.priceformat.min.js"></script>
      <script src="vendor/theia-sticky-sidebar/js/ResizeSensor.min.js"></script>
      <script src="vendor/theia-sticky-sidebar/js/theia-sticky-sidebar.min.js"></script>
      <script src="vendor/mmenu/js/mmenu.min.js"></script>
      <script src="vendor/magnific-popup/js/jquery.magnific-popup.min.js"></script>
      <script src="vendor/float-labels/js/float-labels.min.js"></script>
      <script src="vendor/jquery-wizard/js/jquery-ui-1.8.22.min.js"></script>
      <script src="vendor/jquery-wizard/js/jquery.wizard.js"></script>
      <script src="vendor/isotope/js/isotope.pkgd.min.js"></script>
      <script src="vendor/scrollreveal/js/scrollreveal.min.js"></script>
      <script src="vendor/lazyload/js/lazyload.min.js"></script>
      <script src="vendor/sticky-kit/js/sticky-kit.min.js"></script>
      <!-- Main Javascript File -->
      <!-- <script src="js/scripts.js"></script> -->
   </body>
</html>