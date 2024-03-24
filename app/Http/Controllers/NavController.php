<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class NavController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function user()
    {
        $limit = 10;
        $users = User::paginate($limit);

        return view('user', compact('users'));
    }

    public function userSearch(Request $request)
    {
        $request->validate([
            'keyword' => 'required'
        ]);

        $keyword = $request->keyword;
        $users = User::where('name', 'LIKE', '%' . $keyword . '%')->paginate(10);
        $users->appends($request->all());

        return view('user', compact('users'));
    }

    public function student()
    {
        $limit = 10;
        $students = Student::paginate($limit);

        return view('student', compact('students'));
    }

    public function studentCreate()
    {
        return view('studentcreate');
    }

    public function studentStore(Request $request)
    {
        $request->validate([
            'nim'       => 'required|numeric',
            'name'      => 'required',
            'gender'    => 'required',
            'major'     => 'required',
            'expertise' => 'required'
        ]);

        $expertise = implode(', ', $request->expertise);

        Student::create([
            'nim'       => $request->nim,
            'name'      => $request->name,
            'gender'    => $request->gender,
            'major'     => $request->major,
            'expertise' => $expertise
        ]);

        return redirect()->route('student')->with('message', 'Student has been created');
    }

    public function studentEdit($id)
    {
        $student = Student::findOrFail($id);

        return view('studentedit', compact('student'));
    }

    public function studentUpdate(Request $request, $id)
    {
        $request->validate([
            'nim'       => 'required|numeric',
            'name'      => 'required',
            'gender'    => 'required',
            'major'     => 'required',
            'expertise' => 'required'
        ]);

        $student = Student::findOrFail($id);
        $expertise = implode(', ', $request->expertise);

        $student->update([
            'nim'       => $request->nim,
            'name'      => $request->name,
            'gender'    => $request->gender,
            'major'     => $request->major,
            'expertise' => $expertise
        ]);

        return redirect()->route('student')->with('message', 'Student has been updated');
    }

    public function deleteStudent($id)
    {
        $student = Student::findOrFail($id);

        Student::destroy($student->id);

        return redirect()->route('student')->with('message', 'Student has been deleted');
    }

    public function studentSearch(Request $request)
    {
        $request->validate([
            'keyword' => 'required|numeric'
        ]);

        $keyword = $request->keyword;
        $students = Student::where('nim', 'LIKE', '%' . $keyword . '%')->paginate(10);
        $students->appends($request->all());

        return view('student', compact('students'));
    }
}
