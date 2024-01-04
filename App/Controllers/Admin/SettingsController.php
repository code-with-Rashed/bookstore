<?php

namespace App\Controllers\Admin;

use Management\Classes\Csrf;
use Management\Classes\Filtration;
use Management\Classes\Validation;
use Management\Classes\Token;
use Management\Classes\File;
use App\Middlewares\AdminAuthMiddleware;
use App\Models\SettingsModel;
use App\Models\FaviconModel;
use App\Models\LogoModel;


class SettingsController
{
    public function __construct()
    {
        AdminAuthMiddleware::is_admin_login();
    }
    public function index()
    {
        $data = [];
        $csrf = Csrf::create();
        $settings_model = new SettingsModel();
        $settings_data = $settings_model->select();
        $merge_settings_data = array_merge(...$settings_data);
        $data["favicon"] = $merge_settings_data[0]["favicon"];
        $data["logo"] = $merge_settings_data[1]["logo"];
        $data["contact_information"] = $merge_settings_data[2];
        $data["CSRF"] = $csrf["CSRF"];
        return view("admin/settings", $data);
    }

    public function change_favicon()
    {
        if (!Csrf::match($_POST["csrf_token"]) || $_FILES["favicon"]["error"]) {
            redirect("/admin/settings");
            die;
        }

        // existing favicon removed
        $favicon_model = new FaviconModel();
        $favicon = $favicon_model->select();
        if (!is_null($favicon[0]["favicon"])) {
            File::remove(storage_path("favicon/" . $favicon[0]["favicon"]));
        }

        $extension = pathinfo($_FILES["favicon"]["name"], PATHINFO_EXTENSION);
        $favicon_name = Token::make() . "." . $extension;

        $settings_model = new SettingsModel();
        if (File::upload($_FILES["favicon"]["tmp_name"], storage_path("favicon/$favicon_name"))) {
            $settings_model->update_favicon(data: ["favicon" => $favicon_name]);
        };
        redirect("/admin/settings");
        die;
    }
    public function change_logo()
    {
        if (!Csrf::match($_POST["csrf_token"]) || $_FILES["logo"]["error"]) {
            redirect("/admin/settings");
            die;
        }

        // existing logo removed
        $logo_model = new LogoModel();
        $logo = $logo_model->select();
        if (!is_null($logo[0]["logo"])) {
            File::remove(storage_path("logo/" . $logo[0]["logo"]));
        }

        $extension = pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);
        $logo_name = Token::make() . "." . $extension;

        $settings_model = new SettingsModel();
        if (File::upload($_FILES["logo"]["tmp_name"], storage_path("logo/$logo_name"))) {
            $settings_model->update_logo(data: ["logo" => $logo_name]);
        };
        redirect("/admin/settings");
        die;
    }
    public function contact_information()
    {
        // validation proccess start
        $requirment = [
            "csrf_token" => ["required"],
            "address" => ["required", "max:250"],
            "email" => ["required", "max:100"],
            "phone" => ["required", "max:11"],
            "whatsapp" => ["required", "max:11"],
            "telegram" => ["required", "max:11"],
            "twitter" => ["required", "max:250"],
            "facebook" => ["required", "max:250"],
            "instagram" => ["required", "max:250"],
            "iframe_link" => ["required", "max:250"]
        ];
        $validation = new Validation();
        $validation->validate($_POST, $requirment);
        $validation_result = $validation->errors();
        if (count($validation_result) > 0 || !Csrf::match($_POST["csrf_token"])) {
            redirect("/admin/settings");
            die;
        }
        // validation proccess end

        // Contact information Filtration proccess start
        $contact_information = Filtration::filter([
            "address" => $_POST["address"],
            "email" => $_POST["email"],
            "phone" => $_POST["phone"],
            "whatsapp" => $_POST["whatsapp"],
            "telegram" => $_POST["telegram"],
            "twitter" => $_POST["twitter"],
            "facebook" => $_POST["facebook"],
            "instagram" => $_POST["instagram"],
            "iframe_link" => $_POST["iframe_link"]
        ]);
        // Contact information Filtration proccess end

        // insert books data
        $settings_model = new SettingsModel();
        $settings_model->save_contact_information($contact_information);
        return redirect("/admin/settings");
        die;
    }
}
