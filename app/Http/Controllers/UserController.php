<?php
namespace App\Http\Controllers;

use App\model\Gender;
use App\model\UserCover;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     function __construct()
    {
         $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $data = User::where('is_active',1)->orderBy('id','DESC')->paginate(5);
        return view('admin.user-index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        $base = UserCover::all();
        $gender = Gender::all();
        return view('admin.user-create',compact('roles','base','gender'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'cover_id' => 'required',
            'gender_id' => 'required',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        if($request->hasFile('profile')) {
            $file         = $request->profile;
            $timestamp    = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name         = $timestamp. '-' .$file->getClientOriginalName();
            $input['img']  = $name;
            $file->move(public_path('/images'), $name);
        }
        $user = User::create($input);
        $user->assignRole($request->input('roles'));


        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $base = UserCover::all();
        $gender = Gender::all();

        return view('admin.user-edit',compact('user','roles','userRole','base','gender'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required|same:confirm-password',
            'cover_id' => 'required',
            'gender_id' => 'required',
            'roles' => 'required'
        ]);
        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));
        }
         if($request->hasFile('profile')) {
            $file         = $request->profile;
            $timestamp    = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name         = $timestamp. '-' .$file->getClientOriginalName();
            $input['img']  = $name;
            $file->move(public_path('/images'), $name);
        }
        $user = User::find($id);
        $user->update($input);
          $user->assignRole($request->input('roles'));
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}
