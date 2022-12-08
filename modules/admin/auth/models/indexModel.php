<?php
function get_auth_user($username, $pass) {
    $result = db_fetch_row("SELECT * FROM `users` WHERE `email` = '$username' AND `matkhau` = '$pass' AND `role` = 2");
    return $result;
}