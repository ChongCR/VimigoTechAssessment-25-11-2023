<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Imports\StudentsImport;
use Illuminate\Http\Request;
use app\Export\StudentExport;
use Maatwebsite\Excel\Facades\Excel;


class ImportController extends Controller
{

    public function index()
    {
        return view('Student.studentImport');
    }

    public function import(Request $request)
    {
        $request->validate([
            'operation' => 'required|in:insert,update,delete',
            'file' => 'required|file|mimes:csv,xlsx',
        ]);

        $operation = $request->input('operation');

        $file = $request->file('file');

        try {
            Excel::import(new StudentsImport($operation), $file);

            return redirect()->back()->with('success', 'Import Action completed successfully.');

        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Error importing data, please check your format.');
        }
    }
}
