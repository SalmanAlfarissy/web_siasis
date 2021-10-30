<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $table = "alumnis";
    protected $primaryKey = "id";
    protected $guarded = ['id','nis'];
}
