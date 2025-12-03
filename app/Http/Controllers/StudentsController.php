<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    // GET /students
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => Student::all()
        ]);
    }

    // POST /students
    public function store(Request $request)
    {
        $student = Student::create($request->only(['name', 'age', 'major']));

        return response()->json([
            'success' => true,
            'data' => $student
        ]);
    }

    // GET /students/{id}
    public function show($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                'success' => false,
                'message' => 'Student not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $student
        ]);
    }

    // PUT /students/{id}
    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                'success' => false,
                'message' => 'Student not found'
            ], 404);
        }

        $student->update($request->only(['name', 'age', 'major']));

        return response()->json([
            'success' => true,
            'data' => $student
        ]);
    }

    // DELETE /students/{id}
    public function destroy($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                'success' => false,
                'message' => 'Student not found'
            ], 404);
        }

        $student->delete();

        return response()->json([
            'success' => true,
            'message' => 'Student deleted'
        ]);
    }
}
