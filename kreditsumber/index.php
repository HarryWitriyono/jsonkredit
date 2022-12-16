<?php
$kon=mysqli_connect("localhost","root","","kreditsyariah");
$sql="select * from nasabah";
$q=mysqli_query($kon,$sql);
$r=mysqli_fetch_array($q);
$jsondatanasabah=array();
do {
	$nsbh=array(
	  'NoRekening' => $r['NoRekening'],
	  'NamaNasabah' => $r['NamaNasabah'],
	  'Alamat'=>$r['Alamat'],
	  'NoHP'=>$r['NoHP']
	  );
	array_push($jsondatanasabah,$nsbh);
}while($r=mysqli_fetch_array($q));
$jsondatanasabah = json_encode($jsondatanasabah);
echo $jsondatanasabah;
?>