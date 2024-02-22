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
    // order item insert
    public function order_item_insert(array $data)
    {
        $db = new DB();
        $db->insert(table: "order_item", data: $data);
    }

    // get ordered data
    public function select_successful_order_details(int $order_id)
    {
        $db = new DB();
        $order_id = $db->escapestring($order_id);
        $db->sql("SELECT * FROM orders WHERE id = $order_id");
        $db->sql("SELECT * FROM shipping_charge WHERE id = 1");
        $db->sql("SELECT books.name,books.price,order_item.quantity FROM books JOIN order_item ON books.id = order_item.book_id WHERE order_item.order_id = $order_id");
        $result = $db->get_result();
        return $result;
    }
}
