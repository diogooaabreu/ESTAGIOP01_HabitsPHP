<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">A Minha Lista de Hábitos</h2>
                <a href="/habits/create"
                   class="inline-flex items-center gap-x-2 rounded-md bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 transition-colors">
                    Novo Hábito
                </a>
            </div>

            <?php if (empty($habits)) : ?>
                <div class="text-center py-12 bg-white rounded-xl shadow-sm ring-1 ring-gray-900/5">
                    <p class="text-gray-500 italic">Ainda não tem hábitos registados.</p>
                </div>
            <?php else : ?>
                <ul class="divide-y divide-gray-100 bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl">
                    <?php foreach ($habits as $habit) : ?>
                        <li class="flex justify-between items-center gap-x-6 px-4 py-5 hover:bg-gray-50 sm:px-6">
                            <div class="flex min-w-0 gap-x-4">
                                <div class="min-w-0 flex-auto">
                                    <p class="text-sm font-semibold leading-6 text-gray-900">
                                        <a href="/habit?id=<?= $habit['id'] ?>" class="hover:underline">
                                            <?= htmlspecialchars($habit['title']) ?>
                                        </a>
                                    </p>
                                    <p class="mt-1 text-xs leading-5 text-gray-500">
                                        <?= htmlspecialchars($habit['description'] ?? 'Sem descrição') ?>
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-center gap-x-3">
                                <a href="/habit/edit?id=<?= $habit['id'] ?>"
                                   class="rounded-md bg-white px-3 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                    Editar
                                </a>

                                <form method="POST" action="/habit" onsubmit="return confirm('Tem a certeza que deseja eliminar este hábito?');">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="id" value="<?= $habit['id'] ?>">
                                    <button type="submit"
                                            class="rounded-md bg-red-50 px-3 py-1.5 text-sm font-semibold text-red-600 shadow-sm ring-1 ring-inset ring-red-300 hover:bg-red-100">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </main>

<?php require base_path('views/partials/footer.php') ?>