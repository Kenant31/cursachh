<?php

namespace App\Models;

use App\Filters\PostFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'text',
        'genre',
        'price'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function scopeFilter(Builder $builder, $request)
    {
        return (new PostFilter($request))->filter($builder);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
