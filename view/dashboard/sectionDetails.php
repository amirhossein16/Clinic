<section class="m-5 overflow-auto">
    <div>
        <h1 class="capitalize text-4xl">Section details</h1>
        <div class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-8">

                <div class="mt-8">

                </div>
                <h2 class="text-gray-700 text-2xl font-medium">Doctors</h2>

                <div class="flex flex-col mt-8">
                    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                        <div
                            class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                            <table class="min-w-full">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Name</th>
                                        <th
                                            class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            date</th>
                                        <th
                                            class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        </th>
                                    </tr>
                                </thead>


                                <tbody class="bg-white">

                                    <?php foreach ($section as $key => $value) : ?>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div class="text-sm leading-5 font-medium text-gray-900">
                                                        <?= $value->firstName?>
                                                        <?= $value->lastName?>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-900"><?= $value->education?></div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 w-1/2">
                                            <div x-data="{confDelete<?= $key?>: false}"
                                                @click="confDelete<?= $key?> = ! confDelete<?= $key?>"
                                                class="text-sm leading-5 flex rounded-full cursor-pointer">
                                                <div class="text-red-800 hover:bg-red-200 rounded p-1">remove</div>
                                                <form x-show="confDelete<?= $key?>" x-transition.duration.500ms
                                                    class="m-auto flex items-center gap-5" style="display: none"
                                                    method="post">
                                                    <input type="hidden" name="_method" value="delete">
                                                    are you sure?
                                                    <div class="bg-green-200 hover:bg-green-300 rounded p-1">cancel
                                                    </div>
                                                    <button name="doctorID" value="<?= $value->doctor_id?>"
                                                        class="bg-red-200 hover:bg-red-300 rounded p-1">yes</button>
                                                </form>
                                            </div>
                                        </td>

                                    </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div>
        <div class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-8">

                <div class="mt-8">

                </div>
                <h3 class="text-gray-700 text-2xl font-medium capitalize">available doctors</h3>

                <div class="flex flex-col mt-8">
                    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                        <div
                            class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                            <table class="min-w-full">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Name</th>
                                        <th
                                            class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            education</th>
                                        <th
                                            class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        </th>

                                    </tr>
                                </thead>

                                <tbody class="bg-white">

                                    <?php foreach ($available as $value) : ?>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div class="text-sm leading-5 font-medium text-gray-900">
                                                        <?= $value->firstName?>
                                                        <?= $value->lastName?>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-900"><?= $value->education?></div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 w-1/2">
                                            <div x-data="{confDelete<?= $key?>: false}"
                                                @click="confDelete<?= $key?> = ! confDelete<?= $key?>"
                                                class="text-sm leading-5 flex rounded-full cursor-pointer">
                                                <div class="text-teal-800 hover:bg-teal-200 rounded p-1">add</div>
                                                <form x-show="confDelete<?= $key?>" x-transition.duration.500ms
                                                    class="m-auto flex items-center gap-5" style="display: none"
                                                    method="post">
                                                    are you sure?
                                                    <div class="bg-red-200 hover:bg-red-300 rounded p-1">cancel
                                                    </div>
                                                    <button name="doctorID" value="<?= $value->doctor_id?>"
                                                        class="bg-green-200 hover:bg-green-300 rounded p-1">yes</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>