<?php
error_reporting(E_ERROR|E_WARNING|E_ALL|E_PARSE|E_NOTICE)
?>
<section class="m-5 overflow-auto">
    <h2 class="capitalize font-bold text-4xl text-cyan-900">requests</h2>

    <div class="m-10 bg-blue-50 rounded-xl overflow-auto">
        <div class="grid grid-cols-6 py-1 bg-teal-600 text-cyan-200 font-bold text-xl capitalize text-center p-2">
            <div class="w-1/4 m-auto col-span-2">
                name
            </div>
            <div class="w-1/4 m-auto col-span-1">
                Role
            </div>
            <div></div>
        </div>
        <?php foreach ($unChecks as $unCheck): ?>
        <div
            class="grid grid-cols-6 py-1 odd:bg-teal-50 text-cyan-600 font-bold text-xl capitalize text-center items-center px-2 border-b">
            <div class="m-auto col-span-2">
                <?= $unCheck->username ?>
            </div>
            <div class="m-auto col-span-1">
                <?= $unCheck->role ?>
            </div>
            <div class="col-span-3">
                <form method="post" class="flex p-2 w-full justify-center space-x-0">
                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="ID" value="<?= $unCheck->id?>">
                    <input type="hidden" name="role" value="<?= $unCheck->role?>">
                    <button type="submit" name="confirm" value="denied"
                        class="min-w-auto w-32 h-10 bg-red-300 p-2 rounded-l-full hover:bg-red-500  text-white font-semibold  hover:flex-grow transition-all duration-200 ease-in-out">
                        denied
                    </button>
                    <button type="submit" name="confirm" value="accept"
                        class="min-w-auto w-32 h-10 bg-green-300 p-2 rounded-r-full hover:bg-green-500 text-white font-semibold hover:flex-grow transition-all duration-200 ease-in-out">
                        accept
                    </button>
                </form>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
    <div class="flex m-auto justify-center">
        <?php $currentPage = $_GET['page'] ?? 1; ?>
        <?php if ($currentPage > 1) : ?>
        <a href="?page=<?= $currentPage - 1 ?><?= isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING']) ? '&' . preg_replace('/page=.*/', '', $_SERVER['QUERY_STRING']) : null ?>"
            class="h-12 w-12 mr-1 flex justify-center items-center rounded-full bg-teal-50 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-chevron-left w-6 h-6">
                <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
        </a>
        <?php endif ?>
        <div class="flex h-12 font-medium rounded-full bg-teal-50">

            <?php 
            $query = preg_replace('/page=\d*/', '', $_SERVER['QUERY_STRING'] ?? '');
            if (! empty($query) && $query[0] == '&') {
                $query = substr($query, 1);
            }

            foreach ($pagination as $page) : ?>
            <a href="?page=<?= $page ?><?= !empty($query) ? '&' . $query : null ?>"
                class="w-12 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full <?= $page == $currentPage ? 'bg-teal-600 text-white' : null; ?> "><?= $page ?></a>
            <?php endforeach; ?>
        </div>
        <?php if ($currentPage < end($pagination)) : ?>
        <a href="?page=<?= $currentPage + 1 ?><?= !empty($query) ? '&' . $query : null ?>"
            class="h-12 w-12 ml-1 flex justify-center items-center rounded-full bg-teal-50 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-chevron-right w-6 h-6">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </a>
    </div>
    <?php endif ?>
</section>