<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'servingSize', 'servingSizeUnit', 'householdServingFullText', 'upload_date', 'user_id'];
    protected $dates = ['upload_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function nutrients()
    {
        return $this->hasMany(Nutrients::class, "food_id", "id");
    }
}
