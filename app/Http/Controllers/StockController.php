<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Stock::all();
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
        // return $request->all();
        $stock=Stock::create($request->all());

        if(!$stock) {
            return response()->json([
                'success'=> false,
                'message'=> 'Error'
            ], 400);
        }

        return response()->json([
            'success'=> true,
            'message'=>'Succesfully Saved'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        return $stock;
    }

    // Stock by sku 
    public function stock(Request $request) {
        $req=$request->input('body');
        $porduct=Stock::where('sku', 'like', '%'.$req['sku'].'%')->get();
        // $porduct=Stock::where('sku', $sku)->get();
        return response()->json($porduct);
    }
    public function suggestions(Request $request) {
        $query=$request->input('query');
        $suggestion=Stock::select('sku')->where('sku', 'like', '%'.$query.'%')->get();
        return $suggestion;
    }

    public function sku($sku) {
        $porduct=Stock::where('sku', $sku)->get();
        return $porduct;
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
    public function update(Request $request, Stock $stock)
    {
        $stock->update($request->all());
        return response()->json($stock, 200);
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
