<?php

namespace App\Controllers;

use App\Models\PlatformModel;

class Platform extends BaseController
{
    public function PlatformPage()
    {
        return view('platform');
    }

    public function submitPlatform()
    {
        // Crea un'istanza del modello e salva i dati
        $model = new PlatformModel();
        $data = [
            'resource_allocation' => $this->request->getPost('resource_allocation'),
            'access_url' => $this->request->getPost('access_url'),
            'platform_type' => $this->request->getPost('platform_type')
        ];

        if ($model->insert($data)) {
            // Reindirizza alla pagina di successo o dashboard con un messaggio di successo
            return redirect()->to(site_url('/'))->with('message', 'Piattaforma aggiunta con successo!');
        } else {
            // Gestisci l'errore di inserimento
            return redirect()->back()->withInput()->with('error', 'Errore durante l\'aggiunta della piattaforma.');
        }
    }

}
