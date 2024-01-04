<?php

namespace App\Controllers\Admin;

use App\Middlewares\AdminAuthMiddleware;
use App\Models\DashboardModel;

class  DashboardController
{
    public function __construct()
    {
        AdminAuthMiddleware::is_admin_login();
    }
    public function index()
    {
        $dashboard_model = new DashboardModel();
        $summary = $dashboard_model->summary();
        return view("admin/dashboard",$summary);
    }
}
