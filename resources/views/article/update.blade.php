<x-app-layout>
    <x-slot name="header">
        article update
    </x-slot>

    <form action="{{ route('article.update', ['id' => $article->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $article->title) }}"
                class="form-control">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">content</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ old('title', $article->title) }}</textarea>
        </div>
        <input type="file" name="file" id="file" class="filepond" />
        <input type="file" name="attachment[]" id="attachment" class="filepond" multiple />
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-app-layout>
