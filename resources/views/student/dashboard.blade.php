<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Заявки
                </div>
            </div>
        </div>
    </div>

    <div class="dark:text-white relative flex flex-col w-full h-full">
        <table class="table-auto w-full text-left min-w-max border">
            <thead class="border">
                <tr>
                    <th class="border">#</th>
                    <th class="border">s name</th>
                    <th class="border">date of publish</th>
                    <th class="border">status</th>
                </tr>
            </thead>
            <tbody class="border">
                <tr>
                    <td class="border">1</td>
                    <td class="border">стипендия</td>
                    <td class="border">19.10.2024</td>
                    <td class="border">pending</td>
                </tr>
            </tbody>
        </table>
    </div>

    <button class="text-white mt-4">
        Отправить заявку
    </button>


</x-app-layout>