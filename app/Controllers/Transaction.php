<?php

namespace App\Controllers;

use App\Models\TransactionModel;
use App\Models\PreTrainedTransactionModel;
use App\Models\WebinarRegistrationModel;
use App\Models\SubscriptionCloudServicesModel;
use App\Models\DownloadDocumentModel;

class Transaction extends BaseController
{
    public function purchase($id)
    {
        $session = session();
        $modelTransaction = new TransactionModel();
        $transactionData = [
            'date' => date('Y-m-d H:i:s'),
            'customer_id' => $session->get('id'),
            'type' => 'purchase',
            'model_id' => $id
        ];
        $modelTransaction->insert($transactionData);
        $preTrainedTransactionModel = new PreTrainedTransactionModel();
        $preTrainedTransactionData = [
            'transaction_id' => $modelTransaction->getInsertID(),
            'pretrained_id' => $id
        ];
        $preTrainedTransactionModel->insert($preTrainedTransactionData);
        $session->setFlashdata('msg', 'Modello acquistato con successo.');
        $session->setFlashdata('type', 'success');
        return redirect()->to('/');
    }

    public function register($id)
    {
        $session = session();
        $modelTransaction = new TransactionModel();
        $transactionData = [
            'date' => date('Y-m-d H:i:s'),
            'customer_id' => $session->get('id'),
            'type' => 'registration'
        ];
        $modelTransaction->insert($transactionData);
        $webinarRegistrationModel = new WebinarRegistrationModel();
        $webinarRegistrationData = [
            'transaction_id' => $modelTransaction->getInsertID(),
            'webinar_id' => $id
        ];
        $webinarRegistrationModel->insert($webinarRegistrationData);
        $session->setFlashdata('msg', 'Webinar registrato con successo.');
        $session->setFlashdata('type', 'success');
        return redirect()->to('/');
    }

    public function iscriviti()
    {
        $session = session();
        $modelTransaction = new TransactionModel();
        $transactionData = [
            'date' => date('Y-m-d H:i:s'),
            'customer_id' => $session->get('id'),
            'type' => 'subscription'
        ];
        $modelTransaction->insert($transactionData);
        $subscriptionCloudServicesModel = new SubscriptionCloudServicesModel();
        $subscriptionCloudServicesData = [
            'transaction_id' => $modelTransaction->getInsertID(),
            'typeP' => $this->request->getPost('platform_type'),
            'cloud_service_id' => $this->request->getPost('platform_id')
        ];
        $subscriptionCloudServicesModel->insert($subscriptionCloudServicesData);
        $session->setFlashdata('msg', 'Servizio cloud sottoscritto con successo.');
        $session->setFlashdata('type', 'success');
        return redirect()->to('/');
    }

    public function download()
    {
        $session = session();
        $modelTransaction = new TransactionModel();
        $transactionData = [
            'date' => date('Y-m-d H:i:s'),
            'customer_id' => $session->get('id'),
            'type' => 'download'
        ];
        $modelTransaction->insert($transactionData);
        $downloadDocumentModel = new DownloadDocumentModel();
        $downloadDocumentData = [
            'transaction_id' => $modelTransaction->getInsertID(),
            'modelhistory_if' => $this->request->getPost('document_id')
        ];
        $downloadDocumentModel->insert($downloadDocumentData);
        $session->setFlashdata('msg', 'Documento scaricato con successo.');
        $session->setFlashdata('type', 'success');
        return redirect()->to('/');
    }

}