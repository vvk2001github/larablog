<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Article extends Model
{
    use HasFactory, AsSource, Filterable, Attachable;

    protected $fillable = [
        'descr',
        'content',
        'published',
        'published_at',
    ];

    protected $casts = [
        'published_at'    => 'datetime',
    ];

    protected $allowedFilters = [
        'descr',
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'id',
        'descr',
        'content',
        'updated_at',
        'created_at',
        'published_at',
    ];
}
