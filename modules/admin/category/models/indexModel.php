<?php
function get_list_categories() {
    $result = db_fetch_array("SELECT * FROM `categories`");

    return $result;
}

function get_one_category($id) {

    $result = db_fetch_row("SELECT * FROM `categories` WHERE `id` = '$id'");

    return $result;
}

function create_category($name, $image ) {
    $user = get_auth();
    $id = db_insert('categories', [
        'name' => $name,
        'image' => $image
    ]);
    return $id;
}

function update_category($id, $name, $image) {
    db_update('categories', [
        'name' => $name,
        'image' => $image
    ], "id = $id");
    return true;
}

function delete_category($id) {
    db_delete('categories', "id = $id");
    return true;
}