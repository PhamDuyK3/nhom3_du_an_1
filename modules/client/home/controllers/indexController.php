<?php

function construct()
{
    load_model('index');
    load('helper', 'format');
}

function indexAction()
{
    $data['notifications'] = get_notification();
    $data['products'] = select_products();
    $data['categories'] = select_categories();
    load_view('index', $data);
}
