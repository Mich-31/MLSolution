<?php

namespace App\Models;

use CodeIgniter\Model;

class WebinarRegistrationModel extends Model
{
    protected $table = 'webinar_registration';
    protected $allowedFields = ['transaction_id', 'webinar_id'];

}