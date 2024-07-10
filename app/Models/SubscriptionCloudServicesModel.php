<?php

namespace App\Models;

use CodeIgniter\Model;

class SubscriptionCloudServicesModel extends Model
{
    protected $table = 'subscription_cloud_services';
    protected $allowedFields = ['transaction_id', 'typeP', 'cloud_service_id'];

}