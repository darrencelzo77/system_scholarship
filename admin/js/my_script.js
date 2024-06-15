function obj(id) { return document.getElementById(id); }
function object(id) { return document.getElementById(id); }
function obj_class(classname) { return document.getElementsByClassName(classname);}
function ajax_fn(url,elementId) {
	if (window.XMLHttpRequest) {
		xmlhttp=new XMLHttpRequest();
	} else {
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}   
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			document.getElementById(elementId).innerHTML="";
			document.getElementById(elementId).innerHTML=xmlhttp.responseText;	
		}
	}  
	xmlhttp.open("GET",url,true);
	xmlhttp.send();	   
}	

function fillSubContent(loc,eid) {
		document.getElementById(eid).innerHTML="<div align='center'><img src='images/ajax-loader3.gif' width='15px' /></div>";
		loadPage(loc,eid);
	}
	
	function fillContent(loc,eid) {
		document.getElementById(eid).innerHTML="<div align='center'><img src='images/wait.gif' width='40%' /></div>";
		loadPage(loc,eid);
	}
	
	function fillMainContent(loc,eid) {
		document.getElementById(eid).innerHTML="<div align='center'><img src='images/loading_image.gif' width='10%' /></div><div align='center'><img src='images/ajax-loader2.gif' width='20%' /><div><span>Please wait...</span></div></div>";
		loadPage(loc,eid);
	}
	function param(w,h) {
		var width  = w;
		var height = h;
		var left = (screen.width  - width)/2;
		var top = (screen.height - height)/2;
		var params = 'width='+width+', height='+height;
		params += ', top='+top+', left='+left;
		params += ', directories=no';
		params += ', location=no';
		params += ', resizable=no';
		params += ', status=no';
		params += ', toolbar=no';
		return params;
	}

	function openWin(url){
		myWindow=window.open(url,'mywin',param(800,500));
		myWindow.focus();
	}

	function openCustom(url,w,h){
		myWindow=window.open(url,'mywin',param(w,h));
		myWindow.focus();
	}

	/*
	swal({
		title: "Logout",
		text: "Are you sure to Logout?",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	*/

	function logout() {
		swal({
			title: "Logout",
			text: "Are you sure to logout?",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((willSave) => {
			if (willSave) {
				window.location.href = '../dashboard/logout.php';
			}
		});
	}
	

	function SampleAjaxtoLoadDataTable() {
		$.ajax({
			url: "pages/test.php",
			method: "post",
			data: { record: 1 },
			success: function (data) {
				$('#maincontent').html(data);
				$('#myTable').DataTable();
			}
		});
	}
	
	function ajax_new(url_, tmp_container) {
		$('#' + tmp_container).html("<div align='center'><img src='../images/tar.gif' width='40px' /></div>");

		$.ajax({
			url: url_,
			method: "post",
			data: {record: 1},
			success: function(data) {
				$('#' + tmp_container).html(data);
				$('#myTable').DataTable();
				var fromDate = $('#from').val();
	            var toDate = $('#to').val();
	            
	            $("#from").datepicker({
	                changeMonth: true,
	                changeYear: true,
	                defaultDate: fromDate,
	                dateFormat: 'yy-mm-dd'
	            });

			    $("#to").datepicker({
	                changeMonth: true,
	                changeYear: true,
	                defaultDate: toDate,
	                dateFormat: 'yy-mm-dd'
	            });
			}
		});
	}

	function ajax_new_without_reload(url_, tmp_container) {

		$.ajax({
			url: url_,
			method: "post",
			data: {record: 1},
			success: function(data) {
				$('#' + tmp_container).html(data);
				$('#myTable2').DataTable();
				$('#myTable').DataTable();
				var fromDate = $('#from').val();
	            var toDate = $('#to').val();
	            
	            $("#from").datepicker({
	                changeMonth: true,
	                changeYear: true,
	                defaultDate: fromDate,
	                dateFormat: 'yy-mm-dd'
	            });

			    $("#to").datepicker({
	                changeMonth: true,
	                changeYear: true,
	                defaultDate: toDate,
	                dateFormat: 'yy-mm-dd'
	            });
			}
		});
	}



	function submenu(id) {
		switch (id) {
			case 1: ajax_new('customer/customer.php','tmp_content');
				break;
			case 2: ajax_new('pages/orders.php','tmp_content');
				break;
			case 3: ajax_new_without_search('pages/inventory_product.php','tmp_content');
				break;
			
		}
	}


	function submenu_(id) {
		switch (id) {
			case 1: ajax_new('customer/customer.php','tmp_content');
				break;
			case 2: ajax_new('pages/orders.php','tmp_content');
				break;
			case 3: ajax_new_without_search('pages/inventory_product.php','tmp_content');
				break;
			case 4: ajax_new_without_search('pages/inventory_product.php','tmp_content');
				break;
			
		}
	}



	//kapag post
	function ajax_get_idnum_1(name_of_id,id,url_, tmp_container){
		let myForm = new FormData();
		myForm.append(name_of_id, id);
		$('#'+tmp_container).html("<div align='center'><img src='images/ajax-loader3.gif' width='15px' /></div>");
		$.ajax({
			url: url_,
			type: "POST",
			data: myForm,
			processData: false,
			contentType: false,
			success: function(data) {
				$('#'+tmp_container).html(data);
				$('#myTable').DataTable();
			}
		});
	}


	//2 id
	function ajax_get_idnum_2(name_of_id2,id2,name_of_id,id,url_, tmp_container){
		let myForm = new FormData();
		myForm.append(name_of_id, id);
		myForm.append(name_of_id2, id2);
		//$('#'+tmp_container).html("<div align='center'><img src='images/ajax-loader3.gif' width='15px' /></div>");
		$.ajax({
			url: url_,
			type: "POST",
			data: myForm,
			processData: false,
			contentType: false,
			success: function(data) {
				$('#'+tmp_container).html(data);
				$('#myTable').DataTable();
			}
		});
	}


