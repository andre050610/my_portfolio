

//--------------------------Mian Document Ready Function---------------------------------------------------
$(document).ready(function(){

	$('div').hover(function(){			//------------------------Hover Over the Menu Upper Right---------------------
			// Variables for the hover enter event
		curved_animate_div = $(this).children('.curved_animate_div'); 
		menu_animate_div = $(this).children('.menu_animate_div');
		enterSpeed = 100;
		leaveSpeed = 200;
		enterVerticalSpeed = 500;
		leaveVerticalSpeed = 0;

			// Animation for the enter hover menu and the curve & triangle add on image on the upper top
		$(menu_animate_div).stop(true).animate({width: "150px", marginLeft: "0px"}, enterSpeed);
		enterFromMenu($(menu_animate_div), enterSpeed, enterVerticalSpeed);
		
			// Animation for the enter hover the curves & triangle and the menu on the upper top image, and add on the vertical 
		$(curved_animate_div).stop(true).animate({height: getPx($(curved_animate_div)), width: getPx($(curved_animate_div))}, enterSpeed, 
			function(){
				$(vertical_menu_curve[0]).children('.curved_triangleD_div').css({visibility: "visible"});
				$(vertical_menu_curve[0]).children('.vertical_animate_div').stop(true).animate({height: "520px"}, enterVerticalSpeed);
			});
		enterFromCurve(vertical_menu_curve, enterSpeed);

	}, function(){
			// Variables for the hover leave event
		curved_animate_div = $(this).children('.curved_animate_div'); 
		menu_animate_div = $(this).children('.menu_animate_div');

			// Animation for the leave hover menu and the curve & triangle add on image on the upper top
		$(menu_animate_div).stop(true).animate({width: "0px", marginLeft: "150px"}, leaveSpeed);
		leaveFromMenu(vertical_curve_menu, leaveSpeed, leaveVerticalSpeed);

			// Animation for the leave hover the curves & triangle and the menu on the upper top image, and add on the vertical 
		$(vertical_menu_curve[0]).children('.curved_triangleD_div').css({visibility: ""});
		$(vertical_menu_curve[0]).children('.vertical_animate_div').stop(true).animate({height: "0px"}, leaveVerticalSpeed);
		$(curved_animate_div).stop(true).animate({height: "0px", width: '0px'}, leaveSpeed);
		leaveFromCurve(vertical_menu_curve, leaveSpeed);
	});	

	$('td').children("#hover_point").hover(function(){		//-----------Hover Over the Contact Upper Left-------------------
			// Ends the blinking on the upper left triangle
		stopBlink($(this));
			// Animates the triangle upper left to contact box
		$(this).next().stop(true).animate({borderWidth: "0px"},200, function(){
				$(this).css({backgroundColor: "#00A3CC", color: "white", fontSize: "2.5em"});
				$(this).stop(true).animate({height: "50px", width: "240px"}, 400, function(){
					$(this).css({color: "white"});
				});
		});
	},function(){
		if (!contact_state){		
			// Animates the contact box upper left to triangle
			$(this).next().css({color: ""});
			$(this).next().stop(true).animate({height: "", width: ""}, 100, function(){
				$(this).css({backgroundColor: "", fontSize: ""});
				$(this).stop(true).animate({borderWidth: "100px"},400, function(){
					startBlink($('td').children("#hover_point"));
				});
			});
		}
	});
	
		// Starts the blinking for the upper left triangle on beginning of the page
	startBlink($('td').children("#hover_point"));

	$('td').children('#hover_point').click(function(){		//-------Click on the Triangle to Open the Contact Form-----------
			// Sets the the state to true to stop animation and open the contact form
		contact_state = true;
		$('td').children('#contact_form').animate({marginLeft: "0px"}, 500, function(){
			$('td').children('#close_form').animate({marginTop: "-82px"}, 500);
		});
	});

	$('td').children('#close_form').hover(function(){		//---------Hover Over Close Button to Animate Close Box Upper Left--------------- 
		$(this).finish().animate({backgroundColor: "#99C0CA"}, 500);
		}, function(){
			$(this).finish().animate({backgroundColor: "#6685A3"}, 300);
	});

	$('td').children('#close_form').click(function(){		//--------Click on Close Box to Animate Close Contact Form Upper Left------------
		$(this).finish().animate({marginTop: "-120px"}, 500);
		$('td').children('#contact_form').animate({marginLeft: "-600px"}, 500);
		$('td').children('#contact_tri').css({color: ""});
		$('td').children('#contact_tri').animate({height: "", width: ""}, 100, function(){
			$(this).css({backgroundColor: "", fontSize: ""});
			$(this).animate({borderWidth: "100px"},400, function(){
				startBlink($('td').children("#hover_point"));
				contact_state = false;
			});
		});
	});

	$('div').children('#hover_button_top').hover(function(){	//-----------Hover on Up Button to Change Color---------------------- 
		$(this).parent().css({borderTop: "27px solid #002952",borderRight: "75px solid #00A3CC",borderLeft: "75px solid #00A3CC"});
	}, function(){
		$(this).parent().css({borderTop: "27px solid #00A3CC",borderRight: "75px solid #002952",borderLeft: "75px solid #002952"});
	});

	$('div').children('#hover_button_bottom').hover(function(){	//-----------Hover on Down Button to Change Color---------------------- 
		$(this).parent().css({borderBottom: "27px solid #002952",borderRight: "75px solid #00A3CC",borderLeft: "75px solid #00A3CC"});
	}, function(){
		$(this).parent().css({borderBottom: "27px solid #00A3CC",borderRight: "75px solid #002952",borderLeft: "75px solid #002952"});
	});

		// Variable for the top position of boxe
	top_position = ($('div').children('#box_1').position().top);

	$('div').children('#hover_button_top').click(function(){	//---------Click on Button Top to Scroll Through the Images--------------------
		bottom_position = ($('div').children('#box_10').position().top); 
		
		if (bottom_position > 392 && scroll_state == false){
			scroll_state = true;
			$('div').children('#box_1').animate({marginTop: top_position -= 78}, 800, function(){
				scroll_state = false;
			});
		}
	});

	$('div').children('#hover_button_bottom').click(function(){	//---------Click On Button Bottom to Scroll Through the Images--------------------
		bottom_position = ($('div').children('#box_10').position().top); 
		
		if (bottom_position >= 392 && bottom_position < 702 && scroll_state == false){
			scroll_state = true;
			$('div').children('#box_1').animate({marginTop: top_position += 78}, 800, function(){
				scroll_state = false;
			});
		}
	});

	$('div').children('.image_div').click(function(){	//---------------Click On the Image to Display the Info--------------------------------
		scroll_state = true;
		top_position_image_next = ($(this).parent().next().position().top);
		box_id = ($(this).parent().attr('id'));
		
		$(this).parent().next().animate({marginTop: top_position_image_next + 500}, 800, function(){
			if (box_id != 'box_1'){
				if (box_id == 'box_2'){
					$('a').children('#tic_tac_toe_btn').css({visibility: "visible"});
				}

				else if (box_id == 'box_3'){
					$('a').children('#school_btn').css({visibility: "visible"});
				}

				else if (box_id == 'box_4'){
					$('a').children('#final_project_btn').css({visibility: "visible"});
				}

				else if (box_id == 'box_5'){
					$('div').children('#airlines').css({visibility: "visible"});
					$('div').children('#next_btn').css({visibility: "visible"});
					program_id = 'airlines';
				}

				else if (box_id == 'box_6'){
					$('div').children('#games').css({visibility: "visible"});
					//$('div').children('#next_btn').css({visibility: "visible"});  *******Only If Adding More Programs*****
					program_id = 'games';
				}

				else if (box_id == 'box_7'){
					$('div').children('#retail').css({visibility: "visible"});
					//$('div').children('#next_btn').css({visibility: "visible"});  *******Only If Adding More Programs*****
					program_id = 'retail';
				}

				$(this).prev().prevAll().hide(800);	
				$('div').children('.info_div').children('#'+box_id).animate({height: "300px"}, 500);
				$('div').children('#close_info_div').stop().animate({marginLeft: "190px"}, 300);
			}

			else if (box_id == 'box_1'){
				$('div').children('#resume_btn').css({visibility: "visible"});
				$('div').children('.info_div').children('#'+box_id).animate({height: "300px"}, 500);
				$('div').children('#close_info_div').stop().animate({marginLeft: "190px"}, 300);
			}
		});	
	});

	$('div').children('#close_info_div').hover(function(){	//------------Hover On Close Button To Animte Background Color--------------
		$(this).clearQueue().animate({backgroundColor: "#99C0CA"}, 500);	
	}, function(){
		$(this).clearQueue().animate({backgroundColor: "#00627A"}, 300);
	});

	$('div').children('#close_info_div').click(function(){	//-------------Click On Close Button To Exit Info State----------------------
		if (!info_state){
			info_state = true;	
			
			if (box_id == 'box_1'){
				$('div').children('#resume_info').children('#resume').css({visibility: "hidden"});
				$('div').children('#resume_btn').css({visibility: "hidden"});
			}

			else if (box_id == 'box_2'){
				$('a').children('#tic_tac_toe_btn').css({visibility: "hidden"});
			}

			else if (box_id == 'box_3'){
				$('a').children('#school_btn').css({visibility: "hidden"});
			}

			else if (box_id == 'box_4'){
				$('a').children('#final_project_btn').css({visibility: "hidden"});
			}

			else if (box_id == 'box_5'){
				$('div').children('#next_btn').css({visibility: "hidden"});
				$('div').children('#previous_btn').css({visibility: "hidden"});
				$('div').children('#'+program_id).css({visibility: "hidden"});	
			}

			else if (box_id == 'box_6'){
				//$('div').children('#next_btn').css({visibility: "hidden"});	*******Only If Adding More Programs*****
				//$('div').children('#previous_btn').css({visibility: "hidden"});	*******Only If Adding More Programs*****
				$('div').children('#'+program_id).css({visibility: "hidden"});	
			}

			else if (box_id == 'box_7'){
				//$('div').children('#next_btn').css({visibility: "hidden"});	*******Only If Adding More Programs*****
				//$('div').children('#previous_btn').css({visibility: "hidden"});	*******Only If Adding More Programs*****
				$('div').children('#'+program_id).css({visibility: "hidden"});	
			}

			$('pre').css({visibility: "hidden"});
			$(this).animate({marginLeft: "300px"}, 500);
			$('div').children('.info_div').children('#'+box_id).animate({height: "0px"}, 300, function(){
				$('div').children('#all_images').children('#'+box_id).prevAll().show(500);
				$('div').children('#all_images').children('#'+box_id).next().animate({marginTop: "-2px"}, 500, function(){
					info_state = false;
					$('div').children('#close_info_div').animate({marginLeft: "300px"}, 500);
					$('div').children('.info_div').children('#'+box_id).css({height: "0px"});
					scroll_state = false;
				});
			});
		}
	});

	$('div').children('#resume_btn').click(function(){	//------------------Click On Resume Button To Display Resume---------------------
		$('div').children('#resume_info').children('#resume').css({visibility: "visible"});
	});
	
	$('li').children('a').click(function(){	//-----------------------Click On Link To Open the Source Code For Program---------------------
		$('pre').css({visibility: "hidden"});
		
		if ($(this).attr('id') == "air_1"){			// Airline Program
			$('#airline_code').children('#main_air_cpp').css({visibility: "visible"});
		}

		else if ($(this).attr('id') == "air_2"){
			$('#airline_code').children('#seat_cpp').css({visibility: "visible"});
		}

		else if ($(this).attr('id') == "air_3"){
			$('#airline_code').children('#airlineSystem_cpp').css({visibility: "visible"});
		}

		else if ($(this).attr('id') == "air_4"){
			$('#airline_code').children('#reservation_cpp').css({visibility: "visible"});
		}

		else if ($(this).attr('id') == "bank_1"){		// Bank Program
			$('#bank_code').children('#main_bank_cpp').css({visibility: "visible"});
		}

		else if ($(this).attr('id') == "bank_2"){
			$('#bank_code').children('#menu_cpp').css({visibility: "visible"});
		}

		else if ($(this).attr('id') == "bank_3"){
			$('#bank_code').children('#account_cpp').css({visibility: "visible"});
		}

		else if ($(this).attr('id') == "bank_4"){
			$('#bank_code').children('#transaction_cpp').css({visibility: "visible"});
		}

		else if ($(this).attr('id') == "car_1"){		// Car Program
			$('#car_code').children('#main_car_cpp').css({visibility: "visible"});
		}

		else if ($(this).attr('id') == "car_2"){
			$('#car_code').children('#car_cpp').css({visibility: "visible"});
		}

		else if ($(this).attr('id') == "car_3"){
			$('#car_code').children('#parking_lot_cpp').css({visibility: "visible"});
		}

		else if ($(this).attr('id') == "car_4"){
			$('#car_code').children('#patrol_cpp').css({visibility: "visible"});
		}

		else if ($(this).attr('id') == "pong_1"){		// Pong Program
			$('#pong_code').children('#main_pong_cpp').css({visibility: "visible"});
		}

		else if ($(this).attr('id') == "games_1"){		// Retail Program
			$('#games_code').children('#main_games_py').css({visibility: "visible"});
		}

		else if ($(this).attr('id') == "retail_1"){		
			$('#retail_code').children('#main_retail_java').css({visibility: "visible"});
		}

		else if ($(this).attr('id') == "retail_2"){		
			$('#retail_code').children('#appliance_java').css({visibility: "visible"});
		}

		else if ($(this).attr('id') == "retail_3"){	
			$('#retail_code').children('#gold_java').css({visibility: "visible"});
		}

		else if ($(this).attr('id') == "retail_4"){		
			$('#retail_code').children('#standard_java').css({visibility: "visible"});
		}
	});

	$('div').children('#next_btn').click(function(){	/*****************Click on the Next Button to Advance to the Next Page in Image Info******/
		if (box_id == "box_5"){
			$('#airline_code').children('pre').css({visibility: "hidden"});
			$('#bank_code').children('pre').css({visibility: "hidden"});
			$('#car_code').children('pre').css({visibility: "hidden"});
			$('#pong_code').children('pre').css({visibility: "hidden"});
			$('div').children('#'+program_id).css({visibility: "hidden"});
			$('div').children('#'+program_id).next().css({visibility: "visible"});
			$('div').children('#previous_btn').css({visibility: "visible"});
			program_id = $('div').children('#'+program_id).next().attr('id');
			if (program_id == "pong"){
				$('div').children('#next_btn').css({visibility: "hidden"});
				$('div').children('#previous_btn').css({visibility: "visible"});
			}
			
		}
	});

	$('div').children('#previous_btn').click(function(){	/*****************Click on the Previous Button to Advance to the Next Page in Image Info******/
		if (box_id == "box_5"){
			$('div').children('#next_btn').css({visibility: "visible"});
			$('#airline_code').children('pre').css({visibility: "hidden"});
			$('#bank_code').children('pre').css({visibility: "hidden"});
			$('#car_code').children('pre').css({visibility: "hidden"});
			$('#pong_code').children('pre').css({visibility: "hidden"});
			$('div').children('#'+program_id).css({visibility: "hidden"});
			$('div').children('#'+program_id).prev().css({visibility: "visible"});
			program_id = $('div').children('#'+program_id).prev().attr('id');
			if (program_id == "airlines"){
				$('div').children('#previous_btn').css({visibility: "hidden"});
				$('div').children('#next_btn').css({visibility: "visible"});
			}
		}
	});

		// Variable for the Top Margin of Main Layer of Info Section
	top_position_menu = ($('div').children('#box_1').position().top);

	$('div').children('#second').click(function(){	/***************************Click on the Second Menu to Organize Info************/
		$('div').children('#box_1').animate({marginTop: top_position_menu}, 500);
		top_position = ($('div').children('#box_1').position().top);
	});

	$('div').children('#second_curved').click(function(){	/***************************Click on the Second Menu to Organize Info************/
		$('div').children('#box_1').animate({marginTop: top_position_menu}, 500);
		top_position = ($('div').children('#box_1').position().top);
	});

	$('div').children('#third').click(function(){	/***************************Click on the Third Menu to Organize Info************/
		$('div').children('#box_1').animate({marginTop: top_position_menu - (78)*1}, 500);
		top_position = ($('div').children('#box_1').position().top) - (78)*1;
	});

	$('div').children('#third_curved').click(function(){	/***************************Click on the Third Menu to Organize Info************/
		$('div').children('#box_1').animate({marginTop: top_position_menu - (78)*1}, 500);
		top_position = ($('div').children('#box_1').position().top) - (78)*1;
	});

	$('div').children('#fourth').click(function(){	/***************************Click on the Fourth Menu to Organize Info************/
		$('div').children('#box_1').animate({marginTop: top_position_menu - (78)*4}, 500);
		top_position = ($('div').children('#box_1').position().top) - (78)*4;
	});

	$('div').children('#fourth_curved').click(function(){	/***************************Click on the Fourth Menu to Organize Info************/
		$('div').children('#box_1').animate({marginTop: top_position_menu - (78)*4}, 500);
		top_position = ($('div').children('#box_1').position().top) - (78)*4;
	});

	$('div').children('#fifth').click(function(){	/************************Click on The Fifth Menu Option to Organize Info******************/
		$('div').children('#box_1').animate({marginTop: top_position_menu - (78)*4}, 500, function(){
			$('div').children('#box_8').stop().animate({marginLeft: "-50px"}, 500);
			$('div').children('#box_8').animate({marginLeft: "0px"}, 500);	
		});
		top_position = ($('div').children('#box_1').position().top) - (78)*4;

	});

//-----------------------End of Document Ready---------------------------------------------------------------
});

	


//-----------------------Variables For the Whole Page------------------------------------------------------------
vertical_menu_curve = [];
vertical_curve_menu = [];
contact_state = false;
scroll_state = false;
info_state = false;
box_id = "";
program_id = "";


//-----------------------Function For the Whole Page------------------------------------------------------------
	// Start the blinking for the upper left triangle
function startBlink(tri){
	blink = setInterval(function(){
		tri.finish().animate({backgroundColor: "#335A64"}, 300, function(){
			tri.finish().animate({backgroundColor: "transparent"}, 300);
		});
	}, 600);
}

	// Stop the blinking for the upper left triangle
function stopBlink(tri){
	tri.css({backgroundColor: "transparent"});
	clearInterval(blink);	
}

	// Returns correct px for the id of 'this' and sets the vertical_id and the menu_id
function getPx(x){
	if (x.attr('id') == "first_curved_animate"){
		vertical_menu_curve[0] = '#first_vertical';
		vertical_menu_curve[1] = '#first_menu_animate';
		return "125px";
	}
	else if (x.attr('id') == "second_curved_animate"){
		vertical_menu_curve[0] = '#second_vertical';
		vertical_menu_curve[1] = '#second_menu_animate';
		return "104.16px";
	}
	else if (x.attr('id') == "third_curved_animate"){
		vertical_menu_curve[0] = '#third_vertical';
		vertical_menu_curve[1] = '#third_menu_animate';
		return "83.36px";
	}
	else if (x.attr('id') == "fourth_curved_animate"){
		vertical_menu_curve[0] = '#fourth_vertical';
		vertical_menu_curve[1] = '#fourth_menu_animate';
		return "62.4px";
	}
	else if (x.attr('id') == "fifth_curved_animate"){
		vertical_menu_curve[0] = '#fifth_vertical';
		vertical_menu_curve[1] = '#fifth_menu_animate';
		return "41.6px";
	}
	else if (x.attr('id') == "sixth_curved_animate"){
		vertical_menu_curve[0] = '#sixth_vertical';
		vertical_menu_curve[1] = '#sixth_menu_animate';
		return "20.8px";
	}
}

  // Animates the from entering the menu
function enterFromMenu(x, enterSpeed, enterVerticalSpeed){
	if (x.attr('id') == 'first_menu_animate'){
		vertical_curve_menu[0] = '#first_vertical';
		vertical_curve_menu[1] = '#first_curved_animate';
		$('#first_curved_animate').stop(true).animate({height: "125px", width: "125px"}, enterSpeed,
			function(){
				$('#first_vertical').children('.curved_triangleD_div').css({visibility: "visible"});
				$('#first_vertical').children('.vertical_animate_div').stop(true).animate({height: "520px"}, enterVerticalSpeed);
			});
	}
	else if(x.attr('id') == 'second_menu_animate'){
		vertical_curve_menu[0] = '#second_vertical';
		vertical_curve_menu[1] = '#second_curved_animate';
		$('#second_curved_animate').stop(true).animate({height: "104.16px", width: "104.16px"}, enterSpeed,
			function(){
				$('#second_vertical').children('.curved_triangleD_div').css({visibility: "visible"});
				$('#second_vertical').children('.vertical_animate_div').stop(true).animate({height: "520px"}, enterVerticalSpeed);
			});
	}
	else if(x.attr('id') == 'third_menu_animate'){
		vertical_curve_menu[0] = '#third_vertical';
		vertical_curve_menu[1] = '#third_curved_animate';
		$('#third_curved_animate').stop(true).animate({height: "83.36px", width: "83.36px"}, enterSpeed,
			function(){
				$('#third_vertical').children('.curved_triangleD_div').css({visibility: "visible"});
				$('#third_vertical').children('.vertical_animate_div').stop(true).animate({height: "520px"}, enterVerticalSpeed);
			});
	}
	else if(x.attr('id') == 'fourth_menu_animate'){
		vertical_curve_menu[0] = '#fourth_vertical';
		vertical_curve_menu[1] = '#fourth_curved_animate';
		$('#fourth_curved_animate').stop(true).animate({height: "62.4px", width: "62.4px"}, enterSpeed,
			function(){
				$('#fourth_vertical').children('.curved_triangleD_div').css({visibility: "visible"});
				$('#fourth_vertical').children('.vertical_animate_div').stop(true).animate({height: "520px"}, enterVerticalSpeed);
			});
	}
	else if(x.attr('id') == 'fifth_menu_animate'){
		vertical_curve_menu[0] = '#fifth_vertical';
		vertical_curve_menu[1] = '#fifth_curved_animate';
		$('#fifth_curved_animate').stop(true).animate({height: "41.6px", width: "41.6px"}, enterSpeed,
			function(){
				$('#fifth_vertical').children('.curved_triangleD_div').css({visibility: "visible"});
				$('#fifth_vertical').children('.vertical_animate_div').stop(true).animate({height: "520px"}, enterVerticalSpeed);
			});
	}
	else if(x.attr('id') == 'sixth_menu_animate'){
		vertical_curve_menu[0] = '#sixth_vertical';
		vertical_curve_menu[1] = '#sixth_curved_animate';
		$('#sixth_curved_animate').stop(true).animate({height: "20.8px", width: "20.8px"}, enterSpeed,
			function(){
				$('#sixth_vertical').children('.curved_triangleD_div').css({visibility: "visible"});
				$('#sixth_vertical').children('.vertical_animate_div').stop(true).animate({height: "520px"}, enterVerticalSpeed);
			});
	}
}

	// Animates leaving from the menu
function leaveFromMenu(menu, leaveSpeed, leaveVerticalSpeed){
	$(menu[0]).children('.curved_triangleD_div').css({visibility: ""});
	$(menu[0]).children('.vertical_animate_div').stop(true).animate({height: "0px"}, leaveVerticalSpeed);
	$(menu[1]).stop(true).animate({height: "0px", width: '0px'}, leaveSpeed);
	vertical_curve_menu = [];
}

	// Animates enter from the curve
function enterFromCurve(curve, enterSpeed){
	$(curve[1]).stop(true).animate({width: "150px", marginLeft: "0px"}, enterSpeed);
}

	// Animates leaving from the curve
function leaveFromCurve(curve, leaveSpeed){
	$(curve[1]).stop(true).animate({width: "0px", marginLeft: "150px"}, leaveSpeed);
	vertical_menu_curve = [];
}