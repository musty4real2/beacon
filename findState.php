<?php 
require_once "config.php";
$country = intval($_GET['country']);


$query  = "SELECT id,statename FROM states WHERE country_id='$country'";
$result = mysqli_query($link, $query);
?>
<select name="state" class="select-css">
	<option>Select State</option>
	<?php while ($row = mysqli_fetch_array($result)) { ?>
	<option value=<?php echo $row['id']?>><?php echo $row['statename']?></option>
	<?php } ?>
</select>
