<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','description','image_path','page_id'
    ];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function page()
    {
        return $this->belongsTo(Page::class,'page_id');
    }   
}
