<x-layout>
    <main class="overflow-hidden bg-[#f7f5ef] text-[#182321]">
        <section class="mx-auto max-w-7xl px-6 py-12 sm:px-10 lg:px-12 lg:py-16">
            <a
                href="{{ route('music/index') }}"
                class="inline-flex items-center gap-2 rounded-full border border-[#d8d6ca] bg-white/70 px-4 py-2 text-sm font-semibold text-[#46544e] transition hover:border-[#1d302b] hover:text-[#b65e3e]"
            >
                <svg aria-hidden="true" class="size-4 rotate-180" viewBox="0 0 20 20" fill="none">
                    <path d="M4.167 10h11.666M10 4.167 15.833 10 10 15.833" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Back to music
            </a>

            <div class="mt-8 max-w-3xl">
                <p class="inline-flex items-center gap-2 rounded-full border border-[#d8d6ca] bg-white/70 px-4 py-2 text-xs font-semibold tracking-[0.18em] text-[#52615b] uppercase">
                    <span class="size-2 rounded-full bg-[#d8754e]"></span>
                    From the record collection
                </p>

                <h1 class="mt-6 font-serif text-5xl leading-[1.08] tracking-tight sm:text-6xl">
                    {{ $album->title }}
                </h1>

                <p class="mt-4 text-lg leading-8 text-[#59645e]">
                    {{ $album->label }}@if ($album->year) <span aria-hidden="true">&middot;</span> {{ $album->year }}@endif
                    @if ($album->format) <span aria-hidden="true">&middot;</span> {{ $album->format }}@endif
                </p>
            </div>
        </section>

        <section class="border-y border-[#e6e2d8] bg-[#efede5]">
            <div class="mx-auto grid max-w-7xl gap-6 px-6 py-10 sm:px-10 lg:grid-cols-[0.85fr_1.15fr] lg:gap-8 lg:px-12 lg:py-16">
                <article class="h-fit overflow-hidden rounded-2xl border border-[#e1ddd2] bg-[#e5e2d9] shadow-sm">
                    <div class="flex justify-center p-5 sm:p-8">
                        <img
                            src="{{ asset('images/albums/' . $album->path) }}"
                            alt="{{ $album->title }} album cover"
                            class="aspect-square w-full rounded-xl object-cover shadow-lg"
                        />
                    </div>

                    <div class="rounded-t-2xl rounded-b-2xl bg-white px-5 py-5 text-center sm:px-8">
                        <p class="text-xs font-semibold tracking-[0.18em] text-[#a45a3d] uppercase">Album details</p>
                        <p class="mt-2 font-serif text-2xl">{{ $album->title }}</p>
                        <p class="mt-2 text-sm leading-6 text-[#68736d]">
                            {{ $album->label }}
                            @if ($album->year)
                                <span aria-hidden="true">&middot;</span> {{ $album->year }}
                            @endif
                            @if ($album->format)
                                <span aria-hidden="true">&middot;</span> {{ $album->format }}
                            @endif
                        </p>
                        <p class="mx-auto mt-4 w-fit rounded-full bg-[#f5eee4] px-4 py-2 text-sm font-semibold text-[#a75c3c]">
                            ${{ $album->price }}
                        </p>
                    </div>
                </article>

                <article class="rounded-2xl border border-[#e1ddd2] bg-white p-6 shadow-sm sm:p-8">
                    <div class="border-b border-[#e6e2d8] pb-6">
                        <p class="text-xs font-semibold tracking-[0.2em] text-[#a45a3d] uppercase">The story behind the record</p>
                        <h2 class="mt-3 font-serif text-3xl tracking-tight sm:text-4xl">Music catalog</h2>
                        <p class="mt-3 text-sm leading-6 text-[#59645e]">
                            Artist: <span class="font-semibold text-[#26352f]">{{ $album->bands->name ?? 'Unknown Artist' }}</span>
                        </p>
                    </div>

                    <div class="grid gap-6 border-b border-[#e6e2d8] py-6 sm:grid-cols-2">
                        <div>
                            <h3 class="font-serif text-xl">Band members</h3>
                            <div class="mt-3 flex flex-wrap gap-2">
                                @forelse ($musicians->where('band_id', $album->band_id) as $musician)
                                    <span class="rounded-full bg-[#efede5] px-3 py-1.5 text-sm text-[#46544e]">{{ $musician->name }}</span>
                                @empty
                                    <p class="text-sm text-[#68736d]">No band members listed.</p>
                                @endforelse
                            </div>
                        </div>

                        <div>
                            <h3 class="font-serif text-xl">Album credits</h3>
                            <div class="mt-3 flex flex-wrap gap-2">
                                @forelse ($artists->where('album_id', $album->id) as $artist)
                                    <span class="rounded-full bg-[#efede5] px-3 py-1.5 text-sm text-[#46544e]">{{ $artist->name }}</span>
                                @empty
                                    <p class="text-sm text-[#68736d]">No additional credits listed.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <div class="pt-6">
                        <div class="flex flex-wrap items-end justify-between gap-3">
                            <div>
                                <p class="text-xs font-semibold tracking-[0.2em] text-[#a45a3d] uppercase">Listen closely</p>
                                <h3 class="mt-2 font-serif text-2xl">Tracklist</h3>
                            </div>
                            <div class="rounded-full bg-[#f5eee4] px-3 py-1.5 text-xs font-semibold text-[#a75c3c]">
                                Run time:
                                @forelse ($duration->where('album_id', $album->id) as $time)
                                    {{ $time->run_time }}@if (! $loop->last), @endif
                                @empty
                                    Not listed
                                @endforelse
                            </div>
                        </div>

                        @foreach ($albums as $data)
                            @if ($data->band_id == $album->band_id && $data->id == $album->id)
                                @if ($data->songs->isEmpty())
                                    <p class="mt-5 rounded-xl bg-[#f7f5ef] px-4 py-4 text-sm text-[#68736d]">
                                        No songs available for this album.
                                    </p>
                                @else
                                    <ol class="mt-5 divide-y divide-[#e6e2d8]">
                                        @php $previousSide = null; @endphp
                                        @foreach ($data->songs as $song)
                                            <li class="flex flex-wrap items-start justify-between gap-x-4 gap-y-1 py-3 first:pt-0 last:pb-0">
                                                <div>
                                                    @if ($previousSide !== null && $previousSide !== $song->side)
                                                        <p class="mb-2 text-xs font-semibold tracking-[0.16em] text-[#a45a3d] uppercase">Side {{ $song->side }}</p>
                                                    @elseif ($loop->first && $song->side)
                                                        <p class="mb-2 text-xs font-semibold tracking-[0.16em] text-[#a45a3d] uppercase">Side {{ $song->side }}</p>
                                                    @endif
                                                    <p class="font-medium text-[#26352f]">{{ $song->title }}</p>
                                                    <p class="mt-1 text-sm text-[#68736d]">{{ $song->songwriter }}</p>
                                                </div>
                                                <span class="text-sm text-[#68736d]">{{ $song->duration }}</span>
                                            </li>
                                            @php $previousSide = $song->side; @endphp
                                        @endforeach
                                    </ol>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </article>
            </div>
        </section>
    </main>
</x-layout>
