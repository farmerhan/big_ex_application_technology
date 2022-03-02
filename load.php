<?php

session_start();

include "includes/db.php";

include "functions/functions.php";

if(isset($_POST['text_search'])) {
    getPro();
}
