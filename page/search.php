<h2 class="m-3">Search by school </h2>
<?php 

$s = get("select id, names from schools");

?>


<form action="" method="post" class='col-md-6'>
<div class="form-group">
<select name="school" class='form-control' id="">
    <option value="">Select School...</option>
    <?php foreach($s as $id=>$name) :?>
    <option value="<?=$name->id?>"><?=$name->names?></option>
    <?php endforeach?>
</select>
</div>
<div class="form-group">
<input placeholder="Type Adm/Reg No." type="text" name="adm" class="form-control">
</div>
<div class="form-group">
<button type="submit" class="btn btn-success btn-block">SEARCH</button>
</div>
</form>

<div class="" id="response">


</div>

<script>
    // $(document).ready(function(){
        $("form").submit(function(e){
            e.preventDefault();
            // data = $('form').serialize();
            adm = $(this.adm).val();
            sc = $(this.school).val();
            // console.log(data)
            $.get("http://localhost/meritus/api.php?adm="+adm+"&school="+sc, {}, (res)=>{
                $("#response").html(res);
            })

        });
    // })
    // })
</script>