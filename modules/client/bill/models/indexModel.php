<?php
function get_hoadon_id($user_id)
{
  $result = db_fetch_array("SELECT * FROM bills WHERE id_user = $user_id");
  return $result;
}
function get_hoadon($bill_id)
{
  $result = db_fetch_array("SELECT p.images,p.title,c.name,bt.quantity,bt.price,bt.price_total,b.name as b_name FROM bill_detail bt JOIN products p ON p.id = bt.id_products JOIN categories c ON p.category_id = c.id JOIN brands b ON b.id = p.brand_i WHERE id_bill = $bill_id");
  return $result;
}
