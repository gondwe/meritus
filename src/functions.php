
<?php


function db(){	$db = new mysqli(host,usr,pwd,database);if($db->connect_errno > 0){die(spill($db->connect_error));}else{return $db;}}
function clean($i){ return mysqli_real_escape_string(db(), $i);}
function spill($i){echo "<pre>";print_r($i);echo "</pre>";}
function run($a){return process($a);}
function process($sql){ $db = db(); $_SESSION["erc"] = $j = ($db->query($sql))? TRUE :FALSE; if(!$j) spill($db->error); return $j; }  
function process2($sql){$db = db();if($d = $db->query($sql)){$j = TRUE; }else{ spill($db->error);$j = FALSE;}$_SESSION["erc"] = $j;return $d;}
function get($i=""){if($i !== ""){$l = []; $j = process2($i); while($k = $j->fetch_object()){ $l[] = $k; } return $l; } } 
function getlist($i){$raw = get($i);if(empty($raw)){ return []; }else{ if(count((array)$raw[0])==2){ foreach($raw as $j=>$k){$l[current($k)] = end($k);}} else{ if(count((array)$raw[0])>2){ foreach($raw as $j=>$k) { $l[$j] = $k; }}else{ foreach($raw as $j=>$k) { foreach($k as $m=>$n): $l[] = $n; endforeach;} } }} if(count((array)$l) == 1){ $l = current($l); } return $l; }
function fetch($i){$a = get($i);$b = isset($a[0])?$a[0] : [];$c = current($b);return $c;}


function pf($arg){ spill($arg); }
function ls($i){ return getlist($i); }
$page = ( isset($_GET["pg"])? $_GET["pg"] : "home" ) . ".php";
$pagefile =  ( file_exists("./page/".$page) ? $page : "home.php" );

$scode = "1";



function upload($fldname, $trailer = ""){
	global $scode; ; 
	$name =$_FILES[$fldname]['name'];
	if($_FILES[$fldname]['size'] > 2000 ) {  alert("File Too Large !"); return ""; }
	$esx = explode(".",$name);
	$extension = strtolower(end($esx));
	if($extension == 'csv'){	
	if(move_uploaded_file($_FILES[$fldname]['tmp_name'],merit_uploads.$name)){
		$trailer = (microtime(1)*10000)."_".$scode.".".$extension; rename(merit_uploads.$name, merit_uploads.$trailer);	
	}
	else{alert("uploading to ".merit_uploads.$name." failed. try again",2);
	}}else{alert("not a valid csv file",2); }
	return $trailer;
}


function alert($i,$j=null){ echo("<h6 class='alert alert-".($j? 'danger':'success')."'>$i</h6>"); }

?>
