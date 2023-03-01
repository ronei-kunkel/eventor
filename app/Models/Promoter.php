<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promoter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'document_id'
    ];

    public function events()
    {
        return $this->hasMany(Event::class)->paginate(10);
    }
}
