<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Deploy Modello - MLSolutions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f9;
            /* Light background color */
            color: #333;
            /* Dark text color */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar-bg {
            background-color: #007bff;
            /* Blue background for navbar */
            color: #ffffff;
            /* White text for navbar */
            border-bottom: 2px solid #0056b3;
        }

        .navbar-brand {
            color: #ffffff !important;
            font-weight: bold;
        }

        .navbar-toggler {
            border-color: #ffffff;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            background-color: #ffffff;
            /* White background for the card */
            width: 100%;
            max-width: 700px;
            /* Max width of the card */
            margin: auto;
            /* Center the card */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 2rem;
        }

        .card-body {
            padding: 2rem;
        }

        .form-label,
        .card-title {
            color: #007bff;
            /* Blue color for labels and title */
        }

        .form-control {
            border-radius: 5px;
        }

        .btn-primary,
        .btn-secondary {
            width: 100%;
            /* Full width buttons */
            margin-top: 10px;
            border-radius: 20px;
        }

        #pre_trained_fields {
            display: none;
        }

        .hidden {
            display: none;
        }

        .footer {
            background-color: #007bff;
            color: #ffffff;
            padding: 1rem 0;
            text-align: center;
            position: absolute;
            bottom: 0;
            width: 100%;
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
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center">Deploy Nuovo Modello</h2>
                <form action="<?= site_url('submit-model') ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome del Modello</label>
                        <input type="text" class="form-control" id="name" name="name" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="algorithm_type" class="form-label">Tipo di Algoritmo</label>
                        <input type="text" class="form-control" id="algorithm_type" name="algorithm_type" required
                            autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="training_dataset" class="form-label">Dataset di Training</label>
                        <input type="text" class="form-control" id="training_dataset" name="training_dataset" required
                            autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="accuracy" class="form-label">Accuratezza (%)</label>
                        <input type="number" step="0.01" class="form-control" id="accuracy" name="accuracy" required
                            autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="date_of_creation" class="form-label">Data di Creazione</label>
                        <input type="date" class="form-control" id="date_of_creation" name="date_of_creation" required
                            max="<?= date('Y-m-d'); ?>" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="platform" class="form-label">Piattaforma</label>
                        <select class="form-control" id="platform" name="platform">
                            <option value="">Seleziona una piattaforma</option>
                            <?php foreach ($platforms as $platform): ?>
                                <option value="<?= $platform['id']; ?>"><?= $platform['platform_type']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="pre_trained" class="form-label">Pre-Trained</label>
                        <select class="form-control" id="pre_trained" name="pre_trained"
                            onchange="togglePreTrainedFields();">
                            <option value="no">No</option>
                            <option value="yes">Sì</option>
                        </select>
                    </div>

                    <!-- Campi specifici per i modelli Pre-Trained -->
                    <div id="pre_trained_fields" class="hidden">
                        <div class="mb-3">
                            <label for="model_size" class="form-label">Dimensione del Modello</label>
                            <input type="number" class="form-control" id="model_size" name="model_size"
                                autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="format" class="form-label">Formato</label>
                            <select class="form-control" id="format" name="format">
                                <option value="">Seleziona un tipo di formato file</option>
                                <option value=".csv">CSV</option>
                                <option value=".json">JSON</option>
                                <option value=".xlsx">Excel (XLSX)</option>
                                <option value=".hdf5">HDF5</option>
                                <option value=".pickle">Pickle (.pkl)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="dependencies" class="form-label">Dipendenze</label>
                            <textarea class="form-control" id="dependencies" name="dependencies"
                                autocomplete="off"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="performance_metrics" class="form-label">Metriche di Performance</label>
                            <textarea class="form-control" id="performance_metrics" name="performance_metrics"
                                autocomplete="off"></textarea>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Inserisci</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function togglePreTrainedFields() {
            var selection = document.getElementById('pre_trained').value;
            var fields = document.getElementById('pre_trained_fields');
            fields.style.display = (selection === 'yes') ? 'block' : 'none';
        }

        // Chiamata alla funzione al caricamento della pagina
        document.addEventListener('DOMContentLoaded', togglePreTrainedFields);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
