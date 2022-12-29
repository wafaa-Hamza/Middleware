<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    protected $table = "tasks;

    protected $fillable = ["title","content","image","startdate","enddate","user_id"];

    // public $timestamps = false;


}