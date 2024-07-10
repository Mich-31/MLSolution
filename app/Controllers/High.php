<?php

namespace App\Controllers;

use App\Models\HightlightModel;

class High extends BaseController
{
    public function add()
    {
        $session = session();
        $model = new HightlightModel();
        $data = [
            'data_preprocessing_steps' => $this->request->getVar('data_preprocessing_steps'),
            'features' => $this->request->getVar('features'),
            'model_id' => $this->request->getVar('model_id')
        ];
        $model->insert($data);
        return redirect()->to('/model/' . $this->request->getVar('model_id'));
    }

}
