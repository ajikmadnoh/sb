<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\claim;
use App\Http\Requests;

class StoreKeepController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $claims = Claim::where('name',\Auth::user()->name)->orderBy('id','DESC')->paginate(5);
        return view('StoreKeep.index',compact('claims'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function claim(Request $request)
    {
        $claims = Claim::orderBy('id','DESC')->paginate(5);
        return view('StoreKeep.listClaim',compact('claims'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('StoreKeep.create');
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
            'name' => 'required',
            'date_claim' => 'required',
            'description' => 'required',
            'food' => 'required',
            'fuel' => 'required',
            'tender' => 'required',
        ]);

        Claim::create($request->all());
        return redirect()->route('StoreKeep.index')
                        ->with('success','Claim created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $claim = Claim::find($id);
        return view('StoreKeep.show',compact('claim'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $claim = Claim::find($id);
        return view('StoreKeep.edit',compact('claim'));
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

        $this->validate($request, [
            'name' => 'required',
            'date_claim' => 'required',
            'description' => 'required',
            'food' => 'required',
            'fuel' => 'required',
            'tender' => 'required',
        ]);

        Claim::find($id)->update($request->all());
        return redirect()->route('StoreKeep.index')
                        ->with('Success','Claim updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Claim::find($id)->delete();
        return redirect()->route('StoreKeep.index')
                        ->with('Success','Claim deleted successfully');
    }

}
