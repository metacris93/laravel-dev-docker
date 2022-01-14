<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $table = 'expenses';
    public function expenseReport()
    {
        return $this->belongsTo(ExpenseReport::class, 'report_id', 'id');
    }
}
