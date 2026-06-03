<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0 flex items-center">
                    <svg class="h-8 w-8 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="ml-2 text-white font-bold text-xl">HabitsShare</span>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="/"
                           class="<?= urlIs('/') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        <a href="/about"
                           class="<?= urlIs('/about') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">About</a>
                        <?php if ($_SESSION['user'] ?? false) : ?>
                            <a href="/habits"
                               class="<?= urlIs('/habits') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Habits</a>
                        <?php endif ?>
                        <a href="/contact"
                           class="<?= urlIs('/contact') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">


                    <div class="ml-3 flex items-center gap-x-4">
                        <?php if ($_SESSION['user'] ?? false) : ?>
                            <span class="text-sm text-gray-300 mr-2">
            <?= htmlspecialchars($_SESSION['user']['email']) ?>
        </span>

                            <form method="POST" action="/session">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit"
                                        class="rounded-md bg-gray-900 px-3 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-800 transition-all border border-gray-700">
                                    Logout
                                </button>
                            </form>

                        <?php else : ?>
                            <a href="/login" class="text-sm font-semibold text-gray-300 hover:text-white">Login</a>

                            <a href="/register"
                               class="rounded-md bg-gray-900 px-3 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-800 transition-all border border-gray-700">
                                Register
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>



</nav>