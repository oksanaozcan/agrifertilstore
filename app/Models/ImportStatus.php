<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportStatus extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function culture()
    {
      return $this->belongsTo(Culture::class);
    }


}
