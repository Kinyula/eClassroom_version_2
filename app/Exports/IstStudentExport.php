<?php

namespace App\Exports;


use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class IstStudentExport implements FromCollection , WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::with(['user'])->where('department_name', 'INFORMATION SYSTEMS AND TECHNOLOGY DEPARTMENT')->get();
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

    public function map($Student): array
    {
        return [
            $Student->id,
            $Student->first_name,
            $Student->middle_name,
            $Student->last_name,
            $Student->email,
            $Student->phone_number,
            $Student->gender,
            $Student->status,
            $Student->department_name,
            $Student->created_at,
            $Student->updated_at,

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
