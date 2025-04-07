<?php
session_set_cookie_params(["SameSite" => "Strict"]); //none, lax, strict
session_set_cookie_params(["Secure" => "true"]); //false, true
session_set_cookie_params(["HttpOnly" => "true"]); //false, true
session_start();
$_SESSION['imagestate'] = $_POST['imagestate'];
echo 'True';
exit();
