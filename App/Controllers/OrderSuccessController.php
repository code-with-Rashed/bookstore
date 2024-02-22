<?php

namespace App\Controllers;

use App\Models\OrderBooksModel;
use Management\Classes\Session;

class OrderSuccessController
{
    public function success($order_id)
    {
        if (Session::has("order_id")) {
            $show_order_details_for_valid_user = (Session::get("order_id") == $order_id) ? true : false;
        }
        if (!filter_var($order_id, FILTER_VALIDATE_INT) || !$show_order_details_for_valid_user) {
            return redirect("/");
        }
        $order_books_model = new OrderBooksModel();
        $result = $order_books_model->select_successful_order_details($order_id);
        $data = [];
        $data["delivery_details"] = $result[0][0];
        $data["delivery_option"] = $result[1][0];
        $data["order_books"] = $result[2];
        if (count($result) < 3) {
            return redirect("/");
        }
        return view("frontend/success", $data);
    }
}
