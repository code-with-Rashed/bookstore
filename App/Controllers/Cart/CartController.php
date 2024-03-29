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
    }

    // send add to cart data from session
    public function fetch_cart_data()
    {
        if (!Session::has("carts")) {
            echo json_encode(["is_carts_empty" => false]);
            return;
        }
        if (!empty(Session::get("carts"))) {
            $books_id = implode(',', array_keys(Session::get("carts")));
            $db = new DB();
            $db->select(table: "books", column: "books.id,books.name,books.price,books_image.image", join: "books_image ON books.id = books_image.books_id", where: "books.status = 1 AND books_image.thumbnail = 1 AND books.id in ($books_id)");
            $result = $db->get_result();
            echo json_encode(["is_carts_empty" => true, "carts_books" => $result[0]]);
        } else {
            echo json_encode(["is_carts_empty" => false, "carts_books" => []]);
        }
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
        $carts = Session::get("carts");
        $price = 0;
        $total_price = 0;
        $shipping_charge = 0;
        if (!empty($carts)) {
            foreach ($carts as $value) {
                $price += $value["price"] * $value["quantity"];
            }
            $shipping_charge = $this->shipping_charge();
            $total_price = $price + $shipping_charge;
        }
        echo json_encode(["price" => $price, "shipping" => $shipping_charge, "total_price" => $total_price]);
    }

    // Shipping charge
    public function shipping_charge()
    {
        $db = new DB();
        $db->select(table: "shipping_charge", where: "id=1");
        $result = $db->get_result();

        $this->delivery_option();
        $chosed_delivery_option = Session::get("delivery_option");
        if ($chosed_delivery_option["inside_dhaka"]) {
            return $result[0][0]["inside_dhaka"];
        } else if ($chosed_delivery_option["outside_dhaka"]) {
            return $result[0][0]["outside_dhaka"];
        }
    }

    // delete cart item
    public function delete_cart_item($id)
    {
        $carts = Session::get("carts");
        unset($carts[$id]);
        Session::set("carts", $carts);
    }

    // cart item count
    public function cart_count()
    {
        // return total cart count
        echo json_encode(["count" => count(Session::get("carts") ?? [])]);
    }

    // monitor selected delivery option
    public function delivery_option()
    {
        if (!Session::has("delivery_option")) {
            $delivery_option = [];
            $delivery_option["inside_dhaka"] = true;
            $delivery_option["outside_dhaka"] = false;
            Session::set("delivery_option", $delivery_option);
        }
    }
    public function inside_dhaka()
    {
        $this->delivery_option();
        $delivery_option = Session::get("delivery_option");
        $delivery_option["inside_dhaka"] = true;
        $delivery_option["outside_dhaka"] = false;
        Session::set("delivery_option", $delivery_option);
    }
    public function outside_dhaka()
    {
        $this->delivery_option();
        $delivery_option = Session::get("delivery_option");
        $delivery_option["inside_dhaka"] = false;
        $delivery_option["outside_dhaka"] = true;
        Session::set("delivery_option", $delivery_option);
    }
    // =========================
}
