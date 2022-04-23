<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nutrients extends Model
{
    use HasFactory;

    protected $fillable = ['entry_id', 'nutrientName', 'unitName', 'value'];

    public function user()
    {
        return $this->belongsTo(Entry::class);
    }
}
