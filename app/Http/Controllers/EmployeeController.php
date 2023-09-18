<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Facades\file;

class EmployeeController extends Controller
{
    public function registerdata(Request $request)
    {

        $request->validate([
            'name' => 'required|max:10',
            'email' => 'required|',
            'password' => 'required|confirmed|',
            'profile_picture' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'city' => 'required',
            'hobbies' => 'required',
        ]);

        $input = $request->all();
        if ($request->hasfile('profile_picture')) {
            $file = $request->file('profile_picture');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/employee', $filename);
            $input['profile_picture'] = $filename;
        }
        $input['name'] = ucfirst($request->name);
        $input['password'] = hash::make($request->password);
        $input['hobbies'] = implode(',', $request->hobbies);
        employee::create($input);
        // return redirect()->route('/create')->with('success', 'Employee Details Submitted Successfully');
        return redirect('/create');
    }

    public function index()
    {

        // return employee::all();
        $data = employee::paginate(2); 
        // $data = employee::all();
        // print_r($data);
        // $paginate_data= $data->paginate(5);
        // print_r($paginate_data);
        // $data=$data->paginate(5);
        // $data=$data->paginate(5);
        return view('/index', ['products' => $data]);
    }

    public function deletedata($id)
    {
        // return employee::all();
        $data = employee::find($id);
        $destination = 'uploads/employee/' . $data->profile_picture;
        // print_r($destination);

        if (file::exists($destination)) {
            file::delete($destination);
        }
        $data->delete();
        return redirect('/index');
    }

    public function editdata($id)
    {
        // return employee::all();
        $data=employee::find($id);
        return view('/edit',['editing'=>$data]);
    }

    public function updatedata(Request $request)
    {
        // // return "dfs";
        // // return $request->all(); 
        // $data=employee::find($request->id);
        // $input=$request->all();   
        
        // // print_r($data);


        // $request->validate([
        //     'name' => 'required|max:10',
        //     'email' => 'required|',
        //     'password' => 'required|confirmed|',
        //     'profile_picture' => 'required',
        //     'date_of_birth' => 'required',
        //     'gender' => 'required',
        //     'city' => 'required',
        //     'hobbies' => 'required',
        // ]);
        // if ($request->hasfile('profile_picture')) {

        //     $file = $request->file('profile_picture');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $extension;
        //     $file->move('uploads/employee', $filename);
        //     $input['profile_picture'] = $filename;
        // }
        // $input['name'] = ucfirst($request->name);
        // $input['password'] = hash::make($request->password);
        // $input['hobbies'] = implode(',', $request->hobbies);
        // $input['confirm_password']=hash::make($request->confirm_password);

        
        // $data->update($input);
        // return redirect('index');

        //   $request->validate([
        //     'name' => 'required|max:10',
        //     'email' => 'required|',
        //     'password' => 'required|confirmed|',
        //     'profile_picture' => 'required',
        //     'date_of_birth' => 'required',
        //     'gender' => 'required',
        //     'city' => 'required',
        //     'hobbies' => 'required',
        // ]);

        $data=employee::find($request->id);
        $input=$request->all();
         if($request->hasfile('profile_picture'))
         {
               
            $destination='uploads/employee/'.$data->profile_picture;
            if(file::exists($destination))
            {
                file::delete($destination);
            }

            $file=$request->file('profile_picture');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/employee/', $filename);
            $input['profile_picture']=$filename;
         }
         $input['hobbies']=implode(',',$request->hobbies);
         $input['password']=hash::make($request->password);
         $input['name']=ucfirst($request->name);
        //  $input['confirm_password']=hash::make($request->confirm_password);
         $data->update($input);
         return redirect('index');
    }

}
