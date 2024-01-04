<?php

namespace App\Models;

use Management\Database\DB;

class TermsConditionsModel
{
    public function select(){
      $db = new DB();
      $db->select(table:"terms_conditions",where:"id=1");
      $result = $db->get_result();
      return $result[0];
    }
    public function update(array $data)
    {
        $db = new DB();
        $db->update(table: "terms_conditions", updated_data: $data, where: "id=1");
        $result = $db->get_result();
        return $result[0];
    }

}
