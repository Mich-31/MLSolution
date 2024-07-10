<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table = 'payment';
    protected $primaryKey = 'customer_id';
    protected $allowedFields = ['customer_id', 'amount'];
}