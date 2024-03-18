<?php

namespace App\Imports;

use App\Models\Subject;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class IstSubjectImport implements ToCollection, WithHeadingRow, WithChunkReading
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        Subject::create([
            'semester_id' => $collection['semester_id'],
            'department_id' => $collection['department_id'],
            'subject_name' => $collection['subject_name'],
            'subject_course_code' => $collection['subject_course_code'],

        ]);
    }


    public function chunkSize(): int
    {

        return 5000;
    }
}
