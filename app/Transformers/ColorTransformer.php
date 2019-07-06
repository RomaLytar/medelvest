<?php
namespace App\Transformers;
use App\Model\Color;
use League\Fractal\TransformerAbstract;
use Spatie\MediaLibrary\Models\Media;
class ColorTransformer extends TransformerAbstract
{
    public function transform(Color $color)
    {
        return [
            'title' => $color->title,
            'price' => $color->price,
            'type' => ($color->type == 'body_color' ? 'Цвет корпуса' : 'Цвет профился' ),
            'image' => $color->getFirstMediaUrl('posters', 'preview'),
        ];
    }
}