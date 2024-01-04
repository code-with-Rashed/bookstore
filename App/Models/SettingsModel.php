<?php

namespace App\Models;

use Management\Database\DB;

class SettingsModel
{
    public function select()
    {
        $db = new DB();
        $db->select(table: "favicon");
        $db->select(table: "logo");
        $db->select(table: "contact_information");
        $result = $db->get_result();
        return $result;
    }
    public function update_favicon($data)
    {
        $db = new DB();
        $db->update(table: "favicon", updated_data: $data, where: "id=1");
        $result = $db->get_result();
        return $result[0];
    }
    public function update_logo($data)
    {
        $db = new DB();
        $db->update(table: "logo", updated_data: $data, where: "id=1");
        $result = $db->get_result();
        return $result[0];
    }
    public function save_contact_information($data)
    {
        $db = new DB();
        $db->count_rows(table: "contact_information");
        $result = $db->get_result();
        if ($result[0][0] > 0) {
            $db->update(table: "contact_information", updated_data: $data, where: "id=1");
        } else {
            $db->insert(table: "contact_information", data: $data);
        }
        $result = $db->get_result();
        return $result[0];
        die;
    }
}
