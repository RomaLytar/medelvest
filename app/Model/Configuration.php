<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Configuration extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = ['title'];

    public function colors()
    {
        return $this->belongsTo(Color::class, 'configuration_id');
    }
    public function facades()
    {
        return $this->belongsTo(Facade::class, 'configuration_id');
    }

    public function dimension()
    {
        return $this->belongsTo(Dimension::class);
    }
    public function registerMediaCollections()
    {
        $this->addMediaCollection('posters')->registerMediaConversions(function (Media $media) {
            $this->addMediaConversion('thumb')->fit(Manipulations::FIT_CROP, 100, 100);
            $this->addMediaConversion('preview')->fit(Manipulations::FIT_CROP, 420, 275);
        });
    }
}
