{{-- {{dd(session('app_locale'));}} --}}

@php
foreach ($languages as $key => $val) {
    if ($val->current == 1){
        session(['app_locale' => $val->canonical]);
        \App::setLocale($val->canonical);
    }
}
@endphp