<?php

namespace App\Http\Controllers\grades;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGradeRequest;
use App\Models\Grade;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::all();
        return view('pages.grades.grades', compact('grades'));
    }

    public function store(StoreGradeRequest $request)
    {
        
        if (Grade::where('name->ar', $request->name_ar)->orWhere('name->en', $request->name_en)->exists()) {
            return redirect()->back()->withErrors(trans('grades_trans.name_exists'));
        }

        try {
            $validated = $request->validated();
            /*    
             $grade = New Grade();
            $grade->name = ['en' => $request->name_en , 'ar' => $request->name_ar];
            $grade->notes = $request->notes;
            $grade->save();
     */
            Grade::create([
                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'notes' => $request->notes,
            ]);
            toastr()->success(trans('messages.success'));
            return redirect()->route('grades.index');
        } 
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(StoreGradeRequest $request)
    {
        try {
            $validated = $request->validated();
            $grade = Grade::findOrFail($request->id);
            $grade->update([
                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'notes' => $request->notes,
            ]);
            toastr()->success(trans('messages.update'));
            return redirect()->route('grades.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        $grade = Grade::findOrFail($request->id)->delete();
        toastr()->success(trans('messages.delete'));
        return redirect()->route('grades.index');
    }
}
