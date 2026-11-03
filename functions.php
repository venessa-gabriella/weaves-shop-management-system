<?php
session_start();

function e($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

?>