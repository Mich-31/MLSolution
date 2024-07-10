<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelsModel extends Model
{
    protected $table = 'model';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'name', 'algorithm_type', 'training_dataset', 'accuracy', 'date_of_creation', 'availability'];

}