<!-- Starting code -->
<form method="get">
 <input name="q" placeholder="Enter Text">
 <br/>


 <input type="submit" value="Go">
</form>

<!-- Changed code -->
<?php echo htmlentities($_GET['q'], ENT_QUOTES, 'UTF-8'); ?>
