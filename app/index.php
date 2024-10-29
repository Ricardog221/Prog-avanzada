<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página de Acceso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            border-radius: 12px 12px 0 0;
            padding: 1.5rem;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: none;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 8px;
        }
        .form-text {
            font-size: 0.85rem;
            color: #6c757d;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Bienvenido de Nuevo</h3>
                </div>
                <div class="card-body p-5">
                    <form method="POST" action="AuthController.php">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="ejemplo_21@alu.uabcs.mx" required name="correo">
                            <div id="emailHelp" class="form-text">Ingrese su correo electrónico registrado</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="* * * * * " required name="contrasenna">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Mantener la sesión abierta</label>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Acceder</button>
                        </div>
                        <input type="hidden" name="action" value="access">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
