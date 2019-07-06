<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    protected $fillable = ['width', 'height', 'depth', 'type_id'];

    public function type()
    {
        return $this->belongsTo(Slidingdoors::class);
    }
}
