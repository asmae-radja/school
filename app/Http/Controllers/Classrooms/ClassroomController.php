<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index()
    {
        $grades = Grade::all();
        return view('pages.classrooms.classrooms',compact('grades'));
    }
}
