<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $table = 'tbl_admin';
    protected $fillable = ['email','password'
    ];
    public $timestamps = false;
}
