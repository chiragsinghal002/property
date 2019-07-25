$(document).ready(function() {
		$('#myCarousel1').carousel({
			interval: 10000
		})

		$('#myCarousel1').on('slid.bs.carousel', function() {
    	//alert("slid");
    });


	});
	

$(document).ready(function() {
		$('#myCarousel').carousel({
			interval: 10000
		})

		$('#myCarousel').on('slid.bs.carousel', function() {
    	//alert("slid");
    });


	});

$('img').click(function(){
    $('.selected').removeClass('selected');
    $(this).addClass('selected');
});

function price_check(value){
		
		var cat_id=$("#category_id").val();
		if(cat_id==26){
			$("#construction_status").hide();
		}else{
			$("#construction_status").show();
		}

		if(value>=0){
			$("#price_error").hide();
		}else{
			$('#price_error').show();
		}

		if(value!==''){
			$("#negotiable_div").show();
			document.getElementById('word_result').innerHTML = inWords(document.getElementById('price').value);
		}else{
			$("#negotiable_div").hide();
			document.getElementById('word_result').innerHTML = inWords(document.getElementById('price').value);
			$("#construction_status").hide();
			
		}

	}


	var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
	var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];

	function inWords (num) {
		if ((num = num.toString()).length > 9) return 'overflow';
		n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
		if (!n) return; var str = '';
		str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
		str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
		str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
		str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
		str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only/-' : '';
		return str;
	}

	/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
	var dropdown = document.getElementsByClassName("dropdown-btn");
	var i;

	for (i = 0; i < dropdown.length; i++) {
		dropdown[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var dropdownContent = this.nextElementSibling;
			if (dropdownContent.style.display === "block") {
				dropdownContent.style.display = "none";
			} else {
				dropdownContent.style.display = "block";
			}
		});
	}


	function show_address(value){
	if(value==''){
		$('#location_div').css('display','none');
		$("#result").hide();
		$("#result1").hide();
	}else{
		$('#location_div').css('display','block');
	}
}


function sell_div(value){
		 // alert(value);
		if(value==0){
			$("#sell_type").show();
			$("#location_div").hide();
		}
		if(value==''){
			// alert('1');
			$("#sell_type").hide();
			$("#location_div").hide();
		}
		if(value==1){
			$("#sell_type").hide();
			$("#location_div").show();
		}
	}

	function residential(){
	// alert('chirag');
}
function commercial(){
	// alert('commercial');
}
function residential_cat(id){
	   // alert(id);
	  $("#category_id").val(id);
	  $.ajax({
	  	url:'ajax_requirement.php',
	  	type:'post',
	  	data:{'resi_cat_id':id},
	  	success:function(data){
	  		 console.log(data);
	  		if(data!==''){
	  			$("#subcat").show();
	  			$("#result").show();
	  			$("#result").html(data);
	  			$("#result1").hide(data);
	  		}else{
	  			$("#result").hide();
	  			$("#result1").hide();
	  		}

	  	}
	  })
	}
	function commercial_cat(id){
		// alert(id);
		$("#category_id").val(id);
		$.ajax({
			url:'ajax_requirement.php',
			type:'post',
			data:{'comm_cat_id':id},
			success:function(data){
				console.log(data);
				if(data!==''){
					$("#subcat").show();
					$("#result").show();
					$("#result").html(data);
					$("#result1").hide(data);
				}else{
					$("#result").hide();
					$("#result1").hide();
				}

			}
		})
	}

	function child_sub_cat(value){
	// alert(value);
	$("#subcat_id").val(value);
	var p_for=$("input[name='property_for']:checked").val();
	$.ajax({
		url:'ajax_requirement.php',
		type:'post',
		data:{'subcat_id':value,p_for:p_for},
		success:function(data){
			 // alert(data);
			 console.log(data);
			 if(data!==''){
			 	$("#child_subcat").show();
			 	$("#result1").show(data);
			 	$("#result1").html(data);
			 }

			}
		})
}

function select_property(value){
	  // alert(value);
	  $("#child_id").val(value);
	  $.ajax({
	  	url:'ajax_requirement.php',
	  	type:'post',
	  	data:{'subchildcat_id':value},
	  	success:function(data){
			   // alert(data);
			  // console.log(data);
			  if(data!==''){
			  	$("#select_property_type").show();
			  	$("#google_location").show();
			  	$("#google_location1").show();
			  	$("#constructon_status").show();
			  	$("#sector_div").show();
			  	$("#address_div").show();
			  	$("#landmark_div").show();
			  	$("#status").show();
			  	$("#select_type").html(data);
			  }else{
			  	$("#google_location").show();
			  	$("#google_location1").show();
			  	$("#constructon_status").show();
			  	$("#sector_div").show();
			  	$("#address_div").show();
			  	$("#landmark_div").show();
			  	$("#status").show();
			  }

			}
		})
	}

	function form_submit(){
		 console.log('chirag');
		var property_for=$("input[name='property_for']:checked").val();
		// alert(property_for);
		if(property_for>=0){
			$("#property_for_error").hide();
		}else{
			$("#property_for_error").show();
			return false;
		}
		

		var property_type_for=$("input[name='property_type_for']:checked").val();
		// alert(property_type_for);
		if(property_type_for>=0){
			
			$("#property_type_for_error").hide();
		}else{
			$("#property_type_for_error").show();
			return false;
		}

		if(property_type_for==0){
			var sell_type_new=$("input[name='property_sell_type']:checked").val();
			if(sell_type_new>=0){
				$("#sell_type_new_error").hide();
			}else{
				$("#sell_type_new_error").show();
				return false;
			}
		}

		var sector=$("#sector").val();
		if(sector==''){
			$("#sector_error").show();
			return false;
		}else{
			$("#sector_error").hide();
		}

		var cat_id=$("#category_id").val();
		if(cat_id==''){
			$("#category_id_error").show();
			return false;
		}else{
			$("#category_id_error").hide();
		}

		var price=$("#price").val();
		if(price==''){
			$("#price_error").show();
			return false;
		}else{
			$("#price_error").hide();
		}

		$.ajax({
			url:'ajax_requirement_new.php',
			method:'post',
			data:$('#form').serialize(),
			success:function(data){
				console.log(data);
				//alert('Requirement listed successfully');
				// window.location.reload();
				    window.location.href='post_requirement.php?msg=Requirement Listed successfully';
			}
		})
	}


// validation code end
function select_size(value){
	$("#select_type_val").val(value);
}

function property_type(value){
	// alert(value);
	if(value==0){
		$("#residential_tab").show();
		$("#commercial_tab").hide();
		$("#residential_slider").show();
		$("#commercial_slider").hide();
	}
	if(value==1){
		$("#residential_tab").hide();
		$("#commercial_tab").show();
		$("#residential_slider").hide();
		$("#commercial_slider").show();
	}

	if(value==''){
		$('#location_div').css('display','none');
		$('#commercial_type').css('display','none');
		$("#result").hide();
		$("#result1").hide();
	}else{
		$('#commercial_type').css('display','inline-flex');
	}
}

