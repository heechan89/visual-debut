<div {{ $section->settings->scheme?->attributes() }} class="bg-surface text-on-surface py-16">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <h2 class="heading mb-4 text-center text-3xl">
      {{ $section->settings->heading }}
    </h2>
    <div class="description text-on-surface-alt/70 prose mx-auto mb-8 max-w-2xl text-center">
      {!! $section->settings->description !!}
    </div>
    <form
      method="POST"
      action="{{ route('shop.subscription.store') }}"
      class="mx-auto max-w-md"
    >
      @csrf
      <div class="flex gap-4">
        <input
          type="email"
          name="email"
          autocomplete="on"
          placeholder="Enter your email"
        >
        <x-shop::ui.button type="submit" color="primary">
          @lang('shop::app.components.layouts.footer.subscribe')
        </x-shop::ui.button>
      </div>

      @error('email')
        <p class="text-danger-500 text-sm italic">{{ $message }}</p>
      @enderror
    </form>
  </div>
</div>

@visual_design_mode
@pushOnce('scripts')
  <script>
    document.addEventListener('visual:editor:init', () => {
      window.Visual.handleLiveUpdate('{{ $section->type }}', {
        section: {
          heading: {
            target: '.heading',
            text: true
          },
          description: {
            target: '.description',
            html: true
          }
        }
      })
    })
  </script>
@endPushOnce
@end_visual_design_mode
