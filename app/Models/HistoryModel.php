<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoryModel extends Model
{
    protected $table = 'history_model';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'model_id', 'version', 'update_date', 'training_dataset', 'performance_metrics', 'corresponding_documentation'];

}