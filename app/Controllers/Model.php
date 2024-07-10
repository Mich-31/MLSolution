<?php
namespace App\Controllers;

use App\Models\ModelsModel;
use App\Models\PlatformModel;
use App\Models\DeploymentModelsModel;
use App\Models\PreTrainedModel;
use App\Models\HistoryModel;
use App\Models\HightlightModel;

class Model extends BaseController
{
    public function viewModel($id)
    {
        $modelsModel = new ModelsModel();
        $platformModel = new PlatformModel();
        $deploymentModel = new DeploymentModelsModel();
        $preTrainedModel = new PreTrainedModel();
        $historyModel = new HistoryModel();
        $highlightsModel = new HightlightModel();

        // Recupera il modello specifico
        $model = $modelsModel->find($id);
        if (!$model) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Modello non trovato');
        }

        // Recupera il deployment associato a questo modello
        $deployment = $deploymentModel->where('model_id', $id)->first();

        // Recupera la piattaforma associata al modello tramite il deployment
        $platform = null;
        if ($deployment) {
            $platform = $platformModel->find($deployment['cloud_platform_id']);
        }

        // Verifica se esiste un record pre-trained per questo modello
        $preTrained = $preTrainedModel->where('model_id', $id)->first();

        // Recupera lo storico delle versioni per questo modello
        $history = $historyModel->where('model_id', $id)->findAll();

        // Recupera gli highlight per questo modello
        $highlights = $highlightsModel->where('model_id', $id)->findAll();

        $data = [
            'model' => $model,
            'platform' => $platform,
            'preTrained' => $preTrained, // Aggiunto dato pre-trained
            'history' => $history,
            'highlights' => $highlights
        ];

        return view('model', $data);
    }
}