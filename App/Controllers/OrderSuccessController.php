<?php

namespace App\Controllers;

use App\Models\OrderBooksModel;
use Management\Classes\Session;

class OrderSuccessController
{
    public function success($order_id, $books_id)
    {
        $show_order_details_for_valid_user = (Session::get("show_order_details_for_valid_user")["valid"] == $order_id . $books_id) ? true : false;
        if (!filter_var($order_id, FILTER_VALIDATE_INT) || !filter_var($books_id, FILTER_VALIDATE_INT) || !$show_order_details_for_valid_user) {
            return redirect("/");
        }
        $order_books_model = new OrderBooksModel();
        $result = $order_books_model->select_successful_order_details(order_id: $order_id, books_id: $books_id);
        $result = array_merge(...$result);
        if (count($result) < 3) {
            return redirect("/");
        }
        $data = [];
        $data["book_name"] = $result[0]["name"];
        $data["book_price"] = $result[0]["price"];
        $data["book_image"] = $result[1]["image"];
        $data["order_details"] = $result[2];
        return view("frontend/success", $data);
    }
}
