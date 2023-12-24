<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeFrom extends Model
{
    use HasFactory;

    protected $table = "income_froms";
    protected $primaryKey = "id";
}
