<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Culture extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Filterable;

    protected $guarded = [];
    protected $with = ['fertilizer'];

    public function fertilizer() {              
      return $this->belongsTo(Fertilizer::class, 'fertilizer_id', 'id');
    }

    public function tags()
    {
      return $this->belongsToMany(Tag::class, 'culture_tags', 'culture_id', 'tag_id');
    }    
}
