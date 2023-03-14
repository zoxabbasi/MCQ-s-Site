<?php

namespace App\Models;

use App\Models\Topic;
use App\Models\Choice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'topic_id',
        'text',
        'tags',
        'is_correct',
        'count',
    ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('text', 'like', '%' . request('search') . '%')
                ->orWhere('explanation', 'like', '%' . request('search') . '%');
        }
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }
}
