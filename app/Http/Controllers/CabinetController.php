<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Cabinet;
use App\Models\DocumentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CabinetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index()
    {  
        $data = Cabinet::all();
        return view('document.Cabinet')->with('data' , $data);
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
        $maxValue = Cabinet::max('CabinetId');
        $type = new Cabinet();
        $type->CabinetId = $maxValue+1;
        $type->CabinetName = $request->input('CabinetName');
        $path = $request->input('CabinetName');
        $type->CabinetPath = ('public/cabinets/'.$path);
        
        $data = $request->all();
        $userCount = Cabinet::where('CabinetName', $data['CabinetName']);
        if ($userCount->count()) {
            return redirect()->route('DrCabinet.index')->with('failed', 'Cabinet already exists.');  
        } else {
            Storage::makeDirectory('public/cabinets/'.$path);
            $type->save();
            return redirect()->route('DrCabinet.index')->with('success', 'Cabinet created successfully.'); 
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
        $cabinet = Cabinet::find($id);
        $data = DocumentModel::join('type', 'type.TypeId', '=', 'document.TypeId')
            ->join('category', 'category.CategoryId', '=', 'document.CategoryId')
            ->join('cabinet', 'cabinet.CabinetId', '=', 'document.CabinetId')
            ->where('document.CabinetId', $id)
            ->get();
        return view('document.CabinetDocumentList')->with('data' , $data)->with('cabinet', $cabinet);;   
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
        $del = Cabinet::find($id);
        $del->delete();
        return back()->with('deleted', 'Cabinet deleted successfully.');
    }

    // assign a document to a cabinet
    public function assign(Request $request)
    {
        $data = $request->all();
        dd($data);
        $document = DocumentModel::find($data['documentId']);
        $document->CabinetId = $data['CabinetId'];
        $document->CabinetName = $data['CabinetName'];
        $document->DocumentPath = $document->Cabinet->CabinetPath.'/'.$document->DocumentFileName;
        if ($document->save()) {
            return redirect()->route('DrCabinet.show', $data['cabinetId'])->with('success', 'Document assigned successfully.');
        } else {
            return redirect()->route('DrCabinet.show', $data['cabinetId'])->with('failed', 'Document assignment failed.');
        }
    }
    public function remove(Request $request, $id)
    {
        $data = $request->all();
        $doc = DocumentModel::find($data['docId']);
        $doc->CabinetId = null;
        $doc->save();
        return back()->with('success', 'Document removed from cabinet successfully.');
    }
}