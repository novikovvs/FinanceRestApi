<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinanceHistory extends Model
{
    use HasFactory;

    protected $fillable = ['operation_datetime', 'amount', 'category', 'MSS', 'description'];
}
