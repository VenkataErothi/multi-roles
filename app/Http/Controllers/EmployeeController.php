<?php

namespace App\Http\Controllers;
use Livewire\WithPagination;
use App\Models\Employee;
use Session;
use Illuminate\Http\Request;
use Livewire\Component;


class EmployeeController extends Controller
{
    
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $employeeID, $first_name, $last_name,$start_date, $skills,$employee_id;
    protected function rules()
    {
        return [
            'employeeID' => 'required|numeric',
            'first_name' => 'required|string|min:3|max:10',
            'last_name' => 'required|string|min:3|max:8',
            'start_date' => 'required|date',
            'skills' => 'required',
        ];
    }

    public function index()
    {
        $employees = Employee::orderBy('id','desc')->paginate(5);
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }
    
     public function store(Request $request)
    {
        $request->validate([
            'employeeID' => 'required|numeric|unique:employees',
            'first_name' => 'required|min:3|max:10|unique:employees',
            'last_name' => 'required|min:3|max:8|unique:employees',
            'start_date' => 'required|date',
            'skills' => 'required',
        ]);
        $employee= new Employee;
        $employee->employeeID=$request['employeeID'];
        $employee->first_name=$request['first_name'];
        $employee->last_name=$request['last_name'];
        $employee->start_date=$request['start_date'];
        $employee->created_by=Session::get('user_id');
        $employee->skills=$request['skills'];
        $employee->save();

        return redirect()->route('employees.index')->with('success','Employee has been created successfully.');
    }
   
    
   public function show($id)
{
       $employee=Employee::find($id);
       return view('employees.show',['employee'=>$employee]);
}
     
     public function edit($id){
         $employee=Employee::find($id);

         return view('employees.edit',['employee'=>$employee]);
        
     }
    
     public function update(Request $request){

    $request->validate([
            'employeeID'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'start_date'=>'required',
            'skills'=>'required'
        ]);
    $employee = Employee::find($request->id);
    $employee->employeeID=$request->employeeID;
    $employee->first_name=$request->first_name;
    $employee->last_name=$request->last_name;
    $employee->start_date=$request->start_date;
    $employee->skills=$request->skills;
    $employee->save();
     return redirect()->route('employees.index')->with('success', 'Employee Updated!');
    
}
    public function search(Request $request){
	$query = $request->only('search');
	$results=\DB::table('employees')->where('first_name', 'like', '%'.$query['search'].'%') 
	              ->orwhere('last_name', 'like', '%'.$query['search'].'%')
	              ->orwhere('skills', 'like', '%'.$query['search'].'%')  
	             ->get();
	return response()->json($results);    
}
   }
       











