<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'manga_id',
        'text',
        'user_id',
    ];
    use HasFactory;
    public function manga(){
        return $this->belongsTo(Manga::class);
    }
}
