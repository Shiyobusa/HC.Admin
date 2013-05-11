<?php
require('libs/jsonapi.php');
require('smarty.php');

$JSONAPI['host'] = "localhost";
$JSONAPI['port'] = 20059;
$JSONAPI['username'] = "";
$JSONAPI['password'] = "";
$JSONAPI['salt'] = "";

$usernames['0'] = "";
$usernames['1'] = "User1";
$usernames['2'] = "User2";
$usernames['3'] = "User3";
$usernames['4'] = "User4";

# USE HASH SHA256 #
$password['0'] = "";
$password['1'] = "19513fdc9da4fb72a4a05eb66917548d3c90ff94d5419e1f2363eea89dfee1dd"; // Password1
$password['2'] = "1be0222750aaf3889ab95b5d593ba12e4ff1046474702d6b4779f4b527305b23"; // Password2
$password['3'] = "2538f153f36161c45c3c90afaa3f9ccc5b0fa5554c7c582efe67193abb2d5202"; // Password3
$password['4'] = "db514f5b3285acaa1ad28290f5fefc38f2761a1f297b1d24f8129dd64638825d"; // Password4

# YOU CAN CREATE MORE.

?>