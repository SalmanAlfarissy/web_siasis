<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    protected $table = "informasis";
    protected $primaryKey = "id";
    protected $guarded = ['id'];
}
