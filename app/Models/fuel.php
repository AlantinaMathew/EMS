<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fuel extends Model
{
    use HasFactory;
    protected $table = 'tbl_fuel';
    protected $fillable=['name','email','password','phone',
    'place',];
    public $timestamps = false;
}
 