<?php
namespace App\Transformers;
use App\Model\Dimension;
use League\Fractal\TransformerAbstract;
use Spatie\MediaLibrary\Models\Media;
class DimensionTransformer extends TransformerAbstract
{
    public function transform(Dimension $dimension)
    {
        return [
            'width' => $dimension->width,
            'height' => $dimension->height,
            'depth' => $dimension->depth,
        ];
    }
}