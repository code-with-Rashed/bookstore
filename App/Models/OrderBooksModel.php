<?php

namespace App\Models;

use Management\Database\DB;

class OrderBooksModel
{
    // order insert
    public function insert(array $data)
    {
        $db = new DB();
        $db->insert(table: "orders", data: $data);
        $result = $db->get_result();
        return $result[0];
    }

    public function select_successful_order_details(int $order_id, int $books_id)
    {
        $db = new DB();
        $order_id = $db->escapestring($order_id);
        $books_id = $db->escapestring($books_id);
        $db->select(table: "books", column: "name,price", where: "id = $books_id");
        $db->select(table: "books_image", column: "image", where: "books_id = $books_id AND thumbnail = 1");
        $db->select(table: "orders", where: "id = $order_id");
        $result = $db->get_result();
        return $result;
    }
}
