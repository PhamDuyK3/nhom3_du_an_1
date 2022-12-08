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
    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $re_pass = $_POST['re_pass'];
    $users = get_list_users();
    foreach ($users as $user) {
        if ($email == $user['email']) {
            notification('blue', ['Email đã tồn tại !!']);
            header('Location: ?mod=register');
            die();
        }
    }
    if ($re_pass != $pass) {
        notification('pink', ['Nhập lại mật khẩu sai !!']);
        header('Location: ?mod=register');
        die();
    }
    create_user($full_name, $phone, $email, $pass);
    notification('blue', ['Đăng ký thành công !!']);
    header('Location: ?mod=login');
}
