<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Inserisci Webinar - MLSolutions</title>
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
            padding-top: 50px;
            max-width: 800px;
            /* Increase max-width for a more spacious layout */
            margin: auto;
        }

        .card {
            background-color: #ffffff;
            /* White background for the card */
            border: none;
            /* Remove border */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }

        .card-title {
            font-size: 2rem;
            color: #007bff;
            /* Blue color for title */
            margin-bottom: 1rem;
        }

        .form-label {
            font-size: 1.1rem;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 0.75rem 1.5rem;
            font-size: 1.1rem;
            border-radius: 25px;
            width: 100%;
            margin-top: 1rem;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .footer {
            background-color: #007bff;
            color: #ffffff;
            padding: 1rem 0;
            text-align: center;
            margin-top: 50px;
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
                <h2 class="card-title text-center">Inserisci Nuovo Webinar</h2>
                <form action="<?= site_url('submitWebinar') ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" class="form-control" id="title" name="title" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="speaker" class="form-label">Relatore</label>
                        <input type="text" class="form-control" id="speaker" name="speaker" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="size_file" class="form-label">Dimensione del File (in MB)</label>
                        <input type="number" class="form-control" id="size_file" name="size_file" required
                            autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="last_update_file" class="form-label">Ultimo Aggiornamento del File</label>
                        <input type="date" class="form-control" id="last_update_file" name="last_update_file" required
                            autocomplete="off" max="<?= date('Y-m-d'); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="duration" class="form-label">Durata (in minuti)</label>
                        <input type="number" class="form-control" id="duration" name="duration" required
                            autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="genre" class="form-label">Genere</label>
                        <input type="text" class="form-control" id="genre" name="genre" required autocomplete="off">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Inserisci</button>
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
