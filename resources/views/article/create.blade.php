<x-app-layout>
    <x-slot name="header">
        article create
    </x-slot>

    <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">content</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <input type="file" name="file" id="file" class="filepond" />
        <input type="file" name="attachment[]" id="attachment" class="filepond" multiple />
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-app-layout>
