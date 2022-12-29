<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;

class blogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        $data = student::join('users', 'users.id', '=', 'tasks.user_id')->select('tasks.*', 'users.name')->get();

        return view('students.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('students.create');
    }

    
    public function store(Request $request)
    {
    
        $data =   $this->validate($request, [
            "title"      => "required|max:60",
            "content"    => "required|max:700",
            "image"      => "required|image|mimes:png,jpg",    // file    // regex:
			"startdate"  =>"required",
			"enddate"    =>"required"

        ]);

        $FinalName = time() . rand() . '.' . $request->image->extension();

        if ($request->image->move(public_path('taskImages'), $FinalName)) {


            $data['image'] = $FinalName;
            $data['user_id'] = auth()->user()->id;

            $op = student::create($data);

            if ($op) {
                $message = 'data inserted';
            } else {
                $message =  'error try again';
            }
        } else {
            $message = "Error In Uploading File ,  Try Again ";
        }

        session()->flash('Message', $message);

        return redirect(url('/student'));
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
        $data =student::find($id);

        return view('students.show', ['data' => $data]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        # Fetch Data
        $data =  student::find($id);

        $op = student::find($id)->delete();
        if ($op) {
            unlink(public_path('taskImages/' . $data->image));
            $message = "Raw Removed";
        } else {
            $message = "Error Try Again";
        }

        session()->flash('Message', $message);

        return redirect(url('/student'));
    }
}


?>