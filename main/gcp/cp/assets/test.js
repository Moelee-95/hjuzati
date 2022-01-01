//convert from: Wed Apr 01 2020  00:00:00 GMT+0300 (Arabian Standard Time)  to 4/30/2020
function longToShort(d){
		var giveBack = ((d.getMonth() > 8) ? (d.getMonth() + 1) : ('0' + (d.getMonth() + 1))) + '/' + ((d.getDate() > 9) ? d.getDate() : ('0' + d.getDate())) + '/' + d.getFullYear();
		return giveBack;
	}
//Convert from 04/30/2020 to standerd date: Wed Apr 01 2020  00:00:00 GMT+0300 (Arabian Standard Time)
function shortToLong(d){
		var giveBack = new Date(d);
		giveBack.toDateString();
		return giveBack;
	}
// Convert Date from 04/09/2020 to 4/9/2020
function remove_zeros(date){
	var array = date.split("/")
	var m = array[0];
	var d = array[1];
	var y = array[2];
	var dy = d.charAt(0);
	var mh = m.charAt(0);
	if (dy == 0) {
		d = d.substring(1);
	}
	if (mh == 0) {
		m = m.substring(1);
	}
	var giveBack = m+"/"+d+"/"+y;
	return giveBack;
  
}




//     #####  functions to check single room setup bulk edit ######  ///
			//check room input values and returen the state4 value
			function ch_r_num(){
				var roomsNumbers = _("roomsNumbersSingle").value;
				if (roomsNumbers >= 0) {
					_("sRoomsNumbersAlert").style.display = "none";
					state4 = 1;
				}
				else{
					_("sRoomsNumbersAlert").style.display = "block"
					state4 = 0;
					_('roomsNumbersSingle').focus();
				}
				return state4;
			}
			////check room input values and returen the state4 value
			function ch_r_price(){
				var roomsPrices = _("sgl_rooms_prices").value;
				if (roomsPrices >= "0") {
					_("sRoomsPriceAlert").style.display = "none";
					state4 = 1;
				}
				else{
					_("sRoomsPriceAlert").style.display = "block"
					state4 = 0;
					_('sRoomsPriceAlert').focus();
				}
				return state4;
			}

//     ##### End functions to check single room setup bulk edit ######  ///

//     #####  functions to check Multi Rooms setup bulk edit ######  ///
			//check room input values and returen the state4 value
			function ch_r_num_multi(){
				var roomsNumbers = _("roomsNumbersMulti").value;
				if (roomsNumbers >= "0") {
					_("roomsNumbersMultiAlert").style.display = "none";
					state4 = 1;
				}
				else{
					_("roomsNumbersMultiAlert").style.display = "block"
					state4 = 0;
					_('roomsNumbersMulti').focus();
				}
				return state4;
			}
			////check room input values and returen the state4 value
			function ch_r_price_multi(){
				var roomsPrices = _("roomsPricesMulti").value;
				if (roomsPrices >= "0") {
					_("roomsPricesMultiAlert").style.display = "none";
					state4 = 1;
				}
				else{
					_("roomsPricesMultiAlert").style.display = "block"
					state4 = 0;
					_('roomsPricesMulti').focus();
				}
				return state4;
			}

//     ##### End functions to check Multi Rooms setup bulk edit ######  ///

//check the dates fields and makeing sure they are not empty, return state1 and state 2
function ch_dates(){
	var state1;
	var state2;
	var fromDate = _("fromDate");
	var toDate = _("toDate");
	if (fromDate.value == "") {
		_("fromDateAlert").style.display ="block";
		fromDate.focus();
		state1 = "0";
	}
	else{
		_("fromDateAlert").style.display ="none";
		state1 = "1";
	}
	if (toDate.value == "") {
		_("toDateAlert").style.display ="block";
		toDate.focus();
		state2 = "0";
	}
	else{
		_("toDateAlert").style.display ="none";
		state2 = "1";
	}
	return state1+","+state2;

}

function ch_boxes() {
		//Making sure user selects at least one day
		//Declaring Global variables for days
var sun = _("sun").checked;
var mon = _("mon").checked;
var tue = _("tue").checked;
var wed = _("wed").checked;
var thu = _("thu").checked;
var fri = _("fri").checked;
var sat = _("sat").checked;

var state3;
	if (sun == false && mon == false && tue == false && wed == false && thu == false && fri == false && sat == false){
		_("daysAlert").style.display = "block";
		state3 = "0";

	}
	else if (sun == true || mon == true || tue == true || wed == true || thu == true || fri == true || sat == true){
		_("daysAlert").style.display = "none";
		state3 = "1";
	}
	return state3;
}
//set values for bulk multi section
function bulk_multi(inName){
	var roomsIdNm = _("multi_roms_vlas").value;
	var value;
	var hide_btn;
	var show_alrt;
	//Making sure rooms Names,Ides input isn't empty
	if (roomsIdNm != "") {
		_("div_in").style.border= "none";
		if (inName  == "rNum") {
			//check roomsNumbersSingle value, should be >0
			var state4 = ch_r_num_multi();
			//assign value of roomsNumbersSingle to value variable
			value = _("roomsNumbersMulti").value;
			hide_btn = "setMultiRoomsNumbers";
			show_alrt = "multi_num_success";
		}
		else if (inName == "sRate" || inName == "bRate") {
			//check prices value, should be >0
			var state4 = ch_r_price_multi();
			//assign value of sgl_rooms_prices to value variable
			value = _("roomsPricesMulti").value;
			hide_btn = "setMultiRoomsPrices";
			show_alrt = "multi_price_success";
		}
		else if (inName == "open_close") {
		//check check box if checked or not and covert that to number 0:unchecked 1:checked
			var input = _("close_open_multi").checked;
			var state4 = 1;
			if (input == true) {
				value = 1;
			}
			else if (input == false) {
				value = 0;
			}
			else{
				alert("Something went wrong while trying to close open a room");
			}
			hide_btn = "setMultiOpenClose";
			show_alrt = "multi_Open_close_success";
		}
	}
	else{
		_("div_in").style.border = "1px solid red";
		var state4 = 0;
	}
	//after Finishing the loop, i put it befor because it does't work after it
	//hide the set button & show small alert
	//alert("hide button Id:"+hide_btn+"  show alert:"+show_alrt);
	if (inName != "" && value != "" && roomsIdNm != "" && state4 == 1) {
		$('#'+hide_btn ).hide( "slow", function() {
			$(this).fadeIn(10000);
	  });
	  $('#'+show_alrt ).show( "slow", function() {
			$(this).fadeOut(10000);
	  });
	}
	else{
		//alert("there is some missing fields. please fill them and try again!")
	}
	 

	//alert("hide button Id:"+hide_btn+"  show alert:"+show_alrt);
	var sp_roms = roomsIdNm.split(",.,");
	for (var i = 0; i <= sp_roms.length; i++) {
		var spIdNm = sp_roms[i].split("___");
		var rmId = spIdNm[0];
		var rmNm = spIdNm[1];
		//alert(inName+" | "+value+" | "+rmId+" | "+rmNm+" | "+state4)
		test(inName,value,rmId,rmNm,state4);
	}


	//update the list set, highlight etc..
	
	
}

// ## End setting values for multi rooms ####

//set values for bulk single section
function bulk_single(inName){
	var roomId = _("single_id").value;
	var roomName = _("showeRName").innerHTML;
	var value;
	var hide_btn;
	var show_alrt;

	var choose =_("single_id").value;
	if (choose != "") {
		_("single_list").style.border = "";
		if (inName  == "rNum") {
			//check roomsNumbersSingle value, should be >0
			var state4 = ch_r_num();
			//assign value of roomsNumbersSingle to value variable
			value = _("roomsNumbersSingle").value;
			hide_btn = "setSingleRoomsNum";
			show_alrt = "single_num_success";
		}
		else if (inName == "sRate" || inName == "bRate") {
			//check prices value, should be >0
			var state4 = ch_r_price();
			//assign value of sgl_rooms_prices to value variable
			value = _("sgl_rooms_prices").value;
			hide_btn = "setRoomsPrices";
			show_alrt = "single_price_success";
		}
		else if (inName == "open_close") {
		//check check box if checked or not and covert that to number 0:unchecked 1:checked
			var input = _("open_close_single").checked;
			var state4 = 1;
			if (input == true) {
				value = 1;
			}
			else if (input == false) {
				value = 0;
			}
			else{
				alert("Something went wrong while trying to close open a room");
			}
			hide_btn = "setRoomState";
			show_alrt = "single_open_close_success";
		}
	}
	else{
		_("single_list").style.border = "1px solid red";
		state4 = 0;
	}
		//alert(inName+" "+value+" "+roomId+" "+roomName+" "+state4);
	if (inName != "" && value != null && roomId != "" && state4 == 1) {
		$('#'+hide_btn ).hide("slow", function() {
			$(this).fadeIn(10000);
	  	});
	  	$('#'+show_alrt ).show("slow", function() {
			$(this).fadeOut(10000);
	 	 });
	}
	else{
		alert("there is some missing fields. please fill them and try again!");
	}
	//alert(inName+" "+value+" "+roomId+" "+roomName+" "+state4);
	test(inName,value,roomId,roomName,state4);
//after Finishing the loop
	//hide the set button and show small alert


}



function test(inName,value,roomId,roomName,state4){
	var fromDate = _("fromDate");
	var toDate = _("toDate");
	var hotel_id = _("hotel_id").value;

	//check date and Making sure dates fields aren't empty
	//incoming data is state1,state2 split them then use echOne Alone
	var state =ch_dates().split(",");
	var state1 = state[0];
	var state2 = state[1];

	//check days checkboxes states at least one of them should be selectd 
	var state3 =ch_boxes();

//Dates Work:
	//declear the date
	var Org_frm_date = fromDate.value;
	var org_to_date = toDate.value;
	//Convert from 4/30/2020 to standerd date: Wed Apr 01 2020  00:00:00 GMT+0300 (Arabian Standard Time)
	var fromDateL = shortToLong(Org_frm_date);
	var toDateL = shortToLong(org_to_date);
	//good Note, while compairing dates should use this syntax
	//alert(fromDateL.getTime() > toDateL.getTime());

	//should be declared to use when checking for checkboxes 
	var sunVal = _("sun").checked;
	var monVal = _("mon").checked;
	var tueVal = _("tue").checked;
	var wedVal = _("wed").checked;
	var thuVal = _("thu").checked;
	var friVal = _("fri").checked;
	var satVal = _("sat").checked;
	//declaring everthing needed 
	var sun;
	var mon;
	var tue;
	var wed;
	var thu;
	var fri;
	var sat;
	// converting checkboxes to week numbers 
	if ( sunVal == true) {sun = 0 } else{ sun = 7;}
	if ( monVal == true) {mon = 1 } else{ mon = 7;}
	if ( tueVal == true) {tue = 2 } else{ tue = 7;}
	if ( wedVal == true) {wed = 3 } else{ wed = 7;}
	if ( thuVal == true) {thu = 4 } else{ thu = 7;}
	if ( friVal == true) {fri = 5 } else{ fri = 7;}
	if ( satVal == true) {sat = 6 } else{ sat = 7;}

	//all fields should be filled to execute the code
	//alert(state1 +"  "+state2 +"  "+state3+ "  " +state4);
	//For checking if doesn't work:alert(inName+"  "+value+"  "+roomId+"  "+roomName+"  s4:"+state4+"  s2:"+state2+"  s3:"+state3+"  s1:"+state1)
	 if (state1 == 1  && state2 == 1 && state3 == 1 && state4 == 1 ) {
	 	//gooing to dates one by one to send the selected dates to the db
	 	while(fromDateL.getTime() <= toDateL.getTime()){
				if (fromDateL.getDay()== sun || fromDateL.getDay()== mon || 
					fromDateL.getDay()== tue || fromDateL.getDay()== wed ||
					fromDateL.getDay()== thu || fromDateL.getDay()== fri ||
					fromDateL.getDay()== sat ) {
					//convert date and send it to the function in calendar
					//alert(fromDateL);
					var sendDate = longToShort(fromDateL);
					// Convert Date from 04/09/2020 to 4/9/2020 formatting
					var finalDate = remove_zeros(sendDate);
					//function to save the data into the DB
					//for checking if doesn't work:alert(hotel_id+"  "+roomId+"  "+roomName+"  "+finalDate+"  "+inName+"  "+value);
					sendData(hotel_id,roomId,roomName,sendDate,inName,value);

				}		
						//Alert when setting data is done
			if (fromDateL.getTime() == toDateL.getTime()) {
						//alert("request is done!");

						/* $( "#setSingleRoomsNum" ).hide( "slow", function() {
						   $(this).fadeIn(10000);
						  });
						 */
					}	
			//increment by 1 day
			fromDateL.setDate(fromDateL.getDate() + 1);
		}	
	}
	convert_set();
	var done = roomName+"1";
	return done;
}


//when clicking on the days Checkboxes making sure user choses at least one day
$('.custom-control-input').click(function(){
        if($(this).is(":checked")){
            ch_boxes();
        }
        else if($(this).is(":not(:checked)")){
            ch_boxes();
        }
    });