<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <form method="POST" action="/habit">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="id" value="<?= $habit['id'] ?>">

                <div class="shadow sm:overflow-hidden sm:rounded-md">
                    <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Título do Hábito</label>
                            <input type="text" id="title" name="title"
                                   value="<?= $habit['title'] ?>"
                                   required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <?php if (isset($errors['title'])) : ?>
                                <p class="text-red-500 text-xs mt-2"><?= $errors['title'] ?></p>
                            <?php endif; ?>
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Descrição</label>
                            <textarea id="description" name="description" rows="3"
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"><?= $habit['description'] ?? '' ?></textarea>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-4 py-3 text-right sm:px-6 flex gap-x-4 justify-end items-center">
                        <button type="button" class="text-red-500 mr-auto text-sm font-semibold" onclick="if(confirm('Tem a certeza?')){document.querySelector('#delete-form').submit();}">Eliminar</button>
                        <a href="/habits" class="text-sm text-gray-600 font-semibold">Cancelar</a>
                        <button type="submit" class="bg-indigo-600 py-2 px-4 text-sm font-medium text-white rounded-md shadow-sm hover:bg-indigo-500">Atualizar</button>
                    </div>
                </div>
            </form>

            <form id="delete-form" class="hidden" method="POST" action="/habit">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $habit['id'] ?>">
            </form>
        </div>
    </main>

<?php require base_path('views/partials/footer.php') ?>