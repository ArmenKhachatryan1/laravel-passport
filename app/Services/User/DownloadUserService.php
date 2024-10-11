<?php

namespace App\Services\User;

use App\Http\Requests\User\DownloadUserRequest;
use App\Repository\User\DownloadUserRepository;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

readonly class DownloadUserService
{
    public function run(DownloadUserRequest $request): BinaryFileResponse
    {
        $columns = $request->input('column');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $fileName = 'users.' . $request->getFileFormat();

        return FacadesExcel::download(new DownloadUserRepository($columns, $startDate, $endDate), $fileName);
    }

}
