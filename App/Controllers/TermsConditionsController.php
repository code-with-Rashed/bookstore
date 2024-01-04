<?php

namespace App\Controllers;

use App\Models\TermsConditionsModel;

class TermsConditionsController
{
    public function index()
    {
        $terms_conditions_model = new TermsConditionsModel();
        $result = $terms_conditions_model->select();
        $data = [];
        $data["data"] = $result[0]["data"];
        return view("frontend/terms_conditions", $data);
    }
}
