<?php

namespace App\Models;

use CodeIgniter\Model;

class WebinarModel extends Model
{
    protected $table = 'webinar';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'title', 'speaker', 'size_file', 'last_update_file', 'duration', 'genre'];

}