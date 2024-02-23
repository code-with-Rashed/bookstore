<?php

namespace App\Models;

use Management\Database\DB;

class OrdersModel
{
    public function select()
    {
        $db = new DB();
        $db->select(table: "orders", column: "id,name,phone,datetime,status");
        $result = $db->get_result();
        return $result[0];
    }
    public function order_details(int $order_id)
    {
        $db = new DB();
        $order_id = $db->escapestring($order_id);
        $db->sql("SELECT * FROM orders WHERE id = $order_id");
        $db->sql("SELECT * FROM shipping_charge WHERE id = 1");
        $db->sql("SELECT books.name,books.price,order_item.quantity FROM books JOIN order_item ON books.id = order_item.book_id WHERE order_item.order_id = $order_id");
        $result = $db->get_result();
        return $result;
    }
    // Orders complite or un-complite status update
    public function status_update($id, $status)
    {
        $db = new DB();
        $id = $db->escapestring($id);
        $status = $db->escapestring($status);
        $data = [];
        $data["status"] = $status ? 0 : 1;
        return $db->update(table: "orders", updated_data: $data, where: "id=$id");
    }
    // Delete orders information
    public function delete(int $id)
    {
        $db = new DB();
        $id = $db->escapestring($id);
        $db->delete(table: "orders", where: "id=$id");
        $result = $db->get_result();
        return $result[0];
    }
}
