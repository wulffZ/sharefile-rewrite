<?php

namespace App\Http\Resources;

use App\Models\Software;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SoftwareResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'items' => collect($this->items())->map(function (Software $softwareItem) {
                return [
                    'id' => $softwareItem->id,
                    'user_id' => $softwareItem->user_id,
                    'title' => $softwareItem->title,
                    'description' => $softwareItem->description,
                    'size' => $softwareItem->size,
                    'file_uri' => $softwareItem->file_uri,
                    'thumbnail_uri' => $softwareItem->thumbnail_uri,
                    'soft_delete' => $softwareItem->soft_delete,
                    'times_downloaded' => $softwareItem->times_downloaded,
                    'created_at' => $softwareItem->created_at,
                    'user' => $softwareItem->user,
                ];
            }),
            'links' => $this->resource
        ];
    }
}
