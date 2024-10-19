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
    <div class="flex justify-center min-h-screen bg-gray-900">
        <div class="w-full max-w-xl bg-gray-800 rounded-lg shadow-md p-8 border border-gray-700">
            <table class="min-w-full text-white">
                <thead class="bg-gray-700">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider border border-gray-500">Номер заявки</th>
                        <th scope="col" class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider border border-gray-500">Заявка</th>
                        <th scope="col" class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider border border-gray-500">Дата отправки</th>
                        <th scope="col" class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider border border-gray-500">Статус</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-800">
                    <tr class="hover:bg-gray-700 transition duration-300 ease-in-out">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium border border-gray-500">1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm border border-gray-500">
                           <a href="#">Повышенная стипендия</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm border border-gray-500">19.10.2024</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm border border-gray-500">В процессе</td>
                    </tr>
                    <tr class="hover:bg-gray-700 transition duration-300 ease-in-out">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium border border-gray-500">1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm border border-gray-500">
                           <a href="#">Повышенная стипендия</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm border border-gray-500">19.10.2024</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm border border-gray-500">В процессе</td>
                    </tr>
                    <tr class="hover:bg-gray-700 transition duration-300 ease-in-out">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium border border-gray-500">1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm border border-gray-500">
                           <a href="#">Повышенная стипендия</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm border border-gray-500">19.10.2024</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm border border-gray-500">В процессе</td>
                    </tr>
                    <tr class="hover:bg-gray-700 transition duration-300 ease-in-out">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium border border-gray-500">1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm border border-gray-500">
                           <a href="#">Повышенная стипендия</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm border border-gray-500">19.10.2024</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm border border-gray-500">В процессе</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


</x-app-layout>