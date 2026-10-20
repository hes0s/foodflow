<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= SITE_NAME ?> — <?= SITE_SLOGAN ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="topbar">
        <div class="container nav-wrap">
            <div class="brand">
                <span class="logo-badge">🌿</span>
                <div>
                    <h1><?= SITE_NAME ?></h1>
                    <p class="subtitle"><?= SITE_SLOGAN ?></p>
                </div>
            </div>
            <div class="evening-pill">
                ⏰ Interval ridicare seară: <strong><?= DISCOUNT_HOUR ?></strong> (Reduceri până la <?= DEFAULT_DISCOUNT ?>%)
            </div>
        </div>
    </header>
