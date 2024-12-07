<x-app-layout>
    <x-slot name="header">
        filepond list
    </x-slot>
    <a href="{{ route('filepond.create') }}" class="btn btn-primary my-3">
        create
    </a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>no.</th>
                <th>image</th>
                <th>title</th>
                <th>file</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($article as $item)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>
                        <img src="{{ $item->file ? Storage::url($item->file) : asset('image/default.svg') }}"
                            alt="image" height="30">
                    </td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->file }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
