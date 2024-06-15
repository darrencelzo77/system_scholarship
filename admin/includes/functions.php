<?php

function escape_str($db_connection,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($db_connection,$str);
	}
}
function Number_float($float,$dec_num=2,$ts = '') {
	if ($float) {
		return number_format($float,$dec_num,'.',$ts);
	} else {
		return NumberDecimal($float);
	}
}

function GetValue($sql_query) {error_reporting(0);
	global $db_connection;
	$result = mysqli_query($db_connection,$sql_query);
	$row = mysqli_fetch_array($result);
	return $row[0];
}

function Number($float) {
//$floatx = number_format($float,2,".","");
	if ($float==0) {
		return "";
	} else {
		if ($float > 0) {
		return number_format($float,2,".",",");
		}
		else { return '('.number_format(abs($float),2,".",",").')'; }
	}
}



// function GetData($sql_query) {
//     global $db_connection;
//     $result = $db_connection->query($sql_query);
//     if(!$result || $result->num_rows === 0){return false;}
//     $row = $result->fetch_array(MYSQLI_NUM);
//     return $row[0]; 
// }

function GetData($sql_query) {
    global $db_connection;
    $result = $db_connection->query($sql_query);
    if(!$result || $result->num_rows === 0){return false;}
    $row = $result->fetch_array(MYSQLI_NUM);
    return htmlspecialchars($row[0], ENT_QUOTES, 'UTF-8'); 
}

 
function GenerateRandomString($length = 5) {
	//$characters = '2345679ACDEFGHJKLMNPQRSTUVWXYZ';
	$characters = '0123456789ABCDE';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

function GenerateOtp($length = 6) {
	//$characters = '2345679ACDEFGHJKLMNPQRSTUVWXYZ';
	$characters = '0123456789ABCDE';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}
function Generatepassword($length = 8) {
	//$characters = '2345679ACDEFGHJKLMNPQRSTUVWXYZ';
	$characters = '0123456789ABCDE';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}
//Anti SQL Injection
/*function OfficeName($id){
    global $conn;
    $query = 'SELECT officeName FROM offices WHERE office_id=?';
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->bind_result($officeName);
    $stmt->fetch();
    $stmt->close();
    return $officeName;
}*/



		function secureData( $string, $action = 'e' ) {
		// you may change these values to your own
			$secret_key = 'monkey.d.luffy';
			$secret_iv = 'monkey.d.garp';
			$output = false;
			$encrypt_method = "AES-256-CBC";
			$key = hash( 'sha256', $secret_key );
			$iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
			if( $action == 'e' ) {
			$output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
			}
			else if( $action == 'd' ){
			$output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
			}
			return $output;
		}

		function city($id){ global $db_connection;
			return GetData('SELECT cityname FROM tblcity WHERE cityid='.$id);
		}

		function bar($id){ global $db_connection;
			return GetData('SELECT barangayname FROM tblbarangay WHERE brgyid='.$id);
		}

		function prov($id){ global $db_connection;
			return GetData('SELECT provincename FROM tblprovince WHERE provid='.$id);
		}

		function isHaveCar($value) {
			return ($value == 1) ? "Yes" : "No";
		}

		function branch($id){ global $db_connection;
			return GetData('SELECT branchname FROM tblbranch WHERE branchid='.$id);
		}

		function category($id){ global $db_connection;
			return GetData('SELECT categoryname FROM tblcategory WHERE catid='.$id);
		}

		function unit($id){ global $db_connection;
			return GetData('SELECT unitname FROM tblunit WHERE unitid='.$id);
		}


		function type($id){ global $db_connection;
			return GetData('SELECT typename FROM tblsubtype WHERE subtypeid='.$id);
		}

		function status($id){ global $db_connection;
			return GetData('SELECT stat FROM tblstatus WHERE statid='.$id);
		}
		function product($id){ global $db_connection;
			return GetData('SELECT prodname FROM tblproducts WHERE prodid='.$id);
		}

		function prod($id){ global $db_connection;
			return GetData('SELECT pname FROM tblprod WHERE prodnameid='.$id);
		}

		function Role($id){return GetData('Select roletype from tblroles where roleid='.$id);}

		function AccountType($id){return GetData('Select roletype from tblroles where roleid='.$id);}


		function CustomerName($id){return GetData('Select CONCAT(firstname,\' \',lastname) as name from tblcustomers where customerid='.$id);}

		function AccountName($id){return GetData('Select CONCAT(firstname,\' \',lastname) as name from tblaccounts where accountid='.$id);}

		function SupplierName($id){return GetData('Select suppliername from tblsupplier where supplierid='.$id);}
	function CarName($id){return GetData('Select brand from tblcar where carid='.$id);}
	
?>