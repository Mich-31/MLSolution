<?php

namespace App\Controllers;

use App\Models\WebinarModel;

class Webinar extends BaseController
{
    public function webinarPage()
    {
        return view('webinarSubmit');
    }

    public function submitWebinar()
    {
        $webinarModel = new WebinarModel();

        $data = [
            'title' => $this->request->getPost('title'),
            'speaker' => $this->request->getPost('speaker'),
            'size_file' => $this->request->getPost('size_file'),
            'last_update_file' => $this->request->getPost('last_update_file'),
            'duration' => $this->request->getPost('duration'),
            'genre' => $this->request->getPost('genre')
        ];

        $webinarModel->insert($data);

        return redirect()->to('/');
    }

    public function viewWebinar($id)
    {
        $webinarModel = new WebinarModel();

        // Recupera il webinar specifico tramite ID
        $webinar = $webinarModel->find($id);
        if (!$webinar) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Webinar non trovato');
        }

        // Passa i dati del webinar alla vista
        return view('webinar', ['webinar' => $webinar]);
    }

}
