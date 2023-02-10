<?php
// inicio de sesion
session_start();

// Si no hay una sesión iniciada, redirigir al login
if (!isset($_SESSION['admin']) && !isset($_SESSION['usuario'])) {
    header('Location: login.php');
} else {
    // Si hay una sesión iniciada, redirigir al index
    header('Location: dashboard.php');
}
