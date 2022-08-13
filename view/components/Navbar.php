        <div class="antialiased bg-gray-400 dark-mode:bg-gray-900 border-b-2 border-blue-500">
            <div
                class="w-full text-gray-700 bg-gradient-to-r from-green-100 to-rose-200 dark-mode:text-gray-200 dark-mode:bg-gray-800">
                <div x-data="{ open: true }"
                    class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                    <div class="flex flex-row items-center justify-between p-2">
                        <a href="/" class="uppercase font-bold text-rose-400 text-4xl">
                            clinic
                        </a>
                        <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline"
                            @click="open = !open">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                                <path x-show="!open" fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                                <path x-show="open" fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <nav :class="{'flex': open, 'hidden': !open}"
                        class="flex-col flex-grow hidden pb-4 md:pb-0 md:flex md:justify-end md:flex-row items-center">

                        <!-- search bar -->
                        <?php if ($path != 'home') : ?>
                        <form method="get" action="/doctors"
                            class="md:w-1/4 w-full flex justify-between items-center select-none border border-rose-300 p-2 rounded-3xl">
                            <input name="search" class="bg-transparent focus:outline-none " placeholder="Search" />
                            <button type="submit" class="hover:text-green-500 dark-hover:text-green-300
						cursor-pointer ml-3 transition duration-500 ease-in-out">

                                <svg viewBox="0 0 512 512" class="h-5 w-5 fill-current">
                                    <path d="M505 442.7L405.3
								343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7
								44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1
								208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4
								2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9
								0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7
								0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0
								128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                                </svg>
                            </button>
                        </form>
                        <?php endif ?>
                        <!-- ./search bar -->

                        <div @click.away="open = false" class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex flex-row text-gray-900 bg-gray-200 items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 focus:text-green-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline hover:text-green-500 dark-hover:text-green-300
						    cursor-pointer transition duration-200 ease-in-out">
                                <span>Sections</span>
                                <svg fill="currentColor" viewBox="0 0 20 20"
                                    :class="{'rotate-180': open, 'rotate-0': !open}"
                                    class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="absolute right-0 w-full md:max-w-screen-sm md:w-screen mt-2 origin-top-right"
                                style="display: none">
                                <div class="px-2 pt-2 pb-4 bg-white rounded-md shadow-lg dark-mode:bg-gray-700">
                                    <form class="grid grid-cols-1 md:grid-cols-4 gap-4" action="./doctors">
                                        <?php foreach ($data['department'] as $department):?>
                                        <button name="filter[department]" value="<?= $department->name?>" class="btn">
                                            <span class="noselect"><?= $department->name?></span>
                                        </button>
                                        <?php endforeach; ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-0 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline capitalize hover:text-green-500 dark-hover:text-green-300
						cursor-pointer mr-3 transition duration-200 ease-in-out" href="/doctors">doctors</a>
                        <?php 
                        if (!isset($_SESSION['username'])) : ?>
                        <div class="border border-rose-300 flex rounded-lg justify-between mt-3 md:mt-0">
                            <a class="flex-grow text-center px-4 py-2 mt-0 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-purple-600 dark-mode:focus:bg-purple-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-purple-200 md:ml-0 hover:bg-purple-200 focus:bg-purple-200 focus:outline-none focus:shadow-outline capitalize hover:text-green-500 dark-hover:text-green-300
                            cursor-pointer transition duration-200 ease-in-out" href="/login">login</a>
                            <a class="flex-grow text-center px-4 py-2 mt-0 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-lime-600 dark-mode:focus:bg-lime-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-lime-200 md:ml-0 hover:bg-lime-200 focus:bg-lime-200 focus:outline-none focus:shadow-outline capitalize hover:text-green-500 dark-hover:text-green-300
                            cursor-pointer transition duration-200 ease-in-out" href="/register">register</a>
                        </div>
                        <?php else: ?>
                        <div class="bg-teal-400 border border-rose-300 flex rounded-lg justify-between mt-3 md:mt-0">
                            <a class="flex-grow text-center px-4 py-2 mt-0 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-purple-600 dark-mode:focus:bg-purple-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-purple-200 md:ml-0 hover:bg-teal-200 focus:bg-teal-200 focus:outline-none focus:shadow-outline capitalize hover:text-teal-500 dark-hover:text-teal-300
                                cursor-pointer transition duration-200 ease-in-out"
                                href="/dashboard"><?= $_SESSION['username']?></a>
                        </div>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>
        </div>