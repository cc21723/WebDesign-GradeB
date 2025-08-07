<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid d-flex justify-content-between">
        <a class="navbar-brand " href="index.php">🌸花見漫漫美學🌸</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mb-2 mb-lg-0 ms-md-auto w-100">
                <li class="nav-item"><a class="nav-link nav-ajax" data-page="home" href="#">🐰 首頁</a></li>
                <li class="nav-item"><a class="nav-link nav-ajax" data-page="gallery" href="#">✨ 作品集</a></li>
                <li class="nav-item"><a class="nav-link nav-ajax" data-page="about" href="#">🎀 關於我</a></li>
                <li class="nav-item"><a class="nav-link nav-ajax" data-page="reserve" href="#">✉️ 預約</a></li>
                <?php if (isset($_SESSION['login'])): ?>
                    <li class="nav-item"><a class="nav-link" href="../../hanami/dashboard.php">🔐 返回管理</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="../../hanami/pages/login.php">🔐 管理員登入</a></li>
                <?php endif; ?>
            </ul>

        </div>
        <!-- <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link nav-ajax" data-page="home" href="#">🐰 首頁</a></li>
            <li class="nav-item"><a class="nav-link nav-ajax" data-page="gallery" href="#">✨ 作品集</a></li>
            <li class="nav-item"><a class="nav-link nav-ajax" data-page="about" href="#">🎀 關於我</a></li>
            <li class="nav-item"><a class="nav-link nav-ajax" data-page="reserve" href="#">✉️預約</a></li> -->
        <!-- <li class="nav-item"><a class="nav-link" href="../pages/login.php">🔐 管理登入</a></li> -->

        <!-- </ul> -->

    </div>
</nav>