<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use App\Models\DocumentModel;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Node\Block\Document;
use Illuminate\Support\Facades\Storages;
class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = DocumentModel join type, category and user
        $data = DocumentModel::join('type', 'type.TypeId', '=', 'document.TypeId')
            ->join('category', 'category.CategoryId', '=', 'document.CategoryId')
            ->join('users', 'users.id', '=', 'document.DocumentUploaderId')
            ->select('document.*', 'type.TypeTitle', 'category.CategoryTitle', 'users.name')
            ->get();
        return view('document.DocumentList')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $data = DocumentType::all();
        $selectedType = 0;
        return view('document.AddDocument')->with('category', $category)->with( 'data' , $data)->with( 'SelectedType', $selectedType);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $name = $request->file('DocFile')->getClientOriginalName();
        $path = $request->file('DocFile')->storeAs('/public/files', $name);
        $MaxValue = DocumentModel::max('DocumentId');
        $DocSave = new DocumentModel;
        $DocSave->DocumentId = $MaxValue+1;
        $DocSave->DocumentTrackNo = $request->input('DocTrackNo');
        $DocSave->DocumentTitle = $request->input('DocTitle');
        $DocSave->DocumentFileName = $name;
        $DocSave->DocumentFilePath = $path;
        $DocSave->DocumentFileSize = $request->file('DocFile')->getSize();
        $DocSave->CategoryId = $request->input('DocCategory');
        $DocSave->TypeId = $request->input('DocType');
        $DocSave->ReceiverId = 1;
        $DocSave->DateReceived = '2000,2,2';
        $DocSave->DocumentUploaderId = 1;
        $data = $request->all();
        $userCount = DocumentModel::where('DocumentTitle', $data['DocTitle']);
        if ($userCount->count()) {
            return back()->with('failed', 'Document already exists.'); 
        } else {
            $DocSave->save();
            return back()->with('success', 'Document uploaded successfully.'); 
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
        // join document, type, category and user
        $data = DocumentModel::join('type', 'type.TypeId', '=', 'document.TypeId')
            ->join('category', 'category.CategoryId', '=', 'document.CategoryId')
            ->join('users', 'users.id', '=', 'document.DocumentUploaderId')
            ->select('document.*', 'type.TypeTitle', 'category.CategoryTitle', 'users.name')
            ->where('document.DocumentId', '=', $id)
            ->first();
        return view('document.EditDocument')->with('data', $data);
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
        $DocEdit = DocumentModel::find($id);
        $DocEdit->DocumentTrackNo = $request->input('Tracking No:');
        $DocEdit->DocumentTitle = $request->input('Title:');
        $DocEdit->CategoryId = $request->input('Category:');
        $DocEdit->TypeId = $request->input('Type:');
        $DocEdit->ReceiverId = $request->input('Received by:');
        $DocEdit->created_at = $request->input('Date Created:');
        $DocEdit->DocumentFileName = $request->input('Attached File:');

        return redirect()->route('DrDoc.index')->with('success', 'Document updated successfully.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = DocumentModel::find($id);
        $del->delete();
        return redirect()->route('DrDoc.index')->with('success', 'Document deleted successfully.');
    }

    public function getFile($path)
    {
    }
}