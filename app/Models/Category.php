<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'group_id',
        'name',
        'url',
        'description',
        'image',
        'icon',
        'status'
    ];

    // belongsTo relation in laravel
    public function group() {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }
    // public function category() {
    //     return $this->hasOne(Category::class, 'group_id');
    // }
}
