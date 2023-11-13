<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id',
        'description',
        'file',
        'video_link'
    ]; 

    public function subject () {
        return $this->belongsTo(Subject::class, 'subject_id'); 
    }

    public function logs () {
        return $this->hasMany(VisitLog::class, 'material_id'); 
    }
}
