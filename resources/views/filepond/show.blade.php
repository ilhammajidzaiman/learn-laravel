<x-app-layout>
    <x-slot name="header">
        filepond list
    </x-slot>

    @if (is_array($article->attachment) && count($article->attachment) > 0)
        <div class="attachment">
            <h5>Attachment</h5>
            <div class="row">
                @foreach ($article->attachment as $attachment)
                    <div class="col-md-3 mb-3">
                        @php
                            $path = storage_path('app/public/' . $attachment);
                            $isImage = @getimagesize($path) !== false; // Periksa apakah file adalah gambar
                        @endphp
                        @if ($isImage)
                            <img src="{{ asset('storage/' . $attachment) }}" alt="Attachment" class="img-thumbnail">
                        @else
                            <a href="{{ asset('storage/' . $attachment) }}" target="_blank">
                                {{ $attachment }}
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p>No attachment available.</p>
    @endif


</x-app-layout>
