<?php

require 'db.php';
$id = $_GET['id'];
$db = new db('localhost', 'root', '', 'test');
$db->delete('users', 'id = '.$id);
header('Location: view_teacherList.php');