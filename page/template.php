<h3 class='mt-3 text-primary'>Template</h3>
<h5>Select Your Subjects</h5><hr>

<?php 

if(!empty($_POST)){
    $p = $_POST["subs"];
    // pf($p);
    $ss = implode(",",array_keys($p));
    // pf($ss);
    $current = fetch("select id from selections where month(date) = month(current_timestamp)");
    $sql = ($current) ? "update selections set subjectlist = '$ss' where id = '$current'" : "insert into selections (scode, subjectlist) values($scode,'$ss')";
    // pf($sql);
    process($sql);
    $data = urlencode(implode(",",$p));
    // pf($data);
    header("location:./src/csvgen.php?data=$data");
}

?>


<form action="" method="post">
<?php 

$s = ls("select * from subjects");
$ls = array_flip(explode(",",ls("select subjectlist from selections where scode = $scode order by date desc limit 1")));
// pf($ls);
array_map(function($sub){
    global $ls;
    $checked = isset($ls[$sub->subj_code*1])? "checked":null;
    $stylechecked =  ($checked)? " btn-secondary ":"btn-sm btn-primary";
    echo '<label id="'.$sub->subj_code.'" class="btn '.$stylechecked.' "><input '.$checked.' onChange="brighten(event)" type="checkbox" name="subs['.$sub->subj_code.']" value="'.$sub->short_name.'">'.$sub->subj_code." ".$sub->long_name."</input></label>";
},$s);





?>
<hr>
<button type="submit" class="btn btn-success btn-lg ">Download </button>
</form>



<style>
    label {margin:5px}
	input {display:contents}
</style>

<script>
    function brighten(v){
        ["btn-primary","btn-secondary","btn-sm"].map(function(i){
            document.getElementById(v.target.parentNode.id).classList.toggle(i)
        });
    }
</script>