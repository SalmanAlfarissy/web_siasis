<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raport extends Model
{
    protected $table = "raports";
    protected $primaryKey = "id";
    protected $guarded = ['id'];
}
