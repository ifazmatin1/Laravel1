<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ModelGlobalSetup;
use App\ModelGlobalSetupLine;
use Carbon\Carbon;
class GlobalSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ModelGlobalSetup::all();
        return view('globalsetup',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('globalsetup_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $now = Carbon::now();
        $globalsetup= new ModelGlobalSetup;
        $globalsetup->global_setup_name = $request -> nama;
        $globalsetup->active_flag = 1 ;
        if($globalsetup->save()){
            $id = $globalsetup->id;
            foreach ($request->detail as $key => $value) {
                if($value !=''){
                    $data2=array('global_setup_id'=>$id,
                                'setup_line_code'=>$request->code [$key],
                                'setup_line_name'=>$value,
                                'created_at'=>$now,
                                'updated_at'=>$now);
                    ModelGlobalSetupLine::insert($data2);
                }
            }
        }
        return redirect()->route('globalsetup.index')->with('alert-success','Berhasil Menambahkan Data!');
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

    public function __construct()
    {
        $this->middleware('auth');
    }
}
