<?php
namespace App\Http\Controllers;
use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;
class PaymentCRUDController extends Controller
{
public function index(Request $request)
{
 //'test';
$payments = Payment::join('students', 'students.id', '=', 'student_payments.student_id')->orderBy('student_payments.id','asc') 

->Paginate(5);   

   

    // ->get();

return view('payments.index', compact('payments'));

 // ->with('i', ($request->input('page', 1) - 1) * 2);

}

public function create()
{
	 $students=Student::all();
return view('payments.create',compact('students'));
}
public function store(Request $request)
{

    $request->validate([

        'student_id' => 'required',
        'date' => 'required',
        'amount' => 'required',
        // 'confirmed' => 'required',
 

    ]);
      

     
    // $payments=Payment::where('student_id',$request->student_id)->count();

    // if($payments > 0)
    // {

    //     Payment::where('student_id',$request->student_id)->increment('amount',$request->amount);

    //     // $payments->amount = $request->amount;
    //     // $payments->save();


    // }
    // else
    // {
    //        Payment::create($request->all());
    // }

    Payment::create($request->all());
 


    return redirect()->route('payments.index')->with('success','successfully paid');
}
public function edit(Payment $payments)
{


    



    
    $payments = Payment::join('students', 'students.id', '=', 'student_payments.student_id')->orderBy('student_payments.id','asc')
    
        ->select('students.first_name','students.last_name','student_payments.date','student_payments.amount','student_payments.id','student_payments.confirmed')
        ->get();

    return view('payments.edit', compact('payments'));
}



public function show(Payment $payment)
{
    $payment->confirmed = 1;
    $payment->update();
    
    return back()->with('success','successfully confirmed');


}

}