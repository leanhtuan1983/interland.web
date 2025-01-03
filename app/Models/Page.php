<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','description'
    ];
    public function post()
    {
        return $this->hasMany(Post::class);
    }
    public function cates()
    {
        return $this->hasMany(Category::class);
    }  
}
