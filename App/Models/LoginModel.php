<?php

namespace App\Models;

use Management\Database\DB;

class LoginModel
{
    public function select(string $email){
      $db = new DB();
      $email = $db->escapestring($email);
      $db->select(table:"admin",where:"email='{$email}'");
      $result = $db->get_result();
      return $result[0];
    }
}
