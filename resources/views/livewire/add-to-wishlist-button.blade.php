<x-shop::ui.button
  wire:click="handle"
  variant="soft"
  circle
  :color="$inUserWishlist ? 'danger' : 'secondary'"
  :icon="$inUserWishlist ? 'heroicon-s-heart' : 'heroicon-o-heart'"
  loading
  {{ $attributes }}
/>
