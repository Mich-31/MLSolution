<?php

namespace App\Models;

use CodeIgniter\Model;

class PreTrainedModel extends Model
{
    protected $table = 'pre_trained';
    protected $primaryKey = 'model_id';
    protected $allowedFields = ['model_id', 'modelSize', 'format', 'dependencies', 'performance_metrics'];

}