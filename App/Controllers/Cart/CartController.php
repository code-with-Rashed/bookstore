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

    // send add to cart data from session
    public function fetch_cart_data()
    {
        if (!Session::has("carts")) {
            echo json_encode(["is_carts_empty" => false]);
            return;
        }

        $books_id = implode(',', array_keys(Session::get("carts")));
        $db = new DB();
        $db->select(table: "books", column: "books.id,books.name,books.price,books_image.image", join: "books_image ON books.id = books_image.books_id", where: "books.status = 1 AND books_image.thumbnail = 1 AND books.id in ($books_id)");
        $result = $db->get_result();
        echo json_encode(["is_carts_empty" => true,"carts_books"=>$result[0]]);
    }
}
