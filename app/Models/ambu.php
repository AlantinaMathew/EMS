<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ambu extends Model
{
    use HasFactory;
    protected $table = 'tbl_ambu';
    protected $fillable=['email','password','licenseno','vehicleno','phone',
    'place',];
    public $timestamps = false;
}
