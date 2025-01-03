<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $table = 'albums';
    protected $fillable = [
        'name','slug','description'
    ];
    public function getRouteKeyName()
    {
        return 'slug'; 
    }
    public function photos() {
        return $this->hasMany(Photo::class);
    }
}
