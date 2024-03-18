<?php

namespace App\Exports;

use App\Models\Instructors;
use Maatwebsite\Excel\Concerns\FromCollection;

class CseStaffExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Instructors::with(['user'])->where('department_id', '2')->get();
    }

    public function headings(): array
    {
        return [
            'id',
            'first_name',
            'middle_name',
            'last_name',
            'email',
            'phone_number',
            'gender',
            'status',
            'department_name',
            'created_at',
            'updated_at'
        ];
    }

    public function map($Staff): array
    {
        return [

            $Staff->id,
            $Staff->first_name,
            $Staff->middle_name,
            $Staff->last_name,
            $Staff->email,
            $Staff->phone_number,
            $Staff->gender,
            $Staff->status,
            $Staff->department_name,
            $Staff->created_at,
            $Staff->updated_at,

        ];
    }

    public function fields(): array
    {
        return [
            'id',
            'first_name',
            'middle_name',
            'last_name',
            'email',
            'phone_number',
            'gender',
            'status',
            'department_name',
            'created_at',
            'updated_at'
        ];
    }
}
