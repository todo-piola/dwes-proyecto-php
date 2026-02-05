<?php
// Uso GET para no interferir con el resto de formularios
if (isset($_GET['accion_cookies'])) {
    if ($_GET['accion_cookies'] === 'aceptar') {
        setcookie("cookies_franco", "aceptadas", time() + 60*60*24*365, "/");
    } elseif ($_GET['accion_cookies'] === 'rechazar') {
        setcookie("cookies_franco", "rechazadas", time() + 60*60*24*365, "/");
    }
    
    // Si la cookie está guardada, redirige a la url de origen
    $url_limpia = strtok($_SERVER['REQUEST_URI'], '?');
    header("Location: $url_limpia");
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
                <a href="?accion_cookies=rechazar" class="btn btn-outline-secondary">
                    Rechazar
                </a>
                <a href="?accion_cookies=aceptar" class="btn btn-warning">
                    Aceptar
                </a>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>