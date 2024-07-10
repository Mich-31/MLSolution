<?php

namespace App\Models;

use CodeIgniter\Model;

class DeploymentModelsModel extends Model
{
    protected $table = 'deployment_model';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'model_id', 'cloud_platform_id'];

}