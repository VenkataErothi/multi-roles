<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Livewire\WithPagination;
use Livewire\Component;

   
class UserController extends Controller
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $name, $email, $password,$role;
   
    protected function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required'
            
        ];
    }

    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(3);
        return view('users.index',compact('data'));
            
    }
   
    public function create()
    {
        return view('users.create');
    }
   
     public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|unique:users',
            'email' => 'required|email|unique:users',
            'password'=>'required|min:6|max:12',
            'role' => 'required'
            
        ]);
        $user= new User;
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('users.index')->with('success','User has been created successfully.');
    }
   
}


