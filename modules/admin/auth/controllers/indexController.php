<?php

function construct() {
    load_model('index');
}

function indexAction() {
    request_auth(false);
    $notifications = get_notification();
    load_view('index', [
        "notifications" => $notifications
    ]);
}

function indexPostAction() {
    request_auth(false);
    // validation
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username) || empty($password)) {
        notification('pink', ['Vui lòng nhập đầy đủ thông tin tài khoản và mật khẩu']);
        header('Location: ?role=admin&mod=auth');
    }
    // xử lý đăng nhập
    $auth = get_auth_user($username, $password);
    if ($auth) {
        push_auth($auth);
        header('Location: ?role=admin');
    } else {
        notification('pink', ['Tài khoản hoặc mật khẩu không chính xác']);
        header('Location: ?role=admin&mod=auth');
    }
}

function logoutAction() {
    request_auth();
    remove_auth();
    header("Location: ?role=admin&mod=auth");
}