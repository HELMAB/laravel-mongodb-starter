<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id';

    public $incrementing = true;

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        self::creating(function ($model) {
            $id = Post::max('id');
            $model->id = $id + 1;
        });
    }
}
