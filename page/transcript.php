<div class="mt-5">
<?php



	function merit($adm=null){
		global $scode;

		// filter available uploads
		$file = fetch("select file from uploads where month(date) = month(current_timestamp) and scode = '$scode' order by date desc limit 1");
		
		if($file == "") exit(alert("No uploads found! Please download the Template and fill"));
		$path=merit_uploads.$file;
		$merit = array_map('str_getcsv', file($path));

		if(empty($merit)) exit(alert("Upload has no data. Please re-upload!"));
		$header[]=array_shift($merit);
		$header = array_column(array_fill(0,count($merit),$header),0);
		$broad = array_map("array_combine",$header,$merit);
		foreach($broad as $m=>$k){ $data[current($k)] = $k;}
		
		return is_null($adm)? $data : $data[$adm];
	}



	function broad($adm=null){
		
		$m = merit($adm);
		$adms = array_map(function($adm){
			return preg_replace(' [\/] ','_',$adm);
		}, array_keys($m));

		// show a table
		echo "<table class='table-striped' width='100%'>";
		echo "<thead>";echo "<tr>";foreach(array_keys(current($m)) as $f){ echo "<th>$f</th>";}echo "</tr>";echo "</thead><tbody >";
			array_map(function($j){echo "<tr>";array_map(function($td){echo "<td>$td</td>";},$j);echo "</tr>";},$m);
		echo "</tbody ></table ><hr>";
		
		// filter the qrcodes and display
		echo 'Quick Response Codes';
		echo '<hr>';
		$f = scandir("src/codes");
		$admap = array_fill(0,count($f),$adms);
		$qrcodes = array_map(function($i){
			global $scode;
			echo '<div class="form-group pull-left text-center">';
			echo "<img src='src/codes/$i' ><br>".preg_replace('/'.$scode.'_/','',$i);
			echo "</div>";
		}, array_filter(array_map(function($q){
			global $scode; if( preg_match("/".$scode."_/",$q)) 
			return $q;
		},array_filter(array_map(function($i,$ap){
			global $scode;
			$j = str_replace(".png","",$i);$j = str_replace($scode."_","",$j);
			return in_array($j,$ap)? $i: null;
		},$f,$admap)))));

		// pf($admap);
	}


	// generate the qrcode
	require("src/phpqrcode/qrlib.php");
	foreach(merit() as $adm=>$v){
		$adm = preg_replace(' [\/] ','_',$adm);
		QRcode::png('http://nardtec.net/meritus/student/'.$scode."_".($adm), 'src/codes/'.$scode."_".($adm).'.png');
	}
	
	echo(broad());


?>
