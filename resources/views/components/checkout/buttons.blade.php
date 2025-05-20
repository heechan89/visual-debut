@props(['cart' => []])

@php
  $checkoutButons = view_render_event('bagisto.shop.checkout.payment.' . $cart->payment_method, [
      'cart' => $cart,
  ]);
@endphp

<div {{ $attributes }}>
  @if ($checkoutButons)
    {!! $checkoutButons !!}
  @else
    <x-shop::ui.button wire:click="placeOrder" wire:target="placeOrder">
      @lang('shop::app.checkout.onepage.summary.place-order')
    </x-shop::ui.button>
  @endif
</div>
