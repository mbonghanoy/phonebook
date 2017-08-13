<?php
require_once('../vendor/autoload.php');

$connection = new Vivid('localhost', 'root', 'password', 'phonebook');

$id = $_GET['id'];

$user = $connection->table('user')
    ->deleteRecord($id);

header('Location: index.php');