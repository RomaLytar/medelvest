<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Configuration;

class Facade extends Model
{
    const getFacadeSelection = 'Выбор фасада';
    const getAdditionalComponentsn = 'Дополнительные компоненты';

    protected $fillable = ['title', 'price', 'type', 'configuration_id'];
    public function configuration()
    {
        return $this->belongsTo(Configuration::class);
    }

}
