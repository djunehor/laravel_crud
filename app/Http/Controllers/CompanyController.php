<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Image;
use App\Company;
use Validator;
use Auth;
use App\User;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::paginate(10);
        return view("company", compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("company");
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
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:11:unque:users',
            'email' => 'required|string|email|max:255|unique:users',
            'logo' => 'required|file|mimes:jpg,jpeg,png,gif'
        ]);


        $fileName = null;
        if (request()->hasFile('logo')) {
            $file = request()->file('logo');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move(public_path().'/images/', $fileName);   
        }

    
        $company= new \App\Company;
        $company->id_user = Auth::user()->id;
        $company->name = $request->get('name');
        $company->email = $request->get('email');
        $company->office_number = $request->get('phone');
        $company->office_address = $request->get('address');
        $company->logo = $fileName;
        $company->website = $request->get('website');
        $company->save();
        Session::flash('success', 'Company Added Successfully!');
        return redirect()->Route('company');
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
        $company = Company::find($id);
        return view('edit',compact('company'));
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
        $fileName = null;
        if (request()->hasFile('logo')) {
            $file = request()->file('logo');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move(public_path().'/images/', $fileName);   
        }

        $company= Company::find($id);
        $company->name=$request->get('name');
        $company->email=$request->get('email');
        $company->website=$request->get('website');
        $company->office_address = $request->get('addres');
        $company->office_number = $request->get('phone');
        $company->logo = $fileName;
        $company->save();
        Session::flash('success', 'Company Updated Successfully!');
        return redirect()->Route('company');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();
        Session::flash('success', 'Company has been  deleted Successfully!');
        return redirect('company');
    }
}
