<?php

namespace App\Models;

use Management\Database\DB;

class BannersModel
{
    public function insert($data)
    {
        $db = new DB();
        $db->insert(table: "banners", data: $data);
        $result = $db->get_result();
        return $result[0];
    }
    public function select($id = null)
    {
        $db = new DB();
        if (is_null($id)) {
            $db->select(table: "banners");
        } else {
            $id = $db->escapestring($id);
            $db->select(table: "banners", where: "id=$id");
        }
        $result = $db->get_result();
        return $result[0];
    }
    public function delete(int $id)
    {
        $db = new DB();
        $id = $db->escapestring($id);
        $db->delete(table: "banners", where: "id=$id");
        $result = $db->get_result();
        return $result[0];
    }
}
