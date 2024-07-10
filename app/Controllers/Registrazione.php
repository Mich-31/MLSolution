<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\PaymentModel;
use App\Models\BankModel;
use App\Models\CreditCardModel;

class Registrazione extends BaseController
{
    public function RegistrazionePage()
    {
        return view('registrazione');
    }

    public function registra()
    {
        $customerModel = new CustomerModel();
        $paymentModel = new PaymentModel();

        $data = [
            'company_name' => $this->request->getVar('company_name'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'first_name' => $this->request->getVar('first_name'),
            'surname' => $this->request->getVar('surname')
        ];

        $customerModel->insert($data);

        $data1 = [
            'customer_id' => $customerModel->getInsertID(),
            'amount' => 0
        ];
        
        $paymentModel->insert($data1);

        $payment_info = $this->request->getVar('payment_information');

        if($payment_info == 'IBAN') {

            $data2 = [
                'customer_id' => $customerModel->getInsertID(),
                'IBAN' => $this->request->getVar('paymentIdentifier')
            ];

            $bankModel = new BankModel();
            $bankModel->insert($data2);
        } else {

            $data2 = [
                'customer_id' => $customerModel->getInsertID(),
                'cardnum' => $this->request->getVar('paymentIdentifier')
            ];

            $creditCardModel = new CreditCardModel();
            $creditCardModel->insert($data2);
        }

        return redirect()->to('/login');
    }

}
