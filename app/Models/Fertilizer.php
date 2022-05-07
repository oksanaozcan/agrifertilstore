<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fertilizer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function cultures()
    {
      return $this->hasMany(Culture::class, 'fertilizer_id', 'id');
    }
  
}
