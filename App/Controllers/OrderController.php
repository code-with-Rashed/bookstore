<?php

namespace App\Controllers;

use Management\Classes\Session;
use Management\Classes\Validation;
use Management\Classes\Filtration;
use App\Models\OrderBooksModel;

class OrderController
{
    public function __construct()
    {
        if (!Session::has("carts")) {
            return redirect("/");
        }
    }
    // Order submit
    function order_now()
    {
        // validation proccess start
        $requirment = [
            "name" => ["required", "max:40"],
            "phone" => ["required", "max:11"],
            "email" => ["max:50"],
            "whatsapp_imo" => ["max:11"],
            "address" => ["required", "max:250"],
        ];
        $validation = new Validation();
        $validation->validate($_POST, $requirment);
        $validation_result = $validation->errors();
        if (!empty($validation_result)) {
            return redirect("/");
        }
        // validation proccess end

        // Order data Filtration proccess start
        $order = Filtration::filter([
            "name" => $_POST["name"],
            "phone" => $_POST["phone"],
            "email" => $_POST["email"],
            "whatsapp_imo" => $_POST["whatsapp_imo"],
            "address" => $_POST["address"]
        ]);
        $chosed_delivery_option = Session::get("delivery_option");
        if ($chosed_delivery_option["inside_dhaka"]) {
            $order["delivery_option"] = "inside_dhaka";
        } else if ($chosed_delivery_option["outside_dhaka"]) {
            $order["delivery_option"] = "outside_dhaka";
        }
        date_default_timezone_set(DEFAULT_TIMEZONE);
        $order["datetime"] = date("d/m/Y - h-i-s A");
        // Order data Filtration proccess end
        $order_books_model = new OrderBooksModel();
        $order_id = $order_books_model->insert(data: $order);
        if ($order_id) {
            // insert order item
            $carts = Session::get("carts");
            foreach ($carts as $key => $value) {
                $order_books_model->order_item_insert(data: ["order_id" => $order_id, "book_id" => $key, "quantity" => $value["quantity"]]);
            }
            Session::set("order_id", $order_id);
            Session::remove("carts");
            Session::remove("delivery_option");
            return redirect("/success/$order_id");
        }
    }
}
