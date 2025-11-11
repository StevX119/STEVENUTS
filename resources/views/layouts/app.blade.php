<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Alan Resto</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f9f6f1;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .navbar {
      background-color: #7b3f00 !important;
    }

    .navbar-brand {
      font-weight: bold;
      color: #fff !important;
    }

    .nav-link {
      color: #fff !important;
      font-weight: 500;
    }

    .nav-link:hover {
      text-decoration: underline;
    }

    footer {
      background-color: #7b3f00;
      color: #fff;
      text-align: center;
      padding: 15px 0;
      margin-top: 50px;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="/">Alan Resto</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="/admin/orders" class="nav-link">Admin</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Konten Utama -->
  <div class="container mt-4">
    @yield('content')
  </div>

  <!-- Footer -->
  <footer>
    <p class="mb-0">© 2025 Alan Resto | Laravel</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
