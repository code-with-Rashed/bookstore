<?php

use App\Models\BannersModel;
use App\Models\ContactInformationModel;
use Management\Classes\Session;
use App\Models\FaviconModel;
use App\Models\HomeBooksModel;
use App\Models\LogoModel;

function get_session_data(string $key)
{
    $session_class = new Session();
    return $session_class->get($key);
}

function get_favicon()
{
    $favicon_model = new FaviconModel();
    $result = $favicon_model->select();
    return $result[0]["favicon"] ?? "favicon.png";
}
function get_logo()
{
    $logo_model = new LogoModel();
    $result = $logo_model->select();
    return $result[0]["logo"] ?? "logo.png";
}
function get_contact_information(){
    $contact_information_model = new ContactInformationModel();
    $result = $contact_information_model->select();
    return $result[0];
}
function get_banners(){
    $banners_model = new BannersModel();
    $result = $banners_model->select();
    return $result;
}
function get_home_page_books(){
    $home_books_model = new HomeBooksModel();
    $result = $home_books_model->select_home_page_books();
    return $result;
}
