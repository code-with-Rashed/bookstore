<?php

use Management\Classes\Router;
use App\Controllers\ContactController;
use App\Controllers\Admin\MessageController;
use App\Controllers\Admin\BannersController;
use App\Controllers\Admin\BooksController;
use App\Controllers\Admin\BooksImageController;
use App\Controllers\Admin\LoginController;
use App\Controllers\Admin\SettingsController;
use App\Controllers\Admin\ProfileController;
use App\Controllers\Admin\DashboardController;
use App\Controllers\Admin\OrdersController;
use App\Controllers\Admin\PrivacyPolicyController;
use App\Controllers\Admin\TermsConditionsController;
use App\Controllers\BookDetailsController;
use App\Controllers\Cart\CartController;
use App\Controllers\OrderController;
use App\Controllers\OrderSuccessController;
use App\Controllers\PrivacyPolicyController as PrivacyPolicy;
use App\Controllers\TermsConditionsController as TermsConditions;


// Fronted routers start

// Home routes start
Router::get("/", function () {
    return view("frontend/index");
});
// Home routes end

// Book details route start
Router::get("/details/{id}", [BookDetailsController::class, "details"]);
// Book details route end

// Order routes start
Router::post("/order/now", [OrderController::class, "order_now"]);
// Order routes end

// Success routes start
Router::get("/success/{order_id}/{books_id}", [OrderSuccessController::class, "success"]);
// Success routes end

// Contact routes start
Router::get("/contact", [ContactController::class, "index"]);
Router::post("/insert/contact", [ContactController::class, "insert"]);
// Contact routes end

// Privacy policy routes start
Router::get("/privacy/policy", [PrivacyPolicy::class, "index"]);
// Privacy policy routes end

// Terms & Conditions routes start
Router::get("/terms/conditions", [TermsConditions::class, "index"]);
// Terms & Conditions routes end

// Cart Handle start
Router::get("/add-to-cart/{id}", [CartController::class, 'add_to_cart']);
Router::get("/fetch-cart-data", [CartController::class, 'fetch_cart_data']);
Router::get("/up_quantity/{id}", [CartController::class, 'up_quantity']);
Router::get("/down_quantity/{id}", [CartController::class, 'down_quantity']);
Router::get("/item_quantity", [CartController::class, 'item_quantity']);
Router::get("/price", [CartController::class, 'price']);
// Cart Handle end

// Fronted routers end

// Admin panel routers start

// Admin login routes start
Router::get("/admin", [LoginController::class, "index"]);
Router::get("/admin/logout", [LoginController::class, "logout"]);
Router::post("/admin/login", [LoginController::class, "login"]);
// Admin login routes end

// Admin dashboard routes start
Router::get("/admin/dashboard", [DashboardController::class, "index"]);
// Admin dashboard routes end

// Orders management routes start
Router::get("/admin/orders", [OrdersController::class, "index"]);
Router::get("/admin/order/details/{orders_id}/{books_id}", [OrdersController::class, "order_details"]);
Router::get("/admin/orders/status/change/{id}/{status}", [OrdersController::class, "status_update"]);
Router::get("/admin/delete/orders/{id}", [OrdersController::class, "delete"]);
// Orders management routes end

// Books management routes start
Router::get("/admin/books", [BooksController::class, "index"]);
Router::get("/admin/books/status/change/{id}/{status}", [BooksController::class, "status_update"]);
Router::get("/admin/books/{id}", [BooksController::class, "select"]);
Router::post("/admin/books/add", [BooksController::class, "insert"]);
Router::post("/admin/books/update", [BooksController::class, "update"]);

// Books image management routes start
Router::get("/admin/books/image/{books_id}", [BooksImageController::class, "select"]);
Router::post("/admin/add/books/image", [BooksImageController::class, "insert"]);
Router::get("/admin/select/books/image/thumbnail/{id}/{thumbnail}", [BooksImageController::class, "select_thumbnail"]);
Router::get("/admin/delete/books/image/{id}", [BooksImageController::class, "delete"]);
// Books image management routes end

// Books management routes end

// Banners management routes start
Router::get("/admin/banners", [BannersController::class, "index"]);
Router::post("/admin/add/banner", [BannersController::class, "insert"]);
Router::get("/admin/delete/banner/{id}", [BannersController::class, "delete"]);
// Banners management routes end

// Message management routes start
Router::get("/admin/messages", [MessageController::class, "index"]);
Router::get("/admin/message/details/{id}", [MessageController::class, "message_details"]);
Router::get("/admin/message/status/change/{id}/{status}", [MessageController::class, "status_update"]);
Router::get("/admin/delete/message/{id}", [MessageController::class, "delete"]);
// Message management routes end

// Settings management routes start
Router::get("/admin/settings", [SettingsController::class, "index"]);
Router::post("/admin/settings/change/favicon", [SettingsController::class, "change_favicon"]);
Router::post("/admin/settings/change/logo", [SettingsController::class, "change_logo"]);
Router::post("/admin/settings/contact/information", [SettingsController::class, "contact_information"]);
// Settings management routes end

// Profile management routes start
Router::get("/admin/profile", [ProfileController::class, "index"]);
Router::post("/admin/profile/information/update", [ProfileController::class, "update"]);
Router::post("/admin/profile/password/update", [ProfileController::class, "password_update"]);
// Profile management routes end

// Privacy policy management routes start
Router::get("/admin/privacy/policy", [PrivacyPolicyController::class, "index"]);
Router::post("/admin/privacy/policy/update", [PrivacyPolicyController::class, "update"]);
// Privacy policy management routes end

// Terms & Conditions management routes start
Router::get("/admin/terms/conditions", [TermsConditionsController::class, "index"]);
Router::post("/admin/terms/conditions/update", [TermsConditionsController::class, "update"]);
// Terms & Conditions management routes end

// Admin pannel routers end