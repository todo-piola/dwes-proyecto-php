<?php
// Procesar aceptación o rechazo
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['aceptar_cookies'])) {
        setcookie("cookies_franco", "aceptadas", time() + 60*60*24*365, "/");
    } elseif (isset($_POST['rechazar_cookies'])) {
        setcookie("cookies_franco", "rechazadas", time() + 60*60*24*365, "/");
    }
    header("Location: /dwes-proyecto-php/index.php");
    exit();
}
?>

<?php if (!isset($_COOKIE['cookies_franco'])): ?>
<!-- Modal forzar visible -->
<div class="modal fade show" id="cookiesModal"
     tabindex="-1"
     aria-modal="true"
     role="dialog"
     style="display:block; background-color: rgba(0,0,0,.5);">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Política de Cookies</h5>
            </div>

            <div class="modal-body">
                <p>
                    Esta web utiliza cookies para mejorar tu experiencia de usuario. Puedes aceptar o rechazar su uso.
                </p>
            </div>

            <div class="modal-footer d-flex justify-content-between">
                <form method="post">
                    <button name="rechazar_cookies" class="btn btn-outline-secondary">
                        Rechazar
                    </button>
                </form>

                <form method="post">
                    <button name="aceptar_cookies" class="btn btn-warning">
                        Aceptar
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
<?php endif; ?>