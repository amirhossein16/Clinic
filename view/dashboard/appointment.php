<section class="h-full p-5 overflow-auto">
    <form class="border-b border-blue-300 grid md:grid-cols-2 grid-cols-1 pb-2" method="get"
        action="/dashboard/appointment">
        <div class="flex ">
            <div class="input-group relative flex flex-wrap items-stretch md:w-2/3 my-auto">
                <input type="search" name="search"
                    class="form-control relative flex-auto min-w-0 block w-1/3 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border-2 border-solid border-gray-300 rounded-l transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="Search" aria-label="Search" aria-describedby="button-addon3"
                    value="<?= $_GET["search"] ?? null ?>">
                <button type="submit"
                    class="btn inline-block px-6 py-2 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase rounded-r-xl hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                    type="button" id="button-addon3">
                    Search
                </button>
            </div>
        </div>
        <div class="ml-auto mr-5 flex gap-5 text-2xl">
            <label class="text-2xl">
                <input type="radio" name="alphabet" value="ASC" class="hidden peer"
                    <?= isset($_GET['alphabet']) && $_GET['alphabet'] == 'ASC' ? 'checked' : null ?>
                    onclick="$this.filter(':checked').prop('checked', false)">
                <i
                    class="fa-solid fa-arrow-down-a-z text-teal-500 peer-checked:ring-2 ring-teal-500 rounded-full p-2 hover:bg-teal-200"></i>
            </label>
            <label>
                <input type="radio" name="alphabet" value="DESC" class="hidden peer"
                    <?= isset($_GET['alphabet']) && $_GET['alphabet'] == 'DESC' ? 'checked' : null ?>>
                <i
                    class="fa-solid fa-arrow-up-a-z text-teal-500 peer-checked:ring-2 ring-teal-500 rounded-full p-2 hover:bg-teal-200"></i>
            </label>
            <label class="text-xl text-sky-400 ring-sky-500 rounded-full">
                <input type="radio" name="time" value="ASC" class="hidden peer"
                    <?= isset($_GET['time']) && $_GET['time'] == 'ASC' ? 'checked' : null ?>>
                <i
                    class="fa-solid fa-clock text-sky-400 peer-checked:ring-2 ring-sky-500 rounded-full p-2 hover:bg-sky-200"></i>
            </label>
            <label class="text-xl text-sky-400 ring-sky-500 rounded-full">
                <input type="radio" name="time" value="DESC" class="hidden peer"
                    <?= isset($_GET['time']) && $_GET['time'] == 'DESC' ? 'checked' : null ?>>
                <i
                    class="fa-solid fa-clock-rotate-left text-sky-400 peer-checked:ring-2 ring-sky-500 rounded-full p-2 hover:bg-sky-200"></i>
            </label>
            <button class="bg-green-400 px-3 rounded-full"><i class="fa-solid fa-check"></i></button>
        </div>
    </form>
    <div class="grid grid-cols-12 max-w-5xl gap-4 mt-5">

        <?php foreach ($appointments as $appointment): ?>
        <!-- Card -->
        <div class="grid col-span-4 relative">
            <div class="group shadow-lg hover:shadow-2xl duration-200 delay-75 w-full bg-white rounded-sm py-6 pr-6 pl-9"
                href="">

                <!-- Title -->
                <p class="text-2xl font-bold text-gray-500 group-hover:text-gray-700">
                    <?= 'Dr.' . $appointment->doctorFirstName . ' ' . $appointment->doctorLastName?></p>

                <!-- Description -->
                <p class="text-sm font-semibold text-gray-500 group-hover:text-gray-700 mt-2 leading-6">
                    <?= $appointment->doctorEducation?></p>
                <p class="text-lg font-semibold text-gray-500 group-hover:text-gray-700 mt-2 leading-6">
                    <?= $appointment->date . ' ' . $appointment->time ?>
                </p>

                <!-- Color -->
                <?php if ($appointment->status):  ?>
                <div class="bg-blue-400 group-hover:bg-blue-600 h-full w-4 absolute top-0 left-0"></div>
                <?php else: ?>
                <div class="bg-red-400 group-hover:bg-red-600 h-full w-4 absolute top-0 left-0"></div>
                <?php endif; ?>

            </div>
        </div>
        <?php endforeach; ?>

    </div>
    <div class="flex flex-col items-center my-12">
        <div class="flex text-gray-700">
            <?php $currentPage = $_GET['page'] ?? 1; ?>
            <?php if ($currentPage > 1) : ?>
            <a href="?page=<?= $currentPage - 1 ?><?= isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING']) ? '&' . preg_replace('/page=.*/', '', $_SERVER['QUERY_STRING']) : null ?>"
                class="h-12 w-12 mr-1 flex justify-center items-center rounded-full bg-gray-200 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-chevron-left w-6 h-6">
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
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-chevron-right w-6 h-6">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </a>
            <?php endif ?>
        </div>
    </div>

</section>