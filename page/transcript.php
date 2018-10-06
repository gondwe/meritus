<div class="mt-5">
<?php


?>
<div id="response"></div>


<script>
    $(document).ready(function(){
            sc ="<?=$scode?>";
            $.get("http://localhost/meritus/api.php?school="+sc, {}, (res)=>{
                $("#response").html(res);
            })
    });
    // })
</script>
