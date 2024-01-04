<?php

namespace App\Controllers\Admin;

use Management\Classes\Csrf;
use Management\Classes\Validation;
use Management\Classes\Filtration;
use Management\Classes\Token;
use Management\Classes\File;
use App\Middlewares\AdminAuthMiddleware;
use App\Models\BooksImageModal;

class BooksImageController
{
    public function __construct()
    {
        AdminAuthMiddleware::is_admin_login();
    }
    public function select($books_id)
    {
        $books_image_model = new BooksImageModal();
        $books_images = $books_image_model->select($books_id);
        echo json_encode($books_images);
    }

    // add books image
    public function insert()
    {
        // validation proccess
        $requirment = [
            "csrf_token" => ["required"],
            "books_id" => ["required", "integer"],
        ];
        $validation = new Validation();
        $validation->validate($_POST, $requirment);
        $validation_result = $validation->errors();
        if (count($validation_result) > 0 || !Csrf::match($_POST["csrf_token"]) || $_FILES["image"]["error"]) {
            redirect("/admin/books");
            die;
        }

        $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        $image_name = Token::make() . "." . $extension;

        $data = Filtration::filter([
            "image" => $image_name,
            "books_id" => $_POST["books_id"]
        ]);
        $books_image_model = new BooksImageModal();
        if (File::upload($_FILES["image"]["tmp_name"], storage_path("books_image/$image_name"))) {
            $books_image_model->insert($data);
        };
        redirect("/admin/books");
        die;
    }
    public function select_thumbnail($id, $thumbnail)
    {
        $books_image_model = new BooksImageModal();
        $books_image_model->select_thumbnail($id, $thumbnail);
        echo json_encode(["message" => "thumbnail updated"]);
    }

    public function delete($id)
    {
        $response = [];
        $books_image_model = new BooksImageModal();
        $books_image = $books_image_model->books_image($id);
        if (!empty($books_image)) {
            if (File::exist(storage_path("books_image/" . $books_image[0]["image"]))) {
                if (File::remove(storage_path("books_image/" . $books_image[0]["image"]))) {
                    $books_image_model->delete($books_image[0]["id"]);
                    $response["message"] = "Books image successfully deleted.";
                } else {
                    $response["error"] = "Books image deleted!!";
                }
            } else {
                $response["error"] = "Books image deleted!!";
            }
        } else {
            $response["error"] = "Books image deleted!!";
        }
        echo json_encode($response);
        die;
    }
}
