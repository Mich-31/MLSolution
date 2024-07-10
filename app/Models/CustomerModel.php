<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'company_name', 'email', 'password', 'first_name', 'surname', 'credit', 'payment_information'];

}