<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use DB;
use Hash;
use Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $users = User::orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $roles = Role::pluck('display_name','id');
        return view('users.create',compact('roles')); //return the view with the list of roles passed as an array
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'roles' => 'required',
            'is_verified' =>'required'
        ]);
////        cach 1
//        $input = $request->only('name', 'email', 'password','is_verified','profpho');
//        $input['password'] = Hash::make($input['password']); //Hash password
//  
//        $user = User::create($input);
//        $user->is_verified = 1;
//        $user->save();
//          cach 2
        $user = new User();  
	$user->name = $request->name;
	$user->email = $request->email; 
        $user->password = Hash::make($request->password);
	$user->is_verified = 1;
	$user->save();
	 
        
        //Attach the selected Roles
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }
        return redirect()->route('users.index')
            ->with('success','User created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
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
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::get(); //get all roles
        $userRoles = $user->roles->pluck('id')->toArray();
        return view('users.edit',compact('user','roles','userRoles'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'confirmed',
            'roles' => 'required'
        ]);
        $input = $request->only('name', 'email', 'password');
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']); //update the password
        }else{
            $input = array_except($input,array('password')); //remove password from the input array
        }
        $user = User::find($id);
        $user->update($input); //update the user info
        //delete all roles currently linked to this user
        DB::table('role_user')->where('user_id',$id)->delete();
        //attach the new roles to the user
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }
        return redirect()->route('users.index')
            ->with('success','User updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success','User deleted successfully');
    }
    
    public function verifyUser($token) {
        if (!$verify = DB::table('user_verifications')->where('token','=',$token)->first()){
        
            throw new \Exception('Khong tim thay!!!!!');
        }
        $user = User::findOrFail($verify->user_id);
        $user->is_verified = 1;
        $user->save();
        return view('/home');
    }
    
    public function profile() {
        return view('users.profile', array('user' => Auth::user()) );
    }
    
    public function update_avatar(Request $request){

    	// Handle the user upload of avatar
	if($request->hasFile('profpho')){
	$filenameWithExt = $request->file('profpho')->getClientOriginalName();
	$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
	    $extension = $request->file('profpho')->getClientOriginalExtension();
	    $filenameToStore = $filename.'_'.time().'.'.$extension;
	    $path = $request->file('profpho')->storeAs('public/images/users',$filenameToStore);
	}else{
	    $filenameToStore = 'noimage.jpg';
	}

    		$user = Auth::user();
    		$user->profpho = $filenameToStore;
    		$user->save();

    	return view('users.profile', array('user' => Auth::user()) );
    }
}
