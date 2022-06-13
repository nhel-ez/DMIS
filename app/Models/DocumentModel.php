<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentModel extends Model
{
    use HasFactory;

    protected $table = 'document';

    public $timestamps = true;

    protected $fillable = [
        'DocumentId',
        'DocumentTrackNo',
        'DocumentTitle',
        'DocumentFileName',
        'DocumentFilePath',
        'DocumentFileSize',
        'CategoryId',
        'TypeId',
        'CabinetId',
        'ReceiverId',
        'DateReceived',
        'DocumentUploaderId',
        'created_at',
        'updated_at'
    ];
}
