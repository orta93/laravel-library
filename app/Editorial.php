<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Editorial extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name'
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
