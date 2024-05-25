<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(Request $request, $id){
        $fields = [];
        $subject = Subject::query()->where('student_id','=',$id);
        //$subject2 = Subject::selectRaw('prelims, midterms, prefinals, finals, SUM(prelims + midterms + prefinals + finals) / 4 as average')->where('student_id','=',$id)->get();
        // $data = $subject->get() . $average;
        // $ids = $subject->id;
        // $student_id = $subject->select('student_id');
        // $merge = $ids->merge($student_id);
        $data = [
            // 'data' => Subject::query()->where('student_id','=',$id)->get(),
            // 'grades' => Subject::query()->select('prelims', 'midterms', 'prefinals', 'finals')->where('student_id','=',$id)->get(),



        ];

        if ($request->get('sort') && $request->get('direction')) {
            $subject->orderBy($request->get('sort'), $request->get('direction'));
        }
        if ($request->get('search')) {
            $subject->where('name', 'like', "{$request->get('search')}%")
                ->orWhere('instructor', 'like', "{$request->get('search')}%");
        }
        if ($request->get('limit')) {
            $subject->limit($request->get('limit'));
        }
        if ($request->get('offset')) {
            $subject->offset($request->get('offset'))->limit(PHP_INT_MAX);
        }
        if ($request->get('fields')) {
            $fields = explode(',', $request->get('fields'));
        }
        if ($request->get('remarks')) {
            $result =[];
            $average = $subject->get('average');
            $average;
            foreach ($average as $key => $value) {
                if($average[$key]->average > 3.00){
                    $result[$key] = "FAILED";
                }
                else if($average[$key]->average <= 3.00){
                    $result[$key] = "PASSED";
                };
            }
            return $result;
        }
        return response()->json($fields ? $subject->get($fields) : $subject->get());
    }
}
