<?php

namespace App\Models;

use Management\Database\DB;

class ContactModel
{
    public function select()
    {
        $db = new DB();
        $db->select(table: "messages", start: 0, limit: 5);
        $result = $db->get_result();
        return $result[0];
    }
    public function insert(array $data)
    {
        $db = new DB();
        return $db->insert(table: "messages", data: $data);
    }
    public function single_message(int $id)
    {
        $db = new DB();
        $db->select(table: "messages", where: "id=$id");
        $result = $db->get_result();
        return $result[0];
    }
    public function delete(int $id)
    {
        $db = new DB();
        $id = $db->escapestring($id);
        $db->delete(table: "messages", where: "id=$id");
        $result = $db->get_result();
        return $result[0];
    }
    // read or un-read message status update
    public function status_update($id, $status)
    {
        $db = new DB();
        $id = $db->escapestring($id);
        $status = $db->escapestring($status);
        $data = [];
        $data["status"] = $status ? 0 : 1;
        return $db->update(table: "messages", updated_data: $data, where: "id=$id");
    }
}
