<?php
function aesenc($pl){
	$algo='aes-128-cbc-hmac-sha1';
	$kunci='1234567890111213';
	$iv='1234567890111213';
	$hasil=openssl_encrypt($pl,$algo,$kunci,$option=0,$iv);
	return $hasil;
}
$kon=mysqli_connect("localhost","root","","kreditsyariah");
$sql="select * from nasabah";
$q=mysqli_query($kon,$sql);
$r=mysqli_fetch_array($q);
$jsondatanasabah=array();
do {
	$nsbh=array(
	  'NoRekening' => base64_encode(aesenc($r['NoRekening'])),
	  'NamaNasabah' => base64_encode(aesenc($r['NamaNasabah'])),
	  'Alamat'=>base64_encode(aesenc($r['Alamat'])),
	  'NoHP'=>base64_encode(aesenc($r['NoHP']))
	  );
	array_push($jsondatanasabah,$nsbh);
}while($r=mysqli_fetch_array($q));
$jsondatanasabah = json_encode($jsondatanasabah);
echo $jsondatanasabah;
?>