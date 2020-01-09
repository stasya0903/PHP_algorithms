<?php
include("ExplorerController.php");


$path = ".";
if (!empty($_GET["path"])) {
    $path = $_GET["path"];
}

$explorer = new \App\ExplorerController($path);
echo $explorer->getDirectoryHtml();




