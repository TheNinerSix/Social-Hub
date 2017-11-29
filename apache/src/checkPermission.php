<?php
/**
 * Created by PhpStorm.
 * User: ChunHei
 * Date: 10/25/2017
 * Time: 3:22 AM
 */

include("config.php");
if(!isset($_SESSION)) {
    header('Loaction:index.php');
    exit();
}
?>