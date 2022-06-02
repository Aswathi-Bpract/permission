<?php
namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class StudentCRUDController extends Controller
{


function __construct(){

         $this->middleware('admin');
            // ,['create','store','show']);

}

    //  function __construct()
    // {
    //      $this->middleware('permission:student-list', ['only' => ['index','show']]);
    //      $this->middleware('permission:student-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:student-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:student-delete', ['only' => ['destroy']]);
    // }

public function index()
{
    //return ;
$students = Student::join('student_payments','student_payments.student_id','students.id')
->select('students.*',DB::raw('SUM(student_payments.amount) as tot_amount'))
->groupBy('students.id')
->orderBy('students.id','asc')
->paginate(3); 
// ->paginate(5);

// ->get();

//return $students;
return view('students.index', compact('students'));
  
}

public function create()
{
return view('students.create');
}
public function store(Request $request)
{

 
    $request->validate([

        'first_name' => 'required',
        'last_name' => 'required',
        'dob' => 'date',
        'is_ncc' => 'required',
        'class' => 'required',

    ]);


    Student::create($request->all());


    return redirect()->route('students.index')->with('success','Student added successfully');
}


// public function show(Student $student)
// {
// return view('students.show',compact('student'));
// } 


public function edit(Student $student)
{
    
return view('students.edit',compact('student'));
}


public function update(Request $request, $id)
{

$request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'dob' => 'required',
        'is_ncc' => 'required',
        'class' => 'required',

]);
$student = Student::find($id);
$student->first_name = $request->first_name;
$student->last_name = $request->last_name;
$student->dob = $request->dob;
$student->is_ncc = $request->is_ncc;
$student->class = $request->class;
$student->save();
return redirect()->route('students.index')->with('success','students Has Been updated successfully');
}

public function destroy(Student $student)
{
$student->delete();
return redirect()->route('students.index')
->with('success','student has been deleted successfully');
}
public function indexNew(Student $student)
{
     $payments = Payment::join('students', 'students.id', '=', 'student_payments.student_id')->orderBy('student_payments.id','asc')
            ->select('students.first_name','students.last_name','students.class',
                    'students.dob','students.is_ncc','student_payments.amount',
                    'student_payments.confirmed')
            ->get();


return view('payments.index1',compact('payments'));

      
    

}

}

