<?php

namespace App\Repository\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DownloadUserRepository implements FromCollection, WithHeadings
{
    private array $columns;
    private string $startDate;
    private string $endDate;

    public function __construct(array $columns, string $startDate, string $endDate)
    {
        $this->columns = $columns;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function collection(): Collection
    {
        return User::query()->whereBetween('created_at', [$this->startDate, $this->endDate])->get();
    }

    public function headings(): array
    {
        return $this->columns;
    }


}
