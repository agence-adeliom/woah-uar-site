<?php
if (!defined('ENABLED_HTTP_LOGIN') || (defined('ENABLED_HTTP_LOGIN') && !ENABLED_HTTP_LOGIN)) {
    return;
}

if (php_sapi_name() === "cli") {
    return;
}

if (strpos($_SERVER["REQUEST_URI"], "wc-api") !== false || strpos($_SERVER["REQUEST_URI"], "wp-cron") !== false) {
    return;
}

$realm = 'Website';

$realm = apply_filters("http_login_realm", $realm);

$user = 'adeliom';
$passwd = password_hash(sprintf('@deliom%s!', date('Y')), PASSWORD_DEFAULT);

$valid_passwords = [$user => $passwd];
$valid_passwords = apply_filters("http_login_accounts", $valid_passwords);
$valid_users = array_keys($valid_passwords);

$user = $_SERVER['PHP_AUTH_USER'] ?? null;
$pass = $_SERVER['PHP_AUTH_PW'] ?? null;

$validated = (in_array($user, $valid_users)) && (password_verify($pass, $valid_passwords[$user]));

if (!$validated) {
    header(sprintf('WWW-Authenticate: Basic realm="%s"', $realm));
    header('HTTP/1.0 401 Unauthorized');
    die("Not authorized");
}
