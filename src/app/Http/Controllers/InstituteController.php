<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstituteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institute = Institute::all();
        return view('institute.index',compact('institute'));
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
        try {

          //  dd($request);
            DB::beginTransaction();
            Institute::create($request->except(['_token']));
            DB::commit();
            return redirect()->back()->with('toast_success','Saved Successfully');
        }catch (\Exception $exception){
            DB::rollback();
            dd($exception->getMessage());
           // return redirect()->back()->with('toast_error',  $exception->getMessage());
        }
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
        try {
            $institution = Institute::all()->where('fl_system_code','=', $id)->first();
            return view('institute.edit', compact('institution'));
        }catch (\Exception $exception){
            return  redirect()->back()->with('toast_error', $exception);
        }

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
        try {
            $institute = Institute::where('fl_system_code', $id);

            $institute->update($request->except(['_token','_method','imageUpload']));

            return redirect('/institute')->withSuccess('Updated Successfully');
        }catch (\Exception $exception){
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }
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
