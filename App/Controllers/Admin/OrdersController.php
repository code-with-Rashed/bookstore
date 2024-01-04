<?php

namespace App\Controllers\Admin;

use App\Middlewares\AdminAuthMiddleware;
use App\Models\OrdersModel;

class OrdersController
{
    public function __construct()
    {
        AdminAuthMiddleware::is_admin_login();
    }
    public function index()
    {
        $orders_model = new OrdersModel();
        $result = $orders_model->select();
        return view("admin/orders", $result);
    }
    public function order_details($orders_id, $books_id)
    {

        $orders_model = new OrdersModel();
        $result = $orders_model->order_details(orders_id: $orders_id, books_id: $books_id);
        $result = array_merge(...$result);

        $data = [];
        $data["book_name"] = $result[0]["name"];
        $data["book_price"] = $result[0]["price"];
        $data["book_image"] = $result[1]["image"];
        $data["order_details"] = $result[2];

        echo json_encode($data);
    }
    // Orders complite or un-complite status update
    public function status_update($id, $status)
    {
        $books_model = new OrdersModel();
        $books_model->status_update($id, $status);

        return redirect("/admin/orders");
        die;
    }
    // Delete orders information
    public function delete($id)
    {
        $message = new OrdersModel();
        $data = $message->delete($id);
        $result = [];
        if ($data) {
            $result["message"] = "message deleted successfully.";
        } else {
            $result["error"] = "message not deleted!!";
        }
        echo json_encode($result);
    }
}
