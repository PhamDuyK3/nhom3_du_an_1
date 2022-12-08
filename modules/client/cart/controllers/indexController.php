<?php

function construct()
{
    load_model('index');
    load('helper', 'format');
}

function indexAction()
{
    request_login(true);
    if (!is_ss('cart')) {
        push_ss('cart', []);
    }
    $data['notifications'] = get_notification();
    $data['products'] = get_ss('cart');
    load_view('index', $data);
}
function indexPostAction()
{
    $qty = $_POST['quantity'];
    update_cart($qty);
    notification('blue', ['Sửa thành công']);
    header("Location: ?mod=cart");
    die;
}
function deleteAction()
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        array_splice($_SESSION['cart'], $id, 1);
    } else {
        $_SESSION['cart'] = array();
    }
    notification('blue', ['Xoá thành công']);
    header("Location: ?mod=cart");
    die;
}
