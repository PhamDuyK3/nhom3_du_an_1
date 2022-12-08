<?php
function construct()
{
    load_model('index');
    load('helper', 'format');
}
function indexAction()
{
    // if (!$_GET['id']) {
    // }
    // $id = $_GET['id'];
    // $data['product'] = get_product($id);
    // $data['types'] = get_type_pro($id);
    // $data['comments'] = get_commen_pro_id($id);
    // $data['same_product'] = get_pro_category($data['product']['category_id']);
    // if (is_login()) {
    //     $data['user'] = get_login();
    // }
    // $data['notifications'] = get_notification();
    load_view('index');
}
function indexPostAction()
{
    request_login(is_login());
    $id_product = $_GET['id'];
    if(isset($_POST['update_coment'])){
        $description = $_POST['descripition'];
        if (is_login()) {
            $user = get_login();
        }
        if (empty($description)) {
            notification('pink', ['Vui Lòng Nhập Bình Luận']);
            header('Location: ?mod=detail&id=' . $id_product);
            die();
        }
        create_comment($description, $user['id'], $id_product);
        notification('blue', ['Bình Luận Thành Công']);
        header('Location: ?mod=detail&id=' . $id_product);
        die;
    }
    if (isset($_POST['cart'])) {
        $images = $_POST['image'];
        $title = $_POST['title'];
        $brand = $_POST['brand'];
        $brand_ar = explode("|", $brand);
        $brand_id = $brand_ar[0];
        $brand_name = $brand_ar[1];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        if (!$_POST['type']) {
            notification('pink', ['Hãy chọn loại dây']);
            header("Location: ?mod=detail&id=$id_product");
            die;
        }
        $type = $_POST['type'];
        $type_ar = explode("|", $type);
        $type_id = $type_ar[0];
        $type_name = $type_ar[1];
        $total_price = $price * $quantity;
        if (!is_ss('cart')) {
            push_ss('cart', []);
        }
        array_push($_SESSION['cart'], [$images, $title, $quantity, $price, $total_price, $brand_id, $brand_name, $type_id, $type_name, $id_product]);
        notification('blue', ['Thêm thành công']);
        header("Location: ?mod=detail&id=$id_product");
        die;
    }
}
