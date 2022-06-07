<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Student;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilterCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 


    Student::where(function($query){

            if($request->class)
                $query->where('class',$request->class);
        })->get();


    $students = Student::join('student_payments','student_payments.student_id','students.id')
->select('students.*',DB::raw('SUM(student_payments.amount) as tot_amount'))
->groupBy('students.id')
->orderBy('students.id','asc')
->paginate(3);

      
return view('filter.filter', compact('students'));
    
       
    
}
}
    /**
     * Show the form for creating a new resource.
     *
     *

