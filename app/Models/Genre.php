<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];
    use HasFactory;
    
    public function manga(){
        return $this->belongsToMany(Manga::class);
    }
}
