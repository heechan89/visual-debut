@props(['rating' => 0])

@php
  $fullStars = floor($rating); // Full stars
  $halfStars = $rating - $fullStars >= 0.5 ? 1 : 0; // Half stars (if >= 0.5)
  $emptyStars = 5 - $fullStars - $halfStars; // Empty stars
@endphp

<div class="flex">
  @for ($i = 0; $i < $fullStars; $i++)
    <x-lucide-star class="fill-accent text-accent h-4 w-4" />
  @endfor

  @for ($i = 0; $i < $halfStars; $i++)
    <x-lucide-star-half class="fill-accent text-accent h-4 w-4" />
  @endfor

  @for ($i = 0; $i < $emptyStars; $i++)
    <x-lucide-star class="text-on-background fill-surface h-4 w-4" />
  @endfor
</div>
