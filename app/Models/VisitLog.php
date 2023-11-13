<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mood',
        'material_id',
        'expressions', 
    ]; 

    public function user () {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function material() {
        return $this->belongsTo(SubjectMaterial::class, 'material_id'); 
    }
}
