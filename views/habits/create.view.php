<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-base font-semibold leading-6 text-gray-900">Novo Hábito</h3>
                    <p class="mt-1 text-sm text-gray-600">Defina um novo objetivo diário. Lembre-se que a consistência é a chave para o sucesso.</p>
                </div>
            </div>

            <div class="mt-5 md:col-span-2 md:mt-0">
                <form method="POST" action="/habits">
                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">

                            <div>
                                <label for="title" class="block text-sm font-medium leading-6 text-gray-900">
                                    Título do Hábito
                                </label>
                                <div class="mt-2">
                                    <input
                                            type="text"
                                            id="title"
                                            name="title"
                                            value="<?= $_POST['title'] ?? '' ?>"
                                            required
                                            placeholder="Ex: Beber 2L de água"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    >
                                </div>
                                <?php if (isset($errors['title'])) : ?>
                                    <p class="text-red-500 text-xs mt-2"><?= $errors['title'] ?></p>
                                <?php endif; ?>
                            </div>

                            <div>
                                <label for="description" class="block text-sm font-medium leading-6 text-gray-900">
                                    Descrição (Opcional)
                                </label>
                                <div class="mt-2">
                                    <textarea
                                            id="description"
                                            name="description"
                                            rows="3"
                                            placeholder="Detalhes sobre como ou quando pretende realizar este hábito..."
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    ><?= $_POST['description'] ?? '' ?></textarea>
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">Escreva uma breve descrição para o ajudar a manter o foco.</p>
                            </div>

                        </div>

                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6 flex items-center justify-end gap-x-4">
                            <a href="/habits" class="text-sm font-semibold leading-6 text-gray-900">Cancelar</a>
                            <button
                                    type="submit"
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                            >
                                Guardar Hábito
                            </button>
                        </div>
                    </div>
                </form>
            </div>