<div class="relative">
    <input wire:model.debounce.300ms='search' type="search" placeholder="Search songs"
        class="w-96 rounded-lg border border-gray-300 px-4 py-2 focus:border-transparent focus:outline-none focus:ring-2 focus:ring-blue-500" />
    @if (strlen($search) > 2)
        <div
            class="absolute left-0 top-full z-50 mt-2 max-h-60 w-96 overflow-auto rounded-lg border border-gray-300 bg-white py-2 shadow-lg">
            @forelse ($searchResults as $result)
                <div class="flex cursor-pointer items-center px-4 py-2 hover:bg-gray-100">
                    <img src="{{ $result['artworkUrl60'] }}" alt="Song 1" class="h-16 w-16 rounded-lg" />
                    <div class="ml-4">
                        <a @if (array_key_exists('trackViewUrl', $result)) href="{{ $result['trackViewUrl'] }}"
                                @else
                                    href="#" @endif
                            class="font-semibold">
                            @if (array_key_exists('trackName', $result))
                                {{ $result['trackName'] }}
                            @else
                                Untitled
                            @endif
                        </a>
                        <p class="text-gray-500">
                            @if (array_key_exists('artistName', $result))
                                {{ $result['artistName'] }}
                            @else
                                No Artist
                            @endif
                        </p>
                    </div>
                </div>
            @empty
                <div class="flex cursor-pointer items-center px-4 py-2 hover:bg-gray-100">
                    <div class="ml-4">
                        <h2 class="font-semibold">No results found for {{ $search }}</h2>
                    </div>
                </div>
            @endforelse
    @endif
</div>
</div>
