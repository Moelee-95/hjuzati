<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from madrasthemes.github.io/mytravel-html/html/home/home-v7.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Mar 2020 15:11:21 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
        <!-- Title -->
        <title>Home v7 | MyTravel - Responsive Website Template</title>
        <?php include('sections/head.html'); ?>
    </head>
    <body>
       <!-- ========== HEADER ========== -->
        <?php include('sections/header.php'); ?>
        <!-- ========== END HEADER ========== -->

        <!-- ========== MAIN CONTENT ========== -->
        <main id="content">
            <!-- ========== HERO ========== -->
            <div class="hero-block hero-v6 bg-img-hero-bottom gradient-overlay-half-bg-charcoal-gray text-center z-index-2" style="background-image: url(assets/img/1920x750/img3.jpg);">
                <div class="container space-2 space-top-xl-6">
                    <div class="justify-content-md-center py-xl-10">
                        <!-- Info -->
                        <div class="pb-lg-11 mb-7">
                            <h1 class="font-size-60 font-size-xs-30 text-white font-weight-bold">Find your next rental</h1>
                            <p class="font-size-20 font-weight-normal text-white">Book experiences you’ll want to tell the world about</p>
                        </div>
                        <!-- End Info -->
                    </div>
                    <div class="mb-lg-n16">
                        <div class="card border-0 tab-shadow">
                            <div class="card-body">
                                <form class="js-validate">
                                  <div class="row d-block nav-select d-lg-flex mb-lg-3 px-2 px-lg-3">
                                    <div class="col-sm-12 col-lg-3dot6 col-xl-3dot7 mb-4 mb-lg-0 ">
                                        <span class="d-block text-gray-1 font-weight-normal text-left mb-0">Destination or Hotel Name</span>
                                        <!-- Select -->
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
                                        <span class="d-block text-gray-1 text-left font-weight-normal mb-0">Guests</span>
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
                                            <span class="text-black font-size-16 font-weight-semi-bold">1 Adult - 0 Child</span>
                                        </a>
                                        <div id="basicDropdownClick" class="dropdown-menu dropdown-unfold col-11 m-0" aria-labelledby="basicDropdownClickInvoker">
                                            <div class="w-100 py-2 px-3 mb-3">
                                                <div class="js-quantity mx-3 row align-items-center justify-content-between">
                                                    <span class="d-block font-size-16 text-secondary font-weight-medium">Adults</span>
                                                    <div class="d-flex">
                                                        <a class="js-minus btn btn-icon btn-medium btn-outline-secondary rounded-circle" href="javascript:;">
                                                            <small class="fas fa-minus btn-icon__inner"></small>
                                                        </a>
                                                        <input class="js-result form-control h-auto border-0 rounded p-0 max-width-6 text-center" type="text" value="1">
                                                        <a class="js-plus btn btn-icon btn-medium btn-outline-secondary rounded-circle" href="javascript:;">
                                                            <small class="fas fa-plus btn-icon__inner"></small>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-100 py-2 px-3">
                                                <div class="js-quantity mx-3 row align-items-center justify-content-between">
                                                    <span class="d-block font-size-16 text-secondary font-weight-medium">Child</span>
                                                    <div class="d-flex">
                                                        <a class="js-minus btn btn-icon btn-medium btn-outline-secondary rounded-circle" href="javascript:;">
                                                            <small class="fas fa-minus btn-icon__inner"></small>
                                                        </a>
                                                        <input class="js-result form-control h-auto border-0 rounded p-0 max-width-6 text-center" type="text" value="1">
                                                        <a class="js-plus btn btn-icon btn-medium btn-outline-secondary rounded-circle" href="javascript:;">
                                                            <small class="fas fa-plus btn-icon__inner"></small>
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
                    </div>
                </div>
            </div>
            <!-- ========== END HERO ========== -->

            <!-- Category v1 -->
            <div class="category-block category-v1 bg-gray-2">
                <div class="container space-2">
                    <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-5 mt-lg-10">
                        <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">Find a Home Type</h2>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6 col-xl-3">
                            <div class="rounded-xs mb-5 mb-xl-0">
                                <a class="d-block" href="../rental/rental-list.html">
                                    <div class="bg-img-hero gradient-overlay-half-bg-white transition-3d-hover shadow-hover-2 max-height-200" style="background-image: url(assets/img/307x200/img1.jpg);">
                                        <div class="text-center py-5">
                                            <i class="flaticon-house-1 font-size-50 text-red-lighter-1"></i>
                                            <h6 class="font-size-17 font-weight-bold text-gray-3 mt-2">Modern Villa</h6>
                                            <span class="font-size-14 font-weight-normal text-gray-1">07 Listings</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="rounded-xs mb-5 mb-xl-0">
                                <a class="d-block" href="../rental/rental-list.html">
                                    <div class="bg-img-hero gradient-overlay-half-bg-white transition-3d-hover shadow-hover-2 max-height-200" style="background-image: url(assets/img/307x200/img1.jpg);">
                                        <div class="text-center py-5">
                                            <i class="flaticon-house font-size-50 text-red-lighter-1"></i>
                                            <h6 class="font-size-17 font-weight-bold text-gray-3 mt-2">Family House</h6>
                                            <span class="font-size-14 font-weight-normal text-gray-1">58 Listings</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="rounded-xs mb-5 mb-xl-0">
                                <a class="d-block" href="../rental/rental-list.html">
                                    <div class="bg-img-hero gradient-overlay-half-bg-white transition-3d-hover shadow-hover-2 max-height-200" style="background-image: url(assets/img/307x200/img1.jpg);">
                                        <div class="text-center py-5">
                                            <i class="flaticon-modern-house font-size-50 text-red-lighter-1"></i>
                                            <h6 class="font-size-17 font-weight-bold text-gray-3 mt-2">Town House</h6>
                                            <span class="font-size-14 font-weight-normal text-gray-1">07 Listings</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="rounded-xs">
                                <a class="d-block" href="../rental/rental-list.html">
                                    <div class="bg-img-hero gradient-overlay-half-bg-white transition-3d-hover shadow-hover-2 max-height-200" style="background-image: url(assets/img/307x200/img1.jpg);">
                                        <div class="text-center py-5">
                                            <i class="flaticon-apartment font-size-50 text-red-lighter-1"></i>
                                            <h6 class="font-size-17 font-weight-bold text-gray-3 mt-2">Apartment</h6>
                                            <span class="font-size-14 font-weight-normal text-gray-1">07 Listings</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Category v1 -->

            <!-- Product Cards carousel -->
            <div class="product-card-carousel-block product-card-carousel-v3">
                <div class="container space-1">
                    <div class="w-md-80 w-lg-50 text-center mx-md-auto mt-3">
                        <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">Trending Rental</h2>
                    </div>
                    <div class="js-slick-carousel u-slick u-slick--equal-height u-slick--gutters-3 mb-4 pb-1"
                        data-slides-show="4"
                        data-slides-scroll="1"
                        data-arrows-classes="d-none d-xl-inline-block u-slick__arrow-classic v1 u-slick__arrow-classic--v1 u-slick__arrow-centered--y rounded-circle"
                        data-arrow-left-classes="fas fa-chevron-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left"
                        data-arrow-right-classes="fas fa-chevron-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right"
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
                                    <a href="../rental/rental-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="card-img-top" src="assets/img/300x230/img17.jpg" alt="Image description">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-5 pr-3">
                                      <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                        <span class="flaticon-heart-1 font-size-20"></span>
                                      </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-3 pb-2">
                                        <a href="../rental/rental-single-v1.html">
                                            <span class="text-white font-weight-bold font-size-17">Comfortable Office Space</span>
                                        </a>
                                            <div class="text-white my-2">
                                                <span class="mr-1 font-size-14">From</span>
                                                <span class="font-weight-bold font-size-19">£899.00</span>
                                                <span class="font-size-14"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="position-absolute top-0 left-0 pt-5 pl-3">
                                <a href="../rental/rental-single-v1.html">
                                    <span class="badge badge-pill bg-white text-primary px-3 py-2 font-size-14 font-weight-normal">Featured</span>
                                </a>
                                </div>
                                <div class="card-body px-4 py-3 border-bottom">
                                    <a href="../rental/rental-single-v1.html" class="d-block">
                                        <div class="d-flex align-items-center font-size-14 text-gray-1">
                                            <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom
                                        </div>
                                    </a>
                                    <div class="mt-1">
                                        <span class="py-1 font-size-14 border-radius-3 font-weight-normal pagination-v2-arrow-color">2.5/5 Excellent</span>
                                        <span class="font-size-14 text-gray-1 ml-2">48 reviews</span>
                                    </div>
                                </div>
                                <div class="px-4 pt-3 pb-2">
                                    <div class="row">
                                        <div class="col-6">
                                            <ul class="list-unstyled mb-0">
                                                <li class="media mb-2 text-gray-1 align-items-center">
                                                    <small class="mr-2">
                                                        <small class="flaticon-plans font-size-16"></small>
                                                    </small>
                                                    <div class="media-body font-size-1">
                                                        4800 sq ft
                                                    </div>
                                                </li>
                                                <li class="media mb-2 text-gray-1 align-items-center">
                                                    <small class="mr-2">
                                                        <small class="flaticon-bathtub font-size-16"></small>
                                                    </small>
                                                    <div class="media-body font-size-1">
                                                        2 Bathrooms
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="list-unstyled mb-0">
                                                <li class="media mb-2 text-gray-1 align-items-center">
                                                    <small class="mr-2">
                                                        <small class="flaticon-door font-size-16"></small>
                                                    </small>
                                                    <div class="media-body font-size-1">
                                                        4 Rooms
                                                    </div>
                                                </li>
                                                <li class="media mb-2 text-gray-1 align-items-center">
                                                    <small class="mr-2">
                                                        <small class="flaticon-bed-1 font-size-16"></small>
                                                    </small>
                                                    <div class="media-body font-size-1">
                                                        6 Beds
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="js-slide mt-5">
                            <div class="card transition-3d-hover shadow-hover-2 w-100 h-100">
                                <div class="position-relative">
                                    <a href="../rental/rental-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="card-img-top" src="assets/img/300x230/img18.jpg" alt="Image description">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-5 pr-3">
                                      <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                        <span class="flaticon-heart-1 font-size-20"></span>
                                      </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-3 pb-2">
                                        <a href="../rental/rental-single-v1.html">
                                            <span class="text-white font-weight-bold font-size-17">Comfortable Office Space</span>
                                        </a>
                                            <div class="text-white my-2">
                                                <span class="mr-1 font-size-14">From</span>
                                                <span class="font-weight-bold font-size-19">£899.00</span>
                                                <span class="font-size-14"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="position-absolute top-0 left-0 pt-5 pl-3">
                                <a href="../rental/rental-single-v1.html">
                                    <span class="badge badge-pill bg-white text-primary px-3 py-2 font-size-14 font-weight-normal">Featured</span>
                                </a>
                                </div>
                                <div class="card-body px-4 py-3 border-bottom">
                                    <a href="../rental/rental-single-v1.html" class="d-block">
                                        <div class="d-flex align-items-center font-size-14 text-gray-1">
                                            <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom
                                        </div>
                                    </a>
                                    <div class="mt-1">
                                        <span class="py-1 font-size-14 border-radius-3 font-weight-normal pagination-v2-arrow-color">2.5/5 Excellent</span>
                                        <span class="font-size-14 text-gray-1 ml-2">48 reviews</span>
                                    </div>
                                </div>
                                <div class="px-4 pt-3 pb-2">
                                    <div class="row">
                                        <div class="col-6">
                                            <ul class="list-unstyled mb-0">
                                                <li class="media mb-2 text-gray-1 align-items-center">
                                                    <small class="mr-2">
                                                        <small class="flaticon-plans font-size-16"></small>
                                                    </small>
                                                    <div class="media-body font-size-1">
                                                        4800 sq ft
                                                    </div>
                                                </li>
                                                <li class="media mb-2 text-gray-1 align-items-center">
                                                    <small class="mr-2">
                                                        <small class="flaticon-bathtub font-size-16"></small>
                                                    </small>
                                                    <div class="media-body font-size-1">
                                                        2 Bathrooms
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="list-unstyled mb-0">
                                                <li class="media mb-2 text-gray-1 align-items-center">
                                                    <small class="mr-2">
                                                        <small class="flaticon-door font-size-16"></small>
                                                    </small>
                                                    <div class="media-body font-size-1">
                                                        4 Rooms
                                                    </div>
                                                </li>
                                                <li class="media mb-2 text-gray-1 align-items-center">
                                                    <small class="mr-2">
                                                        <small class="flaticon-bed-1 font-size-16"></small>
                                                    </small>
                                                    <div class="media-body font-size-1">
                                                        6 Beds
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="js-slide mt-5">
                            <div class="card transition-3d-hover shadow-hover-2 w-100 h-100">
                                <div class="position-relative">
                                    <a href="../rental/rental-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="card-img-top" src="assets/img/300x230/img19.jpg" alt="Image description">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-5 pr-3">
                                      <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                        <span class="flaticon-heart-1 font-size-20"></span>
                                      </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-3 pb-2">
                                        <a href="../rental/rental-single-v1.html">
                                            <span class="text-white font-weight-bold font-size-17">Comfortable Office Space</span>
                                        </a>
                                            <div class="text-white my-2">
                                                <span class="mr-1 font-size-14">From</span>
                                                <span class="font-weight-bold font-size-19">£899.00</span>
                                                <span class="font-size-14"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="position-absolute top-0 left-0 pt-5 pl-3">
                                <a href="../rental/rental-single-v1.html">
                                    <span class="badge badge-pill bg-white text-primary px-3 py-2 font-size-14 font-weight-normal">Featured</span>
                                </a>
                                </div>
                                <div class="card-body px-4 py-3 border-bottom">
                                    <a href="../rental/rental-single-v1.html" class="d-block">
                                        <div class="d-flex align-items-center font-size-14 text-gray-1">
                                            <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom
                                        </div>
                                    </a>
                                    <div class="mt-1">
                                        <span class="py-1 font-size-14 border-radius-3 font-weight-normal pagination-v2-arrow-color">2.5/5 Excellent</span>
                                        <span class="font-size-14 text-gray-1 ml-2">48 reviews</span>
                                    </div>
                                </div>
                                <div class="px-4 pt-3 pb-2">
                                    <div class="row">
                                        <div class="col-6">
                                            <ul class="list-unstyled mb-0">
                                                <li class="media mb-2 text-gray-1 align-items-center">
                                                    <small class="mr-2">
                                                        <small class="flaticon-plans font-size-16"></small>
                                                    </small>
                                                    <div class="media-body font-size-1">
                                                        4800 sq ft
                                                    </div>
                                                </li>
                                                <li class="media mb-2 text-gray-1 align-items-center">
                                                    <small class="mr-2">
                                                        <small class="flaticon-bathtub font-size-16"></small>
                                                    </small>
                                                    <div class="media-body font-size-1">
                                                        2 Bathrooms
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="list-unstyled mb-0">
                                                <li class="media mb-2 text-gray-1 align-items-center">
                                                    <small class="mr-2">
                                                        <small class="flaticon-door font-size-16"></small>
                                                    </small>
                                                    <div class="media-body font-size-1">
                                                        4 Rooms
                                                    </div>
                                                </li>
                                                <li class="media mb-2 text-gray-1 align-items-center">
                                                    <small class="mr-2">
                                                        <small class="flaticon-bed-1 font-size-16"></small>
                                                    </small>
                                                    <div class="media-body font-size-1">
                                                        6 Beds
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="js-slide mt-5">
                            <div class="card transition-3d-hover shadow-hover-2 w-100 h-100">
                                <div class="position-relative">
                                    <a href="../rental/rental-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="card-img-top" src="assets/img/300x230/img2.jpg" alt="Image description">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-5 pr-3">
                                      <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                        <span class="flaticon-heart-1 font-size-20"></span>
                                      </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-3 pb-2">
                                        <a href="../rental/rental-single-v1.html">
                                            <span class="text-white font-weight-bold font-size-17">Comfortable Office Space</span>
                                        </a>
                                            <div class="text-white my-2">
                                                <span class="mr-1 font-size-14">From</span>
                                                <span class="font-weight-bold font-size-19">£899.00</span>
                                                <span class="font-size-14"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="position-absolute top-0 left-0 pt-5 pl-3">
                                <a href="../rental/rental-single-v1.html">
                                    <span class="badge badge-pill bg-white text-primary px-3 py-2 font-size-14 font-weight-normal">Featured</span>
                                </a>
                                </div>
                                <div class="card-body px-4 py-3 border-bottom">
                                    <a href="../rental/rental-single-v1.html" class="d-block">
                                        <div class="d-flex align-items-center font-size-14 text-gray-1">
                                            <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom
                                        </div>
                                    </a>
                                    <div class="mt-1">
                                        <span class="py-1 font-size-14 border-radius-3 font-weight-normal pagination-v2-arrow-color">2.5/5 Excellent</span>
                                        <span class="font-size-14 text-gray-1 ml-2">48 reviews</span>
                                    </div>
                                </div>
                                <div class="px-4 pt-3 pb-2">
                                    <div class="row">
                                        <div class="col-6">
                                            <ul class="list-unstyled mb-0">
                                                <li class="media mb-2 text-gray-1 align-items-center">
                                                    <small class="mr-2">
                                                        <small class="flaticon-plans font-size-16"></small>
                                                    </small>
                                                    <div class="media-body font-size-1">
                                                        4800 sq ft
                                                    </div>
                                                </li>
                                                <li class="media mb-2 text-gray-1 align-items-center">
                                                    <small class="mr-2">
                                                        <small class="flaticon-bathtub font-size-16"></small>
                                                    </small>
                                                    <div class="media-body font-size-1">
                                                        2 Bathrooms
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="list-unstyled mb-0">
                                                <li class="media mb-2 text-gray-1 align-items-center">
                                                    <small class="mr-2">
                                                        <small class="flaticon-door font-size-16"></small>
                                                    </small>
                                                    <div class="media-body font-size-1">
                                                        4 Rooms
                                                    </div>
                                                </li>
                                                <li class="media mb-2 text-gray-1 align-items-center">
                                                    <small class="mr-2">
                                                        <small class="flaticon-bed-1 font-size-16"></small>
                                                    </small>
                                                    <div class="media-body font-size-1">
                                                        6 Beds
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="js-slide mt-5">
                            <div class="card transition-3d-hover shadow-hover-2 w-100 h-100">
                                <div class="position-relative">
                                    <a href="../rental/rental-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="card-img-top" src="assets/img/300x230/img17.jpg" alt="Image description">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-5 pr-3">
                                      <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                        <span class="flaticon-heart-1 font-size-20"></span>
                                      </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-3 pb-2">
                                        <a href="../rental/rental-single-v1.html">
                                            <span class="text-white font-weight-bold font-size-17">Comfortable Office Space</span>
                                        </a>
                                            <div class="text-white my-2">
                                                <span class="mr-1 font-size-14">From</span>
                                                <span class="font-weight-bold font-size-19">£899.00</span>
                                                <span class="font-size-14"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="position-absolute top-0 left-0 pt-5 pl-3">
                                <a href="../rental/rental-single-v1.html">
                                    <span class="badge badge-pill bg-white text-primary px-3 py-2 font-size-14 font-weight-normal">Featured</span>
                                </a>
                                </div>
                                <div class="card-body px-4 py-3 border-bottom">
                                    <a href="../rental/rental-single-v1.html" class="d-block">
                                        <div class="d-flex align-items-center font-size-14 text-gray-1">
                                            <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom
                                        </div>
                                    </a>
                                    <div class="mt-1">
                                        <span class="py-1 font-size-14 border-radius-3 font-weight-normal pagination-v2-arrow-color">2.5/5 Excellent</span>
                                        <span class="font-size-14 text-gray-1 ml-2">48 reviews</span>
                                    </div>
                                </div>
                                <div class="px-4 pt-3 pb-2">
                                    <div class="row">
                                        <div class="col-6">
                                            <ul class="list-unstyled mb-0">
                                                <li class="media mb-2 text-gray-1 align-items-center">
                                                    <small class="mr-2">
                                                        <small class="flaticon-plans font-size-16"></small>
                                                    </small>
                                                    <div class="media-body font-size-1">
                                                        4800 sq ft
                                                    </div>
                                                </li>
                                                <li class="media mb-2 text-gray-1 align-items-center">
                                                    <small class="mr-2">
                                                        <small class="flaticon-bathtub font-size-16"></small>
                                                    </small>
                                                    <div class="media-body font-size-1">
                                                        2 Bathrooms
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="list-unstyled mb-0">
                                                <li class="media mb-2 text-gray-1 align-items-center">
                                                    <small class="mr-2">
                                                        <small class="flaticon-door font-size-16"></small>
                                                    </small>
                                                    <div class="media-body font-size-1">
                                                        4 Rooms
                                                    </div>
                                                </li>
                                                <li class="media mb-2 text-gray-1 align-items-center">
                                                    <small class="mr-2">
                                                        <small class="flaticon-bed-1 font-size-16"></small>
                                                    </small>
                                                    <div class="media-body font-size-1">
                                                        6 Beds
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="js-slide mt-5">
                            <div class="card transition-3d-hover shadow-hover-2 w-100 h-100">
                                <div class="position-relative">
                                    <a href="../rental/rental-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="card-img-top" src="assets/img/300x230/img18.jpg" alt="Image description">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-5 pr-3">
                                      <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                        <span class="flaticon-heart-1 font-size-20"></span>
                                      </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-3 pb-2">
                                        <a href="../rental/rental-single-v1.html">
                                            <span class="text-white font-weight-bold font-size-17">Comfortable Office Space</span>
                                        </a>
                                            <div class="text-white my-2">
                                                <span class="mr-1 font-size-14">From</span>
                                                <span class="font-weight-bold font-size-19">£899.00</span>
                                                <span class="font-size-14"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="position-absolute top-0 left-0 pt-5 pl-3">
                                <a href="../rental/rental-single-v1.html">
                                    <span class="badge badge-pill bg-white text-primary px-3 py-2 font-size-14 font-weight-normal">Featured</span>
                                </a>
                                </div>
                                <div class="card-body px-4 py-3 border-bottom">
                                    <a href="../rental/rental-single-v1.html" class="d-block">
                                        <div class="d-flex align-items-center font-size-14 text-gray-1">
                                            <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom
                                        </div>
                                    </a>
                                    <div class="mt-1">
                                        <span class="py-1 font-size-14 border-radius-3 font-weight-normal pagination-v2-arrow-color">2.5/5 Excellent</span>
                                        <span class="font-size-14 text-gray-1 ml-2">48 reviews</span>
                                    </div>
                                </div>
                                <div class="px-4 pt-3 pb-2">
                                    <div class="row">
                                        <div class="col-6">
                                            <ul class="list-unstyled mb-0">
                                                <li class="media mb-2 text-gray-1 align-items-center">
                                                    <small class="mr-2">
                                                        <small class="flaticon-plans font-size-16"></small>
                                                    </small>
                                                    <div class="media-body font-size-1">
                                                        4800 sq ft
                                                    </div>
                                                </li>
                                                <li class="media mb-2 text-gray-1 align-items-center">
                                                    <small class="mr-2">
                                                        <small class="flaticon-bathtub font-size-16"></small>
                                                    </small>
                                                    <div class="media-body font-size-1">
                                                        2 Bathrooms
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="list-unstyled mb-0">
                                                <li class="media mb-2 text-gray-1 align-items-center">
                                                    <small class="mr-2">
                                                        <small class="flaticon-door font-size-16"></small>
                                                    </small>
                                                    <div class="media-body font-size-1">
                                                        4 Rooms
                                                    </div>
                                                </li>
                                                <li class="media mb-2 text-gray-1 align-items-center">
                                                    <small class="mr-2">
                                                        <small class="flaticon-bed-1 font-size-16"></small>
                                                    </small>
                                                    <div class="media-body font-size-1">
                                                        6 Beds
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Cards carousel -->

            <!-- Banner v6 -->
            <div class="banner-block banner-v6">
                <div class="dzsparallaxer auto-init height-is-based-on-content use-loading mode-scroll" data-options='{direction: "normal"}'>
                    <!-- Apply your Parallax background image here -->
                    <div class="divimage dzsparallaxer--target" style="height: 130%; background-image: url(assets/img/1920x500/img7.jpg);"></div>
                    <div class="container text-center space-2 space-md-3">
                        <div class="pb-3 mb-1 space-top-lg-1 mt-2">
                            <h5 class="text-white font-size-40 font-weight-bold mb-1">Airbnb plus places to stay</h5>
                            <p class="text-white font-weight-normal mb-3 mb-lg-6">A selection of places to stay verified for quality and design</p>
                            <a class="btn btn-outline-white border-width-2 rounded-xs min-width-200 font-weight-normal transition-3d-hover" href="https://madrasthemes.github.io/mytravel-html/html/blog/blog-single.html">Explore Stays</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Banner v6 -->

            <!-- Destinantion v7 -->
            <div class="destination-carousel-block destination-carousel-v7">
                <div class="container space-top-1">
                    <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-5 mt-3">
                        <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">Top Destination</h2>
                    </div>
                    <div class="js-slick-carousel u-slick u-slick--gutters-3"
                         data-slides-show="4"
                         data-slides-scroll="1"
                         data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic v1 u-slick__arrow-classic--v1 u-slick__arrow-centered--y rounded-circle"
                         data-arrow-left-classes="fas fa-chevron-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left"
                         data-arrow-right-classes="fas fa-chevron-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right"
                         data-pagi-classes="d-lg-none text-center u-slick__pagination mt-4"
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


                        <!-- Card Block -->
                        <div class="js-slide bg-img-hero-center rounded-border min-height-350 gradient-overlay-half-bg-gradient-v1" style="background-image: url(assets/img/300x350/img1.jpg);">
                            <div class="text-center py-4 mt-1">
                                <a href="../others/destination.html" class="text-white font-weight-bold font-size-21">United States</a>
                                <p class="text-white font-size-19 font-weight-bold mt-1 mb-0">£99 /
                                    <span class="font-size-14 font-weight-normal ml-1">night average</span>
                                </p>
                            </div>
                        </div>
                        <!-- End Card Block -->


                        <!-- Card Block -->
                        <div class="js-slide bg-img-hero-center rounded-border min-height-350 gradient-overlay-half-bg-gradient-v1" style="background-image: url(assets/img/300x350/img3.jpg);">
                            <div class="text-center py-4 mt-1">
                                <a href="../others/destination.html" class="text-white font-weight-bold font-size-21">Ukraine</a>
                                <p class="text-white font-size-19 font-weight-bold mt-1 mb-0">£299 /
                                    <span class="font-size-14 font-weight-normal ml-1">night average</span>
                                </p>
                            </div>
                        </div>
                        <!-- End Card Block -->


                        <!-- Card Block -->
                        <div class="js-slide bg-img-hero-center rounded-border min-height-350 gradient-overlay-half-bg-gradient-v1" style="background-image: url(assets/img/300x350/img2.jpg);">
                            <div class="text-center py-4 mt-1">
                                <a href="../others/destination.html" class="text-white font-weight-bold font-size-21">France</a>
                                <p class="text-white font-size-19 font-weight-bold mt-1 mb-0">£358 /
                                    <span class="font-size-14 font-weight-normal ml-1">night average</span>
                                </p>
                            </div>
                        </div>
                        <!-- End Card Block -->


                        <!-- Card Block -->
                        <div class="js-slide bg-img-hero-center rounded-border min-height-350 gradient-overlay-half-bg-gradient-v1" style="background-image: url(assets/img/300x350/img4.jpg);">
                            <div class="text-center py-4 mt-1">
                                <a href="../others/destination.html" class="text-white font-weight-bold font-size-21">India</a>
                                <p class="text-white font-size-19 font-weight-bold mt-1 mb-0">£36 /
                                    <span class="font-size-14 font-weight-normal ml-1">night average</span>
                                </p>
                            </div>
                        </div>
                        <!-- End Card Block -->


                        <!-- Card Block -->
                        <div class="js-slide bg-img-hero-center rounded-border min-height-350 gradient-overlay-half-bg-gradient-v1" style="background-image: url(assets/img/300x350/img5.jpg);">
                            <div class="text-center py-4 mt-1">
                                <a href="../others/destination.html" class="text-white font-weight-bold font-size-21">Norway</a>
                                <p class="text-white font-size-19 font-weight-bold mt-1 mb-0">£89 /
                                    <span class="font-size-14 font-weight-normal ml-1">night average</span>
                                </p>
                            </div>
                        </div>
                        <!-- End Card Block -->


                        <!-- Card Block -->
                        <div class="js-slide bg-img-hero-center rounded-border min-height-350 gradient-overlay-half-bg-gradient-v1" style="background-image: url(assets/img/300x350/img6.jpg);">
                            <div class="text-center py-4 mt-1">
                                <a href="../others/destination.html" class="text-white font-weight-bold font-size-21">Turkey</a>
                                <p class="text-white font-size-19 font-weight-bold mt-1 mb-0">£152 /
                                    <span class="font-size-14 font-weight-normal ml-1">night average</span>
                                </p>
                            </div>
                        </div>
                        <!-- End Card Block -->
                    </div>
                </div>
            </div>
            <!-- End Destinantion v7 -->

            <!-- Testimonials v2 -->
            <div class="testimonial-block testimonial-v2 border-bottom border-color-8">
                <div class="container">
                    <div class="pt-7 pb-8">
                        <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-5">
                            <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">Customer Reviews</h2>
                        </div>
                        <!-- Slick Carousel -->
                        <div class="js-slick-carousel u-slick u-slick--gutters-3" data-infinite="    true" data-autoplay="true" data-speed="3000" data-fade="true"
                        data-pagi-classes="text-center u-slick__pagination mb-0 mt-4"
                            data-responsive='[{
                            "breakpoint": 992,
                               "settings": {
                                 "slidesToShow": 1
                               }
                            }]'>

                            <div class="js-slide">
                                <!-- Testimonials -->
                                <div class="d-flex justify-content-center mb-6">
                                    <div class="position-relative">
                                        <img class="img-fluid mx-auto" src="assets/img/137x137/img1.jpg" alt="Image-Descrition">
                                        <div class="btn-position btn btn-icon btn-dark rounded-circle d-flex align-items-center justify-content-center height-60 width-60">
                                            <figure id="quote7" class="svg-preloader">
                                                <img class="js-svg-injector" src="https://madrasthemes.github.io/mytravel-html/assets/svg/illustrations/quote2.svg" alt="SVG" data-parent="#quote7">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <p class="text-gray-1 font-italic text-lh-inherit px-xl-20 mx-xl-15 px-xl-20 mx-xl-18">This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize</p>
                                    <h6 class="font-size-17 font-weight-bold text-gray-6 mb-0">Jessica Brown</h6>
                                    <span class="text-blue-lighter-1 font-size-normal">client</span>
                                </div>
                                <!-- End Testimonials -->
                            </div>

                            <div class="js-slide">
                                <!-- Testimonials -->
                                <div class="d-flex justify-content-center mb-6">
                                    <div class="position-relative">
                                        <img class="img-fluid mx-auto" src="assets/img/137x137/img2.jpg" alt="Image-Descrition">
                                        <div class="btn-position btn btn-icon btn-dark rounded-circle d-flex align-items-center justify-content-center height-60 width-60">
                                            <figure id="quote8" class="svg-preloader">
                                                <img class="js-svg-injector" src="https://madrasthemes.github.io/mytravel-html/assets/svg/illustrations/quote2.svg" alt="SVG" data-parent="#quote8">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <p class="text-gray-1 font-italic text-lh-inherit px-xl-20 mx-xl-15 px-xl-20 mx-xl-18">This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize</p>
                                    <h6 class="font-size-17 font-weight-bold text-gray-6 mb-0">Augusta Silva</h6>
                                    <span class="text-blue-lighter-1 font-size-normal">client</span>
                                </div>
                                <!-- End Testimonials -->
                            </div>

                            <div class="js-slide">
                                <!-- Testimonials -->
                                <div class="d-flex justify-content-center mb-6">
                                    <div class="position-relative">
                                        <img class="img-fluid mx-auto" src="assets/img/137x137/img3.jpg" alt="Image-Descrition">
                                        <div class="btn-position btn btn-icon btn-dark rounded-circle d-flex align-items-center justify-content-center height-60 width-60">
                                            <figure id="quote9" class="svg-preloader">
                                                <img class="js-svg-injector" src="https://madrasthemes.github.io/mytravel-html/assets/svg/illustrations/quote2.svg" alt="SVG" data-parent="#quote9">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <p class="text-gray-1 font-italic text-lh-inherit px-xl-20 mx-xl-15 px-xl-20 mx-xl-18">This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize</p>
                                    <h6 class="font-size-17 font-weight-bold text-gray-6 mb-0">Ali Tufan</h6>
                                    <span class="text-blue-lighter-1 font-size-normal">client</span>
                                </div>
                                <!-- End Testimonials -->
                            </div>

                            <div class="js-slide">
                                <!-- Testimonials -->
                                <div class="d-flex justify-content-center mb-6">
                                    <div class="position-relative">
                                        <img class="img-fluid mx-auto" src="assets/img/137x137/img1.jpg" alt="Image-Descrition">
                                        <div class="btn-position btn btn-icon btn-dark rounded-circle d-flex align-items-center justify-content-center height-60 width-60">
                                            <figure id="quote10" class="svg-preloader">
                                                <img class="js-svg-injector" src="https://madrasthemes.github.io/mytravel-html/assets/svg/illustrations/quote2.svg" alt="SVG" data-parent="#quote10">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <p class="text-gray-1 font-italic text-lh-inherit px-xl-20 mx-xl-15 px-xl-20 mx-xl-18">This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize</p>
                                    <h6 class="font-size-17 font-weight-bold text-gray-6 mb-0">Jessica Brown</h6>
                                    <span class="text-blue-lighter-1 font-size-normal">client</span>
                                </div>
                                <!-- End Testimonials -->
                            </div>

                            <div class="js-slide">
                                <!-- Testimonials -->
                                <div class="d-flex justify-content-center mb-6">
                                    <div class="position-relative">
                                        <img class="img-fluid mx-auto" src="assets/img/137x137/img3.jpg" alt="Image-Descrition">
                                        <div class="btn-position btn btn-icon btn-dark rounded-circle d-flex align-items-center justify-content-center height-60 width-60">
                                            <figure id="quote11" class="svg-preloader">
                                                <img class="js-svg-injector" src="https://madrasthemes.github.io/mytravel-html/assets/svg/illustrations/quote2.svg" alt="SVG" data-parent="#quote11">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <p class="text-gray-1 font-italic text-lh-inherit px-xl-20 mx-xl-15 px-xl-20 mx-xl-18">This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize</p>
                                    <h6 class="font-size-17 font-weight-bold text-gray-6 mb-0">Ali Tufan</h6>
                                    <span class="text-blue-lighter-1 font-size-normal">client</span>
                                </div>
                                <!-- End Testimonials -->
                            </div>

                            <div class="js-slide">
                                <!-- Testimonials -->
                                <div class="d-flex justify-content-center mb-6">
                                    <div class="position-relative">
                                        <img class="img-fluid mx-auto" src="assets/img/137x137/img2.jpg" alt="Image-Descrition">
                                        <div class="btn-position btn btn-icon btn-dark rounded-circle d-flex align-items-center justify-content-center height-60 width-60">
                                            <figure id="quote12" class="svg-preloader">
                                                <img class="js-svg-injector" src="https://madrasthemes.github.io/mytravel-html/assets/svg/illustrations/quote2.svg" alt="SVG" data-parent="#quote12">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <p class="text-gray-1 font-italic text-lh-inherit px-xl-20 mx-xl-15 px-xl-20 mx-xl-18">This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize</p>
                                    <h6 class="font-size-17 font-weight-bold text-gray-6 mb-0">Augusta Silva</h6>
                                    <span class="text-blue-lighter-1 font-size-normal">client</span>
                                </div>
                                <!-- End Testimonials -->
                            </div>
                        </div>
                        <!-- End Slick Carousel -->
                    </div>
                </div>
            </div>
            <!-- End Testimonials v2 -->
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
        <script src="assets/vendor/dzsparallaxer/dzsparallaxer.js"></script>
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

                // initialization of go to
                $.HSCore.components.HSGoTo.init('.js-go-to');
            });
        </script>
    </body>

<!-- Mirrored from madrasthemes.github.io/mytravel-html/html/home/home-v7.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Mar 2020 15:11:21 GMT -->
</html>
