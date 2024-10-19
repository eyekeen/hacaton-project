<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Отпраленные заявки
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
                        <form action="{{ route('dean.acceptpetition') }}" method="POST">
                            @csrf
                            <input type="hidden" name="p_id" value="{{ $petition->id }}">
                            <button class="accept-button dark:bg-green-500 text-white font-bold py-2 px-4 rounded">
                                Принять
                            </button>
                        </form>
                        <form action="{{ route('dean.declinepetition') }}" method="POST">
                            @csrf
                            <input type="hidden" name="p_id" value="{{ $petition->id }}">
                            <button class="reject-button dark:bg-red-500 text-white font-bold py-2 px-4 rounded">
                                Отклонить
                            </button>
                        </form><br />
                        <a href="{{ $petition->documents->uri }}" class="text-decoration-line: underline">Ссылка на файл</a><br />
                        <h5>*Примечание</h5>
                    </div>
                    <div>
                        ФИО Студента: {{ $petition->users->name }}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endisset

        @empty($petitions)
        <h1 class="text-white">Нету заявок</h1>
        @endempty

    </div>
</x-app-layout>