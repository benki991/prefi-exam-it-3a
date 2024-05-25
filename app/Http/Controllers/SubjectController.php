<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(Request $request, $id){
        $subject = Subject::query()->where('student_id','=',$id)->get();
        $subject2 = Subject::selectRaw('SUM(prelims + midterms + prefinals + finals) / 4 as average')->where('student_id','=',$id)->get();
        // $data = $subject->get() . $average;
        $data = [
            // 'data' => Subject::query()->where('student_id','=',$id)->get(),
            // 'grades' => Subject::query()->select('prelims', 'midterms', 'prefinals', 'finals')->where('student_id','=',$id)->get(),
            'id' => $subject->select('id', 'student_id', 'subject_code', 'name', 'description', 'instructor', 'schedule') . $subject->select('prelims', 'midterms', 'prefinals', 'finals'),
        ];
        return response($data);
    }
}
