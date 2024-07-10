<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>MLSolutions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Light background color */
            color: #343a40; /* Dark text color */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar-bg {
            background-color: #007bff; /* Blue background for navbar */
            color: #ffffff; /* White text for navbar */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
        }

        .navbar-brand {
            color: #ffffff !important; /* White navbar text */
            font-weight: bold;
        }

        .navbar-toggler {
            border-color: #ffffff; /* White border for the toggler */
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28fff,255,255,1%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }

        .main-content {
            padding: 2rem 1rem;
        }

        .header-section {
            text-align: center;
            margin-bottom: 2rem;
        }

        .header-section h1 {
            font-size: 3rem;
            color: #007bff;
        }

        .header-section p.lead {
            font-size: 1.5rem;
            color: #6c757d;
        }

        .card-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .card {
            padding: 2rem;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            background-color: #ffffff;
        }

        .card h2 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .card p {
            font-size: 1rem;
            color: #6c757d;
            margin-bottom: 1.5rem;
        }

        .card .btn {
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            border-radius: 25px;
            transition: transform 0.2s ease;
        }

        .card .btn:hover {
            transform: scale(1.05);
        }

        .alert {
            border-radius: 10px;
        }

        .list-group-item {
            background-color: #ffffff;
            color: #343a40;
            border: 1px solid #e9ecef;
            border-radius: 10px;
            margin-bottom: 10px;
            padding: 1rem;
        }

        .list-group-item a {
            border-radius: 20px;
        }

        .container {
            max-width: 1200px;
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

    <div class="container main-content">
        <!-- Header Section -->
        <div class="header-section">
            <h1>MLSOLUTIONS</h1>
            <?php if (session()->getFlashdata('msg')): ?>
                <div class="alert alert-<?= session()->getFlashdata('type') ?>" role="alert">
                    <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif; ?>
            <p class="lead">La tua piattaforma leader per soluzioni e gestione dei modelli di machine learning.</p>
        </div>

        <!-- Cards Section -->
        <div class="card-section">
            <?php if (session()->get('logged_in')): ?>
                <div class="card">
                    <h2>Deploy</h2>
                    <p>Deploy your models quickly and efficiently.</p>
                    <a href="<?= site_url('deployPage') ?>" class="btn btn-success">Go to Deploy</a>
                </div>
                <div class="card">
                    <h2>Platform</h2>
                    <p>Access the platform for all your machine learning needs.</p>
                    <a href="<?= site_url('platform') ?>" class="btn btn-info">Go to Platform</a>
                </div>
                <div class="card">
                    <h2>Webinar</h2>
                    <p>Join our webinars to learn more about ML Solutions.</p>
                    <a href="<?= site_url('webinar') ?>" class="btn btn-warning">Go to Webinar</a>
                </div>
                <div class="card">
                    <h2>Subscription</h2>
                    <p>Manage your subscription and billing information.</p>
                    <a href="<?= site_url('subscription') ?>" class="btn btn-primary">Go to Subscription</a>
                </div>
                <div class="card">
                    <h2>Logout</h2>
                    <p>Logout from your account.</p>
                    <a href="<?= site_url('logout') ?>" class="btn btn-secondary">Logout</a>
                </div>
            <?php else: ?>
                <div class="card">
                    <h2>Login</h2>
                    <p>Access your account to manage your models and more.</p>
                    <a href="<?= site_url('login') ?>" class="btn btn-primary">Login</a>
                </div>
                <div class="card">
                    <h2>Registrati</h2>
                    <p>Create an account to start using ML Solutions.</p>
                    <a href="<?= site_url('registrazione') ?>" class="btn btn-secondary">Registrati</a>
                </div>
            <?php endif; ?>
        </div>

        <!-- Models Section -->
        <div class="mt-5">
            <h2>Elenco Modelli</h2>
            <?php if (!empty($models)): ?>
                <ul class="list-group">
                    <?php foreach ($models as $model): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Nome: <?= $model['name']; ?>, Piattaforma: <?= $model['platform']; ?></span>
                            <?php if (session()->get('logged_in')): ?>
                                <a href="<?= site_url('model/' . $model['id']) ?>"
                                    class="btn btn-primary btn-small">Visualizza</a>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Nessun modello disponibile.</p>
            <?php endif; ?>
        </div>

        <!-- Webinars Section -->
        <div class="mt-5">
            <h2>Elenco Webinar</h2>
            <?php if (!empty($webinars)): ?>
                <ul class="list-group">
                    <?php foreach ($webinars as $webinar): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Titolo: <?= $webinar['title']; ?>, Durata: <?= $webinar['duration']; ?> minuti</span>
                            <?php if (session()->get('logged_in')): ?>
                                <a href="<?= site_url('webinar/' . $webinar['id']) ?>"
                                    class="btn btn-primary btn-small">Dettagli</a>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Nessun webinar disponibile.</p>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
