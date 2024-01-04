<?php

namespace App\Models;

use Management\Database\DB;

class DashboardModel
{
    public function summary()
    {
        $db = new DB();
        $db->count_rows(table: "books");
        $db->count_rows(table: "orders", where: "status=0");
        $db->count_rows(table: "messages", where: "status=0");
        $result = $db->get_result();
        $summary = [];
        $summary["total_books"] = $result[0][0];
        $summary["un_complite_orders"] = $result[1][0];
        $summary["total_unread_messages"] = $result[2][0];
        return $summary;
    }
}
