<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\DownloadUserRequest;
use App\Services\User\DownloadUserService;
use Symfony\Component\HttpFoundation\BinaryFileResponse;


class UserController extends Controller
{
    public function getAllUsers(DownloadUserRequest $request, DownloadUserService $service): BinaryFileResponse
    {
        return $service->run($request);
    }
}
