<?php

namespace App\Controllers\Admin;

use App\Middlewares\AdminAuthMiddleware;
use App\Models\PrivacyPolicyModel;
use Management\Classes\Csrf;
use Management\Classes\Validation;

class PrivacyPolicyController
{
    public function __construct()
    {
        AdminAuthMiddleware::is_admin_login();
    }
    public function index()
    {
        $csrf = Csrf::create();
        $privacy_policy_model = new PrivacyPolicyModel();
        $result = $privacy_policy_model->select();
        $data = [];
        $data["csrf"] = $csrf["CSRF"];
        $data["data"] = $result[0]["data"];
        return view("admin/privacy_policy", $data);
    }
    // update Privacy Policy
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
            return redirect("/admin/privacy/policy");
            die;
        }
        // validation proccess end

        // Update Privacy Policy
        $privacy_policy_model = new PrivacyPolicyModel();
        $privacy_policy_model->update(data: ["data" => $_POST["data"]]);

        return redirect("/admin/privacy/policy");
        die;
    }
}
