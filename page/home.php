<p>INSTRUCTIONS</p>
<ol>
  <li><code>Download the csv template.</li></code>
  <li><code>Edit & Save.</li></code>
  <li><code>Upload the save file back to prepeare report data.</li></code>
</ol>
<hr>

<?php 
  if(isset($_FILES["merit"])){

    $file = upload("merit");
    $current = fetch("select id from uploads where date(date) = date(current_timestamp)");
    
    if(empty($current)){
      $sql = "insert into uploads (scode, file) values('$scode', '$file')";
    }else{
      $records = @array_pop(get("select id, file from uploads where date(date) = date(current_timestamp)"));
      unlink(merit_uploads.end($records));
      $sql = "update uploads set file = '$file' where id = '".$records->id."'";
    }
    if(process($sql)) alert("Upload Successful");
  }
?>

<form action="" method="post" enctype="multipart/form-data" class=''>
  <a class="btn btn-info mt-3 mb-3 col-md-6 col-lg-3 col-sm-12 col-xs-12" href="index.php?pg=template" >Download CSV Template</a>
  <input required type="file" name="merit" id="" class="col-md-6 col-lg-3 col-sm-12 col-xs-12 ">
  <button type="submit" class='btn mt-3 mb-3  btn-success col-md-6 col-lg-3 col-sm-12 col-xs-12'>UPLOAD</button>
</form>    	
<hr>
<a class="btn btn-info mb-3 col-md-6 col-lg-3 col-sm-12 col-xs-12" href="index.php?pg=transcript" >View Transcript</a>


