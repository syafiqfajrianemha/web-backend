<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Exception;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getAllStudents()
    {
        $students = Student::all();

        return response()->json([
            'error' => false,
            'message' => 'Students fetched successfully',
            'listStudent' => $students
        ], 200);
    }

    public function addNewStudent(Request $request)
    {
        try {
            Student::create([
                'nim'       => $request->input('nim'),
                'name'      => $request->input('name'),
                'gender'    => $request->input('gender'),
                'major'     => $request->input('major'),
                'expertise' => $request->input('expertise')
            ]);

            return response()->json([
                'error' => false,
                'message' => 'Student successfully added',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 422);
        }
    }

    public function detailStudent($id)
    {
        try {
            $student = Student::findOrFail($id);

            return response()->json([
                'error' => false,
                'message' => 'Student fetched successfully',
                'student' => $student
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 404);
        }
    }

    public function updateStudent(Request $request, $id)
    {
        try {
            $student = Student::findOrFail($id);

            $student->update([
                'nim'       => $request->input('nim'),
                'name'      => $request->input('name'),
                'gender'    => $request->input('gender'),
                'major'     => $request->input('major'),
                'expertise' => $request->input('expertise')
            ]);

            return response()->json([
                'error' => false,
                'message' => 'Student successfully updated',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 401);
        }
    }

    public function deleteStudent($id)
    {
        try {
            $student = Student::findOrFail($id);

            Student::destroy($student->id);

            return response()->json([
                'error' => false,
                'message' => 'Student successfully deleted',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 404);
        }
    }
}
