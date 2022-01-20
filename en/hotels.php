<!-- ==========  PHP  ===========-->
<?php  include('../db_connect.php');?>
<?php require 'sections/main.php';?>

<!DOCTYPE html>
<html lang="en">
    
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
        <!-- Title -->
        <title>Hjuzati | Hotels</title>

        <?php include('sections/head.html'); ?>
    </head>
    <body>
       <!-- ========== HEADER ========== -->
        <?php include('sections/header.php'); ?>
        <!-- ========== END HEADER ========== -->

        <!-- ========== MAIN CONTENT ========== -->
        <main id="content">
            <!-- ========== HERO ========== -->
            <div class="hero-block hero-v4 bg-img-hero-bottom text-center z-index-2" style="background-image: url(assets/img/1920x800/img2.jpg);">
                <div class="container space-2 space-top-lg-4 space-top-xl-10">
                    <div class="row justify-content-md-center pb-xl-11">
                        <!-- Info -->
                        <div class="mb-wd-11 pb-5 py-lg-5">
                            <h1 class="font-size-50 font-size-xs-30 text-white font-weight-bold">Find Your Ideal Hotel and Compare Prices</h1>
                            <p class="font-size-20 font-weight-normal text-white">Check out the best deals on over 2,000,000 hotels worldwide</p>
                        </div>
                        <!-- End Info -->
                    </div>
                    <div class="mb-lg-n16">
                        <!-- Search Jobs Form -->
                            <div class="card border-0 tab-shadow">
                                <div class="card-body">
                                    <form class="js-validate">
                                      <div class="row d-block nav-select d-lg-flex mb-lg-3 px-2 px-lg-3">
                                        <div class="col-sm-12 col-lg-3dot6 col-xl-3dot7 mb-4 mb-lg-0 ">
                                            <span class="d-block text-gray-1 font-weight-normal text-left mb-0">Destination or Hotel Name</span>
                                            <!-- Select -->
                                            <select class="js-select selectpicker dropdown-select tab-dropdown col-12 pl-0 flaticon-pin d-flex align-items-center text-primary font-weight-semi-bold" title="Where are you going?"
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
                                            <!-- End Select -->
                                        </div>

                                        <div class="col-sm-12 col-lg-3dot7 col-xl-3dot6 mb-4 mb-lg-0 ">
                                            <!-- Input -->
                                            <span class="d-block text-gray-1 text-left font-weight-normal mb-0">Check In - Out</span>
                                            <div class="border-bottom border-width-2 border-color-1">
                                                <div id="datepickerWrapperFromOne" class="u-datepicker input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="d-flex align-items-center mr-2">
                                                          <i class="flaticon-calendar text-primary font-weight-semi-bold"></i>
                                                        </span>
                                                    </div>
                                                     <input class="js-range-datepicker font-size-lg-16 shadow-none font-weight-bold form-control hero-form bg-transparent  border-0" type="date"
                                                         data-rp-wrapper="#datepickerWrapperFromOne"
                                                         data-rp-type="range"
                                                         data-rp-date-format="M d / Y"
                                                         data-rp-default-date='["Jul 7 / 2020", "Aug 25 / 2020"]'>
                                                </div>
                                                 <!-- End Datepicker -->
                                            </div>
                                            <!-- End Input -->
                                        </div>

                                        <div class="col-sm-12 col-lg-2dot8 mb-4 mb-lg-0 dropdown-custom">
                                            <!-- Input -->
                                            <span class="d-block text-gray-1 text-left font-weight-normal mb-0">Rooms and Guests</span>
                                            <a id="basicDropdownClickInvoker" class="dropdown-nav-link dropdown-toggle d-flex pt-3 pb-2" href="javascript:;" role="button"
                                                aria-controls="basicDropdownClick"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                                data-unfold-event="click"
                                                data-unfold-target="#basicDropdownClick"
                                                data-unfold-type="css-animation"
                                                data-unfold-duration="300"
                                                data-unfold-delay="300"
                                                data-unfold-hide-on-scroll="true"
                                                data-unfold-animation-in="slideInUp"
                                                data-unfold-animation-out="fadeOut">
                                                <i class="flaticon-plus d-flex align-items-center mr-3 font-size-18 text-primary font-weight-semi-bold"></i>
                                                <span class="text-black font-size-16 font-weight-semi-bold">2 Rooms - 3 Guests</span>
                                            </a>
                                            <div id="basicDropdownClick" class="dropdown-menu dropdown-unfold col-11 m-0" aria-labelledby="basicDropdownClickInvoker">
                                                <div class="w-100 py-2 px-3 mb-3">
                                                    <div class="js-quantity mx-3 row align-items-center justify-content-between">
                                                        <span class="d-block font-size-16 text-secondary font-weight-medium">Rooms</span>
                                                        <div class="d-flex">
                                                            <a class="js-minus btn btn-icon btn-medium btn-outline-secondary rounded-circle" href="javascript:;">
                                                                <small class="fad fa-minus btn-icon__inner"></small>
                                                            </a>
                                                            <input class="js-result form-control h-auto border-0 rounded p-0 max-width-6 text-center" type="text" value="1">
                                                            <a class="js-plus btn btn-icon btn-medium btn-outline-secondary rounded-circle" href="javascript:;">
                                                                <small class="fad fa-plus btn-icon__inner"></small>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-100 py-2 px-3 mb-3">
                                                    <div class="js-quantity mx-3 row align-items-center justify-content-between">
                                                        <span class="d-block font-size-16 text-secondary font-weight-medium">Adults</span>
                                                        <div class="d-flex">
                                                            <a class="js-minus btn btn-icon btn-medium btn-outline-secondary rounded-circle" href="javascript:;">
                                                                <small class="fad fa-minus btn-icon__inner"></small>
                                                            </a>
                                                            <input class="js-result form-control h-auto border-0 rounded p-0 max-width-6 text-center" type="text" value="1">
                                                            <a class="js-plus btn btn-icon btn-medium btn-outline-secondary rounded-circle" href="javascript:;">
                                                                <small class="fad fa-plus btn-icon__inner"></small>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-100 py-2 px-3">
                                                    <div class="js-quantity mx-3 row align-items-center justify-content-between">
                                                        <span class="d-block font-size-16 text-secondary font-weight-medium">Child</span>
                                                        <div class="d-flex">
                                                            <a class="js-minus btn btn-icon btn-medium btn-outline-secondary rounded-circle" href="javascript:;">
                                                                <small class="fad fa-minus btn-icon__inner"></small>
                                                            </a>
                                                            <input class="js-result form-control h-auto border-0 rounded p-0 max-width-6 text-center" type="text" value="1">
                                                            <a class="js-plus btn btn-icon btn-medium btn-outline-secondary rounded-circle" href="javascript:;">
                                                                <small class="fad fa-plus btn-icon__inner"></small>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-100 text-right py-1 pr-5">
                                                    <a class="text-primary font-weight-semi-bold font-size-16" href="#">Done</a>
                                                </div>
                                            </div>
                                            <!-- End Input -->
                                        </div>

                                        <div class="col-sm-12 col-lg-1dot8 align-self-lg-end text-md-right">
                                            <button type="submit" class="btn btn-primary btn-md border-radius-3 mb-xl-0 mb-lg-1 transition-3d-hover"><i class="flaticon-magnifying-glass font-size-20 mr-2"></i>Search</button>
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

            <!-- Product Cards Ratings With carousel -->
            <div class="product-card-block product-card-v3">
                <div class="container-fluid space-top-2 space-top-lg-3">
                    <div class="w-md-80 w-lg-50 text-center mx-md-auto pb-4 mt-xl-4">
                        <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">Most Popular Hotels</h2>
                    </div>
                    <div class="js-slick-carousel u-slick u-slick--equal-height u-slick--gutters-3"
                        data-slides-show="5"
                        data-slides-scroll="1"
                        data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic v1 u-slick__arrow-classic--v1 u-slick__arrow-centered--y rounded-circle"
                        data-arrow-left-classes="fad fa-chevron-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left shadow-5"
                        data-arrow-right-classes="fad fa-chevron-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right shadow-5"
                        data-pagi-classes="text-center u-slick__pagination mt-4"
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
                        <div class="js-slide mt-2">
                            <div class="card transition-3d-hover shadow-hover-2 h-100 w-100">
                                <div class="position-relative">
                                    <a href="../hotels/hotel-sinlge-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="card-img-top" src="assets/img/300x230/img9.jpg" alt="Image Description">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                      <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                        <span class="flaticon-heart-1 font-size-20"></span>
                                      </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-4 pb-3">
                                            <a href="../hotels/hotel-sinlge-v1.html" class="d-block">
                                                <div class="d-flex align-items-center font-size-14 text-white">
                                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Sulaymaniyah, Kurdistan
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-4 pt-2 pb-3">
                                    <div class="mb-2">
                                        <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                            <div class="green-lighter">
                                                <small class="fad fa-star"></small>
                                                <small class="fad fa-star"></small>
                                                <small class="fad fa-star"></small>
                                                <small class="fad fa-star"></small>
                                                <small class="fad fa-star"></small>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="../hotels/hotel-sinlge-v1.html" class="card-title font-size-17 font-weight-medium text-dark">Grand Millinume Sulaymaniyah</a>
                                    <div class="mt-2 mb-3">
                                        <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                    </div>
                                    <div class="mb-0">
                                        <span class="mr-1 font-size-14 text-gray-1">From</span>
                                        <span class="font-weight-bold">£899.00</span>
                                        <span class="font-size-14 text-gray-1"> / night</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="js-slide mt-2">
                            <div class="card transition-3d-hover shadow-hover-2 h-100 w-100">
                                <div class="position-relative">
                                    <a href="../hotels/hotel-sinlge-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="card-img-top" src="assets/img/300x230/img10.jpg" alt="Image Description">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                      <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                        <span class="flaticon-heart-1 font-size-20"></span>
                                      </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-4 pb-3">
                                            <a href="../hotels/hotel-sinlge-v1.html" class="d-block">
                                                <div class="d-flex align-items-center font-size-14 text-white">
                                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Erbil, Kurdistan
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-4 pt-2 pb-3">
                                    <div class="mb-2">
                                        <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                            <div class="green-lighter">
                                                <small class="fad fa-star"></small>
                                                <small class="fad fa-star"></small>
                                                <small class="fad fa-star"></small>
                                                <small class="fad fa-star"></small>
                                                <small class="fad fa-star"></small>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="../hotels/hotel-sinlge-v1.html" class="card-title font-size-17 font-weight-medium text-dark">Hawler Hotel</a>
                                    <div class="mt-2 mb-3">
                                        <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                    </div>
                                    <div class="mb-0">
                                        <span class="mr-1 font-size-14 text-gray-1">From</span>
                                        <span class="font-weight-bold">£899.00</span>
                                        <span class="font-size-14 text-gray-1"> / night</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="js-slide mt-2">
                            <div class="card transition-3d-hover shadow-hover-2 h-100 w-100">
                                <div class="position-relative">
                                    <a href="../hotels/hotel-sinlge-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="card-img-top" src="assets/img/300x230/img12.jpg" alt="Image Description">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                      <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                        <span class="flaticon-heart-1 font-size-20"></span>
                                      </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-4 pb-3">
                                            <a href="../hotels/hotel-sinlge-v1.html" class="d-block">
                                                <div class="d-flex align-items-center font-size-14 text-white">
                                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Istanbul, Turkey
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-4 pt-2 pb-3">
                                    <div class="mb-2">
                                        <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                            <div class="green-lighter">
                                                <small class="fad fa-star"></small>
                                                <small class="fad fa-star"></small>
                                                <small class="fad fa-star"></small>
                                                <small class="fad fa-star"></small>
                                                <small class="fad fa-star"></small>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="../hotels/hotel-sinlge-v1.html" class="card-title font-size-17 font-weight-medium text-dark">New Road Hotel</a>
                                    <div class="mt-2 mb-3">
                                        <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                    </div>
                                    <div class="mb-0">
                                        <span class="mr-1 font-size-14 text-gray-1">From</span>
                                        <span class="font-weight-bold">£899.00</span>
                                        <span class="font-size-14 text-gray-1"> / night</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="js-slide mt-2">
                            <div class="card transition-3d-hover shadow-hover-2 h-100 w-100">
                                <div class="position-relative">
                                    <a href="../hotels/hotel-sinlge-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="card-img-top" src="assets/img/300x230/img11.jpg" alt="Image Description">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                      <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                        <span class="flaticon-heart-1 font-size-20"></span>
                                      </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-4 pb-3">
                                            <a href="../hotels/hotel-sinlge-v1.html" class="d-block">
                                                <div class="d-flex align-items-center font-size-14 text-white">
                                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Istanbul, Turkey
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-4 pt-2 pb-3">
                                    <div class="mb-2">
                                        <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                            <div class="green-lighter">
                                                <small class="fad fa-star"></small>
                                                <small class="fad fa-star"></small>
                                                <small class="fad fa-star"></small>
                                                <small class="fad fa-star"></small>
                                                <small class="fad fa-star"></small>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="../hotels/hotel-sinlge-v1.html" class="card-title font-size-17 font-weight-medium text-dark">New York Marriott Downtown</a>
                                    <div class="mt-2 mb-3">
                                        <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                    </div>
                                    <div class="mb-0">
                                        <span class="mr-1 font-size-14 text-gray-1">From</span>
                                        <span class="font-weight-bold">£899.00</span>
                                        <span class="font-size-14 text-gray-1"> / night</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="js-slide mt-2">
                            <div class="card transition-3d-hover shadow-hover-2 h-100 w-100">
                                <div class="position-relative">
                                    <a href="../hotels/hotel-sinlge-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="card-img-top" src="assets/img/300x230/img9.jpg" alt="Image Description">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                      <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                        <span class="flaticon-heart-1 font-size-20"></span>
                                      </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-4 pb-3">
                                            <a href="../hotels/hotel-sinlge-v1.html" class="d-block">
                                                <div class="d-flex align-items-center font-size-14 text-white">
                                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-4 pt-2 pb-3">
                                    <div class="mb-2">
                                        <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                            <div class="green-lighter">
                                                <small class="fad fa-star"></small>
                                                <small class="fad fa-star"></small>
                                                <small class="fad fa-star"></small>
                                                <small class="fad fa-star"></small>
                                                <small class="fad fa-star"></small>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="../hotels/hotel-sinlge-v1.html" class="card-title font-size-17 font-weight-medium text-dark">Empire Prestige Causeway Bay</a>
                                    <div class="mt-2 mb-3">
                                        <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                    </div>
                                    <div class="mb-0">
                                        <span class="mr-1 font-size-14 text-gray-1">From</span>
                                        <span class="font-weight-bold">£899.00</span>
                                        <span class="font-size-14 text-gray-1"> / night</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="js-slide mt-2">
                            <div class="card transition-3d-hover shadow-hover-2 h-100 w-100">
                                <div class="position-relative">
                                    <a href="../hotels/hotel-sinlge-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="card-img-top" src="assets/img/300x230/img12.jpg" alt="Image Description">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                      <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                        <span class="flaticon-heart-1 font-size-20"></span>
                                      </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-4 pb-3">
                                            <a href="../hotels/hotel-sinlge-v1.html" class="d-block">
                                                <div class="d-flex align-items-center font-size-14 text-white">
                                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Istanbul, Turkey
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-4 pt-2 pb-3">
                                    <div class="mb-2">
                                        <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                            <div class="green-lighter">
                                                <small class="fad fa-star"></small>
                                                <small class="fad fa-star"></small>
                                                <small class="fad fa-star"></small>
                                                <small class="fad fa-star"></small>
                                                <small class="fad fa-star"></small>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="../hotels/hotel-sinlge-v1.html" class="card-title font-size-17 font-weight-medium text-dark">New Road Hotel</a>
                                    <div class="mt-2 mb-3">
                                        <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                    </div>
                                    <div class="mb-0">
                                        <span class="mr-1 font-size-14 text-gray-1">From</span>
                                        <span class="font-weight-bold">£899.00</span>
                                        <span class="font-size-14 text-gray-1"> / night</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="js-slide mt-2">
                            <div class="card transition-3d-hover shadow-hover-2 h-100 w-100">
                                <div class="position-relative">
                                    <a href="../hotels/hotel-sinlge-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="card-img-top" src="assets/img/300x230/img9.jpg" alt="Image Description">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                      <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                        <span class="flaticon-heart-1 font-size-20"></span>
                                      </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-4 pb-3">
                                            <a href="../hotels/hotel-sinlge-v1.html" class="d-block">
                                                <div class="d-flex align-items-center font-size-14 text-white">
                                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-4 pt-2 pb-3">
                                    <div class="mb-2">
                                        <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                            <div class="green-lighter">
                                                <small class="fad fa-star"></small>
                                                <small class="fad fa-star"></small>
                                                <small class="fad fa-star"></small>
                                                <small class="fad fa-star"></small>
                                                <small class="fad fa-star"></small>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="../hotels/hotel-sinlge-v1.html" class="card-title font-size-17 font-weight-medium text-dark">Empire Prestige Causeway Bay</a>
                                    <div class="mt-2 mb-3">
                                        <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                    </div>
                                    <div class="mb-0">
                                        <span class="mr-1 font-size-14 text-gray-1">From</span>
                                        <span class="font-weight-bold">£899.00</span>
                                        <span class="font-size-14 text-gray-1"> / night</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="js-slide mt-2">
                            <div class="card transition-3d-hover shadow-hover-2 h-100 w-100">
                                <div class="position-relative">
                                    <a href="../hotels/hotel-sinlge-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="card-img-top" src="assets/img/300x230/img11.jpg" alt="Image Description">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                      <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                        <span class="flaticon-heart-1 font-size-20"></span>
                                      </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-4 pb-3">
                                            <a href="../hotels/hotel-sinlge-v1.html" class="d-block">
                                                <div class="d-flex align-items-center font-size-14 text-white">
                                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Istanbul, Turkey
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-4 pt-2 pb-3">
                                    <div class="mb-2">
                                        <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                            <div class="green-lighter">
                                                <small class="fad fa-star"></small>
                                                <small class="fad fa-star"></small>
                                                <small class="fad fa-star"></small>
                                                <small class="fad fa-star"></small>
                                                <small class="fad fa-star"></small>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="../hotels/hotel-sinlge-v1.html" class="card-title font-size-17 font-weight-medium text-dark">New York Marriott Downtown</a>
                                    <div class="mt-2 mb-3">
                                        <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                    </div>
                                    <div class="mb-0">
                                        <span class="mr-1 font-size-14 text-gray-1">From</span>
                                        <span class="font-weight-bold">£899.00</span>
                                        <span class="font-size-14 text-gray-1"> / night</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Cards Ratings With carousel -->

            <!-- Destinantion v4 -->
            <div class="destination-block destination-v4">
                <div class="container space-bottom-1 pt-3">
                    <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-5 mt-3">
                        <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">Popular Destination</h2>
                    </div>
                        <div class="row">
                        <!-- Card Block -->
                        <div class="col-md-6 mb-3 mb-md-0">
                            <div class="min-height-350 bg-img-hero rounded-border p-5 gradient-overlay-half-bg-gradient transition-3d-hover shadow-hover-2" style="background-image: url(assets/img/630x350/img1.jpg);">
                                <header class="w-100 d-flex justify-content-between mb-3">
                                    <div>
                                        <div class="destination pb-3 text-lh-1">
                                            <a href="../others/destination.html" class="text-white font-weight-bold font-size-21">United Kingdom</a>
                                        </div>
                                        <div class="mt-1 pt-1">
                                            <a href="../hotels/hotel-single-v1.html" class="text-white">79 Hotel</a>
                                        </div>
                                    </div>
                                </header>
                            </div>
                        </div>
                        <!-- End Card Block -->

                        <!-- Card Block -->
                        <div class="col-md-6 col-xl-3 mb-3 mb-md-4 pb-1">
                            <div class="min-height-350 bg-img-hero rounded-border p-5 gradient-overlay-half-bg-gradient transition-3d-hover shadow-hover-2" style="background-image: url(assets/img/300x350/img2.jpg);">
                                <header class="w-100 d-flex justify-content-between mb-3">
                                    <div>
                                        <div class="destination pb-3 text-lh-1">
                                            <a href="../others/destination.html" class="text-white font-weight-bold font-size-21">France</a>
                                        </div>
                                        <div class="mt-1 pt-1">
                                            <a href="../hotels/hotel-single-v1.html" class="text-white">54 Hotel</a>
                                        </div>
                                    </div>
                                </header>
                            </div>
                        </div>
                        <!-- End Card Block -->


                        <!-- Card Block -->
                        <div class="col-md-6 col-xl-3 mb-3 mb-md-4 pb-1">
                            <div class="min-height-350 bg-img-hero rounded-border p-5 gradient-overlay-half-bg-gradient transition-3d-hover shadow-hover-2" style="background-image: url(assets/img/300x350/img4.jpg);">
                                <header class="w-100 d-flex justify-content-between mb-3">
                                    <div>
                                        <div class="destination pb-3 text-lh-1">
                                            <a href="../others/destination.html" class="text-white font-weight-bold font-size-21">India</a>
                                        </div>
                                        <div class="mt-1 pt-1">
                                            <a href="../hotels/hotel-single-v1.html" class="text-white">26 Hotel</a>
                                        </div>
                                    </div>
                                </header>
                            </div>
                        </div>
                        <!-- End Card Block -->


                        <!-- Card Block -->
                        <div class="col-md-6 col-xl-3 mb-3 mb-md-4 pb-1">
                            <div class="min-height-350 bg-img-hero rounded-border p-5 gradient-overlay-half-bg-gradient transition-3d-hover shadow-hover-2" style="background-image: url(assets/img/300x350/img1.jpg);">
                                <header class="w-100 d-flex justify-content-between mb-3">
                                    <div>
                                        <div class="destination pb-3 text-lh-1">
                                            <a href="../others/destination.html" class="text-white font-weight-bold font-size-21">United States</a>
                                        </div>
                                        <div class="mt-1 pt-1">
                                            <a href="../hotels/hotel-single-v1.html" class="text-white">1991 Hotel</a>
                                        </div>
                                    </div>
                                </header>
                            </div>
                        </div>
                        <!-- End Card Block -->


                        <!-- Card Block -->
                        <div class="col-md-6 col-xl-3 mb-3 mb-md-4 pb-1">
                            <div class="min-height-350 bg-img-hero rounded-border p-5 gradient-overlay-half-bg-gradient transition-3d-hover shadow-hover-2" style="background-image: url(assets/img/300x350/img3.jpg);">
                                <header class="w-100 d-flex justify-content-between mb-3">
                                    <div>
                                        <div class="destination pb-3 text-lh-1">
                                            <a href="../others/destination.html" class="text-white font-weight-bold font-size-21">Ukraine</a>
                                        </div>
                                        <div class="mt-1 pt-1">
                                            <a href="../hotels/hotel-single-v1.html" class="text-white">269 Hotel</a>
                                        </div>
                                    </div>
                                </header>
                            </div>
                        </div>
                        <!-- End Card Block -->

                        <!-- Card Block -->
                        <div class="col-md-6 mb-3 mb-md-0">
                            <div class="min-height-350 bg-img-hero rounded-border p-5 gradient-overlay-half-bg-gradient transition-3d-hover shadow-hover-2" style="background-image: url(assets/img/630x350/img2.jpg);">
                                <header class="w-100 d-flex justify-content-between mb-3">
                                    <div>
                                        <div class="destination pb-3 text-lh-1">
                                            <a href="../others/destination.html" class="text-white font-weight-bold font-size-21">Turkey</a>
                                        </div>
                                        <div class="mt-1 pt-1">
                                            <a href="../hotels/hotel-single-v1.html" class="text-white">1205 Hotel</a>
                                        </div>
                                    </div>
                                </header>
                            </div>
                        </div>
                        <!-- End Card Block -->
                    </div>
                </div>
            </div>
            <!-- End Destinantion v4 -->

            <!--Banner v3-->
            <div class="banner-block banner-v3 dzsparallaxer auto-init height-is-based-on-content use-loading mode-scroll" data-options='{direction: "normal"}'>
                <!-- Apply your Parallax background image here ##->
                <div class="divimage dzsparallaxer--target bg-img-hero" style="height: 130%; background-image: url(assets/img/1920x500/img4.jpg);"></div>
                <div class="text-center space-3">
                    <div class="pt-xl-2 pb-xl-5 mb-xl-1">
                        <h6 class="text-gray-4 font-size-30 font-weight-bold mb-1 opacity-6">Enjoy Summer Deals</h6>
                        <h5 class="text-white font-size-40 font-weight-bold mb-5 pb-xl-1">Up to 40% Discount!</h5>
                        <a class="btn btn-outline-white border-width-2 min-width-200 font-weight-normal transition-3d-hover" href="https://madrasthemes.github.io/Hjuzati-html/html/blog/blog-list.html">Learn more</a>
                    </div>
                </div>
            </div>
            <##--End Banner v3-->

            <!-- Tabs v3 -->
            <div class="tabs-block tabs-v3">
                <div class="container space-top-1 pb-3 mb-1">
                    <div class="w-md-80 w-lg-50 text-center mx-md-auto my-3">
                        <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">Recommended Hotels</h2>
                    </div>
                    <!-- Nav Classic -->
                    <ul class="nav tab-nav-line flex-nowrap pb-4 tab-nav justify-content-lg-center text-nowrap" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link font-weight-medium active" id="pills-one-example-t3-tab" data-toggle="pill" href="#pills-one-example-t3" role="tab" aria-controls="pills-one-example-t3" aria-selected="true">
                                <div class="d-flex flex-column flex-md-row  position-relative text-dark align-items-center">
                                    <span class="tabtext font-weight-semi-bold">Sulaymaniyah</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-medium" id="pills-two-example-t3-tab" data-toggle="pill" href="#pills-two-example-t3" role="tab" aria-controls="pills-two-example-t3" aria-selected="true">
                                <div class="d-flex flex-column flex-md-row  position-relative text-dark align-items-center">
                                    <span class="tabtext font-weight-semi-bold">Erbil</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-medium" id="pills-three-example-t3-tab" data-toggle="pill" href="#pills-three-example-t3" role="tab" aria-controls="pills-three-example-t3" aria-selected="true">
                                <div class="d-flex flex-column flex-md-row  position-relative text-dark align-items-center">
                                    <span class="tabtext font-weight-semi-bold">Kerkuk</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-medium" id="pills-four-example-t3-tab" data-toggle="pill" href="#pills-four-example-t3" role="tab" aria-controls="pills-four-example-t3" aria-selected="true">
                                <div class="d-flex flex-column flex-md-row  position-relative text-dark align-items-center">
                                    <span class="tabtext font-weight-semi-bold">Dhuok</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-medium" id="pills-five-example-t3-tab" data-toggle="pill" href="#pills-five-example-t3" role="tab" aria-controls="pills-five-example-t3" aria-selected="true">
                                <div class="d-flex flex-column flex-md-row  position-relative text-dark align-items-center">
                                    <span class="tabtext font-weight-semi-bold">Zaxo</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-medium" id="pills-six-example-t3-tab" data-toggle="pill" href="#pills-six-example-t3" role="tab" aria-controls="pills-six-example-t3" aria-selected="true">
                                <div class="d-flex flex-column flex-md-row  position-relative text-dark align-items-center">
                                    <span class="tabtext font-weight-semi-bold">Baghdad</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-medium" id="pills-seven-example-t3-tab" data-toggle="pill" href="#pills-seven-example-t3" role="tab" aria-controls="pills-seven-example-t3" aria-selected="true">
                                <div class="d-flex flex-column flex-md-row  position-relative text-dark align-items-center">
                                    <span class="tabtext font-weight-semi-bold">Mosul</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- End Nav Classic -->
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="pills-one-example-t3" role="tabpanel" aria-labelledby="pills-one-example-t3-tab">
                            <div class="row">
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 tab-card h-100">
                                        <div class="position-relative">
                                            <a href="../hotels/hotel-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="card-img-top" src="assets/img/300x230/img9.jpg" alt="img">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-valentine-heart"></span>
                                              </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0 pb-3">
                                                <div class="col">
                                                    <a href="../hotels/hotel-single-v1.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Greater London, United Kingdom
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <div class="mb-2">
                                                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                    <div class="green-lighter">
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="../hotels/hotel-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">Empire Prestige Causeway Bay</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£899.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 tab-card h-100">
                                        <div class="position-relative">
                                            <a href="../hotels/hotel-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="card-img-top" src="assets/img/300x230/img10.jpg" alt="img">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-valentine-heart"></span>
                                              </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0 pb-3">
                                                <div class="col">
                                                    <a href="../hotels/hotel-single-v1.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Istanbul, Turkey
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <div class="mb-2">
                                                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                    <div class="green-lighter">
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="../hotels/hotel-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">Park Avenue Baker Street London</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£899.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 tab-card h-100">
                                        <div class="position-relative">
                                            <a href="../hotels/hotel-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="card-img-top" src="assets/img/300x230/img11.jpg" alt="img">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-valentine-heart"></span>
                                              </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0 pb-3">
                                                <div class="col">
                                                    <a href="../hotels/hotel-single-v1.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Istanbul, Turkey
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <div class="mb-2">
                                                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                    <div class="green-lighter">
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="../hotels/hotel-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">New Road Hotel</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£899.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 tab-card h-100">
                                        <div class="position-relative">
                                            <a href="../hotels/hotel-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="card-img-top" src="assets/img/300x230/img12.jpg" alt="img">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-valentine-heart"></span>
                                              </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0 pb-3">
                                                <div class="col">
                                                    <a href="../hotels/hotel-single-v1.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Istanbul, Turkey
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <div class="mb-2">
                                                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                    <div class="green-lighter">
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="../hotels/hotel-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">New York Marriott Downtown</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£899.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-two-example-t3" role="tabpanel" aria-labelledby="pills-two-example-t3-tab">
                            <div class="row">
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 tab-card h-100">
                                        <div class="position-relative">
                                            <a href="../hotels/hotel-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="card-img-top" src="assets/img/300x230/img9.jpg" alt="img">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-valentine-heart"></span>
                                              </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0 pb-3">
                                                <div class="col">
                                                    <a href="../hotels/hotel-single-v1.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Greater London, United Kingdom
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <div class="mb-2">
                                                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                    <div class="green-lighter">
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="../hotels/hotel-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">Empire Prestige Causeway Bay</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£899.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 tab-card h-100">
                                        <div class="position-relative">
                                            <a href="../hotels/hotel-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="card-img-top" src="assets/img/300x230/img12.jpg" alt="img">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-valentine-heart"></span>
                                              </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0 pb-3">
                                                <div class="col">
                                                    <a href="../hotels/hotel-single-v1.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Istanbul, Turkey
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <div class="mb-2">
                                                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                    <div class="green-lighter">
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="../hotels/hotel-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">New York Marriott Downtown</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£899.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 tab-card h-100">
                                        <div class="position-relative">
                                            <a href="../hotels/hotel-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="card-img-top" src="assets/img/300x230/img10.jpg" alt="img">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-valentine-heart"></span>
                                              </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0 pb-3">
                                                <div class="col">
                                                    <a href="../hotels/hotel-single-v1.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Istanbul, Turkey
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <div class="mb-2">
                                                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                    <div class="green-lighter">
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="../hotels/hotel-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">Park Avenue Baker Street London</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£899.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 tab-card h-100">
                                        <div class="position-relative">
                                            <a href="../hotels/hotel-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="card-img-top" src="assets/img/300x230/img11.jpg" alt="img">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-valentine-heart"></span>
                                              </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0 pb-3">
                                                <div class="col">
                                                    <a href="../hotels/hotel-single-v1.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Istanbul, Turkey
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <div class="mb-2">
                                                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                    <div class="green-lighter">
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="../hotels/hotel-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">New Road Hotel</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£899.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-three-example-t3" role="tabpanel" aria-labelledby="pills-three-example-t3-tab">
                            <div class="row">
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 tab-card h-100">
                                        <div class="position-relative">
                                            <a href="../hotels/hotel-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="card-img-top" src="assets/img/300x230/img9.jpg" alt="img">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-valentine-heart"></span>
                                              </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0 pb-3">
                                                <div class="col">
                                                    <a href="../hotels/hotel-single-v1.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Greater London, United Kingdom
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <div class="mb-2">
                                                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                    <div class="green-lighter">
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="../hotels/hotel-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">Empire Prestige Causeway Bay</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£899.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 tab-card h-100">
                                        <div class="position-relative">
                                            <a href="../hotels/hotel-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="card-img-top" src="assets/img/300x230/img10.jpg" alt="img">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-valentine-heart"></span>
                                              </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0 pb-3">
                                                <div class="col">
                                                    <a href="../hotels/hotel-single-v1.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Istanbul, Turkey
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <div class="mb-2">
                                                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                    <div class="green-lighter">
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="../hotels/hotel-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">Park Avenue Baker Street London</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£899.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 tab-card h-100">
                                        <div class="position-relative">
                                            <a href="../hotels/hotel-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="card-img-top" src="assets/img/300x230/img11.jpg" alt="img">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-valentine-heart"></span>
                                              </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0 pb-3">
                                                <div class="col">
                                                    <a href="../hotels/hotel-single-v1.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Istanbul, Turkey
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <div class="mb-2">
                                                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                    <div class="green-lighter">
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="../hotels/hotel-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">New Road Hotel</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£899.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 tab-card h-100">
                                        <div class="position-relative">
                                            <a href="../hotels/hotel-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="card-img-top" src="assets/img/300x230/img12.jpg" alt="img">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-valentine-heart"></span>
                                              </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0 pb-3">
                                                <div class="col">
                                                    <a href="../hotels/hotel-single-v1.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Istanbul, Turkey
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <div class="mb-2">
                                                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                    <div class="green-lighter">
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="../hotels/hotel-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">New York Marriott Downtown</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£899.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-four-example-t3" role="tabpanel" aria-labelledby="pills-four-example-t3-tab">
                            <div class="row">
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 tab-card h-100">
                                        <div class="position-relative">
                                            <a href="../hotels/hotel-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="card-img-top" src="assets/img/300x230/img9.jpg" alt="img">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-valentine-heart"></span>
                                              </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0 pb-3">
                                                <div class="col">
                                                    <a href="../hotels/hotel-single-v1.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Greater London, United Kingdom
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <div class="mb-2">
                                                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                    <div class="green-lighter">
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="../hotels/hotel-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">Empire Prestige Causeway Bay</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£899.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 tab-card h-100">
                                        <div class="position-relative">
                                            <a href="../hotels/hotel-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="card-img-top" src="assets/img/300x230/img11.jpg" alt="img">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-valentine-heart"></span>
                                              </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0 pb-3">
                                                <div class="col">
                                                    <a href="../hotels/hotel-single-v1.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Istanbul, Turkey
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <div class="mb-2">
                                                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                    <div class="green-lighter">
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="../hotels/hotel-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">New Road Hotel</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£899.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 tab-card h-100">
                                        <div class="position-relative">
                                            <a href="../hotels/hotel-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="card-img-top" src="assets/img/300x230/img10.jpg" alt="img">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-valentine-heart"></span>
                                              </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0 pb-3">
                                                <div class="col">
                                                    <a href="../hotels/hotel-single-v1.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Istanbul, Turkey
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <div class="mb-2">
                                                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                    <div class="green-lighter">
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="../hotels/hotel-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">Park Avenue Baker Street London</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£899.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 tab-card h-100">
                                        <div class="position-relative">
                                            <a href="../hotels/hotel-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="card-img-top" src="assets/img/300x230/img12.jpg" alt="img">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-valentine-heart"></span>
                                              </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0 pb-3">
                                                <div class="col">
                                                    <a href="../hotels/hotel-single-v1.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Istanbul, Turkey
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <div class="mb-2">
                                                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                    <div class="green-lighter">
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="../hotels/hotel-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">New York Marriott Downtown</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£899.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-five-example-t3" role="tabpanel" aria-labelledby="pills-five-example-t3-tab">
                            <div class="row">
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 tab-card h-100">
                                        <div class="position-relative">
                                            <a href="../hotels/hotel-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="card-img-top" src="assets/img/300x230/img10.jpg" alt="img">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-valentine-heart"></span>
                                              </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0 pb-3">
                                                <div class="col">
                                                    <a href="../hotels/hotel-single-v1.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Istanbul, Turkey
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <div class="mb-2">
                                                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                    <div class="green-lighter">
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="../hotels/hotel-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">Park Avenue Baker Street London</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£899.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 tab-card h-100">
                                        <div class="position-relative">
                                            <a href="../hotels/hotel-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="card-img-top" src="assets/img/300x230/img9.jpg" alt="img">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-valentine-heart"></span>
                                              </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0 pb-3">
                                                <div class="col">
                                                    <a href="../hotels/hotel-single-v1.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Greater London, United Kingdom
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <div class="mb-2">
                                                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                    <div class="green-lighter">
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="../hotels/hotel-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">Empire Prestige Causeway Bay</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£899.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 tab-card h-100">
                                        <div class="position-relative">
                                            <a href="../hotels/hotel-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="card-img-top" src="assets/img/300x230/img11.jpg" alt="img">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-valentine-heart"></span>
                                              </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0 pb-3">
                                                <div class="col">
                                                    <a href="../hotels/hotel-single-v1.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Istanbul, Turkey
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <div class="mb-2">
                                                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                    <div class="green-lighter">
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="../hotels/hotel-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">New Road Hotel</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£899.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 tab-card h-100">
                                        <div class="position-relative">
                                            <a href="../hotels/hotel-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="card-img-top" src="assets/img/300x230/img12.jpg" alt="img">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-valentine-heart"></span>
                                              </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0 pb-3">
                                                <div class="col">
                                                    <a href="../hotels/hotel-single-v1.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Istanbul, Turkey
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <div class="mb-2">
                                                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                    <div class="green-lighter">
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="../hotels/hotel-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">New York Marriott Downtown</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£899.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-six-example-t3" role="tabpanel" aria-labelledby="pills-six-example-t3-tab">
                            <div class="row">
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 tab-card h-100">
                                        <div class="position-relative">
                                            <a href="../hotels/hotel-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="card-img-top" src="assets/img/300x230/img11.jpg" alt="img">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-valentine-heart"></span>
                                              </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0 pb-3">
                                                <div class="col">
                                                    <a href="../hotels/hotel-single-v1.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Istanbul, Turkey
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <div class="mb-2">
                                                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                    <div class="green-lighter">
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="../hotels/hotel-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">New Road Hotel</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£899.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 tab-card h-100">
                                        <div class="position-relative">
                                            <a href="../hotels/hotel-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="card-img-top" src="assets/img/300x230/img9.jpg" alt="img">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-valentine-heart"></span>
                                              </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0 pb-3">
                                                <div class="col">
                                                    <a href="../hotels/hotel-single-v1.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Greater London, United Kingdom
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <div class="mb-2">
                                                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                    <div class="green-lighter">
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="../hotels/hotel-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">Empire Prestige Causeway Bay</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£899.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 tab-card h-100">
                                        <div class="position-relative">
                                            <a href="../hotels/hotel-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="card-img-top" src="assets/img/300x230/img10.jpg" alt="img">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-valentine-heart"></span>
                                              </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0 pb-3">
                                                <div class="col">
                                                    <a href="../hotels/hotel-single-v1.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Istanbul, Turkey
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <div class="mb-2">
                                                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                    <div class="green-lighter">
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="../hotels/hotel-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">Park Avenue Baker Street London</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£899.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 tab-card h-100">
                                        <div class="position-relative">
                                            <a href="../hotels/hotel-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="card-img-top" src="assets/img/300x230/img12.jpg" alt="img">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-valentine-heart"></span>
                                              </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0 pb-3">
                                                <div class="col">
                                                    <a href="../hotels/hotel-single-v1.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Istanbul, Turkey
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <div class="mb-2">
                                                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                    <div class="green-lighter">
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="../hotels/hotel-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">New York Marriott Downtown</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£899.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-seven-example-t3" role="tabpanel" aria-labelledby="pills-seven-example-t3-tab">
                            <div class="row">
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 tab-card h-100">
                                        <div class="position-relative">
                                            <a href="../hotels/hotel-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="card-img-top" src="assets/img/300x230/img12.jpg" alt="img">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-valentine-heart"></span>
                                              </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0 pb-3">
                                                <div class="col">
                                                    <a href="../hotels/hotel-single-v1.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Istanbul, Turkey
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <div class="mb-2">
                                                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                    <div class="green-lighter">
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="../hotels/hotel-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">New York Marriott Downtown</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£899.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 tab-card h-100">
                                        <div class="position-relative">
                                            <a href="../hotels/hotel-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="card-img-top" src="assets/img/300x230/img9.jpg" alt="img">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-valentine-heart"></span>
                                              </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0 pb-3">
                                                <div class="col">
                                                    <a href="../hotels/hotel-single-v1.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Greater London, United Kingdom
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <div class="mb-2">
                                                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                    <div class="green-lighter">
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="../hotels/hotel-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">Empire Prestige Causeway Bay</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£899.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 tab-card h-100">
                                        <div class="position-relative">
                                            <a href="../hotels/hotel-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="card-img-top" src="assets/img/300x230/img10.jpg" alt="img">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-valentine-heart"></span>
                                              </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0 pb-3">
                                                <div class="col">
                                                    <a href="../hotels/hotel-single-v1.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Istanbul, Turkey
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <div class="mb-2">
                                                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                    <div class="green-lighter">
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="../hotels/hotel-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">Park Avenue Baker Street London</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£899.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 tab-card h-100">
                                        <div class="position-relative">
                                            <a href="../hotels/hotel-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="card-img-top" src="assets/img/300x230/img11.jpg" alt="img">
                                            </a>
                                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-valentine-heart"></span>
                                              </button>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0 pb-3">
                                                <div class="col">
                                                    <a href="../hotels/hotel-single-v1.html" class="d-block">
                                                        <div class="d-flex align-items-center font-size-14 text-white">
                                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Istanbul, Turkey
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <div class="mb-2">
                                                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                    <div class="green-lighter">
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                        <small class="fad fa-star"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="../hotels/hotel-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">New Road Hotel</a>
                                            <div class="mt-2 mb-3">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£899.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Tabs v3 -->

            <!-- Icon Block v1 -->
            <div class="icon-block-center icon-center-v1 border-bottom border-color-8">
                <div class="container text-center space-bottom-1">
                    <!-- Title -->
                    <div class="w-md-80 w-lg-50 text-center mx-md-auto pb-1">
                        <h2 class="section-title text-black font-size-30 font-weight-bold">Why Choose</h2>
                    </div>
                    <!-- End Title -->

                    <!-- Features -->
                    <div class="mb-2">
                        <div class="row">
                            <!-- Icon Block -->
                            <div class="col-md-4">
                                <i class="flaticon-price text-primary font-size-80 mb-3"></i>
                                <h5 class="font-size-17 text-dark font-weight-bold mb-2"><a href="#">Competitive Pricing</a></h5>
                                <p class="text-gray-1 px-xl-2 px-uw-7">With 500+ suppliers and the purchasing power of 300 million members, Hjuzati.com can save you more!</p>
                            </div>
                            <!-- End Icon Block -->

                            <!-- Icon Block -->
                            <div class="col-md-4">
                                <i class="flaticon-medal text-primary font-size-80 mb-3"></i>
                                <h5 class="font-size-17 text-dark font-weight-bold mb-2"><a href="#">Award-Winning Service</a></h5>
                                <p class="text-gray-1 px-xl-2 px-uw-7">Travel worry-free knowing that we're here if you needus, 24 hours a day</p>
                            </div>
                            <!-- End Icon Block -->

                            <!-- Icon Block -->
                            <div class="col-md-4">
                                <i class="flaticon-global-1 text-primary font-size-80 mb-3"></i>
                                <h5 class="font-size-17 text-dark font-weight-bold mb-2"><a href="#">Worldwide Coverage</a></h5>
                                <p class="text-gray-1 px-xl-2 px-uw-7">Over 1,200,000 hotels in more than 200 countries and regions & flights to over 5,000 cities</p>
                            </div>
                            <!-- End Icon Block -->
                        </div>
                    </div>
                    <!-- End Features -->
                </div>
            </div>
            <!-- End Icon Block v1 -->
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
        <script src="assets/vendor/dzsparallaxer/dzsparallaxer.js"></script>

        <!-- JS Hjuzati -->
        <script src="assets/js/hs.core.js"></script>
        <script src="assets/js/components/hs.header.js"></script>
        <script src="assets/js/components/hs.unfold.js"></script>
        <script src="assets/js/components/hs.validation.js"></script>
        <script src="assets/js/components/hs.show-animation.js"></script>
        <script src="assets/js/components/hs.range-datepicker.js"></script>
        <script src="assets/js/components/hs.selectpicker.js"></script>
        <script src="assets/js/components/hs.go-to.js"></script>
        <script src="assets/js/components/hs.slick-carousel.js"></script>
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

                // initialization of go to
                $.HSCore.components.HSGoTo.init('.js-go-to');
            });
        </script>
    </body>

<!-- Mirrored from madrasthemes.github.io/Hjuzati-html/html/home/home-v4.html  Copier/3.x [XR&CO'2014], Wed, 11 Mar 2020 15:11:17 GMT -->
</html>
    