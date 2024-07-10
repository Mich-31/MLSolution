<?php

namespace App\Models;

use CodeIgniter\Model;

class HightlightModel extends Model
{
    protected $table = 'highlight';
    protected $allowedFields = ['id', 'data_preprocessing_steps', 'features', 'model_id'];

}