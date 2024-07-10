<?php

namespace App\Controllers;

use App\Models\ModelsModel;
use App\Models\PlatformModel;
use App\Models\DeploymentModelsModel;
use App\Models\WebinarModel;

class Home extends BaseController
{
    public function index(): string
    {
        $model = new ModelsModel();
        $platformModel = new PlatformModel();
        $deploymentModel = new DeploymentModelsModel();

        // Recuperare i modelli e le piattaforme
        $models = $model->findAll();
        $platforms = $platformModel->findAll();
        $deployments = $deploymentModel->findAll();

        // Associare ogni modello alla sua piattaforma
        foreach ($models as $key => $model) {
            foreach ($deployments as $deployment) {
                if ($model['id'] == $deployment['model_id']) {
                    $models[$key]['platform'] = $platformModel->find($deployment['cloud_platform_id'])['platform_type'] ?? 'Non specificato';
                }
            }
        }

        $modelWebinar = new WebinarModel();
        $webinars = $modelWebinar->findAll();
        $data['webinars'] = $webinars;

        $data['models'] = $models;
        return view('index', $data);
    }

}
