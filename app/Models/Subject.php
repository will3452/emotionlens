<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'code',
        'description',
        'instructor_id',
        'archived_at',
        'theme', 
    ]; 

    public function instructor () {
        return $this->belongsTo(User::class, 'instructor_id'); 
    }

    public function materials () {
        return $this->hasMany(SubjectMaterial::class, 'subject_id'); 
    }
}
