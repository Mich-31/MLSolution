<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\TransactionModel;
use App\Models\PreTrainedTransactionModel;
use App\Models\PreTrainedModel;
use App\Models\DownloadDocumentModel;
use App\Models\WebinarRegistrationModel;
use App\Models\SubscriptionCloudServicesModel;
use App\Models\PlatformModel;
use App\Models\WebinarModel;
use App\Models\HistoryModel;
use App\Models\ModelsModel;
use App\Models\PaymentModel;
use App\Models\BankModel;
use App\Models\CreditCardModel;

class CustomerProfile extends BaseController
{
    public function index()
    {
        $session = session();
        $customerId = $session->get('id');

        $customerModel = new CustomerModel();
        $transactionModel = new TransactionModel();
        $modelsModel = new ModelsModel();
        $subscriptionModel = new SubscriptionCloudServicesModel();
        $platformModel = new PlatformModel();
        $webinarRegistrationModel = new WebinarRegistrationModel();
        $webinarModel = new WebinarModel();
        $downloadDocumentModel = new DownloadDocumentModel();
        $preTrainedTransactionModel = new PreTrainedTransactionModel();
        $preTrainedModel = new PreTrainedModel();
        $historyModel = new HistoryModel();
        $payment = new PaymentModel();
        $bank = new BankModel();
        $creditcard = new CreditCardModel();

        // Retrieve customer details
        $data['customer'] = $customerModel->find($customerId);
        $data['payment'] = $payment->where('customer_id', $customerId)->first();
        $data['bank'] = $bank->where('customer_id', $customerId)->first();
        $data['creditcard'] = $creditcard->where('customer_id', $customerId)->first();

        // Retrieve all transactions for the customer
        $transactions = $transactionModel->where('customer_id', $customerId)->findAll();

        // Enhance transactions with detailed information
        foreach ($transactions as &$transaction) {
            switch ($transaction['type']) {
                case 'deploy':
                    $transaction['model'] = $modelsModel->find($transaction['model_id']);
                    break;
                case 'subscription':
                    $subscription = $subscriptionModel->where('transaction_id', $transaction['id'])->first();
                    if ($subscription) {
                        $transaction['platform'] = $platformModel->find($subscription['cloud_service_id']);
                    }
                    break;
                case 'registration':
                    $registration = $webinarRegistrationModel->where('transaction_id', $transaction['id'])->first();
                    if ($registration) {
                        $transaction['webinar'] = $webinarModel->find($registration['webinar_id']);
                    }
                    break;
                case 'download':
                    $download = $downloadDocumentModel->where('transaction_id', $transaction['id'])->first();
                    if ($download) {
                        $transaction['historyModel'] = $historyModel->find($download['modelhistory_if']);
                    }
                    break;
                case 'purchase':
                    $preTrained = $preTrainedTransactionModel->where('transaction_id', $transaction['id'])->first();
                    if ($preTrained) {
                        $transaction['preTrainedModel'] = $preTrainedModel->find($preTrained['pretrained_id']);
                    }
                    break;
            }
        }

        $data['transactions'] = $transactions;

        // Pass the data to the view
        return view('profilo', $data);
    }
}
