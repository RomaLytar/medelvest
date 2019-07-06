<?php

namespace App\Model;

use App\Model\Configuration;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Color extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = ['title', 'price', 'type', 'configuration_id'];

    public function configuration()
    {
        return $this->belongsTo(Configuration::class);
    }
    public function registerMediaCollections()
    {
        $this->addMediaCollection('posters')->registerMediaConversions(function (Media $media) {
            $this->addMediaConversion('thumb')->fit(Manipulations::FIT_CROP, 75, 75);
            $this->addMediaConversion('preview')->fit(Manipulations::FIT_CROP, 420, 275);
        });
    }
}
