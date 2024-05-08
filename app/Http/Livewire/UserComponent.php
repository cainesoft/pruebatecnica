<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Crypt;
class UserComponent extends Component
{
    use WithPagination;
    public $accion='';
    public $modalUser=false;
    public $search;
    public $nameedit; 
    public $showtable=0;
    public $name, $email, $phone_number,$password,$lastname,$user_id;
    public function render()
    {
        $currentUser = auth()->user();
        if($this->showtable==0){

        $users = User::where('name', 'LIKE', "%{$this->search}%")->where('created_by', $currentUser->id)->where('status',0)->orderByDesc('id')->paginate(5);
        return view('livewire.user-component', compact('users'));
        }
        else{

            $users = User::where('name', 'LIKE', "%{$this->search}%")->where('created_by', $currentUser->id)->where('status',1)->orderByDesc('id')->paginate(5);
            return view('livewire.user-component', compact('users'));
         }
       
    }

  public function openUserModal(){
    $this->reset('accion', 'name','lastname','email','phone_number','password','user_id');
    $this->accion = "add";
    $this->modalUser=true;
  }
  public function closeUserModal(){
    $this->reset('accion', 'name','lastname','email','phone_number','password','user_id');
    $this->modalUser=false;
  }


    public function StoreUser(){
        $fields =$this->validate([
            'name'=>'required|string',
            'lastname'=>'required|string',
            'email'=>'required|email|unique:users,email',
            'phone_number'=>'required|numeric',
            'password'=>'required|string',
        ]);

        $user = User::create([
            'name'=>$fields['name'],
            'lastname'=>$fields['lastname'],
            'email'=>$fields['email'],
            'phone_number'=>$fields['phone_number'],
            'password'=>bcrypt($fields['password']),
            'status'=>0,
            'created_by' => Auth::user()->id,
        ]);
        $this->closeUserModal();
  }


    public function editUser(User $user){

        $this->openUserModal();
       
        $this->accion = "edit";
        $this->nameedit=$user->name;
        $this->user_id=$user->id;
        $this->name=$user->name;
        $this->lastname=$user->lastname;
        $this->email=$user->email;
        $this->phone_number=$user->phone_number;
    }
    public function updateUser()
    {
        $user = User::find($this->user_id);
        $user->update([
            'name'=>$this->name,
            'lastname'=>$this->lastname,
            'email'=>$this->email,
            'phone_number'=>$this->phone_number,
            'password'=>bcrypt($this->password),
        ]);
       
        $this->closeUserModal();
    }

     
    public function deleteUser($id){
        $bus =  User::find($id);
        $bus->update([
            'status'=>1,
            'date_removal'=>Carbon::now(),
        ]);
    }
    public function recoverUser($id){
        $bus =  User::find($id);
        $bus->update([
            'status'=>0,
            'date_removal'=>Null,
        ]);  
    }
 

 
}
