<?php

namespace App\Models;

use Management\Database\DB;

class ProfileModel
{
    public function select(int $id)
    {
        $db = new DB();
        $id = $db->escapestring($id);
        $db->select(table: "admin", where: "id=$id");
        $result = $db->get_result();
        return $result[0];
    }
    public function password_update(array $password, int $id)
    {
        $db = new DB();
        $id = $db->escapestring($id);
        $db->update(table: "admin", updated_data: $password, where: "id=$id");
        $result = $db->get_result();
        return $result[0];
    }
    public function update(array $data, int $id)
    {
        $db = new DB();
        $id = $db->escapestring($id);
        $db->update(table: "admin", updated_data: $data, where: "id=$id");
        $result = $db->get_result();
        return $result[0];
    }
    public function update_photo(array $data, int $id)
    {
        $db = new DB();
        $id = $db->escapestring($id);
        $db->update(table: "admin", updated_data: $data, where: "id=$id");
        $result = $db->get_result();
        return $result[0];
    }
    
}
