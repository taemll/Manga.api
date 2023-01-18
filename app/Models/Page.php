<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chapter;

class Page extends Model
{
    protected $fillable = [
        'id',
        'chapter_id',
        'img_link',
    ];
    use HasFactory;

    public function chapter(){
        return $this->belongsTo(Chapter::class);
    }
}
