<?php

namespace App\Dto;

use App\Http\Requests\Client\GetClientRequest;
use Spatie\LaravelData\Data;

class GetClientDto extends Data
{
   public string $uuid;

   public static function fromRequest(GetClientRequest $request): self
   {
       return self::from([
          'uuid' => $request['uuid'],
       ]);
   }
}
