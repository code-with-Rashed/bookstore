<?php

namespace App\Models;

use Management\Database\DB;

class BooksModel
{
    public function insert(array $data)
    {
        $db = new DB();
        return $db->insert(table: "books", data: $data);
    }
    
    public function update(array $data, int $id)
    {
        $db = new DB();
        $id = $db->escapestring($id);
        return $db->update(table: "books", updated_data: $data, where: "id=$id");
    }
    public function select($id = null)
    {
        $db = new DB();
        if (is_null($id)) {
            $db->select(table: "books", column: "id,name,price,date,status");
        } else {
            $id = $db->escapestring($id);
            $db->select(table: "books", where: "id=$id");
        }
        $result = $db->get_result();
        return $result[0];
    }
    // publish or un-publish books status update
    public function status_update($id, $status)
    {
        $db = new DB();
        $id = $db->escapestring($id);
        $status = $db->escapestring($status);
        $data = [];
        $data["status"] = $status ? 0 : 1;
        return $db->update(table: "books", updated_data: $data, where: "id=$id");
    }
}
