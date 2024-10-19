<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Отправить заявку
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form class="max-w-sm mx-auto" method="POST" action="{{ route('student.sendpetition.store') }}">
                        @csrf
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Выберите отдел</label>
                        <select name="document" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="1">Учебный отдел</option>
                            <option value="2">Отдел кадров</option>
                        </select>
                        <label for="document" class="block mt-2 mb-2 text-sm font-medium text-gray-900 dark:text-white">Выберите заявку/справку</label>
                        <select name="document" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach($documents as $document)
                            <option value="{{ $document->id }}">{{ $document->document_name }}</option>
                            @endforeach
                        </select>
                        <label for="methodolog" class="block mt-2 mb-2 text-sm font-medium text-gray-900 dark:text-white">Выберите получателя</label>
                        <select name="methodolog" id="methodolog" class="bg-gray-50 mt-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach($methodologist as $methodolog)
                                <option value="{{ $methodolog->id }}">{{ $methodolog->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Отправить заявку</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>