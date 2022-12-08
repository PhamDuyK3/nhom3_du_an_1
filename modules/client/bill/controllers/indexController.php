<?php

function construct()
{
    request_login();
    load('helper', 'format');
    load_model('index');
}
function indexAction()
{
    $user = get_login();
    $user_id = $user['id'];
    $data['bills'] = get_hoadon_id($user_id);
    load_view('index', $data);
}
function showAction()
{
        $bill_id = $_GET['bill_id'];
        $data['bills'] = get_hoadon($bill_id);
        load_view('show', $data);
}
