<?php

namespace App\Middlewares;

use Management\Classes\Session;

class AdminAuthMiddleware
{
    public static function is_admin_logout()
    {
        if (Session::has("admin") && Session::get("admin")["is_login"]) {
            return redirect("/admin/dashboard");
            die;
        }
    }
    public static function is_admin_login()
    {
        if (!Session::has("admin") || !Session::get("admin")["is_login"]) {
            return redirect("/admin");
            die;
        }
    }
}
