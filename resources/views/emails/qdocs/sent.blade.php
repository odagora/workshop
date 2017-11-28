@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <img src="{{asset('img/logo.png')}}" class="img-responsive" alt="logo servitalleres">
        @endcomponent
    @endslot
{{-- Body --}}
# {{ $content['client'] }}
{{ $content['body'] }}
@component('mail::button', ['url' => 'http://servitalleres.com/politica-de-garantia/'])
{{ $content['button'] }}
@endcomponent

Cordial saludo,<br>
Servicio al Cliente<br>
Servitalleres.
{{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset
{{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            <a href="http://servitalleres.com/">servitalleres.com</a><span> | Carrera 22 # 76-57 | 2117943 - 2119290 | 3184559286</span>
        @endcomponent
    @endslot
@endcomponent
