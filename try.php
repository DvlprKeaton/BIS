<?php
$hash_pword=password_hash('Michael123456', PASSWORD_DEFAULT);

echo $hash_pword;
$converted_pword = password_verify('Michael123456', $hash_pword);

echo " ".  $converted_pword;
?>