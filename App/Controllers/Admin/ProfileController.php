<?php

namespace App\Controllers\Admin;

use App\Middlewares\AdminAuthMiddleware;
use Management\Classes\Csrf;
use Management\Classes\Validation;
use Management\Classes\Filtration;
use Management\Classes\Session;
use Management\Classes\Hash;
use Management\Classes\Token;
use Management\Classes\File;
use App\Models\ProfileModel;

class ProfileController
{
    public function __construct()
    {
        AdminAuthMiddleware::is_admin_login();
    }
    public function index()
    {
        $csrf = Csrf::create();
        $admin_id = Session::get("admin")["id"];
        $profile_model = new ProfileModel();
        $profile_data = $profile_model->select($admin_id);
        $data = [];
        $data["CSRF"] = $csrf["CSRF"];
        $data["profile"]["id"] = $profile_data[0]["id"];
        $data["profile"]["name"] = $profile_data[0]["name"];
        $data["profile"]["email"] = $profile_data[0]["email"];
        $data["profile"]["image"] = $profile_data[0]["image"];
        return view("admin/profile", $data);
    }
    public function password_update()
    {
        // validation proccess start
        $requirment = [
            "csrf_token" => ["required"],
            "id" => ["required", "integer"],
            "old_password" => ["required", "max:25"],
            "new_password" => ["required", "max:25"],
            "confirm_password" => ["required", "max:25"]
        ];
        $validation = new Validation();
        $validation->validate($_POST, $requirment);
        $validation_result = $validation->errors();
        if (!empty($validation_result) || !Csrf::match($_POST["csrf_token"])) {
            return redirect("/admin/profile");
            die;
        }
        // validation proccess end

        $old_password = trim($_POST["old_password"]);
        $new_password = trim($_POST["new_password"]);
        $confirm_password = trim($_POST["confirm_password"]);


        if ($new_password === $confirm_password) {
            // old password validation proccess start 
            $profile_model = new ProfileModel();
            $profile_data = $profile_model->select(id: $_POST["id"]);
            if (!Hash::match($old_password, $profile_data[0]["password"])) {
                return redirect("/admin/profile");
                die;
            }
            // old password validation proccess end 

            // Password updated
            $password = Hash::make($new_password);
            $profile_model->password_update(password: ["password" => $password], id: $_POST["id"]);
            return redirect("/admin/logout");
            die;
        }

        return redirect("/admin/profile");
        die;
    }
    public function update()
    {
        // validation proccess start
        $requirment = [
            "csrf_token" => ["required"],
            "id" => ["required", "integer"],
            "name" => ["required", "max:40"],
            "email" => ["required", "max:50"]
        ];
        $validation = new Validation();
        $validation->validate($_POST, $requirment);
        $validation_result = $validation->errors();
        if (!empty($validation_result) || !Csrf::match($_POST["csrf_token"])) {
            return redirect("/admin/profile");
            die;
        }
        // validation proccess end

        // Profile data Filtration proccess start
        $profile_data = Filtration::filter([
            "name" => $_POST["name"],
            "email" => $_POST["email"]
        ]);
        // Profile data Filtration proccess end

        // profile updated
        $profile_model = new ProfileModel();
        $profile_model->update(data: $profile_data, id: $_POST["id"]);

        if (!$_FILES["photo"]["error"]) {
            $profile_data = $profile_model->select(id: $_POST["id"]);
            if (!is_null($profile_data[0]["image"])) {
                File::remove(storage_path("profile/" . $profile_data[0]["image"]));
            }

            $extension = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
            $image_name = Token::make() . "." . $extension;
            if (File::upload($_FILES["photo"]["tmp_name"], storage_path("profile/$image_name"))) {
                $profile_model->update_photo(data: ["image" => $image_name], id: $_POST["id"]);
            }
        }
        return redirect("/admin/logout");
        die;
    }
}
