<?php

namespace App\Models;

use Management\Database\DB;

class OrdersModel
{
    public function select()
    {
        $db = new DB();
        $db->select(table: "orders", column: "id,books_id,name,phone,datetime,status");
        $result = $db->get_result();
        return $result[0];
    }
    public function order_details(int $orders_id, int $books_id)
    {
        $db = new DB();
        $orders_id = $db->escapestring($orders_id);
        $books_id = $db->escapestring($books_id);
        $db->select(table: "books", column: "name,price", where: "id = $books_id");
        $db->select(table: "books_image", column: "image", where: "books_id = $books_id AND thumbnail = 1");
        $db->select(table: "orders", where: "id = $orders_id");
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
