<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    // public function scopeFilter($query, array $filters)
    // {
    //     if ($filters['search'] ?? false) {
    //         $query->where('text', 'like', '%' . request('search') . '%')
    //             ->orWhere('explanation', 'like', '%' . request('search') . '%');
    //     }
    // }

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function topics(){
        return $this->hasMany(Topic::class);
    }
}
?>
