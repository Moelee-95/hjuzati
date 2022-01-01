function __(el) {
    return document.getElementById(el);
}


 window.onload = function(){
   setTimeout(check_all, 1)
};


function check_all() { 
    check_disscount();
    show_selected();
    guest_no();
    add_guests();
    input_price(); 
}




function hide(){
            var form = document.getElementById("insertForm");
            var empty_state = document.getElementById("empty_state");

            if (form.style.display === "block") {
                form.style.display = "none";
            }
            if (empty_state.style.display === "none" ) {
                empty_state.style.display = "block";
            }
            

        

			window.location.href = "layout_pricing.php";
		}
		function show(){
			var form = document.getElementById("insertForm");
			var empty_state = document.getElementById("empty_state");

			if (form.style.display === "none") {
				form.style.display = "block";
			}
			if (empty_state.style.display === "block" ) {
				empty_state.style.display = "none";
			}
			

		}




		function show_selected(){

			var selector = document.getElementById('sell');
    		var value = selector[selector.selectedIndex].text;
    		var value_0 = selector[selector.selectedIndex].value;
    		document.getElementById('display').innerHTML = value;
    		show = document.getElementById(value);
    		var view1 = document.getElementById('Single');
    		var view2 = document.getElementById('Double');
    		var view3 = document.getElementById('Twin');
    		var view4 = document.getElementById('Twin/Double');
    		var view5 = document.getElementById('Triple');
    		var view6 = document.getElementById('Quad');
    		var view7 = document.getElementById('Family');
    		var view8 = document.getElementById('Suite');
    		var view9 = document.getElementById('Studio');
    		var view10 = document.getElementById('Apartment');
    		var view11 = document.getElementById('Dorm Room');
    		var view12 = document.getElementById('Bed In Dorm Room');
    		var more_options = document.getElementById('more_options');
    		var bed_options = document.getElementById('bed_options'); 
    		var room_name_text = document.getElementById('room_name_text');  
    		var room_size = document.getElementById('room_size');
    		var price_options = document.getElementById('price_options');

			if (value_0 == "0") {
				view12.style.display="none";
    			view11.style.display="none";
    			view10.style.display="none";
    			view9.style.display="none";
    			view8.style.display="none";
    			view7.style.display="none";
    			view6.style.display="none";
    			view5.style.display="none";
    			view4.style.display="none";
    			view3.style.display="none";
    			view2.style.display="none";
    			view1.style.display="none";
    			view12.disabled = true;
    			view11.disabled = true;
    			view10.disabled = true;
    			view9.disabled = true;
    			view8.disabled = true;
    			view7.disabled = true;
    			view6.disabled = true;
    			view5.disabled = true;
    			view4.disabled = true;
    			view3.disabled = true;
    			view2.disabled = true;
    			view1.disabled = true;
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

    		if (value == view1.id) {
				view12.style.display="none";
    			view11.style.display="none";
    			view10.style.display="none";
    			view9.style.display="none";
    			view8.style.display="none";
    			view7.style.display="none";
    			view6.style.display="none";
    			view5.style.display="none";
    			view4.style.display="none";
    			view3.style.display="none";
    			view2.style.display="none";
    			view1.style.display="block";
    			view12.disabled = true;
    			view11.disabled = true;
    			view10.disabled = true;
    			view9.disabled = true;
    			view8.disabled = true;
    			view7.disabled = true;
    			view6.disabled = true;
    			view5.disabled = true;
    			view4.disabled = true;
    			view3.disabled = true;
    			view2.disabled = true;
    			view1.disabled = false;
    			more_options.style.display = "none";
    			more_options.disabled = true;
    			bed_options.style.display = "none";
    			bed_options.disabled = true;
    			room_name_text.style.display = "inline-block";
    			room_size.style.display = "block";
    			room_size.disabled = false ;
    			room_size.style.display = "block";
    			room_size.disabled = false ;
    			price_options.style.display = "block";
    			price_options.disabled = false ;


    		}
    		 
    		else if(value == view2.id){
    			view12.style.display="none";
    			view11.style.display="none";
    			view10.style.display="none";
    			view9.style.display="none";
    			view8.style.display="none";
    			view7.style.display="none";
    			view6.style.display="none";
    			view5.style.display="none";
    			view4.style.display="none";
    			view3.style.display="none";
    			view2.style.display="block";
    			view1.style.display="none";
    			view12.disabled = true;
    			view11.disabled = true;
    			view10.disabled = true;
    			view9.disabled = true;
    			view8.disabled = true;
    			view7.disabled = true;
    			view6.disabled = true;
    			view5.disabled = true;
    			view4.disabled = true;
    			view3.disabled = true;
    			view2.disabled = false;
    			view1.disabled = true;
    			more_options.style.display = "none";
    			more_options.disabled = true;
    			bed_options.style.display = "block";
    			bed_options.disabled = false;
    			room_name_text.style.display = "inline-block";
				room_size.style.display = "block";
    			room_size.disabled = false ;
    			price_options.style.display = "block";
    			price_options.disabled = false ;

    		}

    		else if(value == view3.id){
    			view12.style.display="none";
    			view11.style.display="none";
    			view10.style.display="none";
    			view9.style.display="none";
    			view8.style.display="none";
    			view7.style.display="none";
    			view6.style.display="none";
    			view5.style.display="none";
    			view4.style.display="none";
    			view3.style.display="block";
    			view2.style.display="none";
    			view1.style.display="none";
    			view12.disabled = true;
    			view11.disabled = true;
    			view10.disabled = true;
    			view9.disabled = true;
    			view8.disabled = true;
    			view7.disabled = true;
    			view6.disabled = true;
    			view5.disabled = true;
    			view4.disabled = true;
    			view3.disabled = false;
    			view2.disabled = true;
    			view1.disabled = true;
    			more_options.style.display = "none";
    			more_options.disabled = true;
    			bed_options.style.display = "block";
    			bed_options.disabled = false;   
    			room_size.style.display = "block";
    			room_size.disabled = false ;
    			price_options.style.display = "block";
    			price_options.disabled = false ;

    			 		}
    		else if(show.id == view4.id){
    			view12.style.display="none";
    			view11.style.display="none";
    			view10.style.display="none";
    			view9.style.display="none";
    			view8.style.display="none";
    			view7.style.display="none";
    			view6.style.display="none";
    			view5.style.display="none";
    			view4.style.display="block";
    			view3.style.display="none";
    			view2.style.display="none";
    			view1.style.display="none";
    			view12.disabled = true;
    			view11.disabled = true;
    			view10.disabled = true;
    			view9.disabled = true;
    			view8.disabled = true;
    			view7.disabled = true;
    			view6.disabled = true;
    			view5.disabled = true;
    			view4.disabled = false;
    			view3.disabled = true;
    			view2.disabled = true;
    			view1.disabled = true;
    			more_options.style.display = "none";
    			more_options.disabled = true;
    			bed_options.style.display = "block";
    			bed_options.disabled = false;
    			room_name_text.style.display = "inline-block";
    			room_size.style.display = "block";
    			room_size.disabled = false ;
    			price_options.style.display = "block";
    			price_options.disabled = false ;

    		}
    		else if(show.id == view5.id){
    			view12.style.display="none";
    			view11.style.display="none";
    			view10.style.display="none";
    			view9.style.display="none";
    			view8.style.display="none";
    			view7.style.display="none";
    			view6.style.display="none";
    			view5.style.display="block";
    			view4.style.display="none";
    			view3.style.display="none";
    			view2.style.display="none";
    			view1.style.display="none";
    			view12.disabled = true;
    			view11.disabled = true;
    			view10.disabled = true;
    			view9.disabled = true;
    			view8.disabled = true;
    			view7.disabled = true;
    			view6.disabled = true;
    			view5.disabled = false;
    			view4.disabled = true;
    			view3.disabled = true;
    			view2.disabled = true;
    			view1.disabled = true;
    			more_options.style.display = "none";
    			more_options.disabled = true;
    			bed_options.style.display = "block";
    			bed_options.disabled = false; 
    			room_name_text.style.display = "inline-block";
    			room_size.style.display = "block";
    			room_size.disabled = false ;
    			price_options.style.display = "block";
    			price_options.disabled = false ;


    			   		}
    		else if(show.id == view6.id){
    			view12.style.display="none";
    			view11.style.display="none";
    			view10.style.display="none";
    			view9.style.display="none";
    			view8.style.display="none";
    			view7.style.display="none";
    			view6.style.display="block";
    			view5.style.display="none";
    			view4.style.display="none";
    			view3.style.display="none";
    			view2.style.display="none";
    			view1.style.display="none";
    			view12.disabled = true;
    			view11.disabled = true;
    			view10.disabled = true;
    			view9.disabled = true;
    			view8.disabled = true;
    			view7.disabled = true;
    			view6.disabled = false;
    			view5.disabled = true;
    			view4.disabled = true;
    			view3.disabled = true;
    			view2.disabled = true;
    			view1.disabled = true;
    			more_options.style.display = "none";
    			more_options.disabled = true;
    			bed_options.style.display = "block";
    			bed_options.disabled = false;
    			room_name_text.style.display = "inline-block";
    			room_size.style.display = "block";
    			room_size.disabled = false ;
    			price_options.style.display = "block";
    			price_options.disabled = false ;


    		}
    		else if(show.id == view7.id){
    			view12.style.display="none";
    			view11.style.display="none";
    			view10.style.display="none";
    			view9.style.display="none";
    			view8.style.display="none";
    			view7.style.display="block";
    			view6.style.display="none";
    			view5.style.display="none";
    			view4.style.display="none";
    			view3.style.display="none";
    			view2.style.display="none";
    			view1.style.display="none";
    			view12.disabled = true;
    			view11.disabled = true;
    			view10.disabled = true;
    			view9.disabled = true;
    			view8.disabled = true;
    			view7.disabled = false;
    			view6.disabled = true;
    			view5.disabled = true;
    			view4.disabled = true;
    			view3.disabled = true;
    			view2.disabled = true;
    			view1.disabled = true;
    			more_options.style.display = "none";
    			more_options.disabled = true;
    			bed_options.style.display = "block";
    			bed_options.disabled = false;
    			room_name_text.style.display = "inline-block";
    			room_size.style.display = "block";
    			room_size.disabled = false ;
    			price_options.style.display = "block";
    			price_options.disabled = false ;


    			    		}
    		else if(show.id == view8.id){
    			view12.style.display="none";
    			view11.style.display="none";
    			view10.style.display="none";
    			view9.style.display="none";
    			view8.style.display="block";
    			view7.style.display="none";
    			view6.style.display="none";
    			view5.style.display="none";
    			view4.style.display="none";
    			view3.style.display="none";
    			view2.style.display="none";
    			view1.style.display="none";
    			view12.disabled = true;
    			view11.disabled = true;
    			view10.disabled = true;
    			view9.disabled = true;
    			view8.disabled = false;
    			view7.disabled = true;
    			view6.disabled = true;
    			view5.disabled = true;
    			view4.disabled = true;
    			view3.disabled = true;
    			view2.disabled = true;
    			view1.disabled = true;
    			more_options.style.display = "block";
    			more_options.disabled = false;
    			bed_options.style.display = "block";
    			bed_options.disabled = false;
    			room_name_text.style.display = "inline-block";
    			room_size.style.display = "block";
    			room_size.disabled = false ;
    			price_options.style.display = "block";
    			price_options.disabled = false ;



    			    			    		}
    		else if(show.id == view9.id){
    			view12.style.display="none";
    			view11.style.display="none";
    			view10.style.display="none";
    			view9.style.display="block";
    			view8.style.display="none";
    			view7.style.display="none";
    			view6.style.display="none";
    			view5.style.display="none";
    			view4.style.display="none";
    			view3.style.display="none";
    			view2.style.display="none";
    			view1.style.display="none";
    			view12.disabled = true;
    			view11.disabled = true;
    			view10.disabled = true;
    			view9.disabled = false;
    			view8.disabled = true;
    			view7.disabled = true;
    			view6.disabled = true;
    			view5.disabled = true;
    			view4.disabled = true;
    			view3.disabled = true;
    			view2.disabled = true;
    			view1.disabled = true;
    			more_options.style.display = "none";
    			more_options.disabled = true;
    			bed_options.style.display = "block";
    			bed_options.disabled = false;
    			room_name_text.style.display = "inline-block";
    			room_size.style.display = "block";
    			room_size.disabled = false ;
    			price_options.style.display = "block";
    			price_options.disabled = false ;


    			    		}
    		else if(show.id == view10.id){
    			view12.style.display="none";
    			view11.style.display="none";
    			view10.style.display="block";
    			view9.style.display="none";
    			view8.style.display="none";
    			view7.style.display="none";
    			view6.style.display="none";
    			view5.style.display="none";
    			view4.style.display="none";
    			view3.style.display="none";
    			view2.style.display="none";
    			view1.style.display="none";
    			view12.disabled = true;
    			view11.disabled = true;
    			view10.disabled = false;
    			view9.disabled = true;
    			view8.disabled = true;
    			view7.disabled = true;
    			view6.disabled = true;
    			view5.disabled = true;
    			view4.disabled = true;
    			view3.disabled = true;
    			view2.disabled = true;
    			view1.disabled = true;
    			more_options.style.display = "block";
    			more_options.disabled = false;
    			bed_options.style.display = "block";
    			bed_options.disabled = false;
    			room_name_text.style.display = "inline-block";
    			room_size.style.display = "block";
    			room_size.disabled = false ;
    			price_options.style.display = "block";
    			price_options.disabled = false ;




				}
    		else if(show.id == view11.id){
    			view12.style.display="none";
    			view11.style.display="block";
    			view10.style.display="none";
    			view9.style.display="none";
    			view8.style.display="none";
    			view7.style.display="none";
    			view6.style.display="none";
    			view5.style.display="none";
    			view4.style.display="none";
    			view3.style.display="none";
    			view2.style.display="none";
    			view1.style.display="none";
    			view12.disabled = true;
    			view11.disabled = false;
    			view10.disabled = true;
    			view9.disabled = true;
    			view8.disabled = true;
    			view7.disabled = true;
    			view6.disabled = true;
    			view5.disabled = true;
    			view4.disabled = true;
    			view3.disabled = true;
    			view2.disabled = true;
    			view1.disabled = true;
    			more_options.style.display = "none";
    			more_options.disabled = true;
    			bed_options.style.display = "block";
    			bed_options.disabled = false;
    			room_name_text.style.display = "inline-block";
    			room_size.style.display = "block";
    			room_size.disabled = false ;
    			price_options.style.display = "block";
    			price_options.disabled = false ;



    			    		}
    		else if(show.id == view12.id){
    			view12.style.display="block";
    			view11.style.display="none";
    			view10.style.display="none";
    			view9.style.display="none";
    			view8.style.display="none";
    			view7.style.display="none";
    			view6.style.display="none";
    			view5.style.display="none";
    			view4.style.display="none";
    			view3.style.display="none";
    			view2.style.display="none";
    			view1.style.display="none";
    			view12.disabled = false;
    			view11.disabled = true;
    			view10.disabled = true;
    			view9.disabled = true;
    			view8.disabled = true;
    			view7.disabled = true;
    			view6.disabled = true;
    			view5.disabled = true;
    			view4.disabled = true;
    			view3.disabled = true;
    			view2.disabled = true;
    			view1.disabled = true;
    			more_options.style.display = "none";
    			more_options.disabled = true;
    			bed_options.style.display = "block";
    			bed_options.disabled = false;
    			room_name_text.style.display = "inline-block";
    			room_size.style.display = "block";
    			room_size.disabled = false ;
    			price_options.style.display = "block";
    			price_options.disabled = false ;
				}






    			
    		 //show.style.display = "block";
    		 //show.disabled = false;
    		 //var selector = document.getElementById('sell');
			//selector.setAttribute("onmouseenter", "hide_them()");
    		 
		}




		//this function is to determain how many guests can stay in the room
		//in order to use it when asking to enter the price for the room
		function guest_no(){
			//getting the value of the text and assign it to variable 
			var guests_no = document.getElementById("guest_num").value;

			//checking the value that has been gotten
			if (isNaN(guests_no)) {
				
				alert(guests_no + "is not a number, Plaese enter a number");
			}
			else {
					
				document.getElementById("price_for").innerHTML = guests_no;
				document.getElementById("disscount_for").innerHTML = guests_no;
				

			}

			
			


			//send the value to the price section
			
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
				guest_logo.innerHTML = image+ "<b style='position:relative;font-size:20px;padding:10px;top:-6px'>×</b>"+"<b style='position:relative;font-size:20px;padding:10px;top:5px;left:-15px'>"+number+"</b>";
                guest_logo_2.innerHTML = image+ "<b style='position:relative;font-size:16px;padding:10px;top:-6px'>×</b>"+"<b style='position:relative;font-size:15px;padding:10px;top:5px;left:-15px'>"+number+"</b>";

			}
		}

		function check_fields(){
            document.getElementById("focus").focus();
			var c_name = document.getElementById('custom_name');
			var selector = document.getElementById('sell');
    		var type_value = selector[selector.selectedIndex].value;
    		var type_text = selector[selector.selectedIndex].text;
    		var r_n_selectd = document.getElementById(type_text);
    		var name_value = r_n_selectd[r_n_selectd.selectedIndex].value;



			if (type_text =="Please select") {
				r_t_select = "<li>Please select room type</li>";
				error_header.innerHTML = "<ul>"+r_t_select+"</ul>";
				error_header.style.display = "block";
                document.getElementById("error_header").focus();
			}
			else{
				selector.setAttribute("class","text add_img");
				if (name_value == 0){
					r_n_alert = "<li>Please select room name!</li>";
					error_header.innerHTML = "<ul>"+r_n_alert+"</ul>";
					error_header.style.display = "block";
                    document.getElementById("error_header").focus();
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
                        document.getElementById("error_header").focus();
						
					}

				}
				

			}
			
			if (type_value != 0 && name_value != 0 && num_this_type.value> 0 && price_guest_num.value > 0 ) {
				error_header.style.display = "none";
				document.getElementById('submit_button').style.display = "block";
				document.getElementById('save_button').style.display = "none";
                document.getElementById('last_message_box').style.display = "inline-block";


			}
            else {
                error_header.style.display = "block";
                document.getElementById('submit_button').style.display = "none";
                document.getElementById('save_button').style.display = "block";
                document.getElementById('last_message_box').style.display = "none";
            }
			

		}


		function add_bed_option(){
			document.getElementById('bd_options').innerHTML+= "<div id='beds_2' name='bed_2'><select id='bed_kinds_2' style='display: inline-block;width: 280px;' required class='text' name='beds_kinds_2'><option value='1' data-occupancy='1' data-name='Twin bed(s)'>Twin bed(s)&nbsp;&nbsp;/&nbsp;&nbsp;90-130 cm wide</option><option value='2' data-occupancy='2' data-name='Full bed(s)'>Full bed(s)&nbsp;&nbsp;/&nbsp;&nbsp;131-150 cm wide</option><option value='6' data-occupancy='2' data-name='Queen bed(s)'>Queen bed(s)&nbsp;&nbsp;/&nbsp;&nbsp;151-180 cm wide</option><option value='3' data-occupancy='2' data-name='King bed(s)'>King bed(s)&nbsp;&nbsp;/&nbsp;&nbsp;181-210 cm wide</option><option value='4' data-occupancy='1' data-name='Bunk bed'>Bunk bed&nbsp;&nbsp;/&nbsp;&nbsp;Variable Size</option><option value='5' data-occupancy='1' data-name='Sofa bed'>Sofa bed&nbsp;&nbsp;/&nbsp;&nbsp;Variable Size</option><option value='7' data-occupancy='1' data-name='Futon bed(s)'>Futon bed(s)&nbsp;&nbsp;/&nbsp;&nbsp;Variable Size</option></select><span style='margin-top: -10px;display: inline-block;padding: 15px'> x </span><select id='bed_num_2' require style='width: 230px;display: inline-block;margin-left:8px' class='text' name='bed_num_2' onchange='add_guests()'><option value='0' selected='' >Select the number of beds</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option></select><p id='remover_1' href='#'  style='cursor:pointer;display:inline-block;color:red;font-size:15px;font-weight:20px' onclick='remove_bed_option1()'>&nbsp;&nbsp;Remove</p></div>";
			document.getElementById('add_bed_button').style.display = "none";
			add_guests();
			
		}

		function remove_bed_option1(){
		document.getElementById('beds_2').remove();
		document.getElementById('add_bed_button').style.display = "block";
		add_guests();
		}

		function add_guests(){
			//Call calculating function
			
			//getting the elements and assigning them to variables
			var sel_element = document.getElementById('bed_kinds');
			var bed_numbers = document.getElementById('bed_num');
			//assign the selected bed type option to variable
			var sel_el_val = sel_element[sel_element.selectedIndex];
			//getting the data-occupancy attribute value
			var sel_value = sel_el_val.dataset.occupancy;
			//assigning the selected bed number to a variable and getting the value of the selected bed option and assign it to variable
			var sel_value_beds = bed_numbers[bed_numbers.selectedIndex].value;
			//calculate
			var result = parseInt(sel_value) * parseInt(sel_value_beds);

			//print the result to the guest_num text area
			document.getElementById('guest_num').value = result ;
            if (result != "") {

                logo_check_guset_number(result);
            }
			


		//second div

			//getting the elements and assigning them to variables
			var sel_element_1 = document.getElementById('bed_kinds_2');
			var bed_numbers_1 = document.getElementById('bed_num_2');
			//assign the selected bed type option to variable
			var sel_el_val_1 = sel_element_1[sel_element_1.selectedIndex];
			//getting the data-occupancy attribute value
			var sel_value_1 = sel_el_val_1.dataset.occupancy;
			//assigning the selected bed number to a variable and getting the value of the selected bed option and assign it to variable
			var sel_value_beds_1 = bed_numbers_1[bed_numbers_1.selectedIndex].value;
			//calculate
			var result_1 = parseInt(sel_value_1) * parseInt(sel_value_beds_1);

			//insert the result_1 to the guest_num text area
			document.getElementById('guest_num').value = result_1 +result;
            //send the value to the logo div
            if (result_1 != "") {
                logo_check_guset_number(result_1 +result);
            }
			


		}


        function input_price(){
            var price = document.getElementById('price_guest_num').value;
            if (price >= 0) {
                document.getElementById('final_price').innerHTML = "US$" + price;
            }
            else{
                document.getElementById('final_price').innerHTML = "Enter Price";
            }
           
           
        }
		
        //check_disscount(this.value)
        function check_disscount(){
            var yes_input = document.getElementById('check_yes');
            var no_input = document.getElementById('check_no');
            if (yes_input.checked) {
                document.getElementById('div_diss_options').style.display = 'block';
               
            }
            else if(no_input.checked){
                document.getElementById('div_diss_options').style.display = 'none';
                 
            }
            

        }
//window.location.href = "http://www.w3schools.com"; to redirect
//window.history.back(); back to the previu

        function edit_exit() {
           var answer = window.confirm("Are you sure you want to Cancle editing?");
           if (answer == true) {
                window.history.back();
           }
         
           
        }

//Photos.php => Uploading Image input file select button




        