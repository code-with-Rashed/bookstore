<?php

namespace App\Controllers;
use App\Models\PrivacyPolicyModel;

class PrivacyPolicyController
{
    public function index()
    {
        $privacy_policy_model = new PrivacyPolicyModel();
        $result = $privacy_policy_model->select();
        $data = [];
        $data["data"] = $result[0]["data"];
        return view("frontend/privacy_policy", $data);
    }
}
