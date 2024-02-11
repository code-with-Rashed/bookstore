<?php

namespace App\Controllers;

use App\Models\HomeBooksModel;

class BookDetailsController
{
    public function details($id)
    {
        if (!filter_var($id, FILTER_VALIDATE_INT)) {
            return redirect("/");
        }
        $order_books_model = new HomeBooksModel();
        $result = $order_books_model->select_books_details($id);
        if (empty(array_merge(...$result))) {
            return redirect("/");
        }
        $data = [];
        $data["books_details"] = $result[0][0];
        $data["books_images"] = $result[1];
        return view("frontend/details", $data);
    }
}
