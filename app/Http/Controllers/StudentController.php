<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\StudentResource;


class StudentController extends Controller
{
    public function backToIndex()
    {
        if (Auth::check()) {
            $totalStudents = Students::count();
            return view('index', compact('totalStudents'));
        } else {
            return redirect()->route('login');

        }
    }

    public function index()
    {
        $students = Students::simplePaginate(5);
        $totalStudents = Students::count();
        return view('Student/studentList', compact('students', 'totalStudents'));
    }

    public function getStudentDetails($id)
    {
        $students = Students::find($id);

        if (!$students) {
            return response()->json(['message' => "Student not found."], 404);
        }

        $studentResource = new StudentResource($students);

        return view('Student.studentRetrieve', ['studentResource' => $studentResource]);
    }


    public function createStudent()
    {
        return view('Student/studentCreate');
    }

    public function storeStudent(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'address' => 'required|string|max:255',
            'course' => 'required|string|max:255',
        ]);

        // Create a new student
        Students::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'course' => $request->input('course'),
        ]);


        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }


    public function search(Request $request)
    {
        if($request->ajax()) {
            $output = "";

            $students = Students::where('name', 'LIKE', '%' . $request->search . "%")
                ->orWhere('email', 'LIKE', '%' . $request->search . "%")
                ->get();

            if($students) {
                foreach ($students as $key => $student) {
                    $output .= '<tr>'.
                        '<td>'.($key + 1).'</td>'.
                        '<td>'.htmlspecialchars($student->name, ENT_QUOTES, 'UTF-8').'</td>'.
                        '<td>'.htmlspecialchars($student->email, ENT_QUOTES, 'UTF-8').'</td>'.
                        '<td>'.htmlspecialchars($student->course, ENT_QUOTES, 'UTF-8').'</td>'.
                        '<td>'.
                        '<a href="/index/studentManagement/details/'.$student->id.'" class="btn btn-info btn-sm">View</a> '.
                        '<a href="/index/studentManagement/edit/'.$student->id.'" class="btn btn-warning btn-sm">Edit</a> '.
                        '<form action="/index/studentManagement/delete/'.$student->id.'" method="POST" style="display:inline;">'.
                        '<input type="hidden" name="_token" value="'.csrf_token().'">'.
                        '<input type="hidden" name="_method" value="DELETE">'.
                        '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')">Delete</button>'.
                        '</form>'.
                        '</td>'.
                        '</tr>';
                }
                return Response($output);
            }
        }
    }


    public function editStudentDetails($id)
    {
        $student = Students::find($id);

        if (!$student) {
            return response()->json(['message' => "Student not found."], 404);
        }

        $studentResource = new StudentResource($student);

        return view('Student/studentUpdate', compact('studentResource'));
    }

    public function updateStudentDetails(Request $request, $id)
    {
        $students = Students::find($id);

        if (!$students) {
            return response()->json(['message' => "Student not found."], 404);
        }

        // Update only the relevant fields
        $students->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'course' => $request->input('course'),
        ]);

        return redirect()->route('students.index')->with('success', 'Student details updated successfully.');

    }


    public function deleteStudentDetails($id)
    {
        $student = Students::find($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student record has been deleted.');
    }
}
