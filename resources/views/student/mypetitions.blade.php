<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Мои заявки
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        @isset($petitions)
        @foreach($petitions as $petition)
        <div class="grid grid-cols-2 grid-rows-2 gap-4 py-4 text-white">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                <div class="grid grid-cols-2 grid-rows-2 gap-4">
                    <div># {{ $petition->id }}</div>
                    <div>Статус: {{ $petition->statuses->status }}</div>
                    <div>Тип заявки: {{ $petition->documents->document_name }}</div>
                    <div>
                        Ответ:<br />
                        <a href="/storage/uploads/{{ $petition->documents->uri }}" class="text-decoration-line: underline">Ссылка на файл с электронной подписью</a><br />
                        <h5>*Если статус заявки отмечен "Законченной" то вы можете скачать файл подписанный цифровой подписью или подписанный от руки</h5>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endisset

        @if(count($petitions) === 0)
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-2 grid-rows-2 gap-4 py-4 text-white">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                    <div class="grid grid-cols-2 grid-rows-2 gap-4">
                        <div>
                            Нет заявок
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
</x-app-layout>