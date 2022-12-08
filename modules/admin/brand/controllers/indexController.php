<?php

function construct()
{
    request_auth();
    load_model('index');
}

function indexAction()
{
    $data['brands'] = get_list_brands();
    load_view('index', $data);
}

function createAction()
{
    load_view('create');
}

function createPostAction()
{
    $name = $_POST['name'];
    $thumb = $_FILES['thumb'];
    $thumb_name = $_FILES['thumb']['name'];
    if (empty($name)) {
        notification('pink', ['Vui lòng nhập vào tên danh mục']);
        header('Location: ?role=admin&mod=brand&action=create');
        die();
    }
    $t = time() . $thumb_name;
    create_brands($name, $t);
    move_uploaded_file($thumb['tmp_name'], 'public/images/' . $t);
    notification('blue', ['Tạo mới danh mục sản phẩm thành công']);
    header('Location: ?role=admin&mod=brand');
    die;
}

function deleteAction()
{
    $id = $_GET['id_brand'];
    delete_brands($id);
    notification('blue', ['Xoá danh mục sản phẩm thành công']);
    header('Location: ?role=admin&mod=brand');
    die;
}

function updateAction()
{
    $id = $_GET['id_brand'];
    $band = get_one_brands($id);
    $data['brand'] = $band;
    if ($band) {
        load_view('update', $data);
    } else {
        header('Location: ?role=admin&mod=brand');
        die;
    }
}

function updatePostAction()
{
    $id = $_GET['id_brand'];
    $band = get_one_brands($id);
    if (!$band) {
        header('Location: ?role=admin&mod=brand');
        die;
    }
    $name = $_POST['name'];
    $thumb = $_FILES['thumb'];
    $thumb_name = $_FILES['thumb']['name'];
    $previmg = $_POST['previmg'];
    if ($thumb_name == "") {
        $thumb_name = $previmg;
    }
    if (empty($name)) {
    notification('pink', ['name' => 'Vui lòng nhập vào tên danh mục'
        ]);
        header('Location: ?role=admin&mod=brand&action=update&id_band=' . $id);
        die;
    }
    $t = time() . $thumb_name;
    update_brands($id, $name, $t);
    move_uploaded_file($thumb['tmp_name'], 'public/images/' . $t);
    notification('success', ['Chỉnh sửa danh mục sản phẩm thành công']);
    header('Location: ?role=admin&mod=brand');
    die;
}
