<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

if(isset($_POST['input_search_value'])) {
    getPro();
}
?>
