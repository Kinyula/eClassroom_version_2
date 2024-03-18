<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class StudentImport implements ToCollection, WithHeadingRow, WithChunkReading
{
    private $students;

    public function __construct()
    {
        $this->students = User::with(['student'])->get(['id','email'])->pluck('id', 'email');

    }
    /**
     * @param array $row

     *
     * @return \Illuminate\Database\Eloquent\Model|null

     *
     */
    public function collection(Collection $rows)
    {

        foreach ($rows as $row)
        {
          $user =  User::create([
                'email' => $row['email'],
                'password' => $row['password'],
                'role_id' => $row['role_id'],


            ]);

             $user->student()->create([
                'first_name' => $row['first_name'],
                'middle_name' =>$row['middle_name'],
                'last_name' =>$row['last_name'],
                'email' => $row['email'],
                'phone_number' => $row['phone_number'],
                'status' => $row['status'],
                'department_name' =>$row['department_name'],
                'gender' =>$row['gender'],
                'course_name' => $row['course_name'],
            ]);
        }
    }

    public function chunkSize(): int
    {

        return 5000;
    }
}
