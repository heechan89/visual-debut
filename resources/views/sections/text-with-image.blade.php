@php
  $reverse = $section->settings->image_position === 'right';

  $imageHeightClass = match ($section->settings->image_height) {
      'sm' => 'h-40',
      'md' => 'h-64',
      'lg' => 'h-96',
      default => 'h-auto',
  };

  $imageWidthClass = match ($section->settings->image_width) {
      'sm' => 'md:w-1/3',
      'lg' => 'md:w-2/3',
      default => 'md:w-1/2',
  };

  $contentPositionClass = match ($section->settings->content_position) {
      'top' => 'items-start',
      'bottom' => 'items-end',
      default => 'items-center',
  };

  $contentAlignClass = match ($section->settings->content_align) {
      'center' => 'md:text-center md:items-center',
      'end' => 'md:text-end md:items-end',
      default => 'md:text-start md:items-start',
  };

  $mobileAlignClass = match ($section->settings->content_align_mobile) {
      'center' => 'text-center items-center',
      'end' => 'text-end items-end',
      default => 'text-start items-start',
  };

@endphp

<div class="bg-background text-on-background">
  <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
    <div class="{{ $reverse ? 'md:flex-row-reverse' : '' }} {{ $contentPositionClass }} flex flex-col gap-8 md:flex-row">
      <div class="{{ $imageWidthClass }} box w-full overflow-hidden border-none">
        @if ($section->settings->image)
          <img
            src="{{ $section->settings->image }}"
            alt=""
            class="{{ $imageHeightClass }} w-full object-cover"
          />
        @endif
      </div>

      <div class="{{ $mobileAlignClass }} {{ $contentAlignClass }} mt-6 flex w-full flex-col gap-6 md:mt-0 md:w-1/2">
        @foreach ($section->blocks as $block)
          @switch($block->type)
            @case('heading')
              <h2 class="text-3xl font-bold" {{ $block->liveUpdate('text') }}>
                {{ $block->settings->text }}
              </h2>
            @break

            @case('body')
              <p class="text-sm" {{ $block->liveUpdate('content') }}>
                {{ $block->settings->content }}
              </p>
            @break

            @case('button')
              <a
                href="{{ $block->settings->url }}"
                class="btn btn-lg btn-{{ $block->settings->variant ?? 'primary' }} btn-{{ $block->settings->style ?? 'solid' }}"
                {{ $block->liveUpdate('url', 'href') }}
                {{ $block->liveUpdate('text') }}
              >
                {{ $block->settings->text }}
              </a>
            @break
          @endswitch
        @endforeach
      </div>
    </div>
  </div>
</div>
