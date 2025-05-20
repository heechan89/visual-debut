@php
  $headingSize = [
      'small' => 'text-2xl',
      'medium' => 'text-3xl',
      'large' => 'text-4xl',
  ];

  $mobileGridClass = [
      '1' => 'grid-cols-1',
      '2' => 'grid-cols-2',
  ];

  $desktopGridClass = [
      '1' => 'md:grid-cols-1',
      '2' => 'md:grid-cols-2',
      '3' => 'md:grid-cols-3',
      '4' => 'md:grid-cols-4',
      '5' => 'md:grid-cols-5',
      '6' => 'md:grid-cols-6',
  ];
@endphp

<div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
  @if ($section->settings->heading)
    <h2 class="{{ $headingSize[$section->settings->heading_size] }} text-on-background mb-12 text-center font-bold" {{ $section->liveUpdate('heading') }}>
      {{ $section->settings->heading }}
    </h2>
  @endif

  <div class="{{ $mobileGridClass[$section->settings->columns_mobile] }} {{ $desktopGridClass[$section->settings->columns_desktop] }} grid gap-8">
    @forelse ($categories() as $category)
      <div class="bg-surface-alt box group relative h-64 cursor-pointer overflow-hidden border-none">
        @php($image = $category->banner_url ?? $category->logo_url)

        @if ($image)
          <img
            src="{{ $image }}"
            alt="{{ $category->name }}"
            class="brightness-70 group-hover:brightness-60 h-full w-full object-cover object-center"
          />
        @else
          <div class="absolute inset-0 z-10 bg-black/30 transition-colors group-hover:bg-black/40"></div>
        @endif
        <div class="absolute inset-0 z-20 flex items-center justify-center">
          <h3 class="text-center text-2xl font-bold text-white/90">{{ $category->name }}</h3>
        </div>

        <a
          href="{{ $category->url }}"
          class="absolute inset-0 z-30"
          aria-label="{{ $category->name }}"
        ></a>
      </div>
    @empty
      @visual_design_mode
      @for ($i = 1; $i <= 4; $i++)
        <div class="bg-surface-alt box group relative h-64 cursor-pointer overflow-hidden border-none">
          <img
            src="https://placehold.co/400x400?text=Category {{ $i }}"
            alt="Category {{ $i }}"
            class="brightness-80 group-hover:brightness-70 h-full w-full object-cover object-center"
          />
        </div>
      @endfor
      @end_visual_design_mode
    @endforelse
  </div>
</div>
