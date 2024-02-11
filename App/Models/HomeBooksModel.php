<?php

namespace App\Models;

use Management\Database\DB;

class HomeBooksModel
{
    public function select_home_page_books()
    {
        $db = new DB();
        $db->select(table: "books", column: "books.id,books.name,books.price,books_image.image", join: "books_image ON books.id = books_image.books_id", where: "books.status = 1 AND books_image.thumbnail = 1");
        $result = $db->get_result();
        return $result[0];
    }

    public function select_books_details($id)
    {
        $db = new DB();
        $id = $db->escapestring($id);
        $db->select(table: "books", where: "id = $id AND status = 1");
        $db->select(table: "books_image", column: "image", where: "books_id = $id");
        $result = $db->get_result();
        return $result;
    }

    // order insert
    public function insert(array $data)
    {
        $db = new DB();
        return $db->insert(table: "orders", data: $data);
    }
}
