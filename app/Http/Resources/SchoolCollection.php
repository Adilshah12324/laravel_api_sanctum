<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SchoolCollection extends ResourceCollection
{
    public static $wrap = 'schools';

    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'links'      => [],
            'meta'       => [],
            static::$wrap=> $this->collection,
        ];
    }
}
