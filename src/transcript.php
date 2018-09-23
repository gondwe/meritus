
<?php
include_once"functions.php";
//$handle=fopen('school_merits/f2.csv','r');
$path='school_merits/f2.csv';
$start=time();

function merit($path){
	$merit = array_map('str_getcsv', file($path));
	// while($row=fgetcsv($handle)){
		// $merit[]=$row;
	// }
	$header=array_shift($merit);
	$f=array();
	foreach($merit as $k=>$v){
		$f=array_combine($header,$v);
		$id=array_shift($f);
		$broad[$id]=$f;
	}
	return $broad;
	
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
			$html .=('That Admission Number was Not Found!');
		
		}
		return $html;
	}
	pf(result('sdd'));
	

$t=$start-time();
?>
