<?php

namespace App\Controllers;

use Management\Classes\Csrf;
use Management\Classes\Session;
use Management\Classes\Validation;
use Management\Classes\Filtration;
use App\Models\OrderBooksModel;

class OrderController
{
    // Order submit
    function order_now()
    {
        // validation proccess start
        $requirment = [
            "csrf_token" => ["required"],
            "id" => ["required", "integer"],
            "name" => ["required", "max:40"],
            "phone" => ["required", "max:11"],
            "email" => ["max:50"],
            "whatsapp_imo" => ["max:11"],
            "address" => ["required", "max:250"],
        ];
        $validation = new Validation();
        $validation->validate($_POST, $requirment);
        $validation_result = $validation->errors();
        if (!empty($validation_result) || !Csrf::match($_POST["csrf_token"])) {
            return redirect("/order/" . $_POST["id"]);
            die;
        }
        // validation proccess end

        // Order data Filtration proccess start
        $order = Filtration::filter([
            "books_id" => Session::get("order_books")["id"],
            "name" => $_POST["name"],
            "phone" => $_POST["phone"],
            "email" => $_POST["email"],
            "whatsapp_imo" => $_POST["whatsapp_imo"],
            "address" => $_POST["address"]
        ]);
        date_default_timezone_set(DEFAULT_TIMEZONE);
        $order["datetime"] = date("d/m/Y - h-i-s A");
        // Order data Filtration proccess end
        $order_books_model = new OrderBooksModel();
        $order_id = $order_books_model->insert(data: $order);
        if ($order_id) {
            Session::remove("order_books");
            Session::set("show_order_details_for_valid_user", ["valid" => $order_id . $order["books_id"]]);
            return redirect("/success/" . $order_id . "/" . $order["books_id"]);
            die;
        }
        // return redirect("/");
        die;
    }
}
