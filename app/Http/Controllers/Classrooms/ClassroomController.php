<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassroomRequest;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index()
    {
        $grades = Grade::all();
        $classrooms = Classroom::all();
        return view('pages.classrooms.classrooms', compact('grades', 'classrooms'));
    }
    public function store(StoreClassroomRequest $request)
    {
        $List_Classes = $request->List_Classes;
        try {

            $validated = $request->validated();
            foreach ($List_Classes as $List_Class) {

                Classroom::create([
                    'name' => ['en' => $List_Class['name_en'], 'ar' => $List_Class['name_ar']],
                    'grade_id' => $List_Class['grade_id'],
                ]);
            }

            toastr()->success(trans('messages.success'));
            return redirect()->route('classrooms.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request)
    {
        try {
            // $validated = $request->validated();
            $classroom = Classroom::findOrFail($request->id);
            $classroom->update([
                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'notes' => $request->notes,
            ]);
            toastr()->success(trans('messages.update'));
            return redirect()->route('classrooms.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        $classroom = Classroom::findOrFail($request->id)->delete();
        toastr()->success(trans('messages.delete'));
        return redirect()->route('classrooms.index');
    }
}
