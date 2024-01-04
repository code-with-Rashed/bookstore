<?php

namespace App\Controllers\Admin;

use App\Middlewares\AdminAuthMiddleware;
use App\Models\TermsConditionsModel;
use Management\Classes\Csrf;
use Management\Classes\Validation;

class TermsConditionsController
{
    public function __construct()
    {
        AdminAuthMiddleware::is_admin_login();
    }
    public function index()
    {
        $csrf = Csrf::create();
        $terms_conditions_model = new TermsConditionsModel();
        $result = $terms_conditions_model->select();
        $data = [];
        $data["csrf"] = $csrf["CSRF"];
        $data["data"] = $result[0]["data"];
        return view("admin/terms_conditions", $data);
    }
    // update terms & conditions
    function update()
    {
        // validation proccess start
        $requirment = [
            "csrf_token" => ["required"],
            "data" => ["required"],
        ];
        $validation = new Validation();
        $validation->validate($_POST, $requirment);
        $validation_result = $validation->errors();
        if (!empty($validation_result) || !Csrf::match($_POST["csrf_token"])) {
            return redirect("/admin/terms/conditions");
            die;
        }
        // validation proccess end

        // Update Privacy Policy
        $terms_conditions_model = new TermsConditionsModel();
        $terms_conditions_model->update(data: ["data" => $_POST["data"]]);

        return redirect("/admin/terms/conditions");
        die;
    }
}
