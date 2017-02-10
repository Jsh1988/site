<?php defined("CATALOG") or die("Acces denied"); 
include "models/main_model.php";
include "models/{$view}_model.php";

out();

unset($_SESSION['auth']);
redirect();

?>