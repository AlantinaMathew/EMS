<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class repair extends Model
{
    use HasFactory;
    protected $table = 'tbl_repair';
    protected $fillable=['name','email','password','phone',
    'place',];
    public $timestamps = false;
}
