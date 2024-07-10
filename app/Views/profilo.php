<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Profilo Utente - MLSolutions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #343a40;
            color: #ffffff;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            background-color: #495057;
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #33383b;
            color: #00adb5;
        }

        .card-body,
        .card-body dt,
        .card-body dd {
            color: #cccccc;
        }

        .card-body dt {
            font-weight: bold;
        }

        .divider {
            border-bottom: 1px solid #00adb5;
            margin: 20px 0;
        }

        .navbar-bg {
            background-color: #222831;
            /* Un colore ancora più scuro per la navbar */
            border-bottom: 2px solid #00adb5;
            /* Aggiungi un bordo sotto la navbar per più contrasto */
        }

        .navbar-brand,
        .navbar-nav .nav-link {
            color: #ffffff;
            /* Assicura che il testo della navbar sia bianco */
        }

        .navbar-toggler {
            border-color: #ffffff;
            /* Cambia il colore del bordo del toggler per visibilità */
        }

        .divider {
            border-bottom: 1px solid #00adb5;
            margin: 20px 0;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-bg">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= site_url('/') ?>">MLSolutions</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('profile') ?>">Profilo</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- Personal Information -->
        <div class="card">
            <div class="card-header">
                Informazioni Personali
            </div>
            <div class="card-body">
                <dl class="user-info">
                    <dt>Nome Azienda:</dt>
                    <dd><?= $customer['company_name'] ?? 'Non specificato'; ?></dd>
                    <dt>Email:</dt>
                    <dd><?= $customer['email']; ?></dd>
                    <dt>Nome:</dt>
                    <dd><?= $customer['first_name'] ?? 'Non specificato'; ?></dd>
                    <dt>Cognome:</dt>
                    <dd><?= $customer['surname'] ?? 'Non specificato'; ?></dd>
                    <dt>Credito:</dt>
                    <dd><?= number_format($customer['credit'], 2, ',', '.') . ' €'; ?></dd>
                    <dt>Informazioni di Pagamento:</dt>
                    <dd>Amount: <?= $payment['amount'] ?? 'Non specificato'; ?></dd>
                    <dd>IBAN: <?= $bank['IBAN'] ?? 'Non specificato'; ?></dd>
                    <dd>Credit Card: <?= $creditcard['cardnum'] ?? 'Non specificato'; ?></dd>
                </dl>
            </div>
        </div>

        <!-- Transactions -->
        <div class="card">
            <div class="card-header">
                Transazioni
            </div>
            <div class="card-body">
                <!-- Categorize transactions by type -->
                <?php
                $transactionTypes = ['deploy', 'subscription', 'registration', 'purchase', 'download', 'pretrained']; // Include all your transaction types
                foreach ($transactionTypes as $type): ?>
                    <?php
                    $filteredTransactions = array_filter($transactions, function ($transaction) use ($type) {
                        return $transaction['type'] === $type;
                    });
                    if (!empty($filteredTransactions)): ?>
                        <h5><?= ucfirst($type); ?> Transactions</h5>
                        <ul class="list-unstyled">
                            <?php foreach ($filteredTransactions as $transaction): ?>
                                <li>
                                    Transazione del <?= date('d-m-Y', strtotime($transaction['date'])); ?>:
                                    <ul>
                                        <li>Tipo: <?= $transaction['type']; ?></li>
                                        <?php if ($type == 'deploy' && isset($transaction['model'])): ?>
                                            <li>Modello: <?= $transaction['model']['name']; ?></li>
                                            <li>Algoritmo: <?= $transaction['model']['algorithm_type']; ?></li>
                                            <li>Dataset di Training: <?= $transaction['model']['training_dataset']; ?></li>
                                            <li>Accuratezza: <?= $transaction['model']['accuracy']; ?>%</li>
                                            <!-- Divider -->
                                            <div class="divider"></div>
                                        <?php elseif ($type == 'subscription' && isset($transaction['platform'])): ?>
                                            <li>Piattaforma: <?= $transaction['platform']['platform_type']; ?></li>
                                            <li>URL di Accesso: <?= $transaction['platform']['access_url']; ?></li>
                                            <li>Informazioni di Allocazione: <?= $transaction['platform']['resource_allocation']; ?>
                                            </li>
                                            <!-- Divider -->
                                            <div class="divider"></div>
                                        <?php elseif ($type == 'registration' && isset($transaction['webinar'])): ?>
                                            <li>Titolo Webinar: <?= $transaction['webinar']['title']; ?></li>
                                            <li>Relatore: <?= $transaction['webinar']['speaker']; ?></li>
                                            <li>Durata: <?= $transaction['webinar']['duration']; ?> minuti</li>
                                            <li>Ultimo aggiornamento file: <?= $transaction['webinar']['last_update_file']; ?></li>
                                            <li>Dimensione del file: <?= $transaction['webinar']['size_file']; ?> MB</li>
                                            <li>Genere: <?= $transaction['webinar']['genre']; ?></li>
                                            <!-- Divider -->
                                            <div class="divider"></div>
                                        <?php elseif ($type == 'download' && isset($transaction['historyModel'])): ?>
                                            <li>Documentazione Corrispondente:
                                                <?= $transaction['historyModel']['corresponding_documentation']; ?>
                                            </li>
                                            <!-- Divider -->
                                            <div class="divider"></div>
                                        <?php elseif ($type == 'purchase' && isset($transaction['preTrainedModel'])): ?>
                                            <li>Formato Pre-Trained: <?= $transaction['preTrainedModel']['format']; ?></li>
                                            <li>Dimensioni: <?= $transaction['preTrainedModel']['modelSize']; ?> MB</li>
                                            <li>Dipendenze: <?= $transaction['preTrainedModel']['dependencies']; ?></li>
                                            <li>Metriche di Performance: <?= $transaction['preTrainedModel']['performance_metrics']; ?>
                                            </li>
                                            <!-- Divider -->
                                            <div class="divider"></div>
                                        <?php endif; ?>
                                    </ul>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>




    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>