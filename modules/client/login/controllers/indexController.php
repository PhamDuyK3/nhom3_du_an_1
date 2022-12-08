<?php

function construct()
{
    load_model('index');
}

function indexAction()
{
    request_login(false);
    $notifications = get_notification();
    load_view('index', [
        "notifications" => $notifications
    ]);
}

function indexPostAction()
{
    request_login(false);
    // validation
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username) || empty($password)) {
        notification('blue', ['Vui lòng nhập thông tin đăng nhập']);
        header('Location: ?role=client&mod=login');
    }
    // xử lý đăng nhập
    $login = get_login_user($username, $password);
    if ($login) {
        push_login($login);
        header('Location: ?mod=home');
    } else {
        notification('pink', ['Tài khoản hoặc mật khẩu không chính xác']);
        header('Location: ?role=client&mod=login');
    }
}

function logoutAction()
{
    request_login();
    remove_login();
    header("Location: ?role=client&mod=login");
}
