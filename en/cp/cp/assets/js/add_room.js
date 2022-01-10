function __(el) {
    return document.getElementById(el);
}


/* window.onload = function(){
   setTimeout(check_all, 2)
};


function check_all() { 
    show_selected();
    guest_no();
    add_guests();
    input_price(); 
    logo_check_guset_number(_("guest_num").value);

}*/




// function hide(){
//             var form = _("insertForm");
//             var empty_state = _("empty_state");

//             if (form.style.display === "block") {
//                 form.style.display = "none";
//             }
//             if (empty_state.style.display === "none" ) {
//                 empty_state.style.display = "block";
//             }
            

        

// 			window.location.href = "layout_pricing.php";
// 		}
// 		function show(){
// 			var form = _("insertForm");
// 			var empty_state = _("empty_state");

// 			if (form.style.display === "none") {
// 				form.style.display = "block";
// 			}
// 			if (empty_state.style.display === "block" ) {
// 				empty_state.style.display = "none";
// 			}
			

// 		}



/*
		function show_selected(){
             alert("wtf");
            //Select the element with id sell
            var selector = _('sell');
            //get the text of the sell element
            var value = selector[selector.selectedIndex].text;
            //get the value of selected opetion in sell element
            var value_0 = selector[selector.selectedIndex].value;*/


            // alert("Selected Option Text is:"+value +"  selected element value is:"+value_0);



            /* ##############     OLD DATA ENTRY      #################*/
			/*var selector = _('sell');
    		var value = selector[selector.selectedIndex].text;
    		var value_0 = selector[selector.selectedIndex].value;
    		_('display').innerHTML = value;
    		show = _(value);
            var rooms = ["Single", "Double", "Twin", "Twin/Double", "Triple", "Quad", "Family", "Suite", "Studio", "Apartment", "Dorm Room", "Bed In Dorm Room"];
    		var view1 = _('Single');
    		var view2 = _('Double');
    		var view3 = _('Twin');
    		var view4 = _('Twin/Double');
    		var view5 = _('Triple');
    		var view6 = _('Quad');
    		var view7 = _('Family');
    		var view8 = _('Suite');
    		var view9 = _('Studio');
    		var view10 = _('Apartment');
    		var view11 = _('Dorm Room');
    		var view12 = _('Bed In Dorm Room');
    		var more_options = _('more_options');
    		var bed_options = _('bed_options'); 
    		var room_name_text = _('room_name_text');  
    		var room_size = _('room_size');
    		var price_options = _('price_options');

			if (value_0 == "0") {
                for (var i = 0; i <= rooms.length; i++) {
                 var roomm = _(rooms[i]).id; 
                    _(roomm).style.display="none";
                    _(roomm).disabled = true;
                    _(roomm).setAttribute("id2", ""); 
                
                    more_options.style.display = "none";
                    more_options.disabled = true;
                    bed_options.style.display = "none";
                    bed_options.disabled = true;
                    room_name_text.style.display = "none";
                    room_name_text.disabled = true ;
                    room_size.style.display = "none";
                    room_size.disabled = true ;
                    price_options.display = "none";
                    price_options.disabled = true ;
                    room_size.style.display = "none";
                    room_size.disabled = true ;
                    price_options.style.display = "none";
                    price_options.disabled = true ;
                }
				
    			
			}

    		if (value == "Single") {
                _("offer_lower_rate").style.display = "none";
                _("summery_room_type").innerHTML = "Single";

              for (var i = 0; i <= rooms.length; i++) {
                 var roomm = _(rooms[i]).id; 
                if (i != 0) {
                    _(roomm).style.display="none";
                    _(roomm).disabled = true;
                    _(roomm).setAttribute("id2", ""); 
                }
                else {
                    _(roomm).style.display="block";
                    _(roomm).disabled = false;
                    _(roomm).setAttribute("id2", "sel_room_name");
                    
                    more_options.style.display = "none";
                    more_options.disabled = true;
                    bed_options.style.display = "none";
                    bed_options.disabled = true;
                    room_name_text.style.display = "block";
                    room_size.style.display = "block";
                    room_size.disabled = false ;
                    room_size.style.display = "block";
                    room_size.disabled = false ;
                    price_options.style.display = "block";
                    price_options.disabled = false ;
                    _("guest_num").value = 1;
                    //

                    guest_no();
                    logo_check_guset_number(1);
                }
                // alert(roomm);
            }
			
    	}
    		 
    		else if(value == "Double"){
                _("offer_lower_rate").style.display = "block";
                _("summery_room_type").innerHTML = "Double";
                 for (var i = 0; i <= rooms.length; i++) {
                     var roomm = _(rooms[i]).id; 
                    if (i != 1) {
                        _(roomm).style.display="none";
                        _(roomm).disabled = true;
                        _(roomm).setAttribute("id2", ""); 
                    }
                    else {
                        _(roomm).style.display="block";
                        _(roomm).disabled = false;
                        _(roomm).setAttribute("id2", "sel_room_name");
                        
                        more_options.style.display = "none";
                        more_options.disabled = true;
                        bed_options.style.display = "block";
                        bed_options.disabled = false;
                        room_name_text.style.display = "block";
                        room_size.style.display = "block";
                        room_size.disabled = false ;
                        room_size.style.display = "block";
                        room_size.disabled = false ;
                        price_options.style.display = "block";
                        price_options.disabled = false ;
                    }
                    // alert(roomm);
                }
    		
    		}

    		else if(value == "Twin"){
                _("offer_lower_rate").style.display = "block";
                 _("summery_room_type").innerHTML = "Twin";
                for (var i = 0; i <= rooms.length; i++) {
                     var roomm = _(rooms[i]).id; 
                    if (i != 2) {
                        _(roomm).style.display="none";
                        _(roomm).disabled = true;
                        _(roomm).setAttribute("id2", ""); 
                    }
                    else {
                        _(roomm).style.display="block";
                        _(roomm).disabled = false;
                        _(roomm).setAttribute("id2", "sel_room_name");
                       


                        more_options.style.display = "none";
                        more_options.disabled = true;
                        bed_options.style.display = "block";
                        bed_options.disabled = false;
                        room_name_text.style.display = "block";
                        room_size.style.display = "block";
                        room_size.disabled = false ;
                        room_size.style.display = "block";
                        room_size.disabled = false ;
                        price_options.style.display = "block";
                        price_options.disabled = false ;
                    }
                    // alert(roomm);
                }
    		}
    		else if(show.id == "Twin/Double"){
                _("offer_lower_rate").style.display = "block";
                _("summery_room_type").innerHTML = "Twin/Double";

                for (var i = 0; i <= rooms.length; i++) {
                     var roomm = _(rooms[i]).id; 
                    if (i != 3) {
                        _(roomm).style.display="none";
                        _(roomm).disabled = true;
                        _(roomm).setAttribute("id2", ""); 
                    }
                    else {
                        _(roomm).style.display="block";
                        _(roomm).disabled = false;
                        _(roomm).setAttribute("id2", "sel_room_name");

                        more_options.style.display = "none";
                        more_options.disabled = true;
                        bed_options.style.display = "block";
                        bed_options.disabled = false;
                        room_name_text.style.display = "block";
                        room_size.style.display = "block";
                        room_size.disabled = false ;
                        room_size.style.display = "block";
                        room_size.disabled = false ;
                        price_options.style.display = "block";
                        price_options.disabled = false ;
                        
                    }
                    // alert(roomm);
                }
    		}
    		else if(show.id == "Triple"){
                _("offer_lower_rate").style.display = "block";
                _("summery_room_type").innerHTML = "Triple";
                for (var i = 0; i <= rooms.length; i++) {
                     var roomm = _(rooms[i]).id; 
                    if (i != 4) {
                        _(roomm).style.display="none";
                        _(roomm).disabled = true;
                        _(roomm).setAttribute("id2", ""); 
                    }
                    else {
                        _(roomm).style.display="block";
                        _(roomm).disabled = false;
                        _(roomm).setAttribute("id2", "sel_room_name");
                        

                        more_options.style.display = "none";
                        more_options.disabled = true;
                        bed_options.style.display = "block";
                        bed_options.disabled = false;
                        room_name_text.style.display = "block";
                        room_size.style.display = "block";
                        room_size.disabled = false ;
                        room_size.style.display = "block";
                        room_size.disabled = false ;
                        price_options.style.display = "block";
                        price_options.disabled = false ;
                    }
                    // alert(roomm);
                    
                }
    		
            }
    		else if(show.id == "Quad"){
                _("offer_lower_rate").style.display = "block";
                _("summery_room_type").innerHTML = "Quad";
                for (var i = 0; i <= rooms.length; i++) {
                     var roomm = _(rooms[i]).id; 
                    if (i != 5) {
                        _(roomm).style.display="none";
                        _(roomm).disabled = true;
                        _(roomm).setAttribute("id2", ""); 
                    }
                    else {
                        _(roomm).style.display="block";
                        _(roomm).disabled = false;
                        _(roomm).setAttribute("id2", "sel_room_name");


                        more_options.style.display = "none";
                        more_options.disabled = true;
                        bed_options.style.display = "block";
                        bed_options.disabled = false;
                        room_name_text.style.display = "block";
                        room_size.style.display = "block";
                        room_size.disabled = false ;
                        room_size.style.display = "block";
                        room_size.disabled = false ;
                        price_options.style.display = "block";
                        price_options.disabled = false ;
                    }
                    // alert(roomm);
                }
                 
    		}
    		else if(show.id == "Family"){
                _("offer_lower_rate").style.display = "block";
                _("summery_room_type").innerHTML = "Quad";
                for (var i = 0; i <= rooms.length; i++) {
                     var roomm = _(rooms[i]).id; 
                    if (i != 6) {
                        _(roomm).style.display="none";
                        _(roomm).disabled = true;
                        _(roomm).setAttribute("id2", ""); 
                    }
                    else {
                        _(roomm).style.display="block";
                        _(roomm).disabled = false;
                        _(roomm).setAttribute("id2", "sel_room_name");

                        more_options.style.display = "none";
                        more_options.disabled = true;
                        bed_options.style.display = "block";
                        bed_options.disabled = false;
                        room_name_text.style.display = "block";
                        room_size.style.display = "block";
                        room_size.disabled = false ;
                        room_size.style.display = "block";
                        room_size.disabled = false ;
                        price_options.style.display = "block";
                        price_options.disabled = false ;
                    }
                    // alert(roomm);
                }
    			
    		}
    		else if(show.id == "Suite"){
                _("offer_lower_rate").style.display = "block";
                 _("summery_room_type").innerHTML = "Suite";
                for (var i = 0; i <= rooms.length; i++) {
                     var roomm = _(rooms[i]).id; 
                    if (i != 7) {
                        _(roomm).style.display="none";
                        _(roomm).disabled = true;
                        _(roomm).setAttribute("id2", ""); 
                    }
                    else {
                        _(roomm).style.display="block";
                        _(roomm).disabled = false;
                        _(roomm).setAttribute("id2", "sel_room_name");

                        more_options.style.display = "block";
                        more_options.disabled = false;
                         bed_options.style.display = "block";
                        bed_options.disabled = false;
                        room_name_text.style.display = "block";
                        room_size.style.display = "block";
                        room_size.disabled = false ;
                        room_size.style.display = "block";
                        room_size.disabled = false ;
                        price_options.style.display = "block";
                        price_options.disabled = false ;
                    }
                    // alert(roomm);
               
                }
    			
    		}
    		else if(show.id == "Studio"){
                _("offer_lower_rate").style.display = "block";
                 _("summery_room_type").innerHTML = "Studio";
                for (var i = 0; i <= rooms.length; i++) {
                     var roomm = _(rooms[i]).id; 
                    if (i != 8) {
                        _(roomm).style.display="none";
                        _(roomm).disabled = true;
                        _(roomm).setAttribute("id2", ""); 
                    }
                    else {
                        _(roomm).style.display="block";
                        _(roomm).disabled = false;
                        _(roomm).setAttribute("id2", "sel_room_name");

                        more_options.style.display = "none";
                        more_options.disabled = true;
                         bed_options.style.display = "block";
                        bed_options.disabled = false;
                        room_name_text.style.display = "block";
                        room_size.style.display = "block";
                        room_size.disabled = false ;
                        room_size.style.display = "block";
                        room_size.disabled = false ;
                        price_options.style.display = "block";
                        price_options.disabled = false ;
                    }
                    // alert(roomm);
               

                }
    			    		}
    		else if(show.id == "Apartment"){
                _("offer_lower_rate").style.display = "block";
                _("summery_room_type").innerHTML = "Apartment";
                for (var i = 0; i <= rooms.length; i++) {
                     var roomm = _(rooms[i]).id; 
                    if (i != 9) {
                        _(roomm).style.display="none";
                        _(roomm).disabled = true;
                        _(roomm).setAttribute("id2", ""); 
                    }
                    else {
                        _(roomm).style.display="block";
                        _(roomm).disabled = false;
                        _(roomm).setAttribute("id2", "sel_room_name");

                        more_options.style.display = "block";
                        more_options.disabled = false;
                         bed_options.style.display = "block";
                        bed_options.disabled = false;
                        room_name_text.style.display = "block";
                        room_size.style.display = "block";
                        room_size.disabled = false ;
                        room_size.style.display = "block";
                        room_size.disabled = false ;
                        price_options.style.display = "block";
                        price_options.disabled = false ;
                    }
                    // alert(roomm);
                }
    		
            }
    		else if(show.id == "Dorm Room"){
                _("offer_lower_rate").style.display = "block";
                _("summery_room_type").innerHTML = "Dorm Room";
                for (var i = 0; i <= rooms.length; i++) {
                     var roomm = _(rooms[i]).id; 
                    if (i != 10) {
                        _(roomm).style.display="none";
                        _(roomm).disabled = true;
                        _(roomm).setAttribute("id2", ""); 
                    }
                    else {
                        _(roomm).style.display="block";
                        _(roomm).disabled = false;
                        _(roomm).setAttribute("id2", "sel_room_name");

                        more_options.style.display = "none";
                        more_options.disabled = true;
                         bed_options.style.display = "block";
                        bed_options.disabled = false;
                        room_name_text.style.display = "block";
                        room_size.style.display = "block";
                        room_size.disabled = false ;
                        room_size.style.display = "block";
                        room_size.disabled = false ;
                        price_options.style.display = "block";
                        price_options.disabled = false ;
                    }
                    // alert(roomm);
                }
                
            }
    		else if(show.id == "Bed In Dorm Room"){
                _("offer_lower_rate").style.display = "block";
                 _("summery_room_type").innerHTML = "Bed In Dorm Room";
                for (var i = 0; i <= rooms.length; i++) {
                     var roomm = _(rooms[i]).id; 
                    if (i != 11) {
                        _(roomm).style.display="none";
                        _(roomm).disabled = true;
                        _(roomm).setAttribute("id2", ""); 
                    }
                    else {
                        _(roomm).style.display="block";
                        _(roomm).disabled = false;
                        _(roomm).setAttribute("id2", "sel_room_name");

                        more_options.style.display = "none";
                        more_options.disabled = true;
                         bed_options.style.display = "block";
                        bed_options.disabled = false;
                        room_name_text.style.display = "block";
                        room_size.style.display = "block";
                        room_size.disabled = false ;
                        room_size.style.display = "block";
                        room_size.disabled = false ;
                        price_options.style.display = "block";
                        price_options.disabled = false ;
                    }
                    // alert(roomm);
                }
    		
			}






    			
    		 //show.style.display = "block";
    		 //show.disabled = false;
    		 //var selector = _('sell');
			//selector.setAttribute("onmouseenter", "hide_them()");*/
    		 
		// }




		//this function is to determain how many guests can stay in the room
		//in order to use it when asking to enter the price for the room
		function guest_no(){
			//getting the value of the text and assign it to variable 
			var guests_no = _("guest_num").value;

			//checking the value that has been gotten
			if (isNaN(guests_no)) {
				
				alert(guests_no + "is not a number, Plaese enter a number");
			}
			else {
					
				_("price_for").innerHTML = guests_no;
				_("disscount_for").innerHTML = guests_no;
				

			}

			
			


			//send the value to the price section
			
		}
        function logo_maker(number){
            var image = "<img src='img/icon-guest_retina.png' style='width:20px;height:auto;margin-top:3px'>"
            var sendBack;
            if (number == 1) {
                sendBack = image;
            }
            else if (number == 2) {
                sendBack = image+"&nbsp;"+image;

            }
            else if (number == 3) {
                sendBack = image +"&nbsp;"+image+"&nbsp;"+image;

            }
            else if (number > 3) {
                sendBack = image+ "<b style='position:relative;font-size:16px;padding:10px;top:3px'>×</b>"+"<b style='position:relative;font-size:18px;padding:10px;top:5px;left:-15px'>"+number+"</b>";

            }
            return sendBack;
        }
		function logo_check_guset_number(number){
            var image = "<img src='img/icon-guest_retina.png' style='width:20px;height:auto;margin-top:3px'>"
			if (number == 1) {
				guest_logo.innerHTML = image;
                guest_logo_2.innerHTML = image;
                
			}
			else if (number == 2) {
				guest_logo.innerHTML = image +image;
                guest_logo_2.innerHTML = image +image;

			}
			else if (number == 3) {
				guest_logo.innerHTML = image +image+image;
                guest_logo_2.innerHTML = image +image+image;

			}
			else if (number > 3) {
				guest_logo.innerHTML = image+ "<b style='position:relative;font-size:20px;padding:10px;top:6px'>×</b>"+"<b style='position:relative;font-size:20px;padding:10px;top:5px;left:-15px'>"+number+"</b>";
                guest_logo_2.innerHTML = image+ "<b style='position:relative;font-size:16px;padding:10px;top:3px'>×</b>"+"<b style='position:relative;font-size:18px;padding:10px;top:5px;left:-15px'>"+number+"</b>";

			}
		}

		function check_fields(){
            _("focus").focus();
			var c_name = _('custom_name');
			var selector = _('sell');
    		var type_value = selector[selector.selectedIndex].value;
    		var type_text = selector[selector.selectedIndex].text;
    		var r_n_selectd = _(type_text);
    		var name_value = r_n_selectd[r_n_selectd.selectedIndex].value;



			if (type_text =="Please select") {
				r_t_select = "<li>Please select room type</li>";
				error_header.innerHTML = "<ul>"+r_t_select+"</ul>";
				error_header.style.display = "block";
                _("error_header").focus();
			}
			else{
				selector.setAttribute("class","text add_img");
				if (name_value == 0){
					r_n_alert = "<li>Please select room name!</li>";
					error_header.innerHTML = "<ul>"+r_n_alert+"</ul>";
					error_header.style.display = "block";
                    _("error_header").focus();
				}
				else {
					r_n_selectd.setAttribute("class","text add_img");
					if (c_name.value == "") {
						c_name.setAttribute("class","text add_img");
					}
					else if (c_name.value > 0) {
						c_name.setAttribute("class","text add_img");
					}

					if (room_size_txt.value == "") {
						room_size_txt.setAttribute("class","text add_img");
					}
					else if (room_size.value > 0) {
						room_size_txt.setAttribute("class","text add_img");
					}
					if (num_this_type.value> 0){
						num_this_type.setAttribute("class","text add_img");
					}
					else{
						num_this_type.setAttribute("class","text required_text");
						var alert_rooms_num = "<li>Select number of rooms</li>";
					}

					if (guest_num.value > 0){
						guest_num.setAttribute("class","text add_img");
					}
					else{
						guest_num.setAttribute("class","text required_text");
						var alert_guest_num = "<li>Tell us the number of guests</li>";
					}
					if (price_guest_num.value > 0) {
						price_guest_num.setAttribute("class","text add_img");
					}
					else{
						price_guest_num.setAttribute("class","text required_text");
						var alert_price_guest_num = "<li>Please enter a price</li>";
					}
					if (alert_rooms_num != "" || alert_guest_num != "" || alert_price_guest_num != "") {

						if (alert_rooms_num == "<li>Select number of rooms</li>") {
							a_r_n = alert_rooms_num;

						}
						else{
							a_r_n = ""
						}
						if (alert_guest_num == "<li>Tell us the number of guests</li>") {
							a_g_n = alert_guest_num;
						}
						else{
							a_g_n = ""
						}
						if (alert_price_guest_num == "<li>Please enter a price</li>") {
							a_p_g_n = alert_price_guest_num;
						}
						else{
							a_p_g_n = ""
						}

						error_header.innerHTML = "<ul>"+a_r_n+a_g_n+a_p_g_n+"</ul>";
						error_header.style.display = "block";
                        _("error_header").focus();
						
					}

				}
				

			}
			
			if (type_value != 0 && name_value != 0 && num_this_type.value> 0 && price_guest_num.value > 0 ) {
				error_header.style.display = "none";
				_('submit_button').style.display = "block";
				_('save_button').style.display = "none";
                _('last_message_box').style.display = "block";


			}
            else {
                error_header.style.display = "block";
                _('submit_button').style.display = "none";
                _('save_button').style.display = "block";
                _('last_message_box').style.display = "none";
            }
			

		}


		function add_guests(){
			//Call calculating function
			
			//getting the elements and assigning them to variables
			var sel_element = _('bed_kinds');
			var bed_numbers = _('bed_num');
			//assign the selected bed type option to variable
			var sel_el_val = sel_element[sel_element.selectedIndex];
			//getting the data-occupancy attribute value
			var sel_value = sel_el_val.dataset.occupancy;
			//assigning the selected bed number to a variable and getting the value of the selected bed option and assign it to variable
			var sel_value_beds = bed_numbers[bed_numbers.selectedIndex].value;
			//calculate
			var result = parseInt(sel_value) * parseInt(sel_value_beds);

			//print the result to the guest_num text area
			_('guest_num').value = result ;
            if (result != "") {

                logo_check_guset_number(result);
            }


		}


        function input_price(){
            var price = _('price_guest_num').value;
            if (price >= 0) {
                _('final_price').innerHTML = "US$" + price;
            }
            else{
                _('final_price').innerHTML = "Enter Price";
            }
           
           
        }
		
//window.location.href = "http://www.w3schools.com"; to redirect
//window.history.back(); back to the previu


//Photos.php => Uploading Image input file select button


//Offering Lower Price



        