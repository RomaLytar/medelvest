<?php
namespace App\Transformers;
use App\Model\Color;
use App\Model\Facade;
use App\Model\Configuration;
use League\Fractal\TransformerAbstract;
use Spatie\MediaLibrary\Models\Media;
class ConfigurationTransformer extends TransformerAbstract
{
    public function transform(Configuration $configuration)
    {
        return [
            'title' => $configuration->title,
            'image' => $configuration->getFirstMediaUrl('posters', 'preview'),
        ];
    }
    public function includeColor(Color $color) {
        return $this->collection($color->configuration(), new ColorTransformer);
    }
    public function includeFacade(Facade $facade) {
        return $this->collection($facade->configuration(), new FacadeTransformer);
    }
//    public function includeDimension(Facade $facade) {
//        return $this->collection($facade->configuration(), new FacadeTransformer);
//    }
}