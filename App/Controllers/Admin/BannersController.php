<?php

namespace App\Controllers\Admin;

use Management\Classes\Csrf;
use Management\Classes\File;
use Management\Classes\Filtration;
use Management\Classes\Token;
use Management\Classes\Validation;
use App\Middlewares\AdminAuthMiddleware;
use App\Models\BannersModel;

class BannersController
{
    public function __construct()
    {
        AdminAuthMiddleware::is_admin_login();
    }
    public function index()
    {
        $bannerModel = new BannersModel();
        $banners = $bannerModel->select();
        $csrf = Csrf::create();
        return view("admin/banners", compact("csrf", "banners"));
    }
    public function insert()
    {
        // validation proccess
        $requirment = [
            "csrf_token" => ["required"],
            "link" => ["required", "url"],
        ];
        $validation = new Validation();
        $validation->validate($_POST, $requirment);
        $validation_result = $validation->errors();
        if (!empty($validation_result) || !Csrf::match($_POST["csrf_token"]) || $_FILES["image"]["error"]) {
            redirect("/admin/banners");
            die;
        }

        $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        $image_name = Token::make() . "." . $extension;

        $data = Filtration::filter([
            "image" => $image_name,
            "link" => $_POST["link"]
        ]);
        $bannerModel = new BannersModel();
        if (File::upload($_FILES["image"]["tmp_name"], storage_path("banners/$image_name"))) {
            $bannerModel->insert($data);
        };
        redirect("/admin/banners");
        die;
    }
    public function delete($id)
    {
        $bannerModel = new BannersModel();
        $banner = $bannerModel->select($id);
        if (!empty($banner)) {
            if (File::exist(storage_path("banners/" . $banner[0]["image"]))) {
                if (File::remove(storage_path("banners/" . $banner[0]["image"]))) {
                    $bannerModel->delete($banner[0]["id"]);
                }
            }
        }
        redirect("/admin/banners");
        die;
    }
}
