<?php

namespace App\Controllers\Admin;

use App\Middlewares\AdminAuthMiddleware;
use App\Models\ContactModel;

class MessageController
{
    public function __construct()
    {
        AdminAuthMiddleware::is_admin_login();
    }
    public function index()
    {
        $messages = new ContactModel();
        $data = $messages->select();
        return view("admin/messages", compact("data"));
    }
    public function message_details(int $id)
    {
        $messages = new ContactModel();
        $data = $messages->single_message($id);
        echo json_encode($data[0]);
    }
    public function delete(int $id)
    {
        $message = new ContactModel();
        $data = $message->delete($id);
        $result = [];
        if ($data) {
            $result["message"] = "message deleted successfully.";
        } else {
            $result["error"] = "message not deleted!!";
        }
        echo json_encode($result);
    }
    // read or un-read message status update
    public function status_update($id, $status)
    {
        $message_model = new ContactModel();
        $message_model->status_update($id, $status);

        return redirect("/admin/messages");
        die;
    }
}
