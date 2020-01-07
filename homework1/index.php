<?php
include ("DirectoryController.php");
$path = $_GET["path"] ?: ".";
$explorer = new \App\DirectoryController($path, FilesystemIterator::FOLLOW_SYMLINKS);
echo $explorer->showDirectory();




