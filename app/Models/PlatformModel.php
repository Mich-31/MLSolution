<?php

namespace App\Models;

use CodeIgniter\Model;

class PlatformModel extends Model
{
    protected $table = 'cloud_platform';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'resource_allocation', 'access_url', 'platform_type'];

}