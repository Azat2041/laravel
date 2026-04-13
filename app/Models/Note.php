<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Note extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Searchable;
    protected $guarded = false;

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'author' => $this->author,
            'content' => $this->content

        ];
    }
}
