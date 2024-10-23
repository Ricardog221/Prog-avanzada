<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login Page</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
  <style>
    body {
      background-color: #f8f9fa; 
    }
    .card {
      border: none;
      border-radius: 1rem;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-top: 50px; 
    }
    .card-body {
      padding: 2rem; 
    }
    .btn-primary {
      background-color: #007bff; 
      border-color: #007bff; 
    }
    .form-label {
      font-weight: bold; 
    }
    .background-image {
      background-image: url('https://us.123rf.com/450wm/manczurov/manczurov1306/manczurov130600022/22676841-fondo-azul-abstracto.jpg');
      background-size: cover;
      background-position: center;
      height: 100%;
      border-radius: 1rem 0 0 1rem; 
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="card">
      <div class="row g-0">
        <div class="col-md-6 background-image d-none d-md-block">
        </div>
        <div class="col">
          <div class="card-body">
            <form class="d-flex flex-column" method="POST" action="AuthController.php">
              <label for="email" class="form-label">Email</label>
              <input
                name="email"
                type="email"
                class="form-control mb-3"
                placeholder="Email"
                aria-label="email" />
              <div class="text-secondary mb-3">We do not share your email</div>

              <label for="password" class="form-label">Password</label>
              <input
                name="password"
                type="password"
                class="form-control mb-3"
                placeholder="Password"
                aria-label="password" />
              
              <div class="form-check mb-3">
                <input name="check" id="checkmeout" type="checkbox" class="form-check-input" />
                <label class="form-check-label" for="checkmeout">Remember me</label>
              </div>
              
              <input type="text" hidden name="action" value="login">
              <button
                class="btn btn-primary"
                type="submit">
                Submit
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>

