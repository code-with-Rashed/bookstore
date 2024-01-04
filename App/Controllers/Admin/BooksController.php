<?php

namespace App\Controllers\Admin;

use Management\Classes\Csrf;
use Management\Classes\Validation;
use Management\Classes\Filtration;
use App\Middlewares\AdminAuthMiddleware;
use App\Models\BooksModel;

class BooksController
{
    public function __construct()
    {
        AdminAuthMiddleware::is_admin_login();
    }
    public function index()
    {
        $books_model = new BooksModel();
        $books = $books_model->select();
        $csrf = Csrf::create();
        return view("admin/books", compact("csrf", "books"));
    }

    public function select($id)
    {
        $books_model = new BooksModel();
        $books = $books_model->select($id);
        echo json_encode($books[0]);
    }

    // insert books details
    function insert()
    {
        // validation proccess start
        $requirment = [
            "csrf_token" => ["required"],
            "name" => ["required", "max:150"],
            "price" => ["required", "max:5", "integer"],
            "description" => ["required"],
        ];
        $validation = new Validation();
        $validation->validate($_POST, $requirment);
        $validation_result = $validation->errors();
        if (count($validation_result) > 0) {
            return redirect("/admin/books");
            die;
        }
        if (!Csrf::match($_POST["csrf_token"])) {
            return redirect("/admin/books");
            die;
        }
        // validation proccess end

        // Books data Filtration proccess start
        $books = Filtration::filter([
            "name" => $_POST["name"],
            "price" => $_POST["price"]
        ]);
        $books["description"] = $_POST["description"];
        $books["date"] = date("Y-m-d");
        // Books data Filtration proccess end

        // insert books data
        $insert_books = new BooksModel();
        $insert_books->insert($books);

        return redirect("/admin/books");
        die;
    }

    // update books details
    function update()
    {
        // validation proccess start
        $requirment = [
            "csrf_token" => ["required"],
            "id" => ["required", "integer"],
            "name" => ["required", "max:150"],
            "price" => ["required", "max:5", "integer"],
            "description" => ["required"],
        ];
        $validation = new Validation();
        $validation->validate($_POST, $requirment);
        $validation_result = $validation->errors();
        if (count($validation_result) > 0) {
            return redirect("/admin/books");
            die;
        }
        if (!Csrf::match($_POST["csrf_token"])) {
            return redirect("/admin/books");
            die;
        }
        // validation proccess end

        // Books data Filtration proccess start
        $books = Filtration::filter([
            "name" => $_POST["name"],
            "price" => $_POST["price"]
        ]);
        $books["description"] = $_POST["description"];
        // Books data Filtration proccess end

        // insert books data
        $update_books = new BooksModel();
        $update_books->update(data: $books, id: $_POST["id"]);

        return redirect("/admin/books");
        die;
    }

    // publish or un-publish books status update
    public function status_update($id, $status)
    {
        $books_model = new BooksModel();
        $books_model->status_update($id, $status);

        return redirect("/admin/books");
        die;
    }
}
