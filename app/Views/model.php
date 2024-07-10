<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Dettagli Modello - MLSolutions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0; /* Light gray background */
            color: #333333; /* Dark gray text */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar-bg {
            background-color: #333333; /* Dark background for navbar */
            color: #ffffff; /* White text for navbar */
            border-bottom: 2px solid #1a1a1a; /* Dark border bottom */
        }

        .navbar-brand {
            color: #ffffff !important;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .navbar-toggler {
            border-color: #ffffff;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            background-color: #ffffff; /* White background for the card */
            width: 100%;
            max-width: 800px;
            margin: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 2rem;
        }

        .card-body {
            padding: 2rem;
        }

        .section {
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 1px solid #007bff; /* Blue border bottom */
        }

        .form-label,
        .card-title {
            color: #007bff; /* Blue color for labels and title */
        }

        h1, h3 {
            color: #007bff; /* Blue color for headings */
        }

        .form-control {
            background-color: #f8f9fa; /* Light gray background for form controls */
            border: 1px solid #ced4da; /* Light gray border */
            border-radius: 5px;
            color: #495057; /* Dark gray text */
        }

        .form-control:focus {
            background-color: #ffffff; /* White background on focus */
            border-color: #007bff; /* Blue border on focus */
            color: #495057; /* Dark gray text on focus */
        }

        .btn-primary {
            background-color: #007bff; /* Blue button background */
            border-color: #007bff;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover */
            border-color: #0056b3;
        }

        .divider {
            border-bottom: 1px solid #007bff; /* Blue divider */
            margin: 20px 0;
        }

        ul {
            list-style-type: none;
            padding-left: 0;
        }

        li {
            margin-bottom: 10px;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-bg">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= site_url('/') ?>">MLSolutions</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container">
        <h1>Dettagli Modello: <?= $model['name'] ?></h1>

        <!-- Informazioni Generali -->
        <div class="section">
            <h3>Informazioni Generali</h3>
            <p><strong>Accuratezza:</strong> <?= $model['accuracy'] ?>%</p>
            <p><strong>Dataset di Training:</strong> <?= $model['training_dataset'] ?></p>
            <p><strong>Data di Creazione:</strong> <?= $model['date_of_creation'] ?></p>
            <p><strong>Piattaforma:</strong> <?= $platform ? $platform['platform_type'] : 'Non specificato' ?></p>
        </div>

        <!-- Dettagli Pre-Trained, se presenti -->
        <?php if ($preTrained): ?>
            <div class="section">
                <h3>Dettagli Pre-Trained</h3>
                <p><strong>Dimensione del Modello:</strong> <?= $preTrained['modelSize'] ?></p>
                <p><strong>Formato:</strong> <?= $preTrained['format'] ?></p>
                <p><strong>Dipendenze:</strong> <?= $preTrained['dependencies'] ?></p>
                <p><strong>Metriche di Performance:</strong> <?= $preTrained['performance_metrics'] ?></p>
                <a href="<?= site_url('purchase/' . $model['id']) ?>" class="btn btn-success">Acquista</a>
            </div>
        <?php endif; ?>

        <!-- Storico delle Versioni -->
        <div class="section">
            <h3>Storico delle Versioni</h3>
            <?php if (session()->getFlashdata('msg')): ?>
                <div class="alert alert-<?= session()->getFlashdata('type') ?>" role="alert">
                    <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif; ?>
            <ul>
                <?php foreach ($history as $h): ?>
                    <li><strong>Versione:</strong> <?= $h['version']; ?></li>
                    <li><strong>Data di Aggiornamento:</strong> <?= $h['update_date']; ?></li>
                    <li><strong>Dataset di Training:</strong> <?= $h['training_dataset']; ?></li>
                    <li><strong>Metriche di Performance:</strong> <?= $h['performance_metrics']; ?></li>
                    <li><strong>Documentazione Corrispondente:</strong>
                        <form action="<?= site_url('download') ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="document_id" value="<?= $h['id']; ?>">
                            <button type="submit" class="link-style btn btn-link p-0 m-0" style="color: #007bff;">
                                <?= $h['corresponding_documentation']; ?>
                            </button>
                        </form>
                    </li>
                    <!-- Divider -->
                    <div class="divider"></div>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Highlight Esistenti -->
        <div class="section">
            <h3>Highlight del Modello</h3>
            <ul>
                <?php foreach ($highlights as $highlight): ?>
                    <li><strong>Passaggi di Pre-elaborazione dei Dati:</strong> <?= $highlight['data_preprocessing_steps'] ?></li>
                    <li><strong>Features:</strong> <?= $highlight['features'] ?></li>
                    <!-- Divider -->
                    <div class="divider"></div>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Form per Aggiungere Nuove Versioni -->
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Aggiungi Nuova Versione</h3>
                <form action="<?= site_url('addVersion') ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="model_id" value="<?= $model['id']; ?>">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="version" placeholder="Versione" required
                            autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <input type="date" class="form-control" name="update_date" required max="<?= date('Y-m-d'); ?>">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="training_dataset"
                            placeholder="Dataset di Training" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" name="performance_metrics"
                            placeholder="Metriche di Performance" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="corresponding_documentation"
                            placeholder="Documentazione Corrispondente" required autocomplete="off">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Aggiungi Versione</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Divider -->
        <div class="divider"></div>

        <!-- Form per Aggiungere Nuove Highlight -->
        <div class="card section">
            <div class="card-body">
                <h3 class="card-title">Aggiungi Nuove Highlight</h3>
                <form action="<?= site_url('add') ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="model_id" value="<?= $model['id']; ?>">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="data_preprocessing_steps"
                            placeholder="Passaggi di Pre-elaborazione dei Dati" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="features" placeholder="Features" required
                            autocomplete="off">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Aggiungi Highlight</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
