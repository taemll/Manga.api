<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chapter;

class Manga extends Model
{
    protected $table = 'manga';
    protected $fillable = [
        'id',
        'type_id',
        'title',
        'release_age',
        'author_id' ,
        'genre_id',
        'publisher_id',
        'description',
        'img_link'
    ];
    use HasFactory;

    public function author(){
        return $this->belongsTo(Author::class);
    }
    public function genre(){
        return $this->belongsTo(Genre::class);
    }
    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }
    public function type(){
        return $this->belongsTo(Type::class);
    }
    public function chapters(){
        return $this->hasMany(Chapter::class);
    }
}
