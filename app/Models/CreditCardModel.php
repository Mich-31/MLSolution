<?php

namespace App\Models;

use CodeIgniter\Model;

class CreditCardModel extends Model
{
    protected $table = 'creditcard';
    protected $primaryKey = 'customer_id';
    protected $allowedFields = ['customer_id', 'cardnum'];
}