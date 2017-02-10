<?php
defined("CATALOG") or die("Acces denied");
include "models/main_model.php";
include "models/{$view}_model.php";

if(isset($_POST['auth_sub'])){
	authorization();
	redirect();
}else{
	header("Location: " . PATH);
}

?>