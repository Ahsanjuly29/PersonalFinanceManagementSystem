<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;


    public function expenseDetails()
    {
        return $this->hasMany(expenseDetails::class);
    }

    public function expenseImage()
    {
        return $this->hasMany(ExpenseImage::class);
    }

    // Cascade Delete
    protected static function booted()
    {
        static::deleting(function (Expense $expense) { // before delete() method call this
            $expense->expenseDetails()->delete();
            $expense->expenseImage()->delete();
        });
    }
}
