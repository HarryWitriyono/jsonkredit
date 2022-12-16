<?php $url="http://localhost/kreditsumber/";
function ambildatajson($url){
	$cin=curl_init();
	curl_setopt($cin,CURLOPT_URL,$url);
	curl_setopt($cin,CURLOPT_RETURNTRANSFER,true);
	$hasiljson=curl_exec($cin);
	curl_close($cin);
    return $hasiljson;
}
function aesdec($pt) {
	$algo="aes-128-cbc-hmac-sha1";
	$kunci='1234567890111213';
	$iv='1234567890111213';
	$chsl=openssl_decrypt($pt,$algo,$kunci,$option=0,$iv);
	return $chsl;	
}
$daftarnasabah=ambildatajson($url);
$hasil=json_decode($daftarnasabah);

if (empty($daftarnasabah)){
echo "Server down !";
exit();
}
foreach($hasil as $r) {
	echo "No Rekeking : ".aesdec(base64_decode($r->NoRekening))."<br>";
	echo "Nama Nasabah : ".aesdec(base64_decode($r->NamaNasabah))."<br>";
	echo "Alamat : ".aesdec(base64_decode($r->Alamat))."<br>";
	echo "Password : ".aesdec(base64_decode($r->NoHP))."<br>";
}
?>