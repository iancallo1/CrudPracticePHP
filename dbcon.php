<?php

define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "basic_crud");

$connection = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);

    if (mysqli_connect_errno()) {
        printf("", mysqli_connect_error());
    }

   

?>