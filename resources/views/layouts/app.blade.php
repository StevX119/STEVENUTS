<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Alan Resto</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body { background-color: #f9f6f1; }
    .navbar { background-color: #7b3f00 !important; }
    .navbar-brand { color: #fff !important; font-weight: bold; }
  </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="/">Alan Resto</a>
    <a href="/admin/orders" class="btn btn-warning btn-sm">Admin</a>
  </div>
</nav>

<div class="container mt-4">
  @yield('content')
</div>

</body>
</html>
