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

function Type($id){ global $db_connection;
	return GetData('SELECT type FROM tblacctype WHERE typeid='.$id);
}

function Username($id){ global $db_connection;
	return GetData('SELECT username FROM tblaccount WHERE accountid='.$id);
}

function Name($id){ global $db_connection;
	return GetData('SELECT concat(firstname,\' \',lastname) as name FROM tblaccount WHERE accountid='.$id);
}

function Email($id){ global $db_connection;
	return GetData('SELECT email FROM tblaccount WHERE accountid='.$id);
}

function Pass($id){ global $db_connection;
	return GetData('SELECT accountpassword FROM tblaccount WHERE accountid='.$id);
}



function Audit($accountid,$activity){ global $db_connection;
	return mysqli_query($db_connection,'insert into tblactivity set 
			activitydate=NOW(), accountid='.$accountid.', activity=\''.$activity.'\' ');
}

function Cat($id){ global $db_connection;
	return GetData('SELECT cat FROM tblcategory WHERE categoryid='.$id);
}

function NameExt($id){
	return GetData('select namext from tblnamext where namextid='.$id);
}

		


?>