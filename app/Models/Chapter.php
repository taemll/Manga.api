<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Page;
class Chapter extends Model
{
    protected $fillable = [
        'id',
        'manga_id',
        'title'
    ];
    use HasFactory;

    public function manga(){
        return $this->belongsTo(Manga::class);
    }
    public function pages(){
        return $this->hasMany(Page::class);
    }

}
