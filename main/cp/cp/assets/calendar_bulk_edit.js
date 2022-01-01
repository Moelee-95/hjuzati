//removing extra commas in the biggining and end and middle
function arrange_vals(all_vals){
	//removing undifined if it's their
	all_vals = all_vals.replace(",.,,.,undefined___undefined","");
	all_vals = all_vals.replace("undefined___","");
	all_vals = all_vals.replace("undefined","");

	//to replace the first commas
	while(all_vals.charAt(0) == ','){
		all_vals = all_vals.substr(3);
	}
	//replace the end commas
	all_vals = all_vals.substring(",", all_vals.length -3);

	//replace extra commas in the middle using while to remove them all
	var i= 0;
	while(all_vals.length >= i){
		all_vals = all_vals.replace(",.,,.,",",.,");
		i++;
	}
	return all_vals;

}
//remove element from multiple bulk edit list 
function remove_el(elm) {
	var vals = _("multi_roms_vlas").value;
	//alert("element to remove:"+elm);//test
	vals = vals.replace(elm, "");//remove the sent element from input
	vals = arrange_vals(vals);//remove extra commas
	_("multi_roms_vlas").value = vals;//write the values again
	set_elements();//set elements again
	//alert("removed succesfully");
	

}
//set elements that showes selected rooms for multiple rooms bulk edit
function set_elements(){
	var vals = _("multi_roms_vlas").value;
	if (vals != "") {
		var arr_vals = vals.split(",.,");
		_("div_in").innerHTML = "";//clean the div content
		for (var i = 0; i <= arr_vals.length; i++) {
			var arr_split = arr_vals[i].split("___");
			_("div_in").innerHTML += "<div style='background-color: rgb(62, 151, 159);margin: 5px;padding: 8px;border: 1px solid #b9dbff;border-radius: 3px;'><span style='padding:5px;color: #686868;font-size: 13pt;padding-bottom:10px;color:white'>"+arr_split[1]+"</span><a class='hov_red rm_elmt' id='"+arr_split[0]+"' style='color: #ffffff;font-size: 13pt;padding: 8px;'>x</a></div>";
			var rm_el = "remove_el('"+arr_vals[i]+"')";
			var btn = arr_split[0];
			$('#'+btn).attr("onclick", rm_el);
		}
		//alert("this alert is after while loop for setting elememts");
		_("div_in").style.border = "none";
	}
	else{
		_("div_in").innerHTML = "<div style='width: 100%;cursor:pointer;background-color: #dee8eaa8;' data-toggle='modal' data-target='#select_multiple_rooms'><h4 style='color:#555;padding-left:43%;padding-right: 35%;'>Add Rooms <a style=';'><span style='padding-top: 8px;margin-left:4px;font-weight: bold'aria-hidden='true' class='icon-plus'></span></a></h4></div>";
		_("div_in").style.border = "block"
	}



}


//set room id for single room bulk edit
function set_room(){
		var selecter = _("set_r_type");
		var selectText = selecter.options[selecter.selectedIndex].text;
		_("single_id").value= selecter.value;
		_("showeRName").innerHTML = selectText;
		_("showeRName2").innerHTML = selectText;
		_("single_list").style.border = "none";
		_("showeRName").click();
		//Modal Opetions .modal('toggle and show and hide')
		 $('#select_room_type').modal('hide');


}	


function set_m_rooms(){
//##############    getting info from selecter #################
	var selecter = _("set_rs_type");
	//get values (room ides) as an array
	var rms_ides = $('#set_rs_type').val();
	//get input text from select and insert it into an array
	var rs_Nms = $('#set_rs_type option:selected').toArray().map(item =>item.text).join();
	//convert rs_Nms string to an arry to be able to use it in next steps
	rs_Nms = rs_Nms.split(",");

	//alert(rs_Nms[1]+",,,"+ rms_ides[1]);
//##############  End getting info from selecter #################

//##############   puting info into the input ####################
	var insert_into = _("multi_roms_vlas");//declare the element
	insert_into.value ="";//clean the element vlaues before inserting
	var combined;//represent each room id and it's name inside the loop
	var all_vals;//to assighn all values to it

	for (var i = 0; i <= rs_Nms.length; i++) {
		combined = ",.,"+rms_ides[i]+"___"+rs_Nms[i]+",.,";
		all_vals += combined;
	}
	all_vals =arrange_vals(all_vals);
	if (all_vals == "") {
		_("select_multiple_rooms_alert").style.display = "block";
		selecter.focus();
	}
	else{
		_("select_multiple_rooms_alert").style.display = "none";
		insert_into.value = all_vals;
		//alert(all_vals);
		 $('#select_multiple_rooms').modal('hide');//hide modal
		set_elements();
	}
		

}


