@php
  $categories = $getCategories();
@endphp

<div class="bg-surface text-on-surface border-on-surface/8 sticky top-0 z-20 w-full border-b">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between gap-x-6">
      <x-shop::ui.drawer placement="start" title="Menu">
        <x-slot:trigger>
          <button class="-ml-2 p-2 transition-colors sm:hidden" aria-label="Open menu">
            <x-lucide-menu class="h-6 w-6" />
          </button>
        </x-slot:trigger>
        <div>
          <!-- Mobile Menu -->
          <x-shop::mobile-menu :categories="$categories" />
        </div>
      </x-shop::ui.drawer>

      @foreach ($section->blocks as $block)
        @if ($block->type === 'logo')
          <x-shop::header.logo :block="$block" />
        @elseif($block->type === 'nav')
          @php
            $navClasses = $block->settings->push_to_left ? ' mr-auto' : '';
            $navClasses .= $block->settings->push_to_right ? ' ml-auto' : '';
          @endphp
          <div class="{{ $navClasses }} hidden h-full sm:block">
            <x-shop::navigation :categories="$categories" />
          </div>
        @endif
      @endforeach

      <div class="flex items-center gap-2">
        @foreach ($section->blocks as $block)
          @if ($block->type === 'currency')
            <x-shop::currency-selector />
          @elseif ($block->type === 'locale')
            <x-shop::language-selector :icon="$block->settings->icon" />
          @elseif ($block->type === 'search')
            <x-shop::search-form :search-icon="$block->settings->search_icon" :image-search-icon="$block->settings->image_search_icon" />
          @elseif ($block->type === 'user')
            <x-shop::user-menu :block="$block" />
          @elseif ($block->type === 'cart')
            <livewire:cart-preview key="cart-preview" :block="[
                'id' => $block->id,
                'heading' => $block->settings->heading,
                'description' => $block->settings->description,
                'liveUpdate' => [
                    'heading' => $block->liveUpdate('heading')->toHtml(),
                    'description' => $block->liveUpdate('description')->toHtml(),
                ],
            ]" />
          @elseif ($block->type === 'compare')
            @if (core()->getConfigData('catalog.products.settings.compare_option'))
              <a
                class="relative hidden items-center p-2 sm:flex"
                aria-label="@lang('shop::app.components.layouts.header.compare')"
                title="@lang('shop::app.components.layouts.header.compare')"
                href="{{ route('shop.compare.index') }}"
              >
                @svg($block->settings->icon, ['class' => 'hover:text-primary h-5 w-5 transition-colors'])
              </a>
            @endif
          @endif
        @endforeach
      </div>
    </div>
  </div>
</div>
