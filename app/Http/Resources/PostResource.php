<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' =>$this->id,
            'category_uz' =>$this->name_uz,
            'title_uz' =>$this->title_uz,
            'title_ru' =>$this->title_ru,
            'views' =>$this->views,


        ];
    }
}
