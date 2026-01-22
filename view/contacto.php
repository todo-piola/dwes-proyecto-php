<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/dwes-proyecto-php/public/css/estilo.css">
</head>
<body>
    <?php include ("../templates/header.html") ?>

    <section class="min-vh-100 py-5">
        <div class="container py-5">
            <div class="row">
                <!-- Formulario de contacto -->
                <div class="col-lg-6 mb-5">
                    <h1 class="display-3 mb-3">Conéctate conmigo</h1>
                    <p class="text-secondary mb-5">
                        Rellena el formulario y me pondré en contacto lo antes posible
                    </p>
                    
                    <form>
                        <div class="mb-4">
                            <input type="text" class="form-control bg-transparent text-black border-0 border-bottom border-secondary rounded-0 px-0" placeholder="Nombre">
                        </div>
                        
                        <div class="mb-4">
                            <input type="email" class="form-control bg-transparent text-white border-0 border-bottom border-secondary rounded-0 px-0" placeholder="Email">
                        </div>
                        
                        <div class="mb-4">
                            <textarea class="form-control bg-transparent text-white border-0 border-bottom border-secondary rounded-0 px-0" rows="3" placeholder="Mensaje"></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-secondary btn-sm w-50 mt-3 btn-send">Enviar</button>
                    </form>
                </div>
                
                <!-- Información de contacto -->
                <div class="col-lg-6 d-flex flex-column p-5">
                    <div class="mb-5 ">
                        <h5 class="mb-3">Visítame </h5>
                        <p class="text-secondary mb-1">Carretera de Guadarrama, 85</p>
                        <p class="text-secondary">Galapagar, Madrid</p>
                        <p class="text-secondary">28260, <strong>España</strong></p>
                    </div>
                    
                    <div class="mb-5">
                        <h5 class="mb-3">Llámame</h5>
                        <p class="text-secondary mb-1">+34 421 397 908</p>
                        <p class="text-secondary">benavidesgarciafranco@gmail.com</p>
                    </div>

                </div>
            </div>
        </div>
    </section>
    
    <?php include ("../templates/footer.html") ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>