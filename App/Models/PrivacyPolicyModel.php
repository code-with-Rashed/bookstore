<?php

namespace App\Models;

use Management\Database\DB;

class PrivacyPolicyModel
{
    public function select(){
      $db = new DB();
      $db->select(table:"privacy_policy",where:"id=1");
      $result = $db->get_result();
      return $result[0];
    }
    public function update(array $data)
    {
        $db = new DB();
        $db->update(table: "privacy_policy", updated_data: $data, where: "id=1");
        $result = $db->get_result();
        return $result[0];
    }

}
