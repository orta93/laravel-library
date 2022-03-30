<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'last_name'
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function getFullNameAttribute()
    {
        return $this->name." ".$this->last_name;
    }
}
