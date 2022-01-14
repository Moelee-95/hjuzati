<!-- ==========  PHP  ===========-->
<?php  include('../db_connect.php');?>
<?php require 'sections/main.php';?>

<!DOCTYPE html>
<html lang="en">
    
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
        <!-- Title -->
        <title>Contact | MyTravel - Responsive Website Template</title>
        <?php include('sections/head.html'); ?>
    </head>
    <body>
       <!-- ========== HEADER ========== -->
        <?php include('sections/header.php'); ?>
        <!-- ========== END HEADER ========== -->

        <!-- ========== MAIN CONTENT ========== -->
        <main id="content">
            <!-- Hero Section -->
            <div class="bg-img-hero text-center mb-5 mb-lg-8" style="background-image: url(assets/img/1920x400/img3.jpg);">
                <div class="container space-top-xl-3 py-6 py-xl-0">
                    <div class="row justify-content-center py-xl-4">
                        <!-- Info -->
                        <div class="py-xl-10 py-5">
                            <h1 class="font-size-40 font-size-xs-30 text-white font-weight-bold mb-0">Contact Us</h1>
                            <nav aria-label="breadcrumb">
                              <ol class="breadcrumb breadcrumb-no-gutter justify-content-center mb-0">
                                <li class="breadcrumb-item font-size-14"> <a class="text-white" href="../home/index.html">Home</a> </li>
                                <li class="breadcrumb-item custom-breadcrumb-item font-size-14 text-white active" aria-current="page">Contact Us</li>
                              </ol>
                            </nav>
                        </div>
                        <!-- End Info -->
                    </div>
                </div>
            </div>


            <!-- section -->
            <div class="row contact-address">

            <div class="container clear-padding">

                <div class="text-center">

                    <h2>GET IN TOUCH</h2>

                    <h5 class="alert">Don't hisetate to contact us or visiting us anytime!<br>

                     We are always here for your service, here are contact information for you.</h5>

                    <div class="space"></div>
                </div>

            </div>

        </div>
            <!-- End Hero Section -->
            <div class="border-bottom border-color-8 pb-6 pb-lg-8 mb-5 mb-lg-7">
                <div class="container pb-1">
                    <div class="row">
                        <div class="col-md-10 col-lg-10">
                            <div class="text-center">
                                <h6 class="text-gray-3 font-weight-bold font-size-21">Sulaymaniyah</h6>
                                <div class="mb-3 mb-md-5">
                                    <a href="#map">
                                        <p class="mb-1 text-gray-1">  <i class="fa fa-map-marker"></i> Salim Street, 51 labs,</p>
                                        <p class="mb-0 text-gray-1"> Sulaymaniyah, Iraq.</p>
                                    </a>
                                </div>
                                <div class="mb-1">
                                    <a href="tel:+9647708138928">
                                        <p class="mb-1 text-gray-1"><i class="fa fa-phone"></i> +9647708138928</p>
                                    </a>
                                    <a href="mailto:info@himahotels.com">
                                        <p class="mb-0 text-gray-1"><i class="far fa-envelope"></i> info@himahotels.com</p>
                                    </a>
                                </div>
                                <a class="d-inline-block" href="#">
                                    <div class="border-bottom border-primary font-weight-normal font-size-14 text-primary"><a href="#map">View On Map</a></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-bottom border-color-8 pb-6 pb-lg-9 mb-6 mb-lg-8">
                <div class="container mb-10">
                    <div class="w-md-80 w-lg-50 text-center mx-md-auto my-3">
                        <h2 class="section-title text-black font-size-30 font-weight-bold mb-5 pb-xl-1">Sends us a Message</h2>
                    </div>
                    <div class="comment-section max-width-810 mx-auto">
                        <form class="js-validate" novalidate="novalidate">
                            <div class="row">
                                <!-- Input -->
                                <div class="col-sm-6 mb-5">
                                    <div class="js-form-message">
                                        <input type="text" class="form-control" name="name" placeholder="Name" aria-label="Jack Wayley" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                                    </div>
                                </div>
                                <!-- End Input -->

                                <!-- Input -->
                                <div class="col-sm-6 mb-5">
                                    <div class="js-form-message">
                                        <input type="email" class="form-control" name="email" placeholder="Email" aria-label="jackwayley@gmail.com" required="" data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                </div>
                                <!-- End Input -->
                                <div class="col-sm-12 mb-5">
                                    <div class="js-form-message">
                                        <div class="input-group">
                                            <textarea class="form-control" rows="6" cols="77" name="text" placeholder="Message" aria-label="Hi there, I would like to ..." required="" data-msg="Please enter a reason." data-error-class="u-has-error" data-success-class="u-has-success"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Input -->
                                <div class="col d-flex justify-content-lg-start">
                                    <button type="submit" class="btn rounded-xs bg-blue-dark-1 text-white height-51 width-190 transition-3d-hover">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3245.6989974040484!2d45.41244!3d35.5611354!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40002fa0c3de8b1d%3A0x56ed449f0c221903!2sFive%20One%20Labs!5e0!3m2!1sar!2siq!4v1583895219315!5m2!1sar!2siq" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
        </main>
        <!-- ========== END MAIN CONTENT ========== -->

        <!-- ========== FOOTER ========== -->
        <?php include('sections/footer.php'); ?>
        <!-- ========== END FOOTER ========== -->

        <!-- Go to Top -->
        <a class="js-go-to u-go-to-modern" href="#" data-position='{"bottom": 15, "right": 15 }' data-type="fixed" data-offset-top="400" data-compensation="#header" data-show-effect="slideInUp" data-hide-effect="slideOutDown">
            <span class="flaticon-arrow u-go-to-modern__inner"></span>
        </a>
        <!-- End Go to Top -->

        <!-- JS Global Compulsory -->
        <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
        <script src="assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
        <script src="assets/vendor/popper.js/dist/umd/popper.min.js"></script>
        <script src="assets/vendor/bootstrap/bootstrap.min.js"></script>

        <!-- JS Implementing Plugins -->
        <script src="assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>
        <script src="documentation/assets/vendor/jquery-ui/jquery-ui.core.min.js"></script>
        <script src="documentation/assets/vendor/jquery-ui/ui/widgets/menu.js"></script>
        <script src="documentation/assets/vendor/jquery-ui/ui/widgets/mouse.js"></script>
        <script src="assets/vendor/svg-injector/dist/svg-injector.min.js"></script>
        <script src="documentation/assets/vendor/jquery-ui/ui/widgets/autocomplete.js"></script>
        <script src="documentation/assets/vendor/prism/prism.js"></script>
        <script src="assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <script src="assets/vendor/flatpickr/dist/flatpickr.min.js"></script>

        <!-- JS MyTravel -->
        <script src="assets/js/hs.core.js"></script>
        <script src="assets/js/components/hs.header.js"></script>
        <script src="assets/js/components/hs.unfold.js"></script>
        <script src="assets/js/components/hs.go-to.js"></script>
        <script src="assets/js/components/hs.validation.js"></script>
        <script src="assets/js/components/hs.show-animation.js"></script>
        <script src="assets/js/components/hs.selectpicker.js"></script>
        <script src="assets/js/components/hs.range-datepicker.js"></script>
        <script src="assets/js/components/hs.svg-injector.js"></script>

        <!-- JS Plugins Init. -->
        <script>
            $(window).on('load', function () {
                // initialization of HSMegaMenu component
                $('.js-mega-menu').HSMegaMenu({
                    event: 'hover',
                    pageContainer: $('.container'),
                    breakpoint: 1199.98,
                    hideTimeOut: 0
                });

                // initialization of svg injector module
                $.HSCore.components.HSSVGIngector.init('.js-svg-injector');
            });

            $(document).on('ready', function () {
                // initialization of header
                $.HSCore.components.HSHeader.init($('#header'));

                // initialization of unfold component
                $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
                  afterOpen: function () {
                    $(this).find('input[type="search"]').focus();
                  }
                });

                // initialization of show animations
                $.HSCore.components.HSShowAnimation.init('.js-animation-link');

                // initialization of go to
                $.HSCore.components.HSGoTo.init('.js-go-to');

                $.HSCore.components.HSSelectPicker.init('.js-select');

                // initialization of datepicker
                $.HSCore.components.HSRangeDatepicker.init('.js-range-datepicker');
            });
        </script>
    </body>


</html>
