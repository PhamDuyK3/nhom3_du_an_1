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
    $user = get_login();
    $id_user = $user['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $price_total = $_POST['price_total'];
    $carts = get_ss('cart');

    if (empty($name) || empty($phone) || empty($address)) {
        notification('pink', ['Thiếu rồi']);
        header('Location: ?role=client&mod=pay');
        die;
    }
    $bill_id = create_bill($price_total, $name, $phone, $address, $id_user);

    foreach ($carts as $key => $cart) {
        $id_products = $cart[9];
        $id_bill = $bill_id;
        $quantity = $cart[2];
        $price_total = $cart[4];
        $price = $cart[3];
        create_bill_detail($id_products, $id_bill, $quantity, $price_total, $price);
    }
        notification('blue', ['Thanh toán thành công']);
    $_SESSION['cart'] = [];
    header('Location: ?role=client&mod=bill');
    die;
}
