@style
  :root {
  --btn-radius: {{ $theme->settings->button_border_radius }};
  --btn-border-width: {{ $theme->settings->button_border_width }}px;

  --box-radius: {{ $theme->settings->box_border_radius }};
  --box-border-width: {{ $theme->settings->box_border_width }}px;

  --input-radius: {{ $theme->settings->input_border_radius }};
  --input-border-width: {{ $theme->settings->input_border_width }}px;
  --input-height: {{ $theme->settings->button_height }};

  @if ($theme->settings->default_font)
    --default-font-family: {{ $theme->settings->default_font }}, sans-serif;
  @endif
  }

  @foreach ($theme->settings->color_schemes as $scheme)
    @if ($scheme->id === $theme->settings->default_scheme->id)
      :root,
    @endif
    [{!! $scheme->attributes() !!}]
    {
    {!! $scheme->outputCssVars() !!}
    }
  @endforeach
@endstyle
