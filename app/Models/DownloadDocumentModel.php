<?php

namespace App\Models;

use CodeIgniter\Model;

class DownloadDocumentModel extends Model
{
    protected $table = 'download_document';
    protected $allowedFields = ['transaction_id', 'modelhistory_if'];

}