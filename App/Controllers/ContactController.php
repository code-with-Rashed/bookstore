<?php

namespace App\Controllers;

use Management\Classes\Csrf;
use Management\Classes\Validation;
use Management\Classes\Filtration;
use App\Models\ContactModel;

class ContactController
{
    function __construct()
    {
        date_default_timezone_set(DEFAULT_TIMEZONE);
    }
    // Contact page render
    function index()
    {
        $csrf = Csrf::create();
        return view("frontend/contact", $csrf);
    }
    // insert message
    function insert()
    {
        // validation proccess start
        $requirment = [
            "csrf_token" => ["required"],
            "name" => ["required", "max:40"],
            "email" => ["required", "email", "max:50"],
            "subject" => ["required", "max:150"],
            "message" => ["required", "max:250"],
        ];
        $validation = new Validation();
        $validation->validate($_POST, $requirment);
        $validation_result = $validation->errors();
        if (count($validation_result) > 0) {
            // return redirect("/contact");
            print_r($validation_result);
            die;
        }
        if (!Csrf::match($_POST["csrf_token"])) {
            return redirect("/contact");
            die;
        }
        // validation proccess end

        // Message Filtration proccess start
        $message = Filtration::filter([
            "name" => $_POST["name"],
            "email" => $_POST["email"],
            "subject" => $_POST["subject"],
            "message" => $_POST["message"],
            "datetime" => date("Y-m-d h:i:s")
        ]);
        // Message Filtration proccess end

        // insert message
        $insert_message = new ContactModel();
        $insert_message->insert($message);

        return redirect("/contact");
    }
}
