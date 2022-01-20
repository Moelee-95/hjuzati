<!DOCTYPE html>
<html lang="en">
    
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Title -->
    <title>Activity Fullwidth | Hjuzati - Responsive Website Template</title>
    <?php include('sections/head.html'); ?>
    </head>
    <body>
       <!-- ========== HEADER ========== -->
        <?php include('sections/header.php'); ?>
        <!-- ========== END HEADER ========== -->

        <!-- ========== MAIN CONTENT ========== -->
        <main id="content" role="main" class="pt-6 pt-xl-10 mb-8">
            <div class="container">
                <div class="cars-list">
                    <!-- Shop-control-bar Title -->
                    <div class="d-md-flex justify-content-md-between mb-md-5 align-items-center">
                        <h3 class="font-size-21 font-weight-bold mb-0 text-center mb-3 mb-md-0">693 activity found</h3>
                        <div class="d-md-flex">
                            <select class="js-select selectpicker dropdown-select bootstrap-select__custom-nav w-100 w-md-auto my-1 mb-3 mb-md-0" data-style="btn-sm px-4 font-size-16 text-gray-1 d-flex align-items-center py-2">
                                <option value="one" selected>Sort by</option>
                                <option value="two">Sort by popularity</option>
                                <option value="three">Sort by average rating</option>
                                <option value="four">Sort by latest</option>
                                <option value="four">Sort by price: low to high</option>
                                <option value="four">Sort by price: high to low</option>
                            </select>
                            <div class="mb-3 mb-md-0 text-center">
                                <!-- Account Sidebar Toggle Button -->
                                <a id="sidebarNavToggler" class="btn btn-sm btn-primary height-50 font-size-16 px-4 px-md-3 px-wd-4 d-flex align-items-center justify-content-center" href="javascript:;" role="button"
                                   aria-controls="sidebarContent"
                                   aria-haspopup="true"
                                   aria-expanded="false"
                                   data-unfold-event="click"
                                   data-unfold-hide-on-scroll="false"
                                   data-unfold-target="#sidebarContent"
                                   data-unfold-type="css-animation"
                                   data-unfold-overlay='{
                                   "className": "u-search-slide-down-bg-overlay",
                                   "background": "rgba(59, 68, 79, .851)",
                                   "animationSpeed": 400
                                   }'
                                   data-unfold-animation-in="fadeInRight"
                                   data-unfold-animation-out="fadeOutRight"
                                   data-unfold-duration="500">
                                   <i class="flaticon-filter font-size-20"></i>
                                    <span class="d-md-none d-wd-inline ml-2">Show Filters</span>
                                </a>
                                <!-- End Account Sidebar Toggle Button -->

                                <!-- Sidebar Navigation -->
                                <aside id="sidebarContent" class="u-sidebar" aria-labelledby="sidebarNavToggler">
                                    <div class="u-sidebar__scroller">
                                        <div class="u-sidebar__container">
                                            <div class="u-header-sidebar__footer-offset pb-0">
                                                <!-- Toggle Button -->
                                                <div class="d-flex align-items-center pt-2 px-5">
                                                    <button type="button" class="btn btn-sm ml-auto font-size-14 p-0"
                                                        aria-controls="sidebarContent"
                                                        aria-haspopup="true"
                                                        aria-expanded="false"
                                                        data-unfold-event="click"
                                                        data-unfold-hide-on-scroll="false"
                                                        data-unfold-target="#sidebarContent"
                                                        data-unfold-type="css-animation"
                                                        data-unfold-animation-in="fadeInRight"
                                                        data-unfold-animation-out="fadeOutRight"
                                                        data-unfold-duration="500">
                                                        <span aria-hidden="true" class="text-primary">Back to List <i class="flaticon-close ml-2 font-size-10"></i></span>
                                                    </button>
                                                </div>
                                                <!-- End Toggle Button -->
                                                <!-- Content -->
                                                <div class="js-scrollbar u-sidebar__body">
                                                    <div class="u-sidebar__content u-header-sidebar__content">
                                                        <div class="pb-4 mb-2">
                                                            <div class="sidebar border border-radius-3">
                                                                <div class="p-4 m-1">
                                                                    <!-- Input -->
                                                                    <span class="d-block text-gray-1  font-weight-normal mb-0 text-left">Destination or Hotel Name</span>
                                                                    <div class="mb-4">
                                                                        <div class="input-group border-bottom border-width-2 border-color-1">
                                                                            <i class="flaticon-pin-1 d-flex align-items-center mr-2 text-primary font-weight-semi-bold font-size-22"></i>
                                                                            <input type="text" class="form-control font-weight-bold font-size-16 shadow-none hero-form font-weight-bold border-0 p-0" placeholder="Where are you going?" aria-label="Keyword or title" aria-describedby="keywordInputAddon">
                                                                        </div>
                                                                    </div>
                                                                    <!-- End Input -->
                                                                    <!-- Input -->
                                                                    <span class="d-block text-gray-1 text-left font-weight-normal mb-0">Check In - Out</span>
                                                                    <div class="border-bottom border-width-2 border-color-1 mb-4">
                                                                        <div id="datepickerWrapperFromOne" class="u-datepicker input-group flex-nowrap">
                                                                            <div class="input-group-prepend">
                                                                                <span class="d-flex align-items-center mr-2">
                                                                                  <i class="flaticon-calendar text-primary font-weight-semi-bold"></i>
                                                                                </span>
                                                                            </div>
                                                                             <input class="js-range-datepicker font-size-lg-16 shadow-none font-weight-bold form-control hero-form bg-transparent border-0 pl-1" type="date"
                                                                                 data-rp-wrapper="#datepickerWrapperFromOne"
                                                                                 data-rp-type="range"
                                                                                 data-rp-date-format="M d / Y"
                                                                                 data-rp-default-date='["Jul 7 / 2020", "Aug 25 / 2020"]'>
                                                                        </div>
                                                                         <!-- End Datepicker -->
                                                                    </div>
                                                                    <!-- End Input -->
                                                                    <div class="col dropdown-custom px-0 mb-5">
                                                                        <!-- Input -->
                                                                        <span class="d-block text-gray-1 text-left font-weight-normal mb-0">Rooms and Guests</span>
                                                                        <a id="basicDropdownClickInvoker" class="dropdown-nav-link dropdown-toggle d-flex py-2" href="javascript:;" role="button"
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
                                                                                <div class="js-quantity mx-3 row align-items-center justify-content-between flex-nowrap">
                                                                                    <span class="d-block font-size-16 text-secondary font-weight-medium">Rooms</span>
                                                                                    <div class="d-flex ml-2">
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
                                                                            <div class="w-100 py-2 px-3 mb-3">
                                                                                <div class="js-quantity mx-3 row align-items-center justify-content-between flex-nowrap">
                                                                                    <span class="d-block font-size-16 text-secondary font-weight-medium">Adults</span>
                                                                                    <div class="d-flex ml-2">
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
                                                                                <div class="js-quantity mx-3 row align-items-center justify-content-between flex-nowrap">
                                                                                    <span class="d-block font-size-16 text-secondary font-weight-medium">Child</span>
                                                                                    <div class="d-flex ml-2">
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
                                                                    <div class="text-center">
                                                                        <button type="submit" class="btn btn-primary height-60 w-100 mb-xl-0 mb-lg-1 transition-3d-hover"><i class="flaticon-magnifying-glass mr-2"></i>Search</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="pb-4 mb-2">
                                                            <a href="https://goo.gl/maps/kCVqYkjHX3XvoC4B9" class="d-block border">
                                                                <img src="assets/img/map-markers/map.jpg" alt="" width="100%">
                                                            </a>
                                                        </div>
                                                        <!-- Checkboxes -->
                                                        <div class="sidenav border">
                                                            <!-- Accordiaon -->
                                                            <div id="shopCartAccordion" class="accordion rounded shadow-none">
                                                                <div class="border-0">
                                                                    <div class="card-collapse" id="shopCardHeadingOne">
                                                                        <h3 class="mb-0">
                                                                            <button type="button" class="btn btn-link btn-block card-btn py-2 px-5 text-lh-3 collapsed" data-toggle="collapse" data-target="#shopCardOne" aria-expanded="false" aria-controls="shopCardOne">
                                                                                <span class="row align-items-center">
                                                                                    <span class="col-9">
                                                                                        <span class="d-block font-size-lg-15 font-size-17 font-weight-bold text-dark">Price Range ($)</span>
                                                                                    </span>
                                                                                    <span class="col-3 text-right">
                                                                                        <span class="card-btn-arrow">
                                                                                            <span class="fas fa-chevron-down small"></span>
                                                                                        </span>
                                                                                    </span>
                                                                                </span>
                                                                            </button>
                                                                        </h3>
                                                                    </div>
                                                                    <div id="shopCardOne" class="collapse show" aria-labelledby="shopCardHeadingOne" data-parent="#shopCartAccordion">
                                                                        <div class="card-body pt-0 px-5">
                                                                            <div class="pb-3 mb-1 d-flex text-lh-1">
                                                                                <span>£</span>
                                                                                <span id="rangeSliderExample3MinResult" class=""></span>
                                                                                <span class="mx-0dot5"> — </span>
                                                                                <span>£</span>
                                                                                <span id="rangeSliderExample3MaxResult" class=""></span>
                                                                            </div>
                                                                            <input class="js-range-slider" type="text"
                                                                            data-extra-classes="u-range-slider height-35"
                                                                            data-type="double"
                                                                            data-grid="false"
                                                                            data-hide-from-to="true"
                                                                            data-min="0"
                                                                            data-max="3456"
                                                                            data-from="200"
                                                                            data-to="3456"
                                                                            data-prefix="$"
                                                                            data-result-min="#rangeSliderExample3MinResult"
                                                                            data-result-max="#rangeSliderExample3MaxResult">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="propertyCategoryAccordion" class="accordion rounded-0 shadow-none border-top">
                                                                <div class="border-0">
                                                                    <div class="card-collapse" id="propertyCategoryHeadingOne">
                                                                        <h3 class="mb-0">
                                                                            <button type="button" class="btn btn-link btn-block card-btn py-2 px-5 text-lh-3 collapsed" data-toggle="collapse" data-target="#propertyCategoryOne" aria-expanded="false" aria-controls="propertyCategoryOne">
                                                                                <span class="row align-items-center">
                                                                                    <span class="col-9">
                                                                                        <span class="font-weight-bold font-size-17 text-dark mb-3">Property Type</span>
                                                                                    </span>
                                                                                    <span class="col-3 text-right">
                                                                                        <span class="card-btn-arrow">
                                                                                            <span class="fas fa-chevron-down small"></span>
                                                                                        </span>
                                                                                    </span>
                                                                                </span>
                                                                            </button>
                                                                        </h3>
                                                                    </div>
                                                                    <div id="propertyCategoryOne" class="collapse show" aria-labelledby="propertyCategoryHeadingOne" data-parent="#propertyCategoryAccordion">
                                                                        <div class="card-body pt-0 mt-1 px-5 pb-4">
                                                                            <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-1">
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="brandhotel">
                                                                                    <label class="custom-control-label" for="brandhotel">Hotels</label>
                                                                                </div>
                                                                                <small>749</small>
                                                                            </div>
                                                                            <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-1">
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="brandapartmet">
                                                                                    <label class="custom-control-label" for="brandapartmet">Apartments</label>
                                                                                </div>
                                                                                <small>630</small>
                                                                            </div>
                                                                            <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-1">
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="brandbed">
                                                                                    <label class="custom-control-label" for="brandbed">Bed and Breakfasts</label>
                                                                                </div>
                                                                                <small>58</small>
                                                                            </div>
                                                                            <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-3 pb-1">
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="brandresorts">
                                                                                    <label class="custom-control-label" for="brandresorts">Resorts</label>
                                                                                </div>
                                                                                <small>29</small>
                                                                            </div>
                                                                            <!-- End Checkboxes -->

                                                                            <!-- View More - Collapse -->
                                                                            <div class="collapse" id="collapseBrand2">
                                                                                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-1">
                                                                                    <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="Gucci">
                                                                                    <label class="custom-control-label" for="Gucci">Gucci</label>
                                                                                    </div>
                                                                                    <small>5</small>
                                                                                </div>
                                                                                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-3">
                                                                                    <div class="custom-control custom-checkbox">
                                                                                        <input type="checkbox" class="custom-control-input" id="Mango">
                                                                                        <label class="custom-control-label" for="Mango">Mango</label>
                                                                                    </div>
                                                                                    <small>1</small>
                                                                                </div>
                                                                            </div>
                                                                            <!-- End View More - Collapse -->

                                                                            <!-- Link -->
                                                                            <a class="link link-collapse small font-size-1" data-toggle="collapse" href="#collapseBrand2" role="button" aria-expanded="false" aria-controls="collapseBrand2">
                                                                              <span class="link-collapse__default font-size-14">Show all 39</span>
                                                                              <span class="link-collapse__active font-size-14">Show less</span>
                                                                            </a>
                                                                            <!-- End Link -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Content -->
                                            </div>
                                        </div>
                                    </div>
                                </aside>
                                <!-- End Sidebar Navigation -->
                            </div>
                        </div>
                    </div>
                    <!-- End shop-control-bar Title -->

                    <div class="row">
                        <div class="col-md-6 col-xl-3 mb-3 mb-md-4 pb-1">
                            <div class="card transition-3d-hover shadow-hover-2 h-100">
                                <div class="position-relative">
                                    <a href="activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="min-height-230 card-img-top" src="assets/img/300x230/img13.jpg">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                        <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                            <span class="flaticon-heart-1 font-size-20"></span>
                                        </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-4 pb-3">
                                            <a href="activities-single-v1.html" class="d-block">
                                                <div class="d-flex align-items-center font-size-14 text-white">
                                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-4 py-3">
                                    <a href="activities-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark d-inline-block mb-1">Mangrove Tunnel Kayak Eco  Tour</a>
                                    <div class="mt-2 mb-3">
                                        <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                    </div>
                                    <div class="mb-0">
                                        <span class="mr-1 font-size-14 text-gray-1">From</span>
                                        <span class="font-weight-bold">£350.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-3 mb-md-4 pb-1">
                            <div class="card transition-3d-hover shadow-hover-2 h-100">
                                <div class="position-relative">
                                    <a href="activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="min-height-230 card-img-top" src="assets/img/300x230/img14.jpg">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                        <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                            <span class="flaticon-heart-1 font-size-20"></span>
                                        </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-4 pb-3">
                                            <a href="activities-single-v1.html" class="d-block">
                                                <div class="d-flex align-items-center font-size-14 text-white">
                                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Istanbul, Turkey
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-4 py-3">
                                    <a href="activities-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark d-inline-block mb-1">Half-Day Outdoor Rock Climbing  Session</a>
                                    <div class="mt-2 mb-3">
                                        <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                    </div>
                                    <div class="mb-0">
                                        <span class="mr-1 font-size-14 text-gray-1">From</span>
                                        <span class="font-weight-bold">£350.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-3 mb-md-4 pb-1">
                            <div class="card transition-3d-hover shadow-hover-2 h-100">
                                <div class="position-relative">
                                    <a href="activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="min-height-230 card-img-top" src="assets/img/300x230/img15.jpg">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                        <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                            <span class="flaticon-heart-1 font-size-20"></span>
                                        </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-4 pb-3">
                                            <a href="activities-single-v1.html" class="d-block">
                                                <div class="d-flex align-items-center font-size-14 text-white">
                                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> New York, United States
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-4 py-3">
                                    <a href="activities-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark d-inline-block mb-1">Paramount Ranch Guided  Horseback Tour</a>
                                    <div class="mt-2 mb-3">
                                        <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                    </div>
                                    <div class="mb-0">
                                        <span class="mr-1 font-size-14 text-gray-1">From</span>
                                        <span class="font-weight-bold">£350.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-3 mb-md-4 pb-1">
                            <div class="card transition-3d-hover shadow-hover-2 h-100">
                                <div class="position-relative">
                                    <a href="activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="min-height-230 card-img-top" src="assets/img/300x230/img16.jpg">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                      <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                        <span class="flaticon-heart-1 font-size-20"></span>
                                      </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-4 pb-3">
                                            <a href="activities-single-v1.html" class="d-block">
                                                <div class="d-flex align-items-center font-size-14 text-white">
                                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> New South Wales, Australia
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-4 py-3">
                                    <a href="activities-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark d-inline-block mb-1">Scuba Diving Charter in  Boyton Beach</a>
                                    <div class="mt-2 mb-3">
                                        <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                    </div>
                                    <div class="mb-0">
                                        <span class="mr-1 font-size-14 text-gray-1">From</span>
                                        <span class="font-weight-bold">£350.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-3 mb-md-4 pb-1">
                            <div class="card transition-3d-hover shadow-hover-2 h-100">
                                <div class="position-relative">
                                    <a href="activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="min-height-230 card-img-top" src="assets/img/300x230/img43.jpg">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                        <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                            <span class="flaticon-heart-1 font-size-20"></span>
                                        </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-4 pb-3">
                                            <a href="activities-single-v1.html" class="d-block">
                                                <div class="d-flex align-items-center font-size-14 text-white">
                                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Istanbul, Turkey
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-4 py-3">
                                    <a href="activities-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark d-inline-block mb-1">Water Activities at Cenang Beach  in Langkawi</a>
                                    <div class="mt-2 mb-3">
                                        <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                    </div>
                                    <div class="mb-0">
                                        <span class="mr-1 font-size-14 text-gray-1">From</span>
                                        <span class="font-weight-bold">£350.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-3 mb-md-4 pb-1">
                            <div class="card transition-3d-hover shadow-hover-2 h-100">
                                <div class="position-relative">
                                    <a href="activities-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="min-height-230 card-img-top" src="assets/img/300x230/img44.jpg">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                        <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                            <span class="flaticon-heart-1 font-size-20"></span>
                                        </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-4 pb-3">
                                            <a href="activities-single-v1.html" class="d-block">
                                                <div class="d-flex align-items-center font-size-14 text-white">
                                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> New York, United States
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-4 py-3">
                                    <a href="activities-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark d-inline-block mb-1">Banana Boat Activity in  Boracay</a>
                                    <div class="mt-2 mb-3">
                                        <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                    </div>
                                    <div class="mb-0">
                                        <span class="mr-1 font-size-14 text-gray-1">From</span>
                                        <span class="font-weight-bold">£350.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-3 mb-md-4 pb-1">
                            <div class="card transition-3d-hover shadow-hover-2 h-100">
                                <div class="position-relative">
                                    <a href="activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="min-height-230 card-img-top" src="assets/img/300x230/img45.jpg">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                        <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                            <span class="flaticon-heart-1 font-size-20"></span>
                                        </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-4 pb-3">
                                            <a href="activities-single-v2.html" class="d-block">
                                                <div class="d-flex align-items-center font-size-14 text-white">
                                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-4 py-3">
                                    <a href="activities-single-v2.html" class="card-title font-size-17 font-weight-medium text-dark d-inline-block mb-1">Fitzroy Island Day Tour & Water  Activities</a>
                                    <div class="mt-2 mb-3">
                                        <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                    </div>
                                    <div class="mb-0">
                                        <span class="mr-1 font-size-14 text-gray-1">From</span>
                                        <span class="font-weight-bold">£350.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-3 mb-md-4 pb-1">
                            <div class="card transition-3d-hover shadow-hover-2 h-100">
                                <div class="position-relative">
                                    <a href="activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="min-height-230 card-img-top" src="assets/img/300x230/img46.jpg">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                        <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                            <span class="flaticon-heart-1 font-size-20"></span>
                                        </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-4 pb-3">
                                            <a href="activities-single-v2.html" class="d-block">
                                                <div class="d-flex align-items-center font-size-14 text-white">
                                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Istanbul, Turkey
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-4 py-3">
                                    <a href="activities-single-v2.html" class="card-title font-size-17 font-weight-medium text-dark d-inline-block mb-1">Pawna Lake Overnight Camping &  Day Adventure Activities</a>
                                    <div class="mt-2 mb-3">
                                        <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                    </div>
                                    <div class="mb-0">
                                        <span class="mr-1 font-size-14 text-gray-1">From</span>
                                        <span class="font-weight-bold">£350.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-3 mb-md-4 pb-1">
                            <div class="card transition-3d-hover shadow-hover-2 h-100">
                                <div class="position-relative">
                                    <a href="activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="min-height-230 card-img-top" src="assets/img/300x230/img47.jpg">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                        <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                            <span class="flaticon-heart-1 font-size-20"></span>
                                        </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-4 pb-3">
                                            <a href="activities-single-v2.html" class="d-block">
                                                <div class="d-flex align-items-center font-size-14 text-white">
                                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> New York, United States
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-4 py-3">
                                    <a href="activities-single-v2.html" class="card-title font-size-17 font-weight-medium text-dark d-inline-block mb-1">Phuket Private Trip with Outdoor  Activities</a>
                                    <div class="mt-2 mb-3">
                                        <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                    </div>
                                    <div class="mb-0">
                                        <span class="mr-1 font-size-14 text-gray-1">From</span>
                                        <span class="font-weight-bold">£350.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-3 mb-md-4 pb-1">
                            <div class="card transition-3d-hover shadow-hover-2 h-100">
                                <div class="position-relative">
                                    <a href="activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="min-height-230 card-img-top" src="assets/img/300x230/img16.jpg">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                        <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                            <span class="flaticon-heart-1 font-size-20"></span>
                                        </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-4 pb-3">
                                            <a href="activities-single-v2.html" class="d-block">
                                                <div class="d-flex align-items-center font-size-14 text-white">
                                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> New South Wales, Australia
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-4 py-3">
                                    <a href="activities-single-v2.html" class="card-title font-size-17 font-weight-medium text-dark d-inline-block mb-1">Scuba Diving Charter in  Boyton Beach</a>
                                    <div class="mt-2 mb-3">
                                        <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                    </div>
                                    <div class="mb-0">
                                        <span class="mr-1 font-size-14 text-gray-1">From</span>
                                        <span class="font-weight-bold">£350.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-3 mb-md-4 pb-1">
                            <div class="card transition-3d-hover shadow-hover-2 h-100">
                                <div class="position-relative">
                                    <a href="activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="min-height-230 card-img-top" src="assets/img/300x230/img14.jpg">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                        <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                            <span class="flaticon-heart-1 font-size-20"></span>
                                        </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-4 pb-3">
                                            <a href="activities-single-v2.html" class="d-block">
                                                <div class="d-flex align-items-center font-size-14 text-white">
                                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Istanbul, Turkey
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-4 py-3">
                                    <a href="activities-single-v2.html" class="card-title font-size-17 font-weight-medium text-dark d-inline-block mb-1">Half-Day Outdoor Rock Climbing  Session</a>
                                    <div class="mt-2 mb-3">
                                        <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                        <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                    </div>
                                    <div class="mb-0">
                                        <span class="mr-1 font-size-14 text-gray-1">From</span>
                                        <span class="font-weight-bold">£350.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-3 mb-md-4 pb-1">
                            <div class="card transition-3d-hover shadow-hover-2 h-100">
                                <div class="position-relative">
                                    <a href="activities-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="min-height-230 card-img-top" src="assets/img/300x230/img15.jpg">
                                    </a>
                                    <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                        <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                            <span class="flaticon-heart-1 font-size-20"></span>
                                        </button>
                                    </div>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-4 pb-3">
                                            <a href="activities-single-v2.html" class="d-block">
                                                <div class="d-flex align-items-center font-size-14 text-white">
                                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> New York, United States
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-4 py-3">
                                    <a href="activities-single-v2.html" class="card-title font-size-17 font-weight-medium text-dark d-inline-block mb-1">Paramount Ranch Guided  Horseback Tour</a>
                                    <div class="mt-2 mb-3">
                                        <span class="badge badge-pill badge-warning text-lh-sm text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
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
                    <div class="text-center text-md-left font-size-14 mb-3 text-lh-1">Showing 1–15</div>
                    <nav aria-label="Page navigation">
                        <ul class="list-pagination-1 pagination border border-color-4 rounded-sm mb-5 mb-lg-0 overflow-auto overflow-xl-visible justify-content-md-center align-items-center py-2">
                            <li class="page-item">
                                <a class="page-link border-right rounded-0 text-gray-5" href="#" aria-label="Previous">
                                    <i class="flaticon-left-direction-arrow font-size-10 font-weight-bold"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link font-size-14" href="#">1</a></li>
                            <li class="page-item"><a class="page-link font-size-14 active" href="#">2</a></li>
                            <li class="page-item"><a class="page-link font-size-14" href="#">3</a></li>
                            <li class="page-item"><a class="page-link font-size-14" href="#">4</a></li>
                            <li class="page-item"><a class="page-link font-size-14" href="#">5</a></li>
                            <li class="page-item disabled"><a class="page-link font-size-14" href="#">...</a></li>
                            <li class="page-item"><a class="page-link font-size-14" href="#">66</a></li>
                            <li class="page-item"><a class="page-link font-size-14" href="#">67</a></li>
                            <li class="page-item">
                                <a class="page-link border-left rounded-0 text-gray-5" href="#" aria-label="Next">
                                    <i class="flaticon-right-thin-chevron font-size-10 font-weight-bold"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
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
        <script src="assets/vendor/gmaps/gmaps.min.js"></script>
        <script src="assets/vendor/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
        <script src="assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

        <!-- JS Hjuzati -->
        <script src="assets/js/hs.core.js"></script>
        <script src="assets/js/components/hs.header.js"></script>
        <script src="assets/js/components/hs.unfold.js"></script>
        <script src="assets/js/components/hs.validation.js"></script>
        <script src="assets/js/components/hs.show-animation.js"></script>
        <script src="assets/js/components/hs.range-datepicker.js"></script>
        <script src="assets/js/components/hs.selectpicker.js"></script>
        <script src="assets/js/components/hs.range-slider.js"></script>
        <script src="assets/js/components/hs.go-to.js"></script>
        <script src="assets/js/components/hs.slick-carousel.js"></script>
        <script src="assets/js/components/hs.quantity-counter.js"></script>
        <script src="assets/js/components/hs.g-map.js"></script>
        <script src="assets/js/components/hs.malihu-scrollbar.js"></script>

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

                // initialization of google map
                function initMap() {
                    $.HSCore.components.HSGMap.init('.js-g-map');
                }

                // initialization of unfold component
                $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

                // initialization of show animations
                $.HSCore.components.HSShowAnimation.init('.js-animation-link');

                // initialization of datepicker
                $.HSCore.components.HSRangeDatepicker.init('.js-range-datepicker');

                // initialization of forms
                $.HSCore.components.HSRangeSlider.init('.js-range-slider');

                // initialization of malihu scrollbar
                $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));

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

</html>
