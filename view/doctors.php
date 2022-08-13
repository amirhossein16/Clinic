<div class="h-screen w-full flex overflow-hidden">
    <main class="flex-1 flex flex-col bg-gray-100 dark:bg-gray-700 transition
    duration-500 ease-in-out overflow-y-auto">
        {{Navbar}}
        <div class="my-2 px-10">
            <nav class="flex flex-row justify-between border-b
				dark:border-gray-600 dark:text-gray-400 transition duration-500
				ease-in-out">
                <div class="flex">
                    <!-- Top NavBar -->

                    <a href="/doctors" class="py-2 block text-green-500 border-green-500
						dark:text-green-200 dark:border-green-200
						focus:outline-none border-b-2 font-medium capitalize
						transition duration-500 ease-in-out">
                        All
                    </a>
                    <div x-data="{fellowships: false}" @mouseover="fellowships = true"
                         @mouseover.away="fellowships = false"
                    =false" class="group ml-6 py-2 block border-b-2 border-transparent
						hover:outline-none font-medium capitalize text-center
						hover:text-green-500 hover:border-green-500
						dark-hover:text-green-200 dark-hover:border-green-200
						transition duration-500 ease-in-out cursor-pointer relative">
                    Education
                    <form x-show="fellowships" x-transition-duration.500ms
                          class="grid md:grid-cols-6 grid-cols-3 bg-teal-50 p-5 border border-gray-500 absolute top-[2.65rem] inset-x-0 rounded-xl w-[90vw] -left-[4.5rem] ">
                        <?php foreach ($education as $educations) : ?>
                            <?php if (is_null($educations->education)) continue ?>
                            <button name="filter[education]" value="<?= $educations->education ?>" class="
                                h-12 rounded capitalize 
                                bg-gradient-to-r from-teal-100 via-purple-100 to-rose-100 bg-no-repeat bg-right  bg-[length:0_100%] transition-[background-size] duration-500 ease-out hover:bg-[length:100%_100%] hover:bg-left hover:text-rose-700 hover:font-bold
                                "><?= $educations->education ?></button>
                        <?php endforeach; ?>
                    </form>
                </div>

        </div>

        </nav>
        <h2 class="my-4 text-4xl font-semibold dark:text-gray-400">
            Doctors list
        </h2>
        <div class="pb-2 flex items-center justify-between text-gray-600
				dark:text-gray-400 border-b dark:border-gray-600">
            <!-- Header -->

            <div>
                    <span>
                        <span class="text-green-500 dark:text-green-200">
                            <?= $doctorsCount ?>
                        </span>
                        doctors;
                    </span>
                <span>
                        <span class="text-green-500 dark:text-green-200">
                            20
                        </span>
                        show per page;
                    </span>
            </div>
        </div>
        <form method="get" action="/doctors?<?= $_SERVER['QUERY_STRING'] ?? null ?>"
              class="mt-6 px-4 text-gray-600 dark:text-gray-400">
            <!-- List sorting -->
            <?php if (isset($_GET['search'])) : ?>
                <input type="hidden" name="search" value="<?= $_GET['search'] ?>">
            <?php endif; ?>
            <?php if (isset($_GET['filter']['section'])) : ?>
                <input type="hidden" name="filter[section]" value="<?= $_GET['filter']['section'] ?>">
            <?php endif; ?>
            <?php if (isset($_GET['filter']['education'])) : ?>
                <input type="hidden" name="filter[education]" value="<?= $_GET['filter']['education'] ?>">
            <?php endif; ?>


            <div class="grid grid-cols-2 capitalize">
                <!-- Left side -->
                <div class="w-[90%] ml-auto flex justify-evenly mx-2">
                    <div class="w-1/4">
                        <input type="radio" name="filter[sortBy]" value="lastName:ASC" id="lastName:ASC"
                               class="peer hidden" onchange="this.form.submit()"
                            <?= isset($filter['sortBy']) && $filter['sortBy'] == 'lastName:ASC' ? 'checked' : null; ?> />
                        <label for="lastName:ASC"
                               class=" block cursor-pointer select-none rounded-xl p-2 text-center hover:bg-gray-800 hover:text-white peer-checked:bg-green-400 peer-checked:font-bold peer-checked:text-gray-600">
                            name
                            <i class="fa-solid fa-arrow-down-a-z"></i>
                        </label>
                    </div>
                    <div class="w-1/4">
                        <input type="radio" name="filter[sortBy]" value="lastName:DESC" id="lastName:DESC"
                               class=" peer hidden" onchange="this.form.submit()"
                            <?= isset($filter['sortBy']) && $filter['sortBy'] == 'lastName:DESC' ? 'checked' : null; ?> />
                        <label for="lastName:DESC"
                               class="block cursor-pointer select-none rounded-xl p-2 text-center hover:bg-gray-800 hover:text-white peer-checked:bg-green-400 peer-checked:font-bold peer-checked:text-gray-600">
                            name
                            <i class="fa-solid fa-arrow-up-a-z"></i>
                        </label>
                    </div>
                </div>

                <div class="flex justify-evenly mx-2">
                    <div class="w-1/4">
                        <input type="radio" name="filter[sortBy]" value="education:ASC" id="education:ASC"
                               class="peer hidden" onchange="this.form.submit()"
                            <?= isset($filter['sortBy']) && $filter['sortBy'] == 'education:ASC' ? 'checked' : null; ?> />
                        <label for="education:ASC"
                               class=" block cursor-pointer select-none rounded-xl p-2 text-center hover:bg-gray-800 hover:text-white peer-checked:bg-green-400 peer-checked:font-bold peer-checked:text-gray-600">
                            fellowship
                            <i class="fa-solid fa-arrow-down-a-z"></i>
                        </label>
                    </div>
                    <div class="w-1/4">
                        <input type="radio" name="filter[sortBy]" value="education:DESC" id="education:DESC"
                               class=" peer hidden" onchange="this.form.submit()"
                            <?= isset($filter['sortBy']) && $filter['sortBy'] == 'education:DESC' ? 'checked' : null; ?> />
                        <label for="education:DESC"
                               class="block cursor-pointer select-none rounded-xl p-2 text-center hover:bg-gray-800 hover:text-white peer-checked:bg-green-400 peer-checked:font-bold peer-checked:text-gray-600">
                            fellowship
                            <i class="fa-solid fa-arrow-up-a-z"></i>
                        </label>
                    </div>
                </div>
            </div>
        </form>

        <?php foreach ($doctors as $doctor) : ?>
            <?php $doctor = (array)$doctor; ?>
            <div class="mt-2 px-4 py-4 bg-white hover:translate-y-[-0.25rem] hover:bg-green-50 duration-300
				dark:bg-gray-600 shadow-xl rounded-lg cursor-pointer delay-200">
                <!-- Card -->

                <a href="/profile?<?= $doctor['id'] ?>" class="grid grid-cols-2">
                    <!-- Left side -->
                    <div class="flex">
                        <?php if (file_exists("storage/avatars/$doctor[id].jpg")): ?>
                            <img class="h-12 w-12 rounded-full object-cover"
                                 src="<?= storage_url . "avatars/$doctor[id].jpg" ?>" alt=""/>
                        <?php else: ?>
                            <div class="h-12 w-12 rounded-full flex justify-center items-center font-bold"
                                 style="background-color: rgb(<?= rand(0, 255) ?>, <?= rand(0, 255) ?>, <?= rand(0, 255) ?>, 0.25)">
                                <?= substr($doctor['lastName'], 0, 1) ?></div>
                        <?php endif ?>

                        <div class="flex flex-col justify-between capitalize text-gray-600
                    dark:text-gray-400 m-auto">
                            <div class="mt-2 text-black dark:text-gray-200">
                                <?= $doctor['FirstName'] . ' ' . $doctor['lastName'] ?>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col capitalize text-gray-600
						dark:text-gray-400 m-auto">
                        <span class="mt-2 text-black dark:text-gray-200">
                            <?= $doctor['education'] ?>
                        </span>

                    </div>
                </a>

            </div>
        <?php endforeach; ?>
        <div class="flex flex-col items-center my-12">
            <div class="flex text-gray-700">
                <?php $currentPage = $_GET['page'] ?? 1; ?>
                <?php if ($currentPage > 1) : ?>
                    <a href="?page=<?= $currentPage - 1 ?><?= isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING']) ? '&' . preg_replace('/page=.*/', '', $_SERVER['QUERY_STRING']) : null ?>"
                       class="h-12 w-12 mr-1 flex justify-center items-center rounded-full bg-gray-200 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-chevron-left w-6 h-6">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    </a>
                <?php endif ?>
                <div class="flex h-12 font-medium rounded-full bg-gray-200">

                    <?php
                    $query = preg_replace('/page=\d*/', '', $_SERVER['QUERY_STRING'] ?? '');
                    if ($query[0] == '&') {
                        $query = substr($query, 1);
                    }

                    foreach ($pagination as $page) : ?>
                        <a href="?page=<?= $page ?><?= !empty($query) ? '&' . $query : null ?>"
                           class="w-12 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full <?= $page == $currentPage ? 'bg-teal-600 text-white' : null; ?> "><?= $page ?></a>
                    <?php endforeach; ?>
                </div>
                <?php if ($currentPage < end($pagination)) : ?>
                    <a href="?page=<?= $currentPage + 1 ?><?= !empty($query) ? '&' . $query : null ?>"
                       class="h-12 w-12 ml-1 flex justify-center items-center rounded-full bg-gray-200 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-chevron-right w-6 h-6">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </a>
                <?php endif ?>
            </div>
        </div>
</div>
</main>
</div>