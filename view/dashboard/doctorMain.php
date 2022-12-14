<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">Dashboard</h3>

        <div class="mt-4">
            <div class="flex flex-wrap -mx-6">
                <div class="w-full px-6 sm:w-1/2">
                    <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                        <div class="p-3 rounded-full bg-indigo-600 bg-opacity-75">
                            <i class="fa-solid fa-people-line text-4xl text-white"></i>
                        </div>

                        <div class="mx-5">
                            <h4 class="text-2xl font-semibold text-gray-700"><?= $userdata['countAllAppointments']?>
                            </h4>
                            <div class="text-gray-500">all appointment</div>
                        </div>
                    </div>
                </div>

                <div class="w-full mt-6 px-6 sm:w-1/2 sm:mt-0">
                    <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                        <div class="p-3 rounded-full bg-orange-600 bg-opacity-75">
                            <i class="fa-brands fa-weebly text-4xl text-white"></i>
                        </div>

                        <div class="mx-5">
                            <h4 class="text-2xl font-semibold text-gray-700"><?= $userdata['countWeekAppointments']?>
                            </h4>
                            <div class="text-gray-500">week appointment</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="mt-8">

        </div>
        <h3 class="text-gray-700 text-2xl font-medium">Patients</h3>

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
                            </tr>
                        </thead>

                        <tbody class="bg-white">

                            <?php foreach ($userdata['weekAppointments'] as $appointment) : ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm leading-5 font-medium text-gray-900"><?= $appointment->patientFirstName?> <?= $appointment->patientLastName?>
                                            </div>
                                        </div>
                                    </div>
                                </td> 

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900"><?= $appointment->Date?></div>
                                    <div class="text-sm leading-5 text-gray-500"><?= $appointment->Time?></div>
                                </td>

                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>