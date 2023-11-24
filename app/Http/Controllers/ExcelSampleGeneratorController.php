<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Concerns\Exportable;

use App\Exports\StudentExport;

use Maatwebsite\Excel\Facades\Excel;

class ExcelSampleGeneratorController extends Controller
{
    public function generateExcel()
    {
        $data = [
            ['Name', 'Email', 'Address', 'Course'],
            ['Chong Chun Rock', 'chongcr-wm20@student.tarc.edu.mym', 'Rawang', 'FOCS'],
            ['Rock Chong', 'chongcr128@gmail.com', 'Rawang', 'FOCS'],
        ];

        return Excel::download(new StudentExport($data), 'students.xlsx');
    }

}
