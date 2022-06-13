<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use App\Models\DocumentModel;
use Illuminate\Http\Request;
use League\CommonMark\Node\Block\Document;

use function PHPSTORM_META\type;

class DocumentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DocumentType::all();
        return view('document.AddType')->with('data', $data);
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
        //$request->validate([ 'TypeCode' => 'required|integer|exists:App\Company,id', ]);

        $maxValue = DocumentType::max('TypeID');
        $type = new DocumentType();
        $type->TypeID = $maxValue+1;
        $type->TypeTitle = $request->input('TypeTitle');
        $type->TypeCode = $request->input('TypeCode');
        $data = $request->all(); // This will get all the request data.
        $userCount = DocumentType::where('TypeCode', $data['TypeCode']);
        if ($userCount->count()) {
            return back()->with('failed', 'Type is already in the database.');  
        } else {
            $type->save();
            return back()->with('success', 'Type created successfully.'); 
        } 
          
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DocumentType  $documentType
     * @return \Illuminate\Http\Response
     */
    public function show(DocumentType $documentType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DocumentType  $documentType
     * @return \Illuminate\Http\Response
     */
    public function edit(DocumentType $documentType)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DocumentType  $documentType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DocumentType $documentType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DocumentType  $documentType
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $type = DocumentType::find($id);
        $type->delete();
        return back()->with('success', 'Type deleted successfully.');
    }
}