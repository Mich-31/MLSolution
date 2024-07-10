<?php

namespace App\Models;

use CodeIgniter\Model;

class BankModel extends Model
{
    protected $table = 'bank';
    protected $primaryKey = 'customer_id';
    protected $allowedFields = ['customer_id', 'IBAN'];
}