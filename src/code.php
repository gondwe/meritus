
<div class="container">

<fieldset>
<legend>Uploading Merit Lists</legend>
<a class="btn btn-info  m-5" href="uploads/merit.csv" >Download CSV Template</a>
<!-- <a class="btn btn-info btn-lg m-5" href="uploads/merit.csv" >Download CSV Template</a> -->

</fieldset>


<form action="src/upload.php" method="post" enctype="multipart/form-data">
  <fieldset border="2px">
    <legend>Upload Merit List:</legend>
   <input type="file" name="merit" id="" class="form-control">
   <input type="submit" value="Submit csv File" name="submit">
  </fieldset>
</form>    	

<fieldset>
<legend>Get Transcript</legend>
<a class="btn btn-info  m-5" href="src/transcript.php" >Get Transcript</a>
<!-- <a class="btn btn-info btn-lg m-5" href="uploads/merit.csv" >Download CSV Template</a> -->

</fieldset>		

</div>

