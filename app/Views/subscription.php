<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Iscriviti a una Piattaforma - MLSolutions</title>
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
            max-width: 600px;
            /* Reduce max-width for a narrower layout */
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
                <h2 class="card-title text-center">Iscriviti a una Piattaforma</h2>
                <form action="<?= site_url('iscriviti') ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="platform_type" class="form-label">Piattaforma</label>
                        <select class="form-control" id="platform_select" name="platform_type"
                            onchange="updatePlatformDetails()">
                            <option value="">Seleziona una piattaforma</option>
                            <?php foreach ($platforms as $platform): ?>
                                <option value="<?= $platform['id']; ?>"
                                    data-platform-type="<?= $platform['platform_type']; ?>">
                                    <?= $platform['platform_type']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- Hidden inputs to store the selected platform ID and type -->
                    <input type="hidden" id="platform_id" name="platform_id">
                    <input type="hidden" id="platform_type" name="platform_type">
                    <button type="submit" class="btn btn-primary">Iscriviti</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function updatePlatformDetails() {
            var select = document.getElementById('platform_select');
            var selectedOption = select.options[select.selectedIndex];
            document.getElementById('platform_id').value = selectedOption.value;
            document.getElementById('platform_type').value = selectedOption.getAttribute('data-platform-type');
        }
    </script>

    <div class="footer">
        <p>&copy; 2024 MLSolutions. Tutti i diritti riservati.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
