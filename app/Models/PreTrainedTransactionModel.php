<?php

namespace App\Models;

use CodeIgniter\Model;

class PreTrainedTransactionModel extends Model
{
    protected $table = 'pre_trained_transaction';
    protected $allowedFields = ['transaction_id', 'pretrained_id'];

}