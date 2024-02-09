<?php

namespace App\Controllers\Cart;

use Management\Database\DB;
use Management\Classes\Session;

class CartController
{
    public function add_to_cart($id)
    {
        $db = new DB();
        $id = $db->escapestring($id);
        $db->select(table: "books", column: "id,price", where: "id=$id");
        $result = $db->get_result();
        // save cart in session
        $carts = [];
        if (isset($result[0][0])) {
            if (Session::has("carts")) {
                foreach (Session::get("carts") as $key => $value) {
                    $carts[$key] = $value;
                }
                $carts[$id] = $result[0][0];
                Session::remove("carts");
                Session::set("carts", $carts);
            } else {
                $carts[$id] = $result[0][0];
                Session::set("carts", $carts);
            }
        }
        // return total cart count
        echo json_encode(["count" => count(Session::get("carts") ?? [])]);
    }
}
