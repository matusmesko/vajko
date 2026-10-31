<?php

/** @var string $contentHTML */
/** @var \Framework\Auth\AppUser $user */
/** @var \Framework\Support\LinkGenerator $link */
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Študentský Bazár</title>
    <link rel="stylesheet" href="<?= $link->asset('css/styl.css') ?>">
</head>
<body>

<header>
    <div class="desktop-header">
        <div class="top-bar">
            <div class="brand">
                <div class="logo">Logo</div>
                <div class="brand-title">Študentský Bazár</div>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Hľadať inzeráty...">
            </div>
            <div class="auth-buttons">
                <button>Prihlásiť sa</button>
                <button>Zaregistrovať</button>
            </div>
        </div>

        <nav class="nav-bar">
            <ul class="nav-links">
                <li><a href="<?= $link->url('home.index') ?>">Domov</a></li>
                <li><a href="#">Kategórie</a></li>
                <li><a href="#">Správy</a></li>
                <li><a href="#">Obľúbené</a></li>
                <li><a href="#">Moje inzeráty</a></li>
                <li><a href="<?= $link->url('home.listing') ?>">Detail inzerátu</a></li>
            </ul>
            <button>Pridať inzerát</button>
        </nav>
    </div>

    <div class="mobile-header">
        <div class="brand">
            <div class="logo">Logo</div>
            <div class="brand-title">Študentský Bazár</div>
        </div>

        <details class="burger-menu">
            <summary class="burger-icon">&#9776;</summary>
            <div class="header-collapsible">
                <div class="search-bar">
                    <input type="text" placeholder="Hľadať inzeráty...">
                </div>
                <div class="auth-buttons">
                    <button>Prihlásiť sa</button>
                    <button>Zaregistrovať</button>
                </div>
                <ul class="nav-links">
                    <li><a href="<?= $link->url('home.index') ?>">Domov</a></li>
                    <li><a href="#">Kategórie</a></li>
                    <li><a href="#">Správy</a></li>
                    <li><a href="#">Obľúbené</a></li>
                    <li><a href="#">Moje inzeráty</a></li>
                    <li><a href="<?= $link->url('home.listing') ?>">Detail inzerátu</a></li>
                </ul>
                <button>Pridať inzerát</button>
            </div>
        </details>
    </div>
</header>

<main>
    <?= $contentHTML ?>
</main>

<footer>
    <span>@ 2026 Študentský bazár</span>
    <a href="#">Podmienky používania</a>
    <a href="#">Kontakt</a>
</footer>

</body>
</html>