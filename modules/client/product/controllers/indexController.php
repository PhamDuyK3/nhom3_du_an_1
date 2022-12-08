<?php

function construct()
{
    load_model('index');
    load('helper', 'format');
}

function indexAction()
{
    $data['notifications'] = get_notification();
    if (isset($_GET['cate_id']) && $_GET['cate_id'] != '') {
        $cate_id = $_GET['cate_id'];
        $row = get_cate_id($cate_id);
        $total_records = $row['total'];
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 5;
        $total_page = ceil($total_records / $limit);
        if ($total_page == 0) {
            header('Location: ?mod=not_found');
        } elseif ($current_page > $total_page) {
            $current_page = $total_page;
        } elseif ($current_page < 1) {
            $current_page = 1;
        }
        $start = ($current_page - 1) * $limit;
        $data['result'] = get_limit_cate_id($start, $limit, $cate_id);
        $data['total_page'] = $total_page;
        $data['current_page'] = $current_page;
    } elseif (isset($_GET['brand_id']) && $_GET['brand_id'] != '') {
        $brand_id = $_GET['brand_id'];
        $row = get_brand_id($brand_id);
        $total_records = $row['total'];
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 5;
        $total_page = ceil($total_records / $limit);
        if ($total_page == 0) {
            header('Location: ?mod=not_found');
        } elseif ($current_page > $total_page) {
            $current_page = $total_page;
        } elseif ($current_page < 1) {
            $current_page = 1;
        }
        $start = ($current_page - 1) * $limit;
        $data['result'] = get_products_brand_id($start, $limit, $brand_id);
        $data['total_page'] = $total_page;
        $data['current_page'] = $current_page;
    } elseif (is_ss('search')) {
        $value = get_ss('search');
        $row = get_count_value($value);
        $total_records = $row['total'];
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 3;
        $total_page = ceil($total_records / $limit);
        if ($total_page == 0) {
            notification('pink', ['không tìm được']);
            header('Location: ?role=client&mod=not_found');
        } elseif ($current_page > $total_page) {
            $current_page = $total_page;
        } elseif ($current_page < 1) {
            $current_page = 1;
        }
        $start = ($current_page - 1) * $limit;
        $data['result'] = get_limit_products_value($start, $limit, $value);
        $data['total_page'] = $total_page;
        $data['current_page'] = $current_page;
    }
    load_view('index', $data);
}
function indexPostAction()
{
    $value = $_POST['search'];
    push_ss('search', $value);
    header('Location: ?role=client&mod=product');
}
