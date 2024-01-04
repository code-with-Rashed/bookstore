<?php

namespace App\Models;

use Management\Database\DB;

class BooksImageModal
{
    public function insert(array $data)
    {
        $db = new DB();
        return $db->insert(table: "books_image", data: $data);
    }

    public function select(int $books_id)
    {
        $db = new DB();
        $books_id = $db->escapestring($books_id);
        $db->select(table: "books_image", where: "books_id=$books_id");
        $result = $db->get_result();
        return $result[0];
    }

    public function books_image(int $id)
    {
        $db = new DB();
        $books_id = $db->escapestring($id);
        $db->select(table: "books_image", where: "id=$id");
        $result = $db->get_result();
        return $result[0];
    }

    // Active thumbnail image
    public function thumbnail(int $id, int $thumbnail_status)
    {
        $db = new DB();
        $id = $db->escapestring($id);
        $thumbnail_status = $db->escapestring($thumbnail_status);
        $data = [];
        $data["thumbnail"] = $thumbnail_status ? 0 : 1;
        return $db->update(table: "books_image", updated_data: $data, where: "id=$id");
    }

    public function select_thumbnail($id, $thumbnail)
    {
        $db = new DB();
        $id = $db->escapestring($id);
        $thumbnail = $db->escapestring($thumbnail);
        $data = [];
        $data["thumbnail"] = $thumbnail ? 0 : 1;
        return $db->update(table: "books_image", updated_data: $data, where: "id=$id");
    }

    public function delete(int $id)
    {
        $db = new DB();
        $id = $db->escapestring($id);
        $db->delete(table: "books_image", where: "id=$id");
        $result = $db->get_result();
        return $result[0];
    }
}
