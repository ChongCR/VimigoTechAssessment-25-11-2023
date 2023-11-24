<?php

namespace App\Imports;

use App\Models\Students;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    private $operation;

    public function __construct($operation = 'insert')
    {
        $this->operation = $operation;
    }

    public function model(array $row)
    {
        if ($this->operation === 'update') {
            $student = Students::where('email', $row[1])->first();

            if ($student) {
                $student->update([
                    'name' => $row[0],
                    'address' => $row[2],
                    'course' => $row[3],
                ]);
            }
        } elseif ($this->operation === 'delete') {
            $student = Students::where('email', $row[1])->first();

            if ($student) {
                $student->delete();
            }
        } else {
            return new Students([
                'name' => $row[0],
                'email' => $row[1],
                'address' => $row[2],
                'course' => $row[3],
            ]);
        }
    }
}
