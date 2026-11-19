<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** Menetapkan kolom yang boleh diisi melalui mass assignment. */
    protected $fillable = [
        'judul',
        'konten',
    ];
}
