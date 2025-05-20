@props([
    'paymentMethods' => [],
])

<div id="payment">
  <h2 class="text-on-background text-base font-semibold md:text-2xl">
    @lang('shop::app.checkout.onepage.payment.payment-method')
  </h2>
  <div class="mt-4 space-y-4">
    @foreach ($paymentMethods as $paymentMethod)
      <label class="has-[:checked]:border-primary has-[:checked]:bg-primary/10 hover:bg-surface hover:border-on-surface/10 box block cursor-pointer p-4 transition-colors">
        <div class="flex items-center">
          <input
            type="radio"
            name="paymentMethod"
            value="{{ $paymentMethod['method'] }}"
            wire:model="selectedPaymentMethod"
            wire:change="handlePaymentMethod('{{ $paymentMethod['method'] }}')"
          />
          <div class="ms-3 flex w-full items-center justify-between">
            <div>
              <p class="font-medium">{{ $paymentMethod['method_title'] }}</p>
              <p class="text-sm">{{ $paymentMethod['description'] }}</p>
            </div>

            <img
              class="h-auto w-12"
              src="{{ $paymentMethod['image'] }}"
              alt="{{ $paymentMethod['method_title'] }}"
              title="{{ $paymentMethod['method_title'] }}"
            />
          </div>
        </div>
      </label>
    @endforeach
  </div>
</div>
