<?php

function construct()
{
    request_auth();
    load_model('index');
}

function indexAction()
{
    $data['bills'] = get_list_bills();
    load_view('index', $data);
}

function showAction()
{
    $bill_id = $_GET['id_bill'];
    $data['details'] = get_list_bills_detail($bill_id);
    load_view('show', $data);
}
function indexPostAction()
{
    $status = $_POST['status'];
    $bill_id = $_GET['id'];
    if ($status == 3) {
        $list = get_list_bills_detail($bill_id);
        foreach ($list as $row) {
            $product = get_one_quantity_product($row['id_products']);
            $product['quantity'] -= $row['quantity'];
            update_quantity_pro($row['id_products'], $product['quantity']);
        }
    }
    update_status($bill_id, $status);
    notification('success', ['trạng thái đã thay đổi']);
    header('Location: ?role=admin&mod=bill');
    die;
}
