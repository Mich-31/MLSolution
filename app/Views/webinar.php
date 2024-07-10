<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Dettagli Webinar - MLSolutions</title>
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
            /* Increase max-width for more spacious layout */
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

        .card-header {
            background-color: #007bff;
            /* Blue background for header */
            color: #ffffff;
            /* White text for header */
            font-size: 1.5rem;
            padding: 1rem;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-body {
            color: #343a40;
            font-size: 1.2rem;
            padding: 2rem;
        }

        .card-title {
            font-size: 2rem;
            color: #007bff;
            /* Blue color for title */
            margin-bottom: 1rem;
        }

        .card-text {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 0.75rem 1.5rem;
            font-size: 1.1rem;
            border-radius: 25px;
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
        <div class="card text-center">
            <div class="card-header">
                Dettagli del Webinar
            </div>
            <div class="card-body">
                <h5 class="card-title"><?= $webinar['title']; ?></h5>
                <p class="card-text"><strong>Relatore:</strong> <?= $webinar['speaker']; ?></p>
                <p class="card-text"><strong>Durata:</strong> <?= $webinar['duration']; ?> minuti</p>
                <p class="card-text"><strong>Ultimo Aggiornamento:</strong> <?= $webinar['last_update_file']; ?></p>
                <p class="card-text"><strong>Dimensione del File:</strong> <?= $webinar['size_file']; ?> MB</p>
                <p class="card-text"><strong>Genere:</strong> <?= $webinar['genre']; ?></p>
                <button type="button" class="btn btn-primary"
                    onclick="location.href='<?= site_url('register/' . $webinar['id']); ?>'">Iscriviti</button>
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
