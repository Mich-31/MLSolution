<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Registrazione - MLSolutions</title>
    <!-- Bootstrap CSS -->
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
            max-width: 600px;
            margin: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 2rem;
        }

        .card-body {
            padding: 2rem;
        }

        .form-label,
        .card-title {
            color: #007bff; /* Blue color for labels and title */
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

        .btn-primary,
        .btn-secondary {
            width: 100%;
            margin-top: 10px;
            border-radius: 20px;
        }

        .btn-primary {
            background-color: #007bff; /* Blue button background */
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover */
            border-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d; /* Gray button background */
            border-color: #6c757d;
            color: #ffffff; /* White text for secondary button */
        }

        .btn-secondary:hover {
            background-color: #5a6268; /* Darker gray on hover */
            border-color: #5a6268;
        }

        .footer {
            background-color: #333333; /* Dark background for footer */
            color: #ffffff; /* White text for footer */
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
                <h2 class="card-title text-center">Registrazione</h2>
                <form action="<?= site_url('registra') ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="companyName" class="form-label">Nome Azienda</label>
                        <input type="text" class="form-control" id="company_name" name="company_name"
                            placeholder="Inserisci il nome dell'azienda" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="firstName" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            placeholder="Inserisci il tuo nome" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Cognome</label>
                        <input type="text" class="form-control" id="surname" name="surname"
                            placeholder="Inserisci il tuo cognome" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Inserisci il tuo indirizzo email" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Inserisci la tua password" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="paymentInformation" class="form-label">Tipo di Pagamento</label>
                        <select class="form-select" id="payment_information" name="payment_information"
                            required>
                            <option value="" selected disabled>Seleziona un'opzione</option>
                            <option value="IBAN">IBAN</option>
                            <option value="Carta di Credito">Carta di Credito</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="paymentIdentifier" class="form-label">Numero</label>
                        <input type="text" class="form-control" id="paymentIdentifier" name="paymentIdentifier"
                            placeholder="Inserisci il numero di pagamento" required autocomplete="off">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Registra</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2024 MLSolutions. Tutti i diritti riservati.</p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>