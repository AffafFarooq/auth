<?php

namespace App\Http\Controllers;
use App\Models\stdData;
use Illuminate\Http\Request;

class AddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = stdData::all();

        return view('index', compact('data'));
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
        $data = $request->all();
        // echo "<pre>";
        // print_r($data);exit;
        // echo "<pre>";
        $id = $request->id;

        $request->validate([
            'name' => 'required'
        ]);
        $NewData = new stdData();
        if ($id > 0) {
            $class = stdData::find($id);
            $class->class_name = $request->class_name[0];
            $class->description = $request->description[0];
            $check = $class->save();
            $arr = array(
                'failed' => '0'
            );
            if ($check) {
                $arr = array(
                    'status' => 'success',
                    'message' => 'Data is save successfully',
                );

            }
            return response()->json($arr);
        } 
        else {
            $name  = $request->name;
            $class = $request->class;

            $check = stdData::create(
            [
                'name' => $request['name'],
                'class' => $request['class'],
            ]);

            // $check = DB::table('std_classes')->insert($data);
            $arr = array(
                'failed' => '0'
            );
            if ($check) {
                $arr = array(
                    'status' => 'success',
                    'message' => 'Data is save successfully',
                );
            }
            return response()->json($arr);
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
}
