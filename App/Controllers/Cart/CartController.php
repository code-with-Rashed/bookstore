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
                $carts[$id]["quantity"] = 1;
                Session::remove("carts");
                Session::set("carts", $carts);
            } else {
                $carts[$id] = $result[0][0];
                $carts[$id]["quantity"] = 1;
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
        echo json_encode(["is_carts_empty" => true, "carts_books" => $result[0]]);
    }

    // up cart item quantity
    public function up_quantity($id)
    {
        $carts = Session::get("carts");
        $carts[$id]["quantity"] = $carts[$id]["quantity"] + 1;
        Session::set("carts", $carts);
    }

    // down cart item quantity
    public function down_quantity($id)
    {
        $carts = Session::get("carts");
        $carts[$id]["quantity"] = $carts[$id]["quantity"] > 1 ? $carts[$id]["quantity"] - 1 : $carts[$id]["quantity"];
        Session::set("carts", $carts);
    }

    // response cart item wise quantity
    public function item_quantity()
    {
        $carts = Session::get("carts");
        $item_quantity = [];
        foreach ($carts as $key => $value) {
            $item_quantity[$key] = $value["quantity"];
        }
        echo json_encode($item_quantity);
    }

    // cart item cost calculation then response total price
    public function price()
    {
        $carts = $carts = Session::get("carts");
        $price = 0;
        foreach ($carts as $value) {
            $price += $value["price"] * $value["quantity"];
        }
        $shipping_charge = $this->shipping_charge();
        $total_price = $price + $shipping_charge;
        echo json_encode(["price" => $price, "shipping" => $shipping_charge, "total_price" => $total_price]);
    }

    // Shipping charge
    public function shipping_charge()
    {
        $db = new DB();
        $db->select(table: "shipping_charge", column: "charge", where: "id=1");
        $result = $db->get_result();
        return $result[0][0]["charge"];
    }
}
