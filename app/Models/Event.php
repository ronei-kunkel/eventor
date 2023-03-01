<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'promoter_id'
    ];

    public function promoter()
    {
        return $this->belongsTo(Promoter::class);
    }

    public function entries()
    {
        return $this->hasMany(Entries::class)->paginate(10);
    }
}
