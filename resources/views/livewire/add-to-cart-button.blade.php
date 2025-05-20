@php
  $text = $attributes->get('text', trans('shop::app.components.products.card.add-to-cart'));
  $icon = $attributes->get('icon', 'lucide-shopping-cart');
@endphp

<x-shop::ui.button
  :wire:target="$action"
  icon="lucide-shopping-cart"
  aria-label="{{ $text }}"
  {{ $attributes->merge(['x-on:click.prevent' => '$wire.' . $action . '()']) }}
>
  {{ $text }}
</x-shop::ui.button>
