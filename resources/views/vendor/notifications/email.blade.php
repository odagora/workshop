@component('mail::layout')
{{-- Header --}}
@slot('header')
    @component('mail::header', ['url' => config('app.url')])
        <img src="{{asset('img/logo.png')}}" class="img-responsive" alt="logo servitalleres">
    @endcomponent
@endslot

{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level == 'error')
# Whoops!
@else
# Hola
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
            $color = 'green';
            break;
        case 'error':
            $color = 'red';
            break;
        default:
            $color = 'blue';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
Saludos,<br>
Administración<br>
Servitalleres.
@endif

{{-- Subcopy --}}
@isset($actionText)
@component('mail::subcopy')
Si tienes problemas dando click al botón "{{ $actionText }}", copia y pega la URL que se encuentra abajo directamente en tu navegador web: [{{ $actionUrl }}]({{ $actionUrl }})
@endcomponent
@endisset
{{-- Footer --}}
@slot('footer')
    @component('mail::footer')
        <a href="http://servitalleres.com/">servitalleres.com</a><span> | Carrera 22 # 76-57 | 2117943 - 2119290 | 3184559286</span>
    @endcomponent
@endslot
@endcomponent
