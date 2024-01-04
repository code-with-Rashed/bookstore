<?php

namespace App\Models;

use Management\Database\DB;

class ContactInformationModel
{
    public function select(){
      $db = new DB();
      $db->select(table:"contact_information",where:"id=1");
      $result = $db->get_result();
      return $result[0];
    }
}
