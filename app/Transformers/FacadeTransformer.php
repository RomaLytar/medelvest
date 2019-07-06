<?php
namespace App\Transformers;
use App\Model\Facade;
use League\Fractal\TransformerAbstract;
use Spatie\MediaLibrary\Models\Media;
class FacadeTransformer extends TransformerAbstract
{
    public function transform(Facade $facade)
    {
        return [
            'title' => $facade->title,
            'price' => $facade->price,
            'type' => ($facade->type == 'facade_selection' ? 'Выбор фасада' : 'Доп-комплектации' ),
        ];
    }
}