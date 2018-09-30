<?php

namespace DtechBook\Book\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $table = 'dtech_books';

    public $timestamps = true;

    protected $fillable = [
        'id',
        'user_id',
        'author',
        'title',
        'summary',
        'avatar',
        'content',
        'status',
        'total_view',
        'total_like',
        'total_dislike',
        'total_share',
        'total_interested',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $dates = ['deleted_at'];
}
