<?php

namespace App\Controllers;

use App\Models\ModelsModel;
use App\Models\PlatformModel;
use App\Models\DeploymentModelsModel;
use App\Models\PreTrainedModel;
use App\Models\TransactionModel;

class Deploy extends BaseController
{
    public function deployPage()
    {
        $model = new PlatformModel();
        $data['platforms'] = $model->findAll();
        return view('deploy', $data);
    }

    public function deployModel()
    {
        $session = session();
        $model = new ModelsModel();
        $deploymentModel = new DeploymentModelsModel();
        $preTrainedModel = new PreTrainedModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'algorithm_type' => $this->request->getVar('algorithm_type'),
            'training_dataset' => $this->request->getVar('training_dataset'),
            'accuracy' => $this->request->getVar('accuracy'),
            'date_of_creation' => $this->request->getVar('date_of_creation'),
            'availability' => 'yes'
        ];
        $model->insert($data);
        $deploymentModeldata = [
            'model_id' => $model->getInsertID(),
            'cloud_platform_id' => $this->request->getVar('platform')
        ];
        $deploymentModel->insert($deploymentModeldata);
        if ($this->request->getVar('pre_trained') == 'yes') {
            $preTrainedData = [
                'model_id' => $model->getInsertID(),
                'modelSize' => $this->request->getVar('model_size'),
                'format' => $this->request->getVar('format'),
                'dependencies' => $this->request->getVar('dependencies'),
                'performance_metrics' => $this->request->getVar('performance_metrics')
            ];
            $preTrainedModel->insert($preTrainedData);
        }
        $modelTransaction = new TransactionModel();
        $transactionData = [
            'date' => date('Y-m-d H:i:s'),
            'customer_id' => $session->get('id'),
            'type' => 'deploy',
            'model_id' => $model->getInsertID()
        ];
        $modelTransaction->insert($transactionData);
        $session->setFlashdata('msg', 'Modello inserito con successo.');
        $session->setFlashdata('type', 'success');
        return redirect()->to('/');
    }

}
