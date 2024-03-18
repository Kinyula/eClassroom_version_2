<?php

namespace App\Exports;

use App\Models\Instructors;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EteStaffExport implements FromCollection , WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Instructors::with(['user', 'department'])->where('department_id', '1')->get();
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
            $Staff->department->department_name,
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
