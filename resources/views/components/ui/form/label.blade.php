@props(['for' => '', 'required' => false])

<label
  @if ($for) for="{{ $for }}" @endif
  @if ($required) required @endif
  class="text-on-background mb-1 block text-sm font-medium"
>
  {{ $slot }}
</label>
