<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','summary','content','author','category_id','page_id','img_path'
    ];
    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function pages()
    {
        return $this->belongsTo(Page::class,'page_id');
    }
}
