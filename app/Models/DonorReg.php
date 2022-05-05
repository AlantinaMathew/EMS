<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonorReg extends Model
{
    use HasFactory;
    protected $table = 'tbl_donor';
    protected $fillable=['dob','med','kg','gender','grole','bloodgrp'];
    public $timestamps = false;
}
