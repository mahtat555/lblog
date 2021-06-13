<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // The table associated with the model
    protected $table = "posts";

    // The primary key associated with the table.
    protected $primaryKey = "id";

    // Indicates if the model should be timestamped.
    public $timestamps = true;
}
