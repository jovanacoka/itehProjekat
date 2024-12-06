<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /** @use HasFactory<\Database\Factories\ItemFactory> */
    use HasFactory;
    protected $fillable = ['user_id', 'category_id', 'type', 'color', 'size'];

    // Relacija sa korisnikom
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relacija sa kategorijom
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
