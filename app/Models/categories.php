<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;

    
    protected $fillable = ['name', 'description', 'parent_id'];

    public function children()
    {
        return $this->hasMany(categories::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(categories::class, 'parent_id');
    }
}
