<div class="mt-5">
<?php



// include_once"functions.php";
//$handle=fopen('school_merits/f2.csv','r');
$start=time();

function merit($adm=null){
	$path=merit_uploads.'/f2.csv';
	$merit = array_map('str_getcsv', file($path));
	// while($row=fgetcsv($handle)){
		// $merit[]=$row;
	// }

	if(empty($merit)) exit(alert("Upload has no data. Please re-upload!"));

	$header=array_shift($merit);
	$f=array();
	foreach($merit as $k=>$v){
		$f=array_combine($header,$v);
		$id=current($f);
		$broad[$id]=$f;
	}
	return is_null($adm)? $broad : $broad[$adm];
	// pf($broad)
}

	function result($adm){
		global $path;
		$html='';
		$broad=merit($path);
		$adms[]=array_keys($broad);
		if(in_array($adm,$adms[0])){
		$res=$broad[$adm];
		// pf($adms);
			$name=array_shift($res);
			$title='ADM NO: '.$adm.' NAME:'.$name;
			$subj_titles=array_keys($res);
			$html .='<table border="1">';
		$html .='<tr><td colspan="'.count($subj_titles).'">'.$title.'</td></tr>';
			$html .='<tr>';
		foreach($res as $k=>$v){
			$html .='<td>'.$k.'</td>';
			}
			$html .='</tr>';
			$html .='<tr>';
		foreach($res as $k=>$v){
			$html .='<td>'.$v.'</td>';
		}
			$html .='</tr>';
			$html .='</table>';
			

		}
		else{
			alert('That Admission Number was Not Found!',1);
		
		}
		return $html;
	}

	function metris($adm=null){
		$m = merit($adm);
		$fields = array_keys(current($m));

		echo "<table class='table-striped' width='100%'>";
		echo "<thead>";echo "<tr>";foreach($fields as $f){ echo "<th>$f</th>";}echo "</tr>";echo "</thead>";
		echo "<tbody >";
			array_map(function($j){echo "<tr>";array_map(function($td){echo "<td>$td</td>";},$j);echo "</tr>";},$m);
		echo "</tbody >";

		echo "</table >";

		// return $m;
	}




	pf(metris());



	// pf(result(1234));
	

// $t=$start-time();
?>
