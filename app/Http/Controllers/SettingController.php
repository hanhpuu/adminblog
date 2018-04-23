<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Setting;
use Auth;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all();
	//return the view, and pass in the group of records to loop through
	return view('dashboard.settings.index')->with('settings', $settings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.settings.settings');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
    
    public function editPhoto($id)
    {
        $setting = Setting::findOrFail($id);
        $settings = Setting::all();
        foreach($settings as $NumberPhotos) {
            if($NumberPhotos->key =='Number of photo on carousel') {
               $number = $NumberPhotos->value;
            }
        }
        if($setting->value)
        {
            $photo = unserialize($setting->value);
        } else {
            $photo = array();
        }
        
        if(auth::user()->hasRole('admin') ) {
	    return view('dashboard.settings.editPhoto', ['setting' => $setting,'number' =>$number,'photo' => $photo]);
	}
            return abort(403);
    
    }
    
     public function updatePhoto(Request $request, $id)
    {    
        $setting = Setting::findOrFail($id);
        
        if(!$setting->value){
            $settingOriginal = array();
        } else {
            $settingOriginal = unserialize($setting->value);
        }
      	
        $settingPhotos = Array();
        
        for ($i = 1; $i <= $request->number; $i++){
             
             if($request->hasFile('file_'.$i)){
                $filenameWithExt = $request->file('file_'.$i)->getClientOriginalName();
        	$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('file_'.$i)->getClientOriginalExtension();
        	$filenameToStore = $filename.'_'.time().'.'.$extension;
                $path = $request->file('file_'.$i)->storeAs('public/images/settings',$filenameToStore);
                $img = Image::make($filenameToStore)->resize(1146, 666);
                $settingPhotos['file_'.$i]=$img;
            }
        }

        foreach($settingPhotos as $filename => $filepath) {
            $settingOriginal[$filename]=$filepath;
        }
        $setting->value = serialize($settingOriginal);
        
	$setting->save();
	Session::flash('success','Successfully updated your setting');
	return redirect()->route('settings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
