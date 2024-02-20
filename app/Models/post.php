<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'image',
        'etudiant_id'
    ];
    public function etudiant()
    {
        return $this->belongsTo(\App\Models\etudiant::class,'etudiant_id');
    }

}
