<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =
    [
        'title',
        'content',
        'file',
        'attachment',
    ];

    protected $casts =
    [
        'attachment' => 'array',
    ];
}
