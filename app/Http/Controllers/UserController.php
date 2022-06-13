<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocumentModel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DocumentModel::join('type', 'type.TypeId', '=', 'document.TypeId')
            ->join('category', 'category.CategoryId', '=', 'document.CategoryId')
            ->join('users', 'users.id', '=', 'document.DocumentUploaderId')
            ->select('document.*', 'type.TypeTitle', 'category.CategoryTitle', 'users.name')
            ->get();
        return view('welcome')->with('data', $data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DocumentModel::join('type', 'type.TypeId', '=', 'document.TypeId')
            ->join('category', 'category.CategoryId', '=', 'document.CategoryId')
            ->select('document.*', 'type.TypeTitle', 'category.CategoryTitle')
            ->where('document.DocumentId', '=', $id)
            ->get();
        return view('document.DocumentInformation')->with('data', $data);
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

