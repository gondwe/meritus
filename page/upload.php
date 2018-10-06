<?php 
  if(isset($_FILES["merit"])){
    
    $file = upload("merit");
    if($file !== ""){
      $current = fetch("select id from uploads where date(date) = date(current_timestamp)");
      if(empty($current)){
        $sql = "insert into uploads (scode, file) values('$scode', '$file')";
        if(process($sql)) alert("Upload Successful");
      }else{
        $records = @array_pop(get("select id, file from uploads where date(date) = date(current_timestamp)"));
        @unlink(merit_uploads.end($records));
        $sql = "update uploads set file = '$file' where id = '".$records->id."'";
        if(process($sql)) alert("Upload Successful");
      }
    }
    
  }
?>

<form action="" method="post" enctype="multipart/form-data" class=''>
  
  <input required type="file" name="merit" id="" class="col-md-6 col-lg-3 col-sm-12 col-xs-12 ">
  <button type="submit" class='btn mt-3 mb-3  btn-success col-md-6 col-lg-3 col-sm-12 col-xs-12'>UPLOAD</button>
</form> 