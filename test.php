<?php
function redirectuser(){
  echo "hello";
}
?>
<div> <? echo $msg; ?> </div>
<form>
    <button type="submit" onclick="phpfunc()">submit</button>
</form>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>

<script>

document.write(' <?php redirectuser(); ?> ');
</script>
