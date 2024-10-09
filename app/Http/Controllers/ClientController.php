<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\GetClientRequest;
use App\Services\Vendor\ClientService;

class ClientController extends Controller
{
    public function getClient(GetClientRequest $request, ClientService $clientService)
    {
        $tokenId = $request->user()->token()->id;
        $id = $request->user()->id;

        return $clientService->run($id, $tokenId);
    }
}
