<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Image;
use App\Company;
use App\Employee;
use Validator;
use Auth;
use App\User;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::paginate(10);
        $company = Company::all();
        return view("home", compact('company', 'employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:11:unque:users',
            'email' => 'required|string|email|max:255|unique:users'
        ]);

    
        $employee = new \App\Employee;
        $employee->id_user = Auth::user()->id;
        $employee->first_name = $request->get('first_name');
        $employee->last_name = $request->get('last_name');
        $employee->email = $request->get('email');
        $employee->phone = $request->get('phone');
        $employee->id_company = $request->get('company_id');
        $employee->save();
        Session::flash('success', 'Employee Added Successfully!');
        return redirect()->Route('home');
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
        $employee = Employee::find($id);
        $company = Company::all();
        return view('employee-edit',compact('employee', 'company'));
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
        $employee= Employee::find($id);
        $employee->first_name=$request->get('first_name');
        $employee->last_name=$request->get('first_name');
        $employee->phone = $request->get('phone');
        $employee->id_company = $request->get('company_id');
        $employee->save();
        Session::flash('success', 'Employee Updated Successfully!');
        return redirect()->Route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        Session::flash('success', 'Employee has been  deleted Successfully!');
        return redirect('home');
    }
}
