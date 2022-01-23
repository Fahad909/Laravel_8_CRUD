<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\student;
use Illuminate\Support\Facades\Hash;
use Session;

class MyController extends Controller
{
    public function AddData(){
        return view('studentAdd');
    }

    public function student_view(){
        // return view('studentView');
        // $StudentView = student::all();
        $StudentView = student::paginate(10);
        return view('studentView', compact('StudentView'));
    }

// Edit Work
    public function studentedit($id=null){
        $studentEdit = student::find($id);
        return view('studentEdit', compact('studentEdit'));

    }

    //insert validator code 
    public function storedata(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'roll' => 'required|unique:students|max:255', 
            'registion' => 'required|unique:students|max:255',
            'depatment' => 'required',
            'semester' => 'required',
            'session' => 'required',
            'profile' => 'required',
            'phone' => 'required|unique:students|max:255',
            'email' => 'required|unique:students|max:255',
            'password' => 'required|max:255',
        ]);

        $validator->validated();
        
        if($validator->fails()){
            return redirect(url('/'))->withErrors($validator)->withInput();
        }
      // dataBase key = input name

    //   Insert Code
        $StoreData = new student();
        $StoreData->name = $request->name;
        $StoreData->roll = $request->roll;
        $StoreData->registion = $request->registion;
        $StoreData->depatment = $request->depatment;
        $StoreData->semester = $request->semester;
        $StoreData->session = $request->session;
        $StoreData->phone = $request->phone;
        $StoreData->email = $request->email;
        // $StoreData->password = $request->password;
        $StoreData->password = $request->password = Hash::make('password');
     


        if($request->hasfile('profile'))
        {
            $file = $request->file('profile');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/students/', $filename);
            $StoreData->profile = $filename;
        }


        $StoreData->save();
        session()->flash('msg','Student Successfully Added');

        // return $request->all();
        return redirect()->back();
    }


    // Update required/validator code
    
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'roll' => 'required|max:255', 
            'registion' => 'required|max:255',
            'depatment' => 'required',
            'semester' => 'required',
            'session' => 'required',
            'phone' => 'required|max:11',
            'phone' => 'required|min:11',
            'email' => 'required|max:255',
            'password' => 'required|max:255',

        ]);

        $validator->validated();
        if($validator->fails()){
            return redirect(url('/studentedit'))->withErrors($validator)->withInput();
        }
      // dataBase key = input name

    //   Update code Code
        $UpdateData = student::find($id);
        $UpdateData->name = $request->name;
        $UpdateData->roll = $request->roll;
        $UpdateData->registion = $request->registion;
        $UpdateData->depatment = $request->depatment;
        $UpdateData->semester = $request->semester;
        $UpdateData->session = $request->session;
        $UpdateData->phone = $request->phone;
        $UpdateData->email = $request->email;
        // $UpdateData->password = $request->password;
        $UpdateData->password = $request->password = Hash::make('password');;

        if($request->hasfile('profile'))
        {
            $imgDelete = 'uploads/students/'.$UpdateData->profile;
            if(File::exists($imgDelete)){
                File::delete($imgDelete);
            }
            $file = $request->file('profile');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/students/', $filename);
            $UpdateData->profile = $filename;
        }

        $UpdateData->update();
        session()->flash('msg','Student Updated Successfully');
        return redirect()->to(url('/student_view'));
    }




// Student information delete

        public function studentdelete($id=null)
        {
            $StudentDelete = student::find($id);
            $image_path = 'uploads/students/'.$StudentDelete->profile;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $StudentDelete->delete();
            return redirect('/student_view')->with('msg','Student Deleted Successfully');
        }



}
