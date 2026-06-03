<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <div class="mb-6">
                <a href="/habits" class="text-indigo-600 hover:text-indigo-800 text-sm flex items-center gap-1">
                    ← Voltar para a lista
                </a>
            </div>

            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Detalhes do Hábito</h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">Informações completas sobre o seu objetivo.</p>
                    </div>
                    <div class="flex gap-3">
                        <a href="/habit/edit?id=<?= $habit['id'] ?>"
                           class="rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                            Editar
                        </a>
                    </div>
                </div>

                <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                    <dl class="sm:divide-y sm:divide-gray-200">
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Título</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <?= htmlspecialchars($habit['title']) ?>
                            </dd>
                        </div>

                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Descrição</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <?= htmlspecialchars($habit['description'] ?? 'Sem descrição adicional.') ?>
                            </dd>
                        </div>

                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Data de Criação</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <?= date('d/m/Y H:i', strtotime($habit['created_at'])) ?>
                            </dd>
                        </div>
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Criado por</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
        <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
            <?= htmlspecialchars($habit['owner_email']) ?>
        </span>
                            </dd>
                        </div>




            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Partilhado com</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <?php if (empty($sharedWith)) : ?>
                        <span class="text-gray-400 italic">Este hábito ainda não foi partilhado.</span>
                    <?php else : ?>
                        <div class="flex flex-wrap gap-2">
                            <?php foreach ($sharedWith as $user) : ?>
                                <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">
                        <?= htmlspecialchars($user['email']) ?>
                    </span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </dd>
            </div>
                    </dl>
                </div>
            </div>

            <div class="mt-6 bg-gray-50 p-4 rounded-lg border border-dashed border-gray-300">
                <form method="POST" action="/habit/share" class="flex items-center gap-4">
                    <input type="hidden" name="id" value="<?= $habit['id'] ?>">
                    <input type="email" name="email" placeholder="Email do amigo..." required
                           class="rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
                    <button type="submit" class="text-sm font-semibold text-indigo-600 hover:text-indigo-500">
                        Partilhar Hábito
                    </button>
                </form>
            </div>
        </div>
    </main>

<?php require base_path('views/partials/footer.php') ?>