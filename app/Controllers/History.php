<?php

namespace App\Controllers;

use App\Models\HistoryModel;

class History extends BaseController
{
    public function addVersion()
    {
        $session = session();
        $model = new HistoryModel();
        $data = [
            'model_id' => $this->request->getVar('model_id'),
            'version' => $this->request->getVar('version'),
            'update_date' => $this->request->getVar('update_date'),
            'training_dataset' => $this->request->getVar('training_dataset'),
            'performance_metrics' => $this->request->getVar('performance_metrics'),
            'corresponding_documentation' => $this->request->getVar('corresponding_documentation')
        ];
        $model->insert($data);
        $session->setFlashdata('msg', 'Versione aggiunta con successo.');
        $session->setFlashdata('type', 'success');
        return redirect()->to('/model/' . $this->request->getVar('model_id'));
    }
}
