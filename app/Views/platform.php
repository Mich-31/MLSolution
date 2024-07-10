<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Aggiungi Piattaforma - MLSolutions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            /* Light background color */
            color: #343a40;
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
            max-width: 600px;
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
                <h2 class="card-title text-center">Aggiungi Nuova Piattaforma Cloud</h2>
                <form action="<?= site_url('submit-platform') ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="resource_allocation" class="form-label">Allocazione Risorsa</label>
                        <select class="form-select" id="resource_allocation" name="resource_allocation" required>
                            <option value="">Seleziona l'allocazione</option>
                            <option value="100 GB">100 GB</option>
                            <option value="200 GB">200 GB</option>
                            <option value="500 GB">500 GB</option>
                            <option value="1 TB">1 TB</option>
                            <option value="2 TB">2 TB</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="access_url" class="form-label">URL di Accesso</label>
                        <input type="text" class="form-control" id="access_url" name="access_url" required
                            autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="platform_type" class="form-label">Tipo di Piattaforma</label>
                        <input type="text" class="form-control" id="platform_type" name="platform_type"
                            placeholder="Inserisci il tipo di piattaforma" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Aggiungi</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2024 MLSolutions. Tutti i diritti riservati.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>