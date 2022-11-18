<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    public function genres(){
        return $this->belongsToMany(Genre::class);
    }
    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }
    public function rating(){
        return $this->hasOne(Rating::class);
    }
    public function comment(){
        return $this->hasMany(Comment::class);
    }
    public function type(){
        return $this->belongsTo(Type::class);
    }
}
