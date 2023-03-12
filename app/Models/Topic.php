<?php

namespace App\Models;

use App\Models\Choice;
use App\Models\Subject;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id',
        'name',
        'slug',
        'description',
    ];

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function choices(){
        return $this->hasmany(Choice::class);
    }
}
?>
