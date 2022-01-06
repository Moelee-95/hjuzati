<!DOCTYPE html>
<html lang="en">
    
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
        <!-- Title -->
        <title>Home v6 | MyTravel - Responsive Website Template</title>
        <?php include('sections/head.html'); ?>
    </head>
    <body>
        <!-- ========== HEADER ========== -->
        <?php include('sections/header.php'); ?>
        <!-- ========== END HEADER ========== -->

        <!-- ========== MAIN CONTENT ========== -->
        <main id="content">
            <!-- ========== HERO ========== -->
            <div class="hero-block hero-v6 bg-img-hero-bottom gradient-overlay-half-blue-gradient text-center z-index-2 mb-6 mb-lg-14 mb-xl-17 pb-xl-2" style="background-image: url(assets/img/1920x750/img1.jpg);">
                <div class="container space-2 space-top-xl-6">
                    <div class="justify-content-md-center py-xl-10">
                        <!-- Info -->
                        <div class="pb-lg-11 mb-7">
                            <h1 class="font-size-60 font-size-xs-30 text-white font-weight-bold">Love where you're going</h1>
                            <p class="font-size-20 font-weight-normal text-white">Book experiences you’ll want to tell the world about</p>
                        </div>
                        <!-- End Info -->
                    </div>
                    <div class="mb-lg-n16">
                        <div class="card border-0 tab-shadow tab-shadow">
                            <div class="card-body mt-1">
                                <form class="js-validate">
                                  <div class="row d-block nav-select d-lg-flex mb-lg-3 px-3">
                                    <div class="col-sm-12 col-lg-3dot7 mb-4 mb-lg-0 ">
                                        <!-- Input -->
                                        <span class="d-block text-gray-1 text-left font-weight-normal mb-0">Destination</span>
                                        <select class="js-select selectpicker dropdown-select tab-dropdown col-12 pl-0 flaticon-pin-1 d-flex align-items-center text-primary font-weight-semi-bold" title="Where are you going?"
                                            data-style=""
                                            data-live-search="true"
                                            data-searchbox-classes="input-group-sm">
                                                <option class="border-bottom border-color-1" value="project1" data-content='
                                                    <span class="d-flex align-items-center">
                                                        <span class="font-size-16">London, United Kingdom</span>
                                                    </span>'>
                                                    London, United Kingdom
                                                </option>
                                                <option class="border-bottom border-color-1" value="project2" data-content='
                                                    <span class="d-flex align-items-center">
                                                        <span class="font-size-16">New York, United States</span>
                                                    </span>'>
                                                    New York, United States
                                                </option>
                                                <option  class="border-bottom border-color-1" value="project3" data-content='
                                                    <span class="d-flex align-items-center">
                                                        <span class="font-size-16">New South Wales, Australia</span>
                                                    </span>'>
                                                    New South Wales, Australia
                                                </option>
                                                <option class="border-bottom border-color-1" value="project4" data-content='
                                                    <span class="d-flex align-items-center">
                                                        <span class="font-size-16">Istanbul, Turkey</span>
                                                    </span>'>
                                                    Istanbul, Turkey
                                                </option>
                                                <option class="" value="project4" data-content='
                                                    <span class="d-flex align-items-center">
                                                        <span class="font-size-16">Reykjavík, Iceland</span>
                                                    </span>'>
                                                    Reykjavík, Iceland
                                                </option>
                                            </select>
                                        <!-- End Input -->
                                    </div>

                                    <div class="col-sm-12 col-lg-3dot6 mb-4 mb-lg-0 ">
                                        <!-- Input -->
                                        <span class="d-block text-gray-1 text-left font-weight-normal mb-0">From - To</span>
                                        <div class="border-bottom border-width-2 border-color-1">
                                            <div id="datepickerWrapperFrom" class="u-datepicker input-group">
                                                <div class="input-group-prepend">
                                                    <span class="d-flex align-items-center mr-2">
                                                      <i class="flaticon-calendar text-primary font-weight-semi-bold"></i>
                                                    </span>
                                                </div>
                                                 <input class="js-range-datepicker font-size-lg-16 shadow-none font-weight-bold form-control hero-form bg-transparent  border-0" type="date"
                                                     data-rp-wrapper="#datepickerWrapperFrom"
                                                     data-rp-type="range"
                                                     data-rp-date-format="M d / Y"
                                                     data-rp-default-date='["Jul 7 / 2020", "Aug 25 / 2020"]'>
                                            </div>
                                             <!-- End Datepicker -->
                                        </div>
                                        <!-- End Input -->
                                    </div>

                                    <div class="col-sm-12 col-lg-2dot8 text-left mb-4 mb-lg-0">
                                        <!-- Input -->
                                        <span class="d-block text-gray-1 font-weight-normal mb-0">Outdoors</span>
                                        <div class="js-focus-state">
                                            <div class="d-flex border-bottom border-width-2 border-color-1">
                                                <i class="flaticon-backpack d-flex align-items-center mr-2 text-primary font-weight-semi-bold"></i>
                                                <select class="js-select selectpicker dropdown-select">
                                                    <option value="Outdoors" selected>Outdoors</option>
                                                    <option value="2 Rooms - 3 Guests">2 Rooms - 4 Guests</option>
                                                    <option value="2 Rooms - 3 Guests">3 Rooms - 6 Guests</option>
                                                    <option value="2 Rooms - 3 Guests">1 Rooms - 2 Guests</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- End Input -->
                                        <!-- End Input -->
                                    </div>

                                    <div class="col-sm-12 col-lg-1dot8 align-self-lg-end text-md-right">
                                        <button type="submit" class="btn btn-primary text-white font-weight-bold btn-md mb-xl-0 mb-lg-1 transition-3d-hover"><i class="flaticon-magnifying-glass font-size-20 mr-2"></i>Search</button>
                                    </div>
                                  </div>
                                  <!-- End Checkbox -->
                                </form>
                            </div>
                        </div>
                        <!-- End Search Jobs Form -->
                    </div>
                </div>
            </div>
            <!-- ========== END HERO ========== -->
            <!-- ========== Unmissable Destination ========== -->
            <div class="container mb-5 mb-lg-8 pb-lg-1">
                <div class="w-md-80 w-lg-50 text-center mx-md-auto mt-3">
                    <h2 class="section-title text-black font-size-30 font-weight-bold mb-5">Unmissable Destinations</h2>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-5 col-xl-6">
                        <div class="mb-5 mb-lg-0">
                            <img class="img-fluid w-100 rounded-top" src="assets/img/630x450/img1.jpg" alt="Image-Description">
                            <div class="bg-pink p-4 p-md-5 px-xl-8 pt-xl-5 pb-xl-7 rounded-bottom">
                                <h6 class="font-size-xs-30 font-size-50 font-weight-bold text-dark-2 mb-1">New York</h6>
                                <p class="text-lh-lg text-dark-2 pr-xl-14 mb-4">Take in the iconic skyline and visit the neighborhood hangouts that you’ve only ever seen on TV.</p>
                                <a href="../others/destination.html" class="btn btn-outline-dark-2 rounded height-51 width-223 transition-3d-hover d-flex align-items-center justify-content-center border-width-2 mb-1">Explore things to do</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-7 col-xl-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 mb-lg-2">
                                    <div class="h-100">
                                        <div class="position-relative">
                                            <a href="../others/destination.html" class="d-block gradient-overlay-half-bg-gradient-v6">
                                                <img class="img-fluid rounded-xs min-height-230 bg-img-hero w-100" src="assets/img/300x230/img53.jpg" alt="Image-Description">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-valentine-heart"></span>
                                              </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0">
                                                <div class="px-4 pb-3">
                                                    <a href="../others/destination.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Greater London, United Kingdom
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="py-3">
                                            <a href="../others/destination.html" class="card-title font-size-17 font-weight-medium text-dark">NYC: Priority or Flexible Statue of Liberty Ticket</a>
                                            <div class="my-2 pb-1">
                                                <span class="badge badge-pill badge-yellow-lighter-2 text-white py-1 px-2 font-size-14 rounded-xs font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£350.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 mb-lg-2">
                                    <div class="h-100">
                                        <div class="position-relative">
                                            <a href="../others/destination.html" class="d-block gradient-overlay-half-bg-gradient-v6">
                                                <img class="img-fluid rounded-xs min-height-230 bg-img-hero w-100" src="assets/img/300x230/img54.jpg" alt="Image-Description">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-valentine-heart"></span>
                                              </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0">
                                                <div class="px-4 pb-3">
                                                    <a href="../others/destination.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Istanbul, Turkey
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="py-3">
                                            <a href="../others/destination.html" class="card-title font-size-17 font-weight-medium text-dark">One World Observatory: Skip-All-Lines and Express Tickets</a>
                                            <div class="my-2 pb-1">
                                                <span class="badge badge-pill badge-yellow-lighter-2 text-white py-1 px-2 font-size-14 rounded-xs font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£350.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 mb-md-0">
                                    <div class="h-100">
                                        <div class="position-relative">
                                            <a href="../others/destination.html" class="d-block gradient-overlay-half-bg-gradient-v6">
                                                <img class="img-fluid rounded-xs min-height-230 bg-img-hero w-100" src="assets/img/300x230/img55.jpg" alt="Image-Description">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-valentine-heart"></span>
                                              </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0">
                                                <div class="px-4 pb-3">
                                                    <a href="../others/destination.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> New York, United States
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="py-3">
                                            <a href="../others/destination.html" class="card-title font-size-17 font-weight-medium text-dark">New York: NYC Explorer Pass w. Over 85 Tours and Attractions</a>
                                            <div class="my-2 pb-1">
                                                <span class="badge badge-pill badge-yellow-lighter-2 text-white py-1 px-2 font-size-14 rounded-xs font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£350.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-0">
                                    <div class="h-100">
                                        <div class="position-relative">
                                            <a href="../others/destination.html" class="d-block gradient-overlay-half-bg-gradient-v6">
                                                <img class="img-fluid rounded-xs min-height-230 bg-img-hero w-100" src="assets/img/300x230/img56.jpg" alt="Image-Description">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-valentine-heart"></span>
                                              </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0">
                                                <div class="px-4 pb-3">
                                                    <a href="../others/destination.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> New South Wales, Australia
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="py-3">
                                            <a href="../others/destination.html" class="card-title font-size-17 font-weight-medium text-dark">New York City: Little Italy Italian Food Tasting Tour</a>
                                            <div class="my-2 pb-1">
                                                <span class="badge badge-pill badge-yellow-lighter-2 text-white py-1 px-2 font-size-14 rounded-xs font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£350.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ========== End Unmissable Destination ========== -->


            <!-- Banner v5 -->
            <div class="banner-block banner-v5">
                <div class="gradient-overlay-half-bg-orange bg-img-hero space-3 space-bottom-xl-2" style="background-image: url(assets/img/1920x500/img6.jpg);">
                    <div class="container">
                        <div class="text-center mt-xl-4 mb-xl-7">
                            <h6 class="text-white font-size-40 font-weight-bold mb-2">Who is the Local Expert?</h6>
                            <p class="text-white font-weight-normal mb-5 pb-xl-2">Morbi semper fames lobortis ac hac penatibus</p>
                            <a class="btn btn-outline-white border-width-2 rounded-xs min-width-200 font-weight-normal transition-3d-hover" href="../others/become-expert.html">Become Local Expert</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Banner v5 -->

            <!-- Product Cards carousel -->
            <div class="product-card-carousel-block product-card-carousel-v3">
                <div class="container space-top-1">
                    <div class="w-md-80 w-lg-50 text-center mx-md-auto mt-3">
                        <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">Popular Activities</h2>
                    </div>
                    <div class="js-slick-carousel u-slick u-slick--equal-height u-slick--gutters-3"
                        data-slides-show="4"
                        data-slides-scroll="1"
                        data-arrows-classes="d-none d-xl-inline-block u-slick__arrow-classic v1 u-slick__arrow-classic--v1 u-slick__arrow-centered--y rounded-circle"
                        data-arrow-left-classes="fas fa-chevron-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left shadow-5 ml-xl-n8"
                        data-arrow-right-classes="fas fa-chevron-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right shadow-5 mr-xl-n8"
                        data-pagi-classes="text-center d-xl-none u-slick__pagination mt-4"
                        data-responsive='[{
                        "breakpoint": 1025,
                        "settings": {
                        "slidesToShow": 3
                        }
                        }, {
                        "breakpoint": 992,
                        "settings": {
                        "slidesToShow": 2
                        }
                        }, {
                        "breakpoint": 768,
                        "settings": {
                        "slidesToShow": 1
                        }
                        }, {
                        "breakpoint": 554,
                        "settings": {
                        "slidesToShow": 1
                        }
                        }]'>
                        <div class="js-slide mt-5">
                            <div class="card transition-3d-hover shadow-hover-2 w-100 h-100">
                                <div class="position-relative">
                                    <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="card-img-top" src="assets/img/300x230/img13.jpg" alt="Image Description">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                      <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                        <span class="flaticon-heart-1 font-size-20"></span>
                                      </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-4 pb-3">
                                            <a href="../activities/activities-single-v1.html" class="d-block">
                                                <div class="d-flex align-items-center font-size-14 text-white">
                                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-4 py-3">
                                    <a href="../activities/activities-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">Mangrove Tunnel Kayak Eco <br> Tour</a>
                                    <div class="mt-2 mb-3">
                                        <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                    </div>
                                    <div class="mb-0">
                                        <span class="mr-1 font-size-14 text-gray-1">From</span>
                                        <span class="font-weight-bold">£899.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="js-slide mt-5">
                            <div class="card transition-3d-hover shadow-hover-2 w-100 h-100">
                                <div class="position-relative">
                                    <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="card-img-top" src="assets/img/300x230/img14.jpg" alt="Image Description">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                      <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                        <span class="flaticon-heart-1 font-size-20"></span>
                                      </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-4 pb-3">
                                            <a href="../activities/activities-single-v1.html" class="d-block">
                                                <div class="d-flex align-items-center font-size-14 text-white">
                                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-4 py-3">
                                    <a href="../activities/activities-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">Mangrove Tunnel Kayak Eco <br> Tour</a>
                                    <div class="mt-2 mb-3">
                                        <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                    </div>
                                    <div class="mb-0">
                                        <span class="mr-1 font-size-14 text-gray-1">From</span>
                                        <span class="font-weight-bold">£899.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="js-slide mt-5">
                            <div class="card transition-3d-hover shadow-hover-2 w-100 h-100">
                                <div class="position-relative">
                                    <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="card-img-top" src="assets/img/300x230/img15.jpg" alt="Image Description">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                      <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                        <span class="flaticon-heart-1 font-size-20"></span>
                                      </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-4 pb-3">
                                            <a href="../activities/activities-single-v1.html" class="d-block">
                                                <div class="d-flex align-items-center font-size-14 text-white">
                                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-4 py-3">
                                    <a href="../activities/activities-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">Mangrove Tunnel Kayak Eco <br> Tour</a>
                                    <div class="mt-2 mb-3">
                                        <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                    </div>
                                    <div class="mb-0">
                                        <span class="mr-1 font-size-14 text-gray-1">From</span>
                                        <span class="font-weight-bold">£899.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="js-slide mt-5">
                            <div class="card transition-3d-hover shadow-hover-2 w-100 h-100">
                                <div class="position-relative">
                                    <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="card-img-top" src="assets/img/300x230/img16.jpg" alt="Image Description">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                      <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                        <span class="flaticon-heart-1 font-size-20"></span>
                                      </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-4 pb-3">
                                            <a href="../activities/activities-single-v1.html" class="d-block">
                                                <div class="d-flex align-items-center font-size-14 text-white">
                                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-4 py-3">
                                    <a href="../activities/activities-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">Mangrove Tunnel Kayak Eco <br> Tour</a>
                                    <div class="mt-2 mb-3">
                                        <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                    </div>
                                    <div class="mb-0">
                                        <span class="mr-1 font-size-14 text-gray-1">From</span>
                                        <span class="font-weight-bold">£899.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="js-slide mt-5">
                            <div class="card transition-3d-hover shadow-hover-2 w-100 h-100">
                                <div class="position-relative">
                                    <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="card-img-top" src="assets/img/300x230/img13.jpg" alt="Image Description">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                      <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                        <span class="flaticon-heart-1 font-size-20"></span>
                                      </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-4 pb-3">
                                            <a href="../activities/activities-single-v1.html" class="d-block">
                                                <div class="d-flex align-items-center font-size-14 text-white">
                                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-4 py-3">
                                    <a href="../activities/activities-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">Mangrove Tunnel Kayak Eco <br> Tour</a>
                                    <div class="mt-2 mb-3">
                                        <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                    </div>
                                    <div class="mb-0">
                                        <span class="mr-1 font-size-14 text-gray-1">From</span>
                                        <span class="font-weight-bold">£899.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="js-slide mt-5">
                            <div class="card transition-3d-hover shadow-hover-2 w-100 h-100">
                                <div class="position-relative">
                                    <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="card-img-top" src="assets/img/300x230/img14.jpg" alt="Image Description">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                      <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                        <span class="flaticon-heart-1 font-size-20"></span>
                                      </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-4 pb-3">
                                            <a href="../activities/activities-single-v1.html" class="d-block">
                                                <div class="d-flex align-items-center font-size-14 text-white">
                                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-4 py-3">
                                    <a href="../activities/activities-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">Mangrove Tunnel Kayak Eco <br> Tour</a>
                                    <div class="mt-2 mb-3">
                                        <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                    </div>
                                    <div class="mb-0">
                                        <span class="mr-1 font-size-14 text-gray-1">From</span>
                                        <span class="font-weight-bold">£899.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="js-slide mt-5">
                            <div class="card transition-3d-hover shadow-hover-2 w-100 h-100">
                                <div class="position-relative">
                                    <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="card-img-top" src="assets/img/300x230/img15.jpg" alt="Image Description">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                      <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                        <span class="flaticon-heart-1 font-size-20"></span>
                                      </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-4 pb-3">
                                            <a href="../activities/activities-single-v1.html" class="d-block">
                                                <div class="d-flex align-items-center font-size-14 text-white">
                                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-4 py-3">
                                    <a href="../activities/activities-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">Mangrove Tunnel Kayak Eco <br> Tour</a>
                                    <div class="mt-2 mb-3">
                                        <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                    </div>
                                    <div class="mb-0">
                                        <span class="mr-1 font-size-14 text-gray-1">From</span>
                                        <span class="font-weight-bold">£899.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="js-slide mt-5">
                            <div class="card transition-3d-hover shadow-hover-2 w-100 h-100">
                                <div class="position-relative">
                                    <a href="../activities/activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="card-img-top" src="assets/img/300x230/img16.jpg" alt="Image Description">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                      <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                        <span class="flaticon-heart-1 font-size-20"></span>
                                      </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-4 pb-3">
                                            <a href="../activities/activities-single-v1.html" class="d-block">
                                                <div class="d-flex align-items-center font-size-14 text-white">
                                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-4 py-3">
                                    <a href="../activities/activities-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">Mangrove Tunnel Kayak Eco <br> Tour</a>
                                    <div class="mt-2 mb-3">
                                        <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                    </div>
                                    <div class="mb-0">
                                        <span class="mr-1 font-size-14 text-gray-1">From</span>
                                        <span class="font-weight-bold">£899.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Cards carousel -->

            <!-- Destinantion v2 -->
            <div class="destination-block destination-v2">
                <div class="container space-top-1 pb-3 mb-1">
                    <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-5 mt-3">
                        <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">Top Destination</h2>
                    </div>
                    <div class="row">
                        <!-- Card Block -->
                        <div class="col-md-4 col-lg-6 col-xl-2dot4 mb-3 mb-md-4 pb-1">
                            <a class="d-block" href="../others/destination.html">
                                <div class="min-height-240 rounded-border px-4 py-5 bg-img-hero transition-3d-hover gradient-overlay-half-bg-gradient-v2 shadow-hover-2 dropdown" style="background-image: url(assets/img/235x240/img3.jpg);">
                                    <header class="w-100 d-flex justify-content-between">
                                        <div class="position-relative">
                                            <h5 class="text-white font-weight-bold font-size-17 mb-1 text-lh-2 d-block">Turkey</h5>
                                        </div>
                                    </header>
                                </div>
                            </a>
                        </div>
                        <!-- End Card Block -->

                        <!-- Card Block -->
                        <div class="col-md-4 col-lg-6 col-xl-2dot4 mb-3 mb-md-4 pb-1">
                            <a class="d-block" href="../others/destination.html">
                                <div class="min-height-240 rounded-border px-4 py-5 bg-img-hero transition-3d-hover gradient-overlay-half-bg-gradient-v2 shadow-hover-2 dropdown" style="background-image: url(assets/img/235x240/img7.jpg);">
                                    <header class="w-100 d-flex justify-content-between">
                                        <div class="position-relative">
                                            <h5 class="text-white font-weight-bold font-size-17 mb-1 text-lh-2 d-block">United States</h5>
                                        </div>
                                    </header>
                                </div>
                            </a>
                        </div>
                        <!-- End Card Block -->

                        <!-- Card Block -->
                        <div class="col-md-4 col-lg-6 col-xl-2dot4 mb-3 mb-md-4 pb-1">
                            <a class="d-block" href="../others/destination.html">
                                <div class="min-height-240 rounded-border px-4 py-5 bg-img-hero transition-3d-hover gradient-overlay-half-bg-gradient-v2 shadow-hover-2 dropdown" style="background-image: url(assets/img/235x240/img6.jpg);">
                                    <header class="w-100 d-flex justify-content-between">
                                        <div class="position-relative">
                                            <h5 class="text-white font-weight-bold font-size-17 mb-1 text-lh-2 d-block">Ukraine</h5>
                                        </div>
                                    </header>
                                </div>
                            </a>
                        </div>
                        <!-- End Card Block -->

                        <!-- Card Block -->
                        <div class="col-md-4 col-lg-6 col-xl-2dot4 mb-3 mb-md-4 pb-1">
                            <a class="d-block" href="../others/destination.html">
                                <div class="min-height-240 rounded-border px-4 py-5 bg-img-hero transition-3d-hover gradient-overlay-half-bg-gradient-v2 shadow-hover-2 dropdown" style="background-image: url(assets/img/235x240/img10.jpg);">
                                    <header class="w-100 d-flex justify-content-between">
                                        <div class="position-relative">
                                            <h5 class="text-white font-weight-bold font-size-17 mb-1 text-lh-2 d-block">France</h5>
                                        </div>
                                    </header>
                                </div>
                            </a>
                        </div>
                        <!-- End Card Block -->

                        <!-- Card Block -->
                        <div class="col-md-4 col-lg-6 col-xl-2dot4 mb-3 mb-md-4 pb-1">
                            <a class="d-block" href="../others/destination.html">
                                <div class="min-height-240 rounded-border px-4 py-5 bg-img-hero transition-3d-hover gradient-overlay-half-bg-gradient-v2 shadow-hover-2 dropdown" style="background-image: url(assets/img/235x240/img2.jpg);">
                                    <header class="w-100 d-flex justify-content-between">
                                        <div class="position-relative">
                                            <h5 class="text-white font-weight-bold font-size-17 mb-1 text-lh-2 d-block">India</h5>
                                        </div>
                                    </header>
                                </div>
                            </a>
                        </div>
                        <!-- End Card Block -->

                        <!-- Card Block -->
                        <div class="col-md-4 col-lg-6 col-xl-2dot4 mb-3 mb-md-4 pb-1">
                            <a class="d-block" href="../others/destination.html">
                                <div class="min-height-240 rounded-border px-4 py-5 bg-img-hero transition-3d-hover gradient-overlay-half-bg-gradient-v2 shadow-hover-2 dropdown" style="background-image: url(assets/img/235x240/img5.jpg);">
                                    <header class="w-100 d-flex justify-content-between">
                                        <div class="position-relative">
                                            <h5 class="text-white font-weight-bold font-size-17 mb-1 text-lh-2 d-block">United Kingdom</h5>
                                        </div>
                                    </header>
                                </div>
                            </a>
                        </div>
                        <!-- End Card Block -->

                        <!-- Card Block -->
                        <div class="col-md-4 col-lg-6 col-xl-2dot4 mb-3 mb-md-4 pb-1">
                            <a class="d-block" href="../others/destination.html">
                                <div class="min-height-240 rounded-border px-4 py-5 bg-img-hero transition-3d-hover gradient-overlay-half-bg-gradient-v2 shadow-hover-2 dropdown" style="background-image: url(assets/img/235x240/img9.jpg);">
                                    <header class="w-100 d-flex justify-content-between">
                                        <div class="position-relative">
                                            <h5 class="text-white font-weight-bold font-size-17 mb-1 text-lh-2 d-block">Germany</h5>
                                        </div>
                                    </header>
                                </div>
                            </a>
                        </div>
                        <!-- End Card Block -->

                        <!-- Card Block -->
                        <div class="col-md-4 col-lg-6 col-xl-2dot4 mb-3 mb-md-4 pb-1">
                            <a class="d-block" href="../others/destination.html">
                                <div class="min-height-240 rounded-border px-4 py-5 bg-img-hero transition-3d-hover gradient-overlay-half-bg-gradient-v2 shadow-hover-2 dropdown" style="background-image: url(assets/img/235x240/img8.jpg);">
                                    <header class="w-100 d-flex justify-content-between">
                                        <div class="position-relative">
                                            <h5 class="text-white font-weight-bold font-size-17 mb-1 text-lh-2 d-block">Greece</h5>
                                        </div>
                                    </header>
                                </div>
                            </a>
                        </div>
                        <!-- End Card Block -->

                        <!-- Card Block -->
                        <div class="col-md-4 col-lg-6 col-xl-2dot4 mb-3 mb-md-4 pb-1">
                            <a class="d-block" href="../others/destination.html">
                                <div class="min-height-240 rounded-border px-4 py-5 bg-img-hero transition-3d-hover gradient-overlay-half-bg-gradient-v2 shadow-hover-2 dropdown" style="background-image: url(assets/img/235x240/img1.jpg);">
                                    <header class="w-100 d-flex justify-content-between">
                                        <div class="position-relative">
                                            <h5 class="text-white font-weight-bold font-size-17 mb-1 text-lh-2 d-block">Canada</h5>
                                        </div>
                                    </header>
                                </div>
                            </a>
                        </div>
                        <!-- End Card Block -->

                        <!-- Card Block -->
                        <div class="col-md-4 col-lg-6 col-xl-2dot4 mb-3 mb-md-4 pb-1">
                            <a class="d-block" href="../others/destination.html">
                                <div class="min-height-240 rounded-border px-4 py-5 bg-img-hero transition-3d-hover gradient-overlay-half-bg-gradient-v2 shadow-hover-2 dropdown" style="background-image: url(assets/img/235x240/img4.jpg);">
                                    <header class="w-100 d-flex justify-content-between">
                                        <div class="position-relative">
                                            <h5 class="text-white font-weight-bold font-size-17 mb-1 text-lh-2 d-block">Italy</h5>
                                        </div>
                                    </header>
                                </div>
                            </a>
                        </div>
                        <!-- End Card Block -->
                    </div>
                </div>
            </div>
            <!-- End Destinantion v2 -->

            <!-- Testimonials v1 -->
            <div class="testimonial-block testimonial-v1">
                <div class="container space-bottom-1 mb-1">
                    <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-5">
                        <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">Our Happy</h2>
                    </div>
                    <!-- Slick Carousel -->
                    <div class="js-slick-carousel u-slick u-slick-bordered-dark u-slick--gutters-3" data-slides-show="3" data-center-mode="true" data-autoplay="false" data-speed="3000" data-pagi-classes="text-center u-slick__pagination u-slick__pagination-dark mb-0 mt-n6"
                    data-responsive='[ {
                    "breakpoint": 992,
                    "settings": {
                    "slidesToShow": 2
                    }
                    }, {
                    "breakpoint": 768,
                    "settings": {
                    "slidesToShow": 1
                    }
                    }]'>
                        <div class="js-slide my-10">
                            <!-- Testimonials -->
                            <div class="card rounded-xs border-color-7 w-100">
                                <div class="card-body p-5">
                                    <div class="d-flex justify-content-between align-items-baseline">
                                        <div class="mb-5">
                                            <h6 class="font-size-17 font-weight-bold text-gray-6 mb-0">Jessica Brown</h6>
                                            <span class="text-blue-lighter-1 font-size-normal">client</span>
                                        </div>
                                        <figure id="quote" class="svg-preloader testimonial-quote">
                                            <img class="js-svg-injector" src="https://madrasthemes.github.io/mytravel-html/assets/svg/illustrations/quote1.svg" alt="SVG" data-parent="#quote">
                                        </figure>
                                    </div>
                                    <p class="mb-0 text-gray-1 font-italic text-lh-inherit">This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize</p>
                                </div>
                                <div class="card-img z-index-2 mb-3">
                                    <div class="ml-3">
                                        <img class="img-fluid rounded-circle" src="assets/img/101x101/img1.jpg" alt="Image Description">
                                    </div>
                                </div>
                            </div>
                            <!-- End Testimonials -->
                        </div>

                        <div class="js-slide my-10">
                            <!-- Testimonials -->
                            <div class="card rounded-xs border-color-7 w-100">
                                <div class="card-body p-5">
                                    <div class="d-flex align-items-baseline justify-content-between">
                                        <div class="mb-5">
                                            <h6 class="font-size-17 font-weight-bold text-gray-6 mb-0">Augusta Silva</h6>
                                            <span class="text-blue-lighter-1 font-size-normal">client</span>
                                        </div>
                                        <figure id="quote1" class="svg-preloader testimonial-quote">
                                            <img class="js-svg-injector" src="https://madrasthemes.github.io/mytravel-html/assets/svg/illustrations/quote1.svg" alt="SVG" data-parent="#quote1">
                                        </figure>
                                    </div>
                                    <p class="mb-0 text-gray-1 font-italic text-lh-inherit">This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize</p>
                                </div>
                                <div class="card-img z-index-2 mb-3">
                                    <div class="ml-3">
                                        <img class="img-fluid rounded-circle" src="assets/img/101x101/img2.jpg" alt="Image Description">
                                    </div>
                                </div>
                            </div>
                            <!-- End Testimonials -->
                        </div>

                        <div class="js-slide my-10">
                            <!-- Testimonials -->
                            <div class="card rounded-xs border-color-7 w-100">
                                <div class="card-body p-5">
                                    <div class="d-flex align-items-baseline justify-content-between">
                                        <div class="mb-5">
                                            <h6 class="font-size-17 font-weight-bold text-gray-6 mb-0">Ali Tufan </h6>
                                            <span class="text-blue-lighter-1 font-size-normal">client</span>
                                        </div>
                                        <figure id="quote2" class="svg-preloader testimonial-quote">
                                            <img class="js-svg-injector" src="https://madrasthemes.github.io/mytravel-html/assets/svg/illustrations/quote1.svg" alt="SVG" data-parent="#quote2">
                                        </figure>
                                    </div>
                                    <p class="mb-0 text-gray-1 font-italic text-lh-inherit">This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize</p>
                                </div>
                                <div class="card-img z-index-2 mb-3">
                                    <div class="ml-3">
                                        <img class="img-fluid rounded-circle" src="assets/img/101x101/img3.jpg" alt="Image Description">
                                    </div>
                                </div>
                            </div>
                            <!-- End Testimonials -->
                        </div>

                        <div class="js-slide my-10">
                            <!-- Testimonials -->
                            <div class="card rounded-xs border-color-7 w-100">
                                <div class="card-body p-5">
                                    <div class="d-flex justify-content-between align-items-baseline">
                                        <div class="mb-5">
                                            <h6 class="font-size-17 font-weight-bold text-gray-6 mb-0">Jessica Brown</h6>
                                            <span class="text-blue-lighter-1 font-size-normal">client</span>
                                        </div>
                                        <figure id="quote4" class="svg-preloader testimonial-quote ">
                                            <img class="js-svg-injector" src="https://madrasthemes.github.io/mytravel-html/assets/svg/illustrations/quote1.svg" alt="SVG" data-parent="#quote4">
                                        </figure>
                                    </div>
                                    <p class="mb-0 text-gray-1 font-italic text-lh-inherit">This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize</p>
                                </div>
                                <div class="card-img z-index-2 mb-3">
                                    <div class="ml-3">
                                        <img class="img-fluid rounded-circle" src="assets/img/101x101/img1.jpg" alt="Image Description">
                                    </div>
                                </div>
                            </div>
                            <!-- End Testimonials -->
                        </div>

                        <div class="js-slide my-10">
                            <!-- Testimonials -->
                            <div class="card rounded-xs border-color-7 w-100">
                                <div class="card-body p-5">
                                    <div class="d-flex align-items-baseline justify-content-between">
                                        <div class="mb-5">
                                            <h6 class="font-size-17 font-weight-bold text-gray-6 mb-0">Augusta Silva</h6>
                                            <span class="text-blue-lighter-1 font-size-normal">client</span>
                                        </div>
                                        <figure id="quote5" class="svg-preloader testimonial-quote">
                                            <img class="js-svg-injector" src="https://madrasthemes.github.io/mytravel-html/assets/svg/illustrations/quote1.svg" alt="SVG" data-parent="#quote5">
                                        </figure>
                                    </div>
                                    <p class="mb-0 text-gray-1 font-italic text-lh-inherit">This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize</p>
                                </div>
                                <div class="card-img z-index-2 mb-3">
                                    <div class="ml-3">
                                        <img class="img-fluid rounded-circle" src="assets/img/101x101/img2.jpg" alt="Image Description">
                                    </div>
                                </div>
                            </div>
                            <!-- End Testimonials -->
                        </div>

                        <div class="js-slide my-10">
                            <!-- Testimonials -->
                            <div class="card rounded-xs border-color-7 w-100">
                                <div class="card-body p-5">
                                    <div class="d-flex align-items-baseline justify-content-between">
                                        <div class="mb-5">
                                            <h6 class="font-size-17 font-weight-bold text-gray-6 mb-0">Ali Tufan </h6>
                                            <span class="text-blue-lighter-1 font-size-normal">client</span>
                                        </div>
                                        <figure id="quote6" class="svg-preloader testimonial-quote">
                                            <img class="js-svg-injector" src="https://madrasthemes.github.io/mytravel-html/assets/svg/illustrations/quote1.svg" alt="SVG" data-parent="#quote6">
                                        </figure>
                                    </div>
                                    <p class="mb-0 text-gray-1 font-italic text-lh-inherit">This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize</p>
                                </div>
                                <div class="card-img z-index-2 mb-3">
                                    <div class="ml-3">
                                        <img class="img-fluid rounded-circle" src="assets/img/101x101/img3.jpg" alt="Image Description">
                                    </div>
                                </div>
                            </div>
                            <!-- End Testimonials -->
                        </div>
                    </div>
                    <!-- End Slick Carousel -->
                </div>
            </div>
            <!-- End Testimonials v1 -->

            <!-- Clients v1 -->
            <div class="clients-block clients-v1 border-bottom border-color-8">
                <div class="container space-1">
                    <div class="row justify-content-between pb-lg-1 text-center text-md-left">
                        <div class="col-12 col-md mb-5">
                            <img class="img-fluid" src="assets/img/200x200/img11.png" alt="Image Description">
                        </div>
                        <div class="col-12 col-md mb-5">
                            <img class="img-fluid" src="assets/img/200x200/img12.png" alt="Image Description">
                        </div>
                        <div class="col-12 col-md mb-5">
                            <img class="img-fluid" src="assets/img/200x200/img13.png" alt="Image Description">
                        </div>
                        <div class="col-12 col-md mb-5">
                            <img class="img-fluid" src="assets/img/200x200/img14.png" alt="Image Description">
                        </div>
                        <div class="col-12 col-md mb-md-5">
                            <img class="img-fluid" src="assets/img/200x200/img15.png" alt="Image Description">
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Clients v1 -->
        </main>
        <!-- ========== END MAIN CONTENT ========== -->

        <!-- ========== FOOTER ========== -->
        <?php include('sections/footer.php'); ?>
        <!-- ========== END FOOTER ========== -->

        <!-- Page Preloader -->
        <!-- <div id="jsPreloader" class="page-preloader">
            <div class="page-preloader__content-centered">
                <div class="spinner-grow text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div> -->
        <!-- End Page Preloader -->

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
        <script src="assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="assets/vendor/flatpickr/dist/flatpickr.min.js"></script>
        <script src="assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <script src="assets/vendor/slick-carousel/slick/slick.js"></script>
        <script src="assets/vendor/fancybox/jquery.fancybox.min.js"></script>
        <script src="assets/vendor/svg-injector/dist/svg-injector.min.js"></script>

        <!-- JS MyTravel -->
        <script src="assets/js/hs.core.js"></script>
        <script src="assets/js/components/hs.header.js"></script>
        <script src="assets/js/components/hs.unfold.js"></script>
        <script src="assets/js/components/hs.validation.js"></script>
        <script src="assets/js/components/hs.show-animation.js"></script>
        <script src="assets/js/components/hs.range-datepicker.js"></script>
        <script src="assets/js/components/hs.selectpicker.js"></script>
        <script src="assets/js/components/hs.go-to.js"></script>
        <script src="assets/js/components/hs.slick-carousel.js"></script>
        <script src="assets/js/components/hs.fancybox.js"></script>
        <script src="assets/js/components/hs.svg-injector.js"></script>
        <script src="assets/js/components/hs.quantity-counter.js"></script>

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

                // Page preloader
                setTimeout(function() {
                  $('#jsPreloader').fadeOut(500)
                }, 800);
            });

            $(document).on('ready', function () {
                // initialization of header
                $.HSCore.components.HSHeader.init($('#header'));

                // initialization of unfold component
                $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

                // initialization of show animations
                $.HSCore.components.HSShowAnimation.init('.js-animation-link');

                // initialization of datepicker
                $.HSCore.components.HSRangeDatepicker.init('.js-range-datepicker');

                // initialization of select
                $.HSCore.components.HSSelectPicker.init('.js-select');

                // initialization of quantity counter
                $.HSCore.components.HSQantityCounter.init('.js-quantity');

                // initialization of slick carousel
                $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

                // initialization of popups
                $.HSCore.components.HSFancyBox.init('.js-fancybox');

                // initialization of go to
                $.HSCore.components.HSGoTo.init('.js-go-to');
            }); 
        </script>
    </body>

<!-- Mirrored from madrasthemes.github.io/mytravel-html/html/home/home-v6.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Mar 2020 15:11:21 GMT -->
</html>
