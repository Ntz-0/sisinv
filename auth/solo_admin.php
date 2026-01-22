<?php
if ($_SESSION['user']['rol'] != 'admin') {
    die("Acceso denegado");
}
