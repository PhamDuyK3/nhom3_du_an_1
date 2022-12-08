<?php
function get_product($id)
{
  $result = db_fetch_row("SELECT p.* ,c.name,b.name as b_name FROM products p JOIN categories c ON p.category_id = c.id join brands b on b.id = p.brand_id where p.id = $id");
  return $result;
}
function get_type_pro($id)
{
  $result = db_fetch_array("SELECT ts.*,types.name FROM type_products ts join types on types.id = id_type where id_products = $id");
  return $result;
}
function get_commen_pro_id($product_id)
{
  return db_fetch_array("SELECT u.full_name,u.image,cmt.description,cmt.created_at FROM comments cmt JOIN users u ON cmt.id_user = u.id WHERE id_pro = $product_id");
}
function get_pro_category($category_id)
{
  return db_fetch_array("SELECT * FROM products p WHERE p.category_id = $category_id");
}
function create_comment($description, $user_id, $pro_id)
{
  $id = db_insert('comments', [
    'description' => $description,
    'id_user' => $user_id,
    'id_pro' => $pro_id,
  ]);
  return $id;
}
