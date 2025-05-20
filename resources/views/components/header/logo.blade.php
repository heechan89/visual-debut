@props(['block'])

@php
  $settings = $block->settings;

  $classes = '';
  if ($settings->push_to_left) {
      $classes .= ' mr-auto';
  }
  if ($settings->push_to_right) {
      $classes .= ' ml-auto';
  }
@endphp

<div class="{{ $classes }} flex items-center">
  <a href="{{ url('/') }}" class="truncate text-2xl font-medium">
    @if ($settings->logo)
      <span class="sr-only">{{ $settings->logo_text ?? config('app.name') }}</span>

      <img
        {{ $block->liveUpdate('logo', 'src') }}
        src="{{ $settings->logo }}"
        alt="{{ $settings->logo_text ?? config('app.name') }}"
        @class(['h-8 w-auto', 'hidden sm:inline' => $settings->mobile_logo])
      />

      @if ($settings->mobile_logo)
        <img
          {{ $block->liveUpdate('mobile_logo', 'src') }}
          src="{{ $settings->mobile_logo }}"
          alt="{{ $settings->logo_text ?? config('app.name') }}"
          class="h-8 w-auto sm:hidden"
        />
      @endif
    @elseif ($logo = core()->getCurrentChannel()->logo_url)
      <span class="sr-only">{{ config('app.name') }}</span>
      <img
        src="{{ $logo }}"
        alt="{{ config('app.name') }}"
        class="h-8 w-auto"
      />
    @else
      <span {{ $block->liveUpdate('logo_text') }}>
        {{ $settings->logo_text ?: config('app.name') }}
      </span>
    @endif
  </a>
</div>
