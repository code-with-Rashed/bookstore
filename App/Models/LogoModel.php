<?php

namespace App\Models;

use Management\Database\DB;

class LogoModel
{
    public function select(){
      $db = new DB();
      $db->select(table:"logo",where:"id=1");
      $result = $db->get_result();
      return $result[0];
    }
}
