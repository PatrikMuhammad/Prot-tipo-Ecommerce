<?php
// Verificar se a extensão PDO está habilitada
if (extension_loaded('pdo')) {
    echo "A extensão PDO está habilitada.";
} else {
    echo "A extensão PDO NÃO está habilitada.";
}
