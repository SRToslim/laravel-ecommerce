<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Auth;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Carbon;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $office = Outlet::all();
        return view('backend.setup_configurations.outlet.index', compact('office'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $day = DB::table('days')->get();
        return view('backend.setup_configurations.outlet.create', compact('day'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $office = new Outlet();
        $office->name = $request->name;
        $office->address = $request->address;
        $office->phone = $request->phone;
        $office->gmap = $request->gmap;
        $office->save();
        if($office->id){
            $day= $request->day_id;
            $openTime = $request->open;
            $colseTime=  $request->close;
            foreach($day as $index => $value){
                if(!empty($openTime[$value])){
                    DB::table('o_c_time')->insert(
                        array(
                            'outlet_id' => $office->id,
                            'day_id' => $day[$index],
                            'open_time' => $openTime[$value],
                            'close_time' => $colseTime[$value],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        )
                    );
                }else{
                    DB::table('o_c_time')->insert(
                        array(
                            'outlet_id' => $office->id,
                            'day_id' => $day[$index]
                        )
                    );
                }
            };
        };

        return redirect()->route('outlets.index', compact('office'));
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
        $branch = Outlet::find($id);
        return view('backend.setup_configurations.outlet.edit', compact('id','branch'));
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
        // dd($request->request);
        $office = Outlet::find($id);
        // dd($office);
        $office->name = $request->name;
        $office->address = $request->address;
        $office->phone = $request->phone;
        $office->gmap = $request->gmap;
        $office->save();

        $day= $request->day_id;
        $openTime = $request->open;
        $colseTime=  $request->close;
        foreach($day as $index => $value){
            if(!empty($openTime[$value])){
                DB::table('o_c_time')->where('outlet_id', $id)->where('day_id', $day[$index])->update(
                    array(
                        'open_time' => $openTime[$value],
                        'close_time' => $colseTime[$value],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    )
                );
            }else{
                DB::table('o_c_time')->where('outlet_id', $id)->where('day_id', $day[$index])->update(
                    array(
                        'open_time' => null,
                        'close_time' => null,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    )
                );
            }
        };
        flash(translate('Office has been updateded successfully'))->success();
        return redirect()->route('outlets.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('o_c_time')->where('outlet_id', $id)->delete();
        Outlet::where('id', $id)->delete();
        flash(translate('Office has been deleteded successfully'))->success();
        return back();
    }
}
