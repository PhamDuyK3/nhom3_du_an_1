<?php
function select_products()
{
    $result = db_fetch_array("SELECT p.* ,c.name FROM products p JOIN categories c ON p.category_id = c.id");
    return $result;
}

function select_categories()
{
    $result = db_fetch_array("SELECT * from categories");
    return $result;
}



