<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RecordsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function ($model) {
                return [
                    'id' => $model->id,
                    'title' => $model->title,
                    'date' => $model->date_modified->format('Y-m-d'),
                ];
            }),
        ];
    }

    public function with($request) {
        return [
            'version' => "1.0.0",
        ];
    }
}
