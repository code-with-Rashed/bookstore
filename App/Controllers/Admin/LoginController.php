<?php

namespace App\Controllers\Admin;

use Management\Classes\Csrf;
use Management\Classes\Validation;
use Management\Classes\Hash;
use Management\Classes\Session;
use App\Models\LoginModel;
use App\Middlewares\AdminAuthMiddleware;

class LoginController
{
    public function index()
    {
        AdminAuthMiddleware::is_admin_logout();

        $csrf = Csrf::create();
        return view("admin/login", $csrf);
    }
    public function login()
    {
        // validation proccess start
        $requirment = [
            "csrf_token" => ["required"],
            "email" => ["required", "email", "max:50"],
            "password" => ["required", "max:25"],
        ];
        $validation = new Validation();
        $validation->validate($_POST, $requirment);
        $validation_result = $validation->errors();
        if (!empty($validation_result) || !Csrf::match($_POST["csrf_token"])) {
            return redirect("/admin");
            die;
        }
        // validation proccess end

        $login_model = new LoginModel();
        $login_result = $login_model->select($_POST["email"]);
        if (empty($login_result)) {
            return redirect("/admin");
            die;
        }
        // Password Verify
        $password_verify = Hash::match($_POST["password"], $login_result[0]["password"]);

        if ($password_verify) {
            Session::set("admin", ["is_login" => true, "id" => $login_result[0]["id"], "name" => $login_result[0]["name"], "image" => $login_result[0]["image"]]);
            return redirect("/admin/dashboard");
            die;
        }
        return redirect("/admin");
        die;
    }
    public function logout()
    {
        Session::remove("admin");
        return redirect("/admin");
        die;
    }
}
