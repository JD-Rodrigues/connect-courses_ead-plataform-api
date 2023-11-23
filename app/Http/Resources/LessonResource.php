<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        

        return [
            'id' => $this->id,
            'module_id' => $this->module_id,
            'name' => $this->name,
            'description' => $this->description,
            'video' => $this->video,
            'url' => $this->url,        
        ];
    }
}
