<?php

function get_auth_user($username, $pass)
{
    $result = db_fetch_row("SELECT * FROM `users` WHERE `email` = '$username' AND `password` = '$pass' AND `role` = 1");
    return $result;
}
