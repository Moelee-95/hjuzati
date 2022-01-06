<!DOCTYPE html>
<html lang="en">
    
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <!-- Title -->
    <title>Hima hotels | Hotels List</title>
    <?php include('sections/head.html'); ?>
    <script type="text/javascript">
        function _(el){
            return document.getElementById(el);
        }
        function showValues(){
            _("rooms_num").InnerHTML = parseInt(_("rooms").value);
            _("guests_num").InnerHTML = parseInt(_("adults").value) + parseInt(_("child").value);
        }
    </script>
    </head>
    <body>
       <!-- ========== HEADER ========== -->
        <?php include('sections/header.php'); ?>
        <!-- ========== END HEADER ========== -->
        <?php 
            include('cp/db/db_connect.php');
            //getting info from search for hotel
            $city = $_GET['city'];
            $ch_in_ch_out = $_GET['hotel_date'];//both check in and check out values
            $ch_in_ch_out = explode(" to ", $ch_in_ch_out);
            $check_in = $ch_in_ch_out[0];
            $check_out = $ch_in_ch_out[1];
            $rooms_num =$_GET['rooms_num'];
            $adults = $_GET['adults'];
            $child = $_GET['child'];
            $type = $_GET['type'];
            //Calculate Nights
            $start_ts = strtotime($check_in); 
            $end_ts = strtotime($check_out); 
            $diff = $end_ts - $start_ts; 
            $nights =  round($diff / 86400);//Number of nights

            // echo "<br>"."City: ".$city."<br>Check in: ".$check_in."<br>Check out: ".$check_out."<br>Rooms Number: ".$rooms_num."<br>Adults Number: ".$adults."<br>Childred Number: ".$child."<br>Accoumidation type: ".$type;
            // search in the db;
            $sql = "call search2('$adults', '$check_in',  '$check_out' ,' $rooms_num',  '$city')";

            $query = mysqli_query($conn, $sql);
            $fetch_all = mysqli_fetch_all($query, MYSQLI_ASSOC);
            

            // print_r($fetch_all);

            // Functin for getting main image path for hotel
            function getPath($hotel_id){
                include('cp/db/db_connect.php');
                $sql = "SELECT hp.hpPath FROM hotels h JOIN hotelsphotos hp ON h.hMainPhotoID = hp.hpID WHERE h.hHotelID = '$hotel_id'";
                $qur = mysqli_query($conn, $sql);
                $fetchPhoto = mysqli_fetch_array($qur);
                $acturalPath = "cp/".substr($fetchPhoto['hpPath'], 3);
                return($acturalPath);
            }
            


        ?>

        <!-- ========== MAIN CONTENT ========== -->
        <main id="content" role="main">
            <div class="container pt-5 pt-xl-8">
                <div class="row mb-5 mb-lg-8 mt-xl-1">
                    <div class="col-lg-4 col-xl-3 order-lg-1 width-md-50">
                        <div class="navbar-expand-lg navbar-expand-lg-collapse-block">
                            <button class="btn d-lg-none mb-5 p-0 collapsed" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="far fa-caret-square-down text-primary font-size-20 card-btn-arrow ml-0"></i>
                                <span class="text-primary ml-2">Sidebar</span>
                            </button>
                            <div id="sidebar" class="collapse navbar-collapse">
                                <div class="mb-6 w-100">
                                    <div class="pb-4 mb-2">
                                        <div class="sidebar border border-color-1 rounded-xs">
                                            <form method="get" name="search_hotel" action="">
                                            <input type="hidden" id="type" name="type" value="hotel">
                                            <div class="p-4 mb-1">
                                                <!-- Input -->
                                                <span class="d-block text-gray-1  font-weight-normal mb-0 text-left">Destination</span>
                                                <div class="mb-4">
                                                    <div class="input-group border-bottom border-width-2 border-color-1">
                                                        <i class="flaticon-pin-1 d-flex align-items-center mr-2 text-primary font-weight-semi-bold font-size-22"></i>
                                                      <select name="city" class="js-select selectpicker dropdown-select tab-dropdown col-12 pl-0 flaticon-pin d-flex align-items-center text-primary font-weight-semi-bold" 
                                                      title="Select City!"
                                                    data-live-search="true"
                                                    data-searchbox-classes="input-group-sm">
                                                        <option selected style="display: none" class="border-bottom border-color-1" value="<?php echo $city; ?>" data-content='
                                                            <span class="d-flex align-items-center">
                                                                <span class="font-size-16"><?php echo $city; ?></span>
                                                            </span>'>
                                                            <?php echo $city; ?>
                                                        </option>
                                                        <option class="border-bottom border-color-1" value="project1" data-content='
                                                            <span class="d-flex align-items-center">
                                                                <span class="font-size-16">Sulaymaniyah</span>
                                                            </span>'>
                                                            Sulaymaniyah
                                                        </option>
                                                    </select>
                                                    </div>
                                                </div>
                                                <!-- End Input -->
                                                <!-- Input -->
                                                <span class="d-block text-gray-1 font-weight-normal mb-0 text-left">Check In - Out</span>
                                                <div class="mb-4">
                                                    <div class="border-bottom border-width-2 border-color-1">
                                                        <div id="datepickerWrapperPick" class="u-datepicker input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="d-flex align-items-center mr-2 font-size-21">
                                                                  <i class="flaticon-calendar text-primary font-weight-semi-bold"></i>
                                                                </span>
                                                            </div>
                                                            <input required id="checkInOutDate"
                                                            name="hotel_date"
                                                             class="font-weight-medium font-size-15 ml-1 shadow-none form-control hero-form bg-transparent border-0 flatpickr-input p-0"
                                                             type="text"
                                                            value='["<?php echo $check_in ?>" to "<?php echo $check_out; ?>"]'>
                                                        </div>
                                                        <!-- End Datepicker -->
                                                        <script>
                                                            flatpickr('#checkInOutDate', {
                                                                "minDate": "today",
                                                                "mode": "range",
                                                                "allowInput":true,
                                                                "onOpen": function(selectedDates, dateStr, instance) {
                                                                    $(instance.altInput).prop('readonly', true);
                                                                },
                                                                "onClose": function(selectedDates, dateStr, instance) {
                                                                    $(instance.altInput).prop('readonly', false);
                                                                    $(instance.altInput).blur();
                                                                }

                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                                <!-- End Input -->

                                                <!-- Input -->
                                                <span class="d-block text-gray-1 font-weight-normal mb-0 text-left">Rooms and Guests</span>
                                                <div class="mb-4 position-relative">
                                                    <div class="border-bottom border-width-2 border-color-1">
                                                        <a id="basicDropdownClickInvoker" class="dropdown-nav-link dropdown-toggle flex-horizontal-center pt-3 pb-2" href="javascript:;" role="button"
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
                                                            <i class="flaticon-add-group d-flex align-items-center mr-3 font-size-20 text-primary font-weight-semi-bold"></i>
                                                            <span class="text-black font-weight-medium font-size-15 mr-auto">
                                                                <span id="rooms_num"><?php echo $rooms_num; ?></span>
                                                                 Rooms - 
                                                                 <span id="guests_num"><?php echo $adults+$child; ?></span>
                                                                  Guests</span>
                                                        </a>
                                                        <div id="basicDropdownClick" class="dropdown-menu dropdown-unfold col m-0" aria-labelledby="basicDropdownClickInvoker">
                                                            <div class="w-100 py-2 px-3 mb-3">
                                                                <div class="js-quantity mx-3 row align-items-center justify-content-between">
                                                                    <span class="d-block font-size-16 text-secondary font-weight-medium">Rooms</span>
                                                                    <div class="d-flex">
                                            <a class="js-minus btn btn-icon btn-medium btn-outline-secondary rounded-circle" href="javascript:;">
                                                                            <small class="fad fa-minus btn-icon__inner"></small>
                                                                        </a>
                                                                        <input name="rooms_num" id="rooms"
                                                                        onchange="showValues();"
                                                                         class="js-result form-control h-auto border-0 rounded p-0 max-width-6 text-center" type="text" value="<?php echo $rooms_num ?>">
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
                                                                        <input name="adults" id="adults" onchange="showValues();" class="js-result form-control h-auto border-0 rounded p-0 max-width-6 text-center" type="text" value="<?php echo $adults ?>">
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
                                                                        <input name="child" id="child" onchange="showValues();" class="js-result form-control h-auto border-0 rounded p-0 max-width-6 text-center" type="text" value="<?php echo $child ?>">
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
                                                    </div>
                                                </div>
                                                <!-- End Input -->

                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary height-60 w-100 font-weight-bold mb-xl-0 mb-lg-1 transition-3d-hover"><i class="flaticon-magnifying-glass mr-2 font-size-17"></i>Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                    <div class="pb-4 mb-2">
                                        <!-- <a href="#ontargetModal" class="d-block border rounded"
                                            data-modal-target="#ontargetModal"
                                            data-modal-effect="fadein">
                                            <img src="assets/img/map-markers/map.jpg" alt="" width="100%">
                                        </a> -->

                                        <!-- On Target Modal -->
                                        <div id="ontargetModal" class="js-modal-window u-modal-window max-height-100vh width-100vw overflow-hidden"
                                            data-modal-type="ontarget"
                                            data-open-effect="zoomIn"
                                            data-close-effect="zoomOut"
                                            data-speed="500">
                                            <div class="bg-white">
                                                <div class="border-bottom py-xl-2">
                                                    <div class="row d-block d-md-flex flex-horizontal-center mx-0">
                                                        <div class="col-xl">
                                                            <!-- Nav Links -->
                                                            <ul class="row nav align-items-center py-xl-1 px-0 mb-3 mb-xl-0 border-bottom border-xl-bottom-0" role="tablist">
                                                                <li class="col-6 col-md-3 col-lg-auto border-bottom border-xl-bottom-0 mx-0 col-xl-auto nav-item d-flex align-items-center flex-shrink-0 flex-xl-shrink-1">
                                                                    <select class="js-select selectpicker dropdown-select bootstrap-select__custom-nav w-xl-auto"
                                                                        data-style="btn-sm py-2 px-3 px-xl-3 px-wd-4 font-size-16 text-dark d-flex align-items-center">
                                                                        <option value="one" selected>City</option>
                                                                        <option value="two">Two</option>
                                                                        <option value="three">Three</option>
                                                                        <option value="four">Four</option>
                                                                    </select>
                                                                </li>
                                                                <li class="col-6 col-md-3 col-lg-auto border-bottom border-xl-bottom-0 mx-0 col-xl-auto nav-item d-flex align-items-center flex-shrink-0 flex-xl-shrink-1 border-left">
                                                                    <select class="js-select selectpicker dropdown-select bootstrap-select__custom-nav w-xl-auto"
                                                                        data-style="btn-sm py-2 px-3 px-xl-3 px-wd-4 font-size-16 text-dark d-flex align-items-center">
                                                                        <option value="one" selected>Price</option>
                                                                        <option value="two">Two</option>
                                                                        <option value="three">Three</option>
                                                                        <option value="four">Four</option>
                                                                    </select>
                                                                </li>
                                                                <li class="col-6 col-md-3 col-lg-auto border-bottom border-xl-bottom-0 mx-0 col-xl-auto nav-item d-flex align-items-center flex-shrink-0 flex-xl-shrink-1 border-left">
                                                                    <select class="js-select selectpicker dropdown-select bootstrap-select__custom-nav w-xl-auto"
                                                                        data-style="btn-sm py-2 px-3 px-xl-3 px-wd-4 font-size-16 text-dark d-flex align-items-center">
                                                                        <option value="one" selected>Stars</option>
                                                                        <option value="two">Two</option>
                                                                        <option value="three">Three</option>
                                                                        <option value="four">Four</option>
                                                                    </select>
                                                                </li>
                                                                <li class="col-6 col-md-3 col-lg-auto border-bottom border-xl-bottom-0 mx-0 col-xl-auto nav-item d-flex align-items-center flex-shrink-0 flex-xl-shrink-1 border-left">
                                                                    <select class="js-select selectpicker dropdown-select bootstrap-select__custom-nav w-xl-auto"
                                                                        data-style="btn-sm py-2 px-3 px-xl-3 px-wd-4 font-size-16 text-dark d-flex align-items-center">
                                                                        <option value="one" selected>Guest Rating</option>
                                                                        <option value="two">Two</option>
                                                                        <option value="three">Three</option>
                                                                        <option value="four">Four</option>
                                                                    </select>
                                                                </li>
                                                                <li class="col-6 col-md-3 col-lg-auto border-bottom border-xl-bottom-0 mx-0 col-xl-auto nav-item d-flex align-items-center flex-shrink-0 flex-xl-shrink-1 border-left">
                                                                    <select class="js-select selectpicker dropdown-select bootstrap-select__custom-nav w-xl-auto"
                                                                        data-style="btn-sm py-2 px-3 px-xl-3 px-wd-4 font-size-16 text-dark d-flex align-items-center">
                                                                        <option value="one" selected>Meals</option>
                                                                        <option value="two">Two</option>
                                                                        <option value="three">Three</option>
                                                                        <option value="four">Four</option>
                                                                    </select>
                                                                </li>
                                                                <li class="col-6 col-md-3 col-lg-auto border-bottom border-xl-bottom-0 mx-0 col-xl-auto nav-item d-flex align-items-center flex-shrink-0 flex-xl-shrink-1 border-left">
                                                                    <select class="js-select selectpicker dropdown-select bootstrap-select__custom-nav w-xl-auto"
                                                                        data-style="btn-sm py-2 px-3 px-xl-3 px-wd-4 font-size-16 text-dark d-flex align-items-center">
                                                                        <option value="one" selected>Facilities</option>
                                                                        <option value="two">Two</option>
                                                                        <option value="three">Three</option>
                                                                        <option value="four">Four</option>
                                                                    </select>
                                                                </li>
                                                                <li class="col-6 col-md-3 col-lg-auto border-bottom border-xl-bottom-0 mx-0 col-xl-auto nav-item d-flex align-items-center flex-shrink-0 flex-xl-shrink-1 border-left">
                                                                    <select class="js-select selectpicker dropdown-select bootstrap-select__custom-nav w-xl-auto"
                                                                        data-style="btn-sm py-2 px-3 px-xl-3 px-wd-4 font-size-16 text-dark d-flex align-items-center">
                                                                        <option value="one" selected>Property Type</option>
                                                                        <option value="two">Two</option>
                                                                        <option value="three">Three</option>
                                                                        <option value="four">Four</option>
                                                                    </select>
                                                                </li>
                                                            </ul>
                                                            <!-- End Nav Links -->
                                                        </div>
                                                        <div class="col-xl-auto">
                                                            <div class="d-flex justify-content-center justify-content-xl-start">
                                                                <button type="button" class="btn btn-wide btn-blue-1 font-weight-normal font-size-14 rounded-xs mb-3 mb-xl-0" aria-label="Close" onclick="Custombox.modal.close();">
                                                                    <span aria-hidden="true">Back to hotel list</span>
                                                                    <i class="fad fa-times font-size-15 ml-3"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="height-100vh-72">
                                                    <div class="row no-gutters">
                                                        <div class="col-lg-5 col-xl-4 col-wd-3gdot5 order-1 order-lg-0">
                                                            <div class="pt-4 px-4 px-xl-5">
                                                                <div class="mb-4">
                                                                    <div class="mb-2 text-gray-1">
                                                                        50 of 3771 hotels shown
                                                                    </div>
                                                                    <select class="form-control js-select selectpicker dropdown-select" required="" data-msg="Please select option." data-error-class="u-has-error" data-success-class="u-has-success"
                                                                        data-style="form-control font-size-14 border-width-2 border-gray font-weight-normal">
                                                                        <option value="One" selected>Recommended</option>
                                                                        <option value="Two">Low to High</option>
                                                                        <option value="Three">High to Low</option>
                                                                        <option value="Four">Popular</option>
                                                                    </select>
                                                                </div>
            <div class="js-scrollbar height-100vh-72">
                <ul class="d-block list-unstyled">
                    <li class="card mb-4 overflow-hidden">
                        <div class="product-item__outer w-100">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="product-item__header">
                                        <div class="position-relative">
                                            <a href="#" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid min-height-150 card-img-top" src="assets/img/300x230/img58.jpg"></a>
                                        </div>
                                        <div class="position-absolute top-0 left-0 pt-3 pl-4">
                                          <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                            <span class="flaticon-valentine-heart"></span>
                                          </button>
                                        </div>
                                        <div class="position-absolute bottom-0 left-0 right-0">
                                            <div class="px-4 pb-3">
                                                <a href="#" class="d-block">
                                                    <div class="d-flex align-items-center font-size-14 text-white">
                                                        <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Greater London
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 flex-horizontal-center">
                                    <div class="w-100 position-relative m-4 m-md-0">
                                        <div class="mb-1 pb-1">
                                            <span class="green-lighter ml-2">
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                            </span>
                                        </div>
                                        <a href="#">
                                            <span class="font-weight-bold font-size-17 text-dark d-flex mb-1">Avenue Hotel</span>
                                        </a>
                                        <div class="card-body p-0">
                                            <div class="my-2">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£350.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="card mb-4 overflow-hidden">
                        <div class="product-item__outer w-100">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="product-item__header">
                                        <div class="position-relative">
                                            <a href="#" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid min-height-150 card-img-top" src="assets/img/300x230/img59.jpg"></a>
                                        </div>
                                        <div class="position-absolute top-0 left-0 pt-3 pl-4">
                                          <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                            <span class="flaticon-valentine-heart"></span>
                                          </button>
                                        </div>
                                        <div class="position-absolute bottom-0 left-0 right-0">
                                            <div class="px-4 pb-3">
                                                <a href="#" class="d-block">
                                                    <div class="d-flex align-items-center font-size-14 text-white">
                                                        <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Greater London
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 flex-horizontal-center">
                                    <div class="w-100 position-relative m-4 m-md-0">
                                        <div class="mb-1 pb-1">
                                            <span class="green-lighter ml-2">
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                            </span>
                                        </div>
                                        <a href="#">
                                            <span class="font-weight-bold font-size-17 text-dark d-flex mb-1">Avenue 2 </span>
                                        </a>
                                        <div class="card-body p-0">
                                            <div class="my-2">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£350.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="card mb-4 overflow-hidden">
                        <div class="product-item__outer w-100">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="product-item__header">
                                        <div class="position-relative">
                                            <a href="#" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid min-height-150 card-img-top" src="assets/img/300x230/img60.jpg"></a>
                                        </div>
                                        <div class="position-absolute top-0 left-0 pt-3 pl-4">
                                          <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                            <span class="flaticon-valentine-heart"></span>
                                          </button>
                                        </div>
                                        <div class="position-absolute bottom-0 left-0 right-0">
                                            <div class="px-4 pb-3">
                                                <a href="#" class="d-block">
                                                    <div class="d-flex align-items-center font-size-14 text-white">
                                                        <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Greater London
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 flex-horizontal-center">
                                    <div class="w-100 position-relative m-4 m-md-0">
                                        <div class="mb-1 pb-1">
                                            <span class="green-lighter ml-2">
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                            </span>
                                        </div>
                                        <a href="#">
                                            <span class="font-weight-bold font-size-17 text-dark d-flex mb-1">Empire Prestige Causeway Bay </span>
                                        </a>
                                        <div class="card-body p-0">
                                            <div class="my-2">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£350.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="card mb-4 overflow-hidden">
                        <div class="product-item__outer w-100">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="product-item__header">
                                        <div class="position-relative">
                                            <a href="#" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid min-height-150 card-img-top" src="assets/img/300x230/img3.jpg"></a>
                                        </div>
                                        <div class="position-absolute top-0 left-0 pt-3 pl-4">
                                          <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                            <span class="flaticon-valentine-heart"></span>
                                          </button>
                                        </div>
                                        <div class="position-absolute bottom-0 left-0 right-0">
                                            <div class="px-4 pb-3">
                                                <a href="#" class="d-block">
                                                    <div class="d-flex align-items-center font-size-14 text-white">
                                                        <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Greater London
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 flex-horizontal-center">
                                    <div class="w-100 position-relative m-4 m-md-0">
                                        <div class="mb-1 pb-1">
                                            <span class="green-lighter ml-2">
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                            </span>
                                        </div>
                                        <a href="#">
                                            <span class="font-weight-bold font-size-17 text-dark d-flex mb-1">Empire Prestige Causeway Bay </span>
                                        </a>
                                        <div class="card-body p-0">
                                            <div class="my-2">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£350.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="card mb-4 overflow-hidden">
                        <div class="product-item__outer w-100">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="product-item__header">
                                        <div class="position-relative">
                                            <a href="#" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid min-height-150 card-img-top" src="assets/img/300x230/img61.jpg"></a>
                                        </div>
                                        <div class="position-absolute top-0 left-0 pt-3 pl-4">
                                          <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                            <span class="flaticon-valentine-heart"></span>
                                          </button>
                                        </div>
                                        <div class="position-absolute bottom-0 left-0 right-0">
                                            <div class="px-4 pb-3">
                                                <a href="#" class="d-block">
                                                    <div class="d-flex align-items-center font-size-14 text-white">
                                                        <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Greater London
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 flex-horizontal-center">
                                    <div class="w-100 position-relative m-4 m-md-0">
                                        <div class="mb-1 pb-1">
                                            <span class="green-lighter ml-2">
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                            </span>
                                        </div>
                                        <a href="#">
                                            <span class="font-weight-bold font-size-17 text-dark d-flex mb-1">Empire Prestige Causeway Bay </span>
                                        </a>
                                        <div class="card-body p-0">
                                            <div class="my-2">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£350.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="card mb-4 overflow-hidden">
                        <div class="product-item__outer w-100">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="product-item__header">
                                        <div class="position-relative">
                                            <a href="#" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid min-height-150 card-img-top" src="assets/img/300x230/img62.jpg"></a>
                                        </div>
                                        <div class="position-absolute top-0 left-0 pt-3 pl-4">
                                          <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                            <span class="flaticon-valentine-heart"></span>
                                          </button>
                                        </div>
                                        <div class="position-absolute bottom-0 left-0 right-0">
                                            <div class="px-4 pb-3">
                                                <a href="#" class="d-block">
                                                    <div class="d-flex align-items-center font-size-14 text-white">
                                                        <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Greater London
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 flex-horizontal-center">
                                    <div class="w-100 position-relative m-4 m-md-0">
                                        <div class="mb-1 pb-1">
                                            <span class="green-lighter ml-2">
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                            </span>
                                        </div>
                                        <a href="#">
                                            <span class="font-weight-bold font-size-17 text-dark d-flex mb-1">Empire Prestige Causeway Bay </span>
                                        </a>
                                        <div class="card-body p-0">
                                            <div class="my-2">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£350.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="card mb-4 overflow-hidden">
                        <div class="product-item__outer w-100">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="product-item__header">
                                        <div class="position-relative">
                                            <a href="#" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid min-height-150 card-img-top" src="assets/img/300x230/img63.jpg"></a>
                                        </div>
                                        <div class="position-absolute top-0 left-0 pt-3 pl-4">
                                          <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                            <span class="flaticon-valentine-heart"></span>
                                          </button>
                                        </div>
                                        <div class="position-absolute bottom-0 left-0 right-0">
                                            <div class="px-4 pb-3">
                                                <a href="#" class="d-block">
                                                    <div class="d-flex align-items-center font-size-14 text-white">
                                                        <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Greater London
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 flex-horizontal-center">
                                    <div class="w-100 position-relative m-4 m-md-0">
                                        <div class="mb-1 pb-1">
                                            <span class="green-lighter ml-2">
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                            </span>
                                        </div>
                                        <a href="#">
                                            <span class="font-weight-bold font-size-17 text-dark d-flex mb-1">Empire Prestige Causeway Bay </span>
                                        </a>
                                        <div class="card-body p-0">
                                            <div class="my-2">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£350.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="card mb-4 overflow-hidden">
                        <div class="product-item__outer w-100">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="product-item__header">
                                        <div class="position-relative">
                                            <a href="#" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid min-height-150 card-img-top" src="assets/img/300x230/img9.jpg"></a>
                                        </div>
                                        <div class="position-absolute top-0 left-0 pt-3 pl-4">
                                          <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                            <span class="flaticon-valentine-heart"></span>
                                          </button>
                                        </div>
                                        <div class="position-absolute bottom-0 left-0 right-0">
                                            <div class="px-4 pb-3">
                                                <a href="#" class="d-block">
                                                    <div class="d-flex align-items-center font-size-14 text-white">
                                                        <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Greater London
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 flex-horizontal-center">
                                    <div class="w-100 position-relative m-4 m-md-0">
                                        <div class="mb-1 pb-1">
                                            <span class="green-lighter ml-2">
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                            </span>
                                        </div>
                                        <a href="#">
                                            <span class="font-weight-bold font-size-17 text-dark d-flex mb-1">Empire Prestige Causeway Bay </span>
                                        </a>
                                        <div class="card-body p-0">
                                            <div class="my-2">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£350.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="card mb-4 overflow-hidden">
                        <div class="product-item__outer w-100">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="product-item__header">
                                        <div class="position-relative">
                                            <a href="#" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid min-height-150 card-img-top" src="assets/img/300x230/img10.jpg"></a>
                                        </div>
                                        <div class="position-absolute top-0 left-0 pt-3 pl-4">
                                          <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                            <span class="flaticon-valentine-heart"></span>
                                          </button>
                                        </div>
                                        <div class="position-absolute bottom-0 left-0 right-0">
                                            <div class="px-4 pb-3">
                                                <a href="#" class="d-block">
                                                    <div class="d-flex align-items-center font-size-14 text-white">
                                                        <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> Greater London
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 flex-horizontal-center">
                                    <div class="w-100 position-relative m-4 m-md-0">
                                        <div class="mb-1 pb-1">
                                            <span class="green-lighter ml-2">
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                                <small class="glyph-icon-star flaticon-star-3 font-size-10"></small>
                                            </span>
                                        </div>
                                        <a href="#">
                                            <span class="font-weight-bold font-size-17 text-dark d-flex mb-1">Empire Prestige Causeway Bay </span>
                                        </a>
                                        <div class="card-body p-0">
                                            <div class="my-2">
                                                <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                <span class="font-weight-bold">£350.00</span>
                                                <span class="font-size-14 text-gray-1"> / night</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
                                                        <div class="col-lg-7 col-xl-8 col-wd-8gdot5">
                                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15544.315136188916!2d80.28787859999998!3d13.09419335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7f6b00bf787831af!2sApollo%20City%20Centre%20Hospital%20Sowcarpet!5e0!3m2!1sen!2sin!4v1580992215999!5m2!1sen!2sin" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End On Target Modal -->
                                    </div>

                                    <div class="sidenav border border-color-8 rounded-xs">
                                        <!-- Accordiaon -->
                                        <div id="RatingAccordion" class="accordion rounded shadow-none border-bottom">
                                           <div class="card-collapse" id="shopRatingHeadingOne">
                                                <h3 class="mb-0">
                                                    <button type="button" class="btn btn-link btn-block card-btn py-2 px-5 text-lh-3 collapsed" data-toggle="collapse" data-target="#shopRatingOne" aria-expanded="false" aria-controls="shopRatingOne">
                                                        <span class="row align-items-center">
                                                            <span class="col-9">
                                                                <span class="font-weight-bold font-size-17 text-dark mb-3">Star Rating</span>
                                                            </span>
                                                            <span class="col-3 text-right">
                                                                <span class="card-btn-arrow">
                                                                    <span class="fad fa-chevron-down small"></span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </button>
                                                </h3>
                                            </div>
                                            <div id="shopRatingOne" class="collapse show" aria-labelledby="shopRatingHeadingOne" data-parent="#RatingAccordion">
                                                <div class="card-body pt-0 mt-1 px-5">
                                                    <!-- Checkboxes -->
                                                    <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="brandAdidas">
                                                            <label class="custom-control-label text-lh-inherit text-color-1" for="brandAdidas">
                                                                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary">
                                                                    <div class="green-lighter ml-1 letter-spacing-2">
                                                                        <i class="glyph-icon-star flaticon-star-3"></i>
                                                                        <i class="glyph-icon-star flaticon-star-3"></i>
                                                                        <i class="glyph-icon-star flaticon-star-3"></i>
                                                                        <i class="glyph-icon-star flaticon-star-3"></i>
                                                                        <i class="glyph-icon-star flaticon-star-3"></i>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                        <div class="custom-control custom-checkbox">
                                                           <input type="checkbox" class="custom-control-input" id="brandNewBalance">
                                                           <label class="custom-control-label text-lh-inherit text-color-1" for="brandNewBalance">
                                                                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary">
                                                                    <div class="green-lighter ml-1 letter-spacing-2">
                                                                        <i class="glyph-icon-star flaticon-star-3"></i>
                                                                        <i class="glyph-icon-star flaticon-star-3"></i>
                                                                        <i class="glyph-icon-star flaticon-star-3"></i>
                                                                        <i class="glyph-icon-star flaticon-star-3"></i>
                                                                    </div>
                                                                </div>
                                                           </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                        <div class="custom-control custom-checkbox">
                                                          <input type="checkbox" class="custom-control-input" id="brandNike">
                                                          <label class="custom-control-label text-lh-inherit text-color-1" for="brandNike">
                                                                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary">
                                                                    <div class="green-lighter ml-1 letter-spacing-2">
                                                                        <i class="glyph-icon-star flaticon-star-3"></i>
                                                                        <i class="glyph-icon-star flaticon-star-3"></i>
                                                                        <i class="glyph-icon-star flaticon-star-3"></i>
                                                                    </div>
                                                                </div>
                                                          </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                        <div class="custom-control custom-checkbox">
                                                          <input type="checkbox" class="custom-control-input" id="brandFredPerry">
                                                          <label class="custom-control-label text-lh-inherit text-color-1" for="brandFredPerry">
                                                                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary">
                                                                    <div class="green-lighter ml-1 letter-spacing-2">
                                                                        <i class="glyph-icon-star flaticon-star-3"></i>
                                                                        <i class="glyph-icon-star flaticon-star-3"></i>
                                                                    </div>
                                                                </div>
                                                          </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                                                                        <span class="fad fa-chevron-down small"></span>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </button>
                                                    </h3>
                                                </div>
                                                <div id="shopCardOne" class="collapse show" aria-labelledby="shopCardHeadingOne" data-parent="#shopCartAccordion">
                                                    <div class="card-body pt-0 px-5">
                                                        <div class="pb-3 mb-1 d-flex text-lh-1">
                                                            <span>$</span>
                                                            <span id="rangeSliderExample3MinResult" class=""></span>
                                                            <span class="mx-0dot5"> — </span>
                                                            <span>$</span>
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
                                        <!-- Extra Options for later -->

                                        <?php 
                                        //Temp disable
                                        /*  ?>
                                        <div id="shopCategoryAccordion" class="accordion rounded-0 shadow-none border-top">
                                            <div class="border-0">
                                                <div class="card-collapse" id="shopCategoryHeadingOne">
                                                    <h3 class="mb-0">
                                                        <button type="button" class="btn btn-link btn-block card-btn py-2 px-5 text-lh-3 collapsed" data-toggle="collapse" data-target="#shopCategoryOne" aria-expanded="false" aria-controls="shopCategoryOne">
                                                            <span class="row align-items-center">
                                                                <span class="col-9">
                                                                    <span class="font-weight-bold font-size-17 text-dark mb-3">Meals</span>
                                                                </span>
                                                                <span class="col-3 text-right">
                                                                    <span class="card-btn-arrow">
                                                                        <span class="fad fa-chevron-down small"></span>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </button>
                                                    </h3>
                                                </div>
                                                <div id="shopCategoryOne" class="collapse show" aria-labelledby="shopCategoryHeadingOne" data-parent="#shopCategoryAccordion">
                                                    <div class="card-body pt-0 mt-1 px-5 pb-4">
                                                       <!-- Checkboxes -->
                                                        <div class="form-group font-size-14 text-lh-md text-secondary mb-3 flex-center-between">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="1">
                                                                <label class="custom-control-label" for="1">Breakfadt Included</label>
                                                            </div>
                                                            <span>749</span>
                                                        </div>
                                                        <div class="form-group font-size-14 text-lh-md text-secondary mb-3 flex-center-between">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="2">
                                                                <label class="custom-control-label" for="2">All-inclusive</label>
                                                            </div>
                                                            <span>630</span>
                                                        </div>
                                                        <div class="form-group font-size-14 text-lh-md text-secondary mb-3 flex-center-between">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="3">
                                                                <label class="custom-control-label" for="3">Breakfadt & dinner included</label>
                                                            </div>
                                                            <span>58</span>
                                                        </div>
                                                        <div class="form-group font-size-14 text-lh-md text-secondary mb-3 flex-center-between">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="4">
                                                                <label class="custom-control-label" for="4">Kitchen facilities</label>
                                                            </div>
                                                            <span>29</span>
                                                        </div>
                                                        <!-- End Checkboxes -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div id="facilityCategoryAccordion" class="accordion rounded-0 shadow-none border-top">
                                            <div class="border-0">
                                                <div class="card-collapse" id="facilityCategoryHeadingOne">
                                                    <h3 class="mb-0">
                                                        <button type="button" class="btn btn-link btn-block card-btn py-2 px-5 text-lh-3 collapsed" data-toggle="collapse" data-target="#facilityCategoryOne" aria-expanded="false" aria-controls="facilityCategoryOne">
                                                            <span class="row align-items-center">
                                                                <span class="col-9">
                                                                    <span class="font-weight-bold font-size-17 text-dark mb-3">Facilities</span>
                                                                </span>
                                                                <span class="col-3 text-right">
                                                                    <span class="card-btn-arrow">
                                                                        <span class="fad fa-chevron-down small"></span>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </button>
                                                    </h3>
                                                </div>
                                                <div id="facilityCategoryOne" class="collapse show" aria-labelledby="facilityCategoryHeadingOne" data-parent="#facilityCategoryAccordion">
                                                    <div class="card-body pt-0 mt-1 px-5 pb-4">
                                                        <div class="form-group font-size-14 text-lh-md text-secondary mb-3 flex-center-between">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="Adidas">
                                                                <label class="custom-control-label" for="Adidas">Parking</label>
                                                            </div>
                                                            <span>749</span>
                                                        </div>
                                                        <div class="form-group font-size-14 text-lh-md text-secondary mb-3 flex-center-between">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="NewBalance">
                                                                <label class="custom-control-label" for="NewBalance">Restaurant</label>
                                                            </div>
                                                            <span>630</span>
                                                        </div>
                                                        <div class="form-group font-size-14 text-lh-md text-secondary mb-3 flex-center-between">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="Nike">
                                                                <label class="custom-control-label" for="Nike">Pet friendly</label>
                                                            </div>
                                                            <span>58</span>
                                                        </div>
                                                        <div class="form-group font-size-14 text-lh-md text-secondary mb-3 flex-center-between">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="FredPerry">
                                                                <label class="custom-control-label" for="FredPerry">Room service</label>
                                                            </div>
                                                            <span>29</span>
                                                        </div>
                                                        <!-- End Checkboxes -->

                                                        <!-- View More - Collapse -->
                                                        <div class="collapse" id="collapseBrand1">
                                                            <div class="form-group font-size-14 text-lh-md text-secondary mb-3 flex-center-between">
                                                                <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="brandGucci">
                                                                <label class="custom-control-label" for="brandGucci">Gucci</label>
                                                                </div>
                                                                <span>5</span>
                                                            </div>
                                                            <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-3">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="brandMango">
                                                                    <label class="custom-control-label" for="brandMango">Mango</label>
                                                                </div>
                                                                <span>1</span>
                                                            </div>
                                                        </div>
                                                        <!-- End View More - Collapse -->

                                                        <!-- Link -->
                                                        <a class="link link-collapse small font-size-1" data-toggle="collapse" href="#collapseBrand1" role="button" aria-expanded="false" aria-controls="collapseBrand1">
                                                          <span class="link-collapse__default font-size-14">Show all 13</span>
                                                          <span class="link-collapse__active font-size-14">Show less</span>
                                                        </a>
                                                        <!-- End Link -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                      
                                        <div id="cityCategoryAccordion" class="accordion rounded-0 shadow-none border-top">
                                            <div class="border-0">
                                                <div class="card-collapse" id="cityCategoryHeadingOne">
                                                    <h3 class="mb-0">
                                                        <button type="button" class="btn btn-link btn-block card-btn py-2 px-5 text-lh-3 collapsed" data-toggle="collapse" data-target="#cityCategoryOne" aria-expanded="false" aria-controls="cityCategoryOne">
                                                            <span class="row align-items-center">
                                                                <span class="col-9">
                                                                    <span class="font-weight-bold font-size-17 text-dark mb-3">City</span>
                                                                </span>
                                                                <span class="col-3 text-right">
                                                                    <span class="card-btn-arrow">
                                                                        <span class="fad fa-chevron-down small"></span>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </button>
                                                    </h3>
                                                </div>
                                                <div id="cityCategoryOne" class="collapse show" aria-labelledby="cityCategoryHeadingOne" data-parent="#cityCategoryAccordion">
                                                    <div class="card-body pt-0 mt-1 px-5 pb-4">
                                                        <div class="form-group font-size-14 text-lh-md text-secondary mb-3 flex-center-between">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="brandamsterdam">
                                                                <label class="custom-control-label" for="brandamsterdam">Amsterdam</label>
                                                            </div>
                                                            <span>749</span>
                                                        </div>
                                                        <div class="form-group font-size-14 text-lh-md text-secondary mb-3 flex-center-between">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="brandrotterdam">
                                                                <label class="custom-control-label" for="brandrotterdam">Rotterdam</label>
                                                            </div>
                                                            <span>630</span>
                                                        </div>
                                                        <div class="form-group font-size-14 text-lh-md text-secondary mb-3 flex-center-between">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="brandvalkenburg">
                                                                <label class="custom-control-label" for="brandvalkenburg">Valkenburg</label>
                                                            </div>
                                                            <span>58</span>
                                                        </div>
                                                        <div class="form-group font-size-14 text-lh-md text-secondary mb-3 flex-center-between">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="brandeindhoven">
                                                                <label class="custom-control-label" for="brandeindhoven">Eindhoven</label>
                                                            </div>
                                                            <span>29</span>
                                                        </div>
                                                        <!-- End Checkboxes -->

                                                        <!-- View More - Collapse -->
                                                        <div class="collapse" id="collapseBrand3">
                                                            <div class="form-group font-size-14 text-lh-md text-secondary mb-3 flex-center-between">
                                                                <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="gucci">
                                                                <label class="custom-control-label" for="gucci">Gucci</label>
                                                                </div>
                                                                <span>5</span>
                                                            </div>
                                                            <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-3">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="mango">
                                                                    <label class="custom-control-label" for="mango">Mango</label>
                                                                </div>
                                                                <span>1</span>
                                                            </div>
                                                        </div>
                                                        <!-- End View More - Collapse -->

                                                        <!-- Link -->
                                                        <a class="link link-collapse small font-size-1" data-toggle="collapse" href="#collapseBrand3" role="button" aria-expanded="false" aria-controls="collapseBrand3">
                                                          <span class="link-collapse__default font-size-14">Show all 25</span>
                                                          <span class="link-collapse__active font-size-14">Show less</span>
                                                        </a>
                                                        <!-- End Link -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php */
                                        // City filter disabled
                                         ?>
                                        <!-- End Accordion -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xl-9 order-md-1 order-lg-2 pb-5 pb-lg-0">
                        <!-- Shop-control-bar Title -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="font-size-21 font-weight-bold mb-0 text-lh-1"><?php
                            $h_found = count($fetch_all);
                             echo strtoupper($city).": ";
                            if ($h_found == 0) {
                                echo " No Hotels Found for the dates that you have provided";
                            }
                            elseif ($h_found == 1) {
                                echo "1 Hotel Found";
                             }
                            elseif ($h_found >= 1) {
                                echo $h_found." Hotels Found";
                             }

                              ?></h3>
                            <ul class="nav tab-nav-shop flex-nowrap" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link font-size-22 p-0 active" id="pills-three-example1-tab" data-toggle="pill" href="#pills-three-example1" role="tab" aria-controls="pills-three-example1" aria-selected="true">
                                        <div class="d-md-flex justify-content-md-center align-items-md-center">
                                            <i class="fad fa-list"></i>
                                        </div>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                        <!-- End shop-control-bar Title -->

                        <!-- Slick Tab carousel -->
                        <div class="u-slick__tab">
                            <!-- Nav Links -->
                            <div class="mb-5">
                                <ul class="nav flex-nowrap border border-radius-3 tab-nav align-items-center py-2 px-0" role="tablist">
                                    <li class="nav-item d-flex align-items-center flex-shrink-0 flex-xl-shrink-1">
                                        <a href="#" class="nav-link font-weight-normal text-gray-1 text-lh-1dot6 py-1 px-4 px-wd-5 font-weight-normal font-size-15 ">Recommended
                                        </a>
                                    </li>
                                    <li class="nav-item d-flex align-items-center flex-shrink-0 flex-xl-shrink-1 border-left">
                                        <select class="js-select selectpicker dropdown-select bootstrap-select__custom-nav w-auto" data-style="btn-sm py-1 px-4 px-wd-5 font-weight-normal font-size-15  text-gray-1 d-flex align-items-center">
                                          <option value="one" selected>Price</option>
                                          <option value="two">Two</option>
                                          <option value="three">Three</option>
                                          <option value="four">Four</option>
                                        </select>
                                    </li>
                                    <li class="nav-item d-flex align-items-center flex-shrink-0 flex-xl-shrink-1 border-left">
                                        <select class="js-select selectpicker dropdown-select bootstrap-select__custom-nav w-auto" data-style="btn-sm py-1 px-4 px-wd-5 font-weight-normal font-size-15  text-gray-1 d-flex align-items-center">
                                          <option value="one" selected>Stars</option>
                                          <option value="two">Two</option>
                                          <option value="three">Three</option>
                                          <option value="four">Four</option>
                                        </select>
                                    </li>
                                    <li class="nav-item d-flex align-items-center flex-shrink-0 flex-xl-shrink-1 border-left">
                                        <a href="#" class="nav-link font-weight-normal text-gray-1 text-lh-1dot6 py-1 px-4 px-wd-5 font-weight-normal font-size-15 ">Guest Rating
                                        </a>
                                    </li>
                                    <li class="nav-item d-flex align-items-center flex-shrink-0 flex-xl-shrink-1 border-left">
                                        <a href="#" class="nav-link font-weight-normal text-gray-1 text-lh-1dot6 py-1 px-4 px-wd-5 font-weight-normal font-size-15 ">Distance
                                        </a>
                                    </li>
                                    <li class="nav-item d-flex align-items-center flex-shrink-0 flex-xl-shrink-1 border-left">
                                        <a href="#" class="nav-link font-weight-normal text-gray-1 text-lh-1dot6 py-1 px-4 px-wd-5 font-weight-normal font-size-15 ">Top Reviewed
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Nav Links -->

                            <!-- Tab Content -->
                            <div class="tab-content" id="pills-tabContent">
                                <?php foreach ($fetch_all as $hotel) { ?>
                                <div class="tab-pane show active" style="" id="pills-three-example1" role="tabpanel" aria-labelledby="pills-three-example1-tab" data-target-group="groups">
                                    <ul class="d-block list-unstyled products-group prodcut-list-view">
                                        <li class="card mb-5 overflow-hidden">
                                            <div class="product-item__outer w-100" style="padding:10px">
                                                <div class="row">
                                                    <div class="col-md-5 col-xl-4">
                                                        <div class="product-item__header">
                                                            <div class="position-relative">
                                                                <div class="js-slick-carousel u-slick u-slick--equal-height "
                                                                    data-slides-show="1"
                                                                    data-slides-scroll="1"
                                                                    data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic v4 u-slick__arrow-classic--v4 u-slick__arrow-centered--y rounded-circle"
                                                                    data-arrow-left-classes="flaticon-back u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left"
                                                                    data-arrow-right-classes="flaticon-next u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right"
                                                                    data-pagi-classes="js-pagination text-center u-slick__pagination u-slick__pagination--white position-absolute right-0 bottom-0 left-0 mb-3 mb-0">
                                    <?php
                                    
                                       /* $images_arr = explode("***", $hotel['photos']);
                                         foreach ($images_arr as $img) {
                                            $hotel_image = "cp/hotels/".$hotel['hotel_id']."/photos/".$img;
                                            ?>
                                                                    
                                    <?php }*/ ?>
                                                                    <div class="js-slide">
                                                                        <a href="#" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                                            <img class="img-fluid min-height-230 card-img-top" src="<?php echo(getPath($hotel['hotelID'])) ?>"></a>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-7 col-xl-5 col-wd-4gdot5 flex-horizontal-center">
                                                        <div class="w-100 position-relative m-4 m-md-0">
                                                            

                                                            <div class="position-absolute top-0 right-0 pr-md-3 d-none d-md-block">
                                                                <button type="button" class="btn btn-sm btn-icon rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                                    <span class="flaticon-heart-1 font-size-20"></span>
                                                                </button>
                                                            </div>
                                                                <span class="font-weight-medium font-size-17 text-dark d-flex mb-1"><?php echo $hotel['hotelName']; ?></span>
                                                                <div class="mb-1 pb-1">
                                                                    <!-- Limited time offer -->
                                                                    <!-- <span class="badge badge-orange text-white rounded-xs font-size-13 py-1 p-xl-2">Limited Time Offer</span> -->
                                        
                                                                        <?php
                                                                        //Getting the number of stars
                                                                        $rating = explode(" ", $hotel['rating'])[0];
                                                                        //echo $rating;
                                                                        ?>
                                                                        <span class="green-lighter ml-2">
                                                                        <?php //emplementing stars
                                                                        for ($i=1; $i <= $rating; $i++) { ?>
                                                                            <small class="glyph-icon-star flaticon-star-3 font-size-7"></small>
                                                                        <?php } ?>
                                                                    </span>
                                                                </div>
                                                            <div class="card-body p-0">
                                                                <span href="<?php echo $hotel['location']; ?>" class="d-block mb-3">
                                                                    <div class="d-flex flex-wrap flex-xl-nowrap align-items-center font-size-14 text-gray-1">
                                                                        <i class="icon flaticon-pin mr-2 font-size-20"></i><?php echo $hotel['city'] ?>
                                                                    </div>
                                                                </span>
                                                                <div class="" style="margin: 10px;padding: 10px" >
                                                                    <?php echo $hotel['roomDetails']; ?>
                                                                </div>
                                                                <ul class="list-unstyled mb-2 d-md-flex flex-lg-wrap flex-xl-nowrap">

                                                                    <li class="border border-dark rounded-xs d-flex align-items-center text-lh-1 py-1 px-2 mr-md-2 mb-2 mb-md-0 mb-lg-2 mb-xl-0">
                                                                        <span class="font-weight-normal font-size-14">Services</span>
                                                                    </li>
                                                                    
                                                                </ul>
                                                                <ul class="list-unstyled d-md-flex">
                                                                    <li class="border border-green bg-green rounded-xs d-flex align-items-center text-lh-1 py-1 px-3 mb-2 mb-md-0">
                                                                        <span class="font-weight-normal font-size-14 text-white">Lowest price includes</span>
                                                                    </li>
                                                                    <li class="border border-green rounded-xs d-flex align-items-center text-lh-1 py-1 px-3 ml-md-n1 mb-2 mb-md-0">
                                                                        <span class="font-weight-normal font-size-14 text-green">Free Breakfast</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col col-xl-3 col-wd-3gdot5 align-self-center py-4 py-xl-0 border-top border-xl-top-0">
                                                        <div class="d-xl-flex flex-wrap border-xl-left ml-4 ml-xl-0 pr-xl-3 pr-wd-5 text-xl-right justify-content-xl-end">
                                                            <!-- Customer rivew -->
                                                           <!--  <div class="mb-xl-5 mb-wd-7">
                                                                <div class="mb-0">
                                                                    <div class="my-xl-1">
                                                                        <div class="d-flex align-items-center justify-content-xl-end mb-2">
                                                                            <span class="badge badge-primary rounded-xs font-size-14 p-2 mr-2 mb-0">4.6 /5 </span>
                                                                            <span class="font-size-17 font-weight-bold text-primary">Very Good</span>
                                                                        </div>
                                                                    </div>
                                                                    <span class="font-size-14 text-gray-1">(1,186 Reviews)</span>
                                                                </div>
                                                                <span class="font-size-14 pl-xl-2">"Great value" "Excellent location"</span>
                                                            </div>
                                                             -->
                                                             <div class="mb-0">
                                                                <span class="mr-1 font-size-14 text-gray-1">From:</span>
                                                                <span class="font-weight-bold"><?php echo $hotel['fromDate'] ?></span>
                                                                <br>
                                                                <span class="mr-1 font-size-14 text-gray-1">To:</span>
                                                                <span class="font-weight-bold"><?php echo $hotel['toDate'] ?></span>
                                                                <br>
                                                                <hr class="style1">
                                                            </div>
                                                            <div class="mb-0">
                                                                <span class="font-weight-bold"><?php echo $nights ;?></span>
                                                                <span class="mr-1 font-size-14 text-gray-1">Nights</span>
                                                                <span>,</span>
                                                                <span class="font-weight-bold"><?php echo $adults; ?></span>
                                                                <span class="font-size-14 text-gray-1"> Adults</span>
                                                            </div>
                                                            <div class="mb-0" >
                                                                <span class="mr-1 font-size-14 text-gray-1"></span>
                                                                <span class="font-weight-bold">US$ <?php echo $hotel['lower(TOTAL_RATE)']; ?></span>
                                                                
                                                            </div>
                                                            <div class="mb-0" >
                                                                <span class="mr-1 font-size-14 text-gray-1"></span>
                                                                <span class="font-weight-bold">
                                                                    <a class="btn btn-primary hover btn-sm" style="padding: 10px" href="hotel.php?hotel_id=<?php echo $hotel['hotelID']; echo "&check_in=".$hotel['fromDate'];echo "&check_out=".$hotel['toDate'];echo "&adults=".$adults;echo "&child=".$child; echo "&nights=". $nights;echo "&roomsNum=".$rooms_num ?>">Select your room </a>
                                                                </span>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        </li>
                                    </ul>
                                </div>
                <?php } ?>
                            </div>
                            <!-- End Tab Content -->
                        </div>
                        <!-- Slick Tab carousel -->
                    </div>
                </div>
            </div>
        </main>
        <!-- ========== END MAIN CONTENT ========== -->

        <!-- ========== FOOTER ========== -->
         <?php include('sections/footer.php'); ?>
        <!-- ========== End FOOTER ========== -->

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
        <script src="assets/vendor/custombox/dist/custombox.min.js"></script>
        <script src="assets/vendor/custombox/dist/custombox.legacy.min.js"></script>
        <script src="assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

        <!-- JS MyTravel -->
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
        <script src="assets/js/components/hs.modal-window.js"></script>
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

                // initialization of autonomous popups
                $.HSCore.components.HSModalWindow.init('[data-modal-target]', '.js-modal-window', {
                    autonomous: true
                });

                // initialization of show animations
                $.HSCore.components.HSShowAnimation.init('.js-animation-link');

                // initialization of forms
                $.HSCore.components.HSRangeSlider.init('.js-range-slider');

                // initialization of select
                $.HSCore.components.HSSelectPicker.init('.js-select');

                // initialization of malihu scrollbar
                $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));

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
