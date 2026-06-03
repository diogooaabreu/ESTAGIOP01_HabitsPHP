<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <p>Olá, <?= $_SESSION['user']['email'] ?? 'Visitante' ?>. Bem-vindo à tua App de Gestão de Hábitos.</p>

            <?php if (isset($_SESSION['user'])) : ?>
                <p class="mt-4">
                    <a href="/habits" class="text-blue-500 hover:underline">Ver os meus hábitos →</a>
                </p>
            <?php else : ?>
                <p class="mt-4">
                    <a href="/register" class="text-blue-500 hover:underline">Regista-te</a> para começares a trackear os teus hábitos!
                </p>
            <?php endif; ?>
        </div>
    </main>

<?php require base_path('views/partials/footer.php') ?>