<?php

namespace App\Controllers;

use App\Models\PlatformModel;

class Subscription extends BaseController
{
    public function SubscriptionPage()
    {
        $model = new PlatformModel();
        $data['platforms'] = $model->findAll();
        return view('subscription', $data);
    }

}
