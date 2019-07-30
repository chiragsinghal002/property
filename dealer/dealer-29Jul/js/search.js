  $(function(){
  	$('[data-toggle="tooltip"]').tooltip();
  	$(".side-nav .collapse").on("hide.bs.collapse", function() {                   
  		$(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
  	});
  	$('.side-nav .collapse').on("show.bs.collapse", function() {                        
  		$(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");
  	});
  })    
  function buy_show_strip(){
    // console.log('chirag');
    var cat= $("#buy_property_type").val();
    var cat_id=$("#buy_cat_id").val();
      // alert(cat_id);
      // console.log(cat_id);
      // console.log(cat);
      if(cat==0){
      	if(cat_id==26){
      		$("#cons_status").hide();
      		$("#show_bkh").hide();
      		$("#plot_area").show();
      	}else{
      		$("#cons_status").show();
      		$("#show_bkh").show();
      // $("#plot_area").hide();
    }
    $(".slctmiulbtns").show();
     // $("#show_bkh").show();
     $("#show_area").hide();
      // $("#plot_size_area").hide();
    }else{
     $(".slctmiulbtns").show();
     $("#show_bkh").hide();
     $("#show_area").show();
     $("#plot_size_area").show();
   }

 }

 function rent_show_strip(){
   var cat= $("#rent_property_type").val();
   var cat_id=$("#rent_cat_id").val();
     // alert(cat_id);
     if(cat==0){
     	if(cat_id==26){
     		$("#cons_status").hide();
     		$("#show_bkh").hide();
     		$("#plot_area").show();
     	}else{
     		$("#cons_status").show();
     		$("#show_bkh").show();
     		$("#plot_area").hide();
     	}
     	$(".slctmiulbtns").show();
     	$("#show_area").hide();
     	$("#plot_size_area").hide();

     }else{
     	$(".slctmiulbtns").show();
     	$("#show_bkh").hide();
     	$("#show_area").show();
     	$("#plot_size_area").show();
     }

   }

   function buy_search(){
    var choose_type=$("#buy_property_type").val();
    var cat_id=$("#buy_cat_id").val();
    var cons_status=$("#cons_status").val();
    var searching=$("#searching").val();
    if(cat_id==''){
     $("#buy_cat_id_error").show();
     return false;
   }else{
     $("#buy_cat_id_error").hide();
   }
   if(searching==''){
     $("#searching_error").show();
     return false;
   }else{
     $("#searching_error").hide();
   }
   var price_range_min=$("#price_range_min").val();
   var price_range_max=$("#price_range_max").val();
   var show_bkh=$("#show_bkh").val();
   var plot_area=$("#plot_area1").val();
   var plot_size_area_value=$("#plot_size_area_value").val();
   $.ajax({
     url:'ajax.php',
     type:'post',
     data:{'search_buy':1,choose_type:choose_type,cat_id:cat_id,cons_status:cons_status,searching:searching,price_range_min:price_range_min,price_range_max:price_range_max,plot_area:plot_area,plot_size_area_value:plot_size_area_value,show_bkh:show_bkh},
     beforeSend: function(data) {
                    // setting a timeout
                     // $("#search_div").html('');
                     $("#search_loading").css('display','block');
                   },
                   success:function(data){
                    console.log(data);
                    $("#search_div").html(data);

                  },
                  complete: function(data){
                    $("#search_loading").css('display','none');
                    $("#msg").show();
                  }
                })
 }

 function rent_search(){
 	var choose_type=$("#buy_property_type").val();
 	var cat_id=$("#buy_cat_id").val();
 	var cons_status=$("#cons_status").val();
 	var searching=$("#searching").val();
  if(cat_id==''){
   $("#buy_cat_id_error").show();
   return false;
 }else{
   $("#buy_cat_id_error").hide();
 }
 if(searching==''){
   $("#searching_error").show();
   return false;
 }else{
   $("#searching_error").hide();
 }
 var price_range_min=$("#price_range_min").val();
 var price_range_max=$("#price_range_max").val();
 var show_bkh=$("#show_bkh").val();
 var plot_area=$("#plot_area1").val();
 var plot_size_area_value=$("#plot_size_area_value").val();
 $.ajax({
   url:'ajax.php',
   type:'post',
   data:{'search_rent':1,choose_type:choose_type,cat_id:cat_id,cons_status:cons_status,searching:searching,price_range_min:price_range_min,plot_area:plot_area,plot_size_area_value:plot_size_area_value,price_range_max:price_range_max,show_bkh:show_bkh},
   beforeSend: function(data) {
                    // setting a timeout
                     // $("#search_div").html('');
                     $("#search_loading").css('display','block');
                   },
                   success:function(data){
                    console.log(data);
                    $("#search_div").html(data);
                  },
                  complete: function(data){
                    $("#search_loading").css('display','none');
                  }
                })
}
function buy_res_checkbox_value(id){
   // alert(id);
   $("#buy_cat_id").val(id);
   $("#buy_cat_id_error").hide();
   var text=$("#" + id).html();
   $("#buy_property_type").val(0);
   $("#buy_res").html(text);
 }

 function buy_comm_checkbox_value(id){
  var text=$("#" + id).html();
  $("#buy_cat_id").val(id);
  $("#buy_cat_id_error").hide();
  $("#buy_property_type").val(1);
  $("#buy_res").html(text);
}

//for rent
function rent_res_checkbox_value(id){
   // alert(id);
   $("#rent_cat_id").val(id);
   $("#rent_cat_id_error").hide();
   var text=$("#" + id).html();
   $("#rent_property_type").val(0);
   $("#rent_res").html(text);
 }

 function rent_comm_checkbox_value(id){
  var text=$("#" + id).html();
  $("#rent_cat_id").val(id);
  $("#rent_cat_id_error").hide();
  $("#rent_property_type").val(1);
  $("#rent_res").html(text);
} 



function location_valid(value){
	// alert(value);
	if(value!=''){
		$("#searching_error").hide();
	}else{
		$("#searching_error").show();
	}

}
function rent_location_valid(value){
  // alert(value);
  if(value!=''){
    $("#rent_searching_error").hide();
  }else{
    $("#rent_searching_error").show();
  }

}
function price_check(value){
  if(value>0){
			// $("#negotiable_div").show();
			document.getElementById('word_result').innerHTML = inWords(document.getElementById('price_range_min').value);
			// $("#price_error").hide();
		}else{
			// $("#negotiable_div").hide();
			document.getElementById('word_result').innerHTML = inWords(document.getElementById('price_range_min').value);
			// $("#construction_status").hide();
			$("#price_error").html('Price will be Greater than Zero');
			
		}

	}
	function price_check1(value){
		if(value>0){
			// $("#negotiable_div").show();
			document.getElementById('word_result1').innerHTML = inWords(document.getElementById('price_range_max').value);
			// $("#price_error").hide();
		}else{
			// $("#negotiable_div").hide();
			document.getElementById('word_result1').innerHTML = inWords(document.getElementById('price_range_max').value);
			// $("#construction_status").hide();
			// $("#price_error").html('Price will be Greater than Zero');
			
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
		str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
		return str;
	}


  /*for search result hints script*/
  function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
    var a, b, i, val = this.value;
    /*close any already open lists of autocompleted values*/
    closeAllLists();
    if (!val) { return false;}
    currentFocus = -1;
    /*create a DIV element that will contain the items (values):*/
    a = document.createElement("DIV");
    a.setAttribute("id", this.id + "autocomplete-list");
    a.setAttribute("class", "autocomplete-items");
    /*append the DIV element as a child of the autocomplete container:*/
    this.parentNode.appendChild(a);
    /*for each item in the array...*/
    for (i = 0; i < arr.length; i++) {
      /*check if the item starts with the same letters as the text field value:*/
      if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
        /*create a DIV element for each matching element:*/
        b = document.createElement("DIV");
        /*make the matching letters bold:*/
        b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
        b.innerHTML += arr[i].substr(val.length);
        /*insert a input field that will hold the current array item's value:*/
        b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
        /*execute a function when someone clicks on the item value (DIV element):*/
        b.addEventListener("click", function(e) {
          /*insert the value for the autocomplete text field:*/
          inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
            });
        a.appendChild(b);
      }
    }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
    var x = document.getElementById(this.id + "autocomplete-list");
    if (x) x = x.getElementsByTagName("div");
    if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
    });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
    closeAllLists(e.target);
  });
}

 // var countries='';
 
 /*To get data for country from database*/
 function country(){
   // aa='';
  $.ajax({
    url:'ajax_new.php',
    type:'post',
    data:{'location':1},
    success:function(data){
            //console.log(data);
           // aa=data;
           // console.log(data);
         }

       })
  // aa=data;
}

 country();
// console.log(aa);


/*close data for country*/


/*An array containing all the country names in the world:*/
var countries = ["Ajronda Chowk","Ashoka Enclave","Agwanpur","Anangpur Dairy","Ajit Nagar","Sector 12","Sector 15","Sector 20","Sector 21C","Sector 23-A","Ankhir","Ajronda","Ashoka Enclave","Badkhal Chowk","Ballabhgarh","BPTP Parkland","Basantpur","Charmwood Village","Chawla Colony","Dabuwa Colony","Dayal Bagh","Dabua Colony","Dayal Basti","Dav College","Faridpur","Friends Colony","Gandhi Colony","Ghazipur","Gurukul Basti","Gurukul Road","Greenfield Colony","Gopi Colony","Hardware Colony","Industrial Area","Indraprastha Colony","Ismailpur Road","Jawahar Colony","Jeevan Nagar","Katan Pahari","Kheri Road","Lakkarpur","Mewala Maharajpur","Mujesar","Mathura Road","Neharpar Faridabad","New Industrial Towns","New Industrial Towns","New Industrial Towns","New Industrial Towns","Nehru Colony","New Industrial Towns","New Industrial Towns","Parvatiya Colony","Raveev Nagar","Sainik Colony","Sector 23-A","Sector 27\/A","Sector 30","Sector 35","Sector 4","Sector 46","Sector 55","Sector 6","Sector 7","Sector-54","Sector-75","Sector-80","Sector-85","Sector-89","Suraj Kund Road","Sector 10","Sector 13","Sector-16","Sector-19","Sector 21A","Sector-22","Sector-24","Sector-29","Sector 33","Sector 37","Sector-42","Sector-5","Sector 58","Sector-64","Sector-9","Sector-43","Sector 70","Sector 76","Sector-81","Sector-86","Shastri Colony","Surya Nagar","Sector-11","Sector-14","Sector 16A","Sector 2","Sector-21B","Sector-23","Sector 25","Sector 3","Sector-34","Sector-39","Sector 45","Sector 52","Sector-59","Sector-65","Sector 91","Sector 49","Sector-72","Sector-77","Sector 82","Sector 87","Sehatpur","Spring Field Colony","Tikawali","Vinay Nagar","Yadav Colony"];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
// console.log(countries);
// countt();

autocomplete(document.getElementById("searching"), countries);

  /*close for search result hints script*/


  function mail(){
    alert('chirag');
  }

  function rent_tab(){
    // alert('chirag');
    $("#search_button").attr('onclick',"return rent_search()");
  }

  function buy_tab(){
    $("#search_button").attr('onclick',"return buy_search()");
  }