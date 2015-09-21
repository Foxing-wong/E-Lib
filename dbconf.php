<?php
    $link=mysqli_connect("localhost","root","password");
    mysqli_select_db($link,"phpdemolib");
    mysqli_query($link,"set names 'utf8'");
?>