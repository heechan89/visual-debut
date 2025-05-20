<div
  x-cloak
  {{ $attributes->merge(['class' => 'absolute box bg-surface border-on-surface/8 py-2 shadow-sm min-w-48 w-max data-[placement=end]:end-0  data-[placement=start]:start-0']) }}
  x-dropdown:content
>
  {{ $slot }}
</div>
