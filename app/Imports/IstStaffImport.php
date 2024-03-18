<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class IstStaffImport implements ToCollection , WithHeadingRow, WithChunkReading
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $user = User::create([
                'email' => $row['email'],
                'password' => $row['password'],
                'role_id' => $row['role_id'],


            ]);


            $user->instructor()->create([
                'first_name' => $row['first_name'],
                'middle_name' => $row['middle_name'],
                'last_name' => $row['last_name'],
                'email' => $row['email'],
                'phone_number' => $row['phone_number'],
                'status' => $row['status'],
                'department_id' => $row['department_id'],
                'gender' => $row['gender'],
                'teaching_course_name' => $row['teaching_course_name'],
            ]);
        }
    }

    public function chunkSize(): int
    {

        return 5000;
    }
}
