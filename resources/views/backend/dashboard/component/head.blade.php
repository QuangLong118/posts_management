<base href="{{config('app.url')}}">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>INSPINIA | Dashboard v.2</title>

{{-- jquerry --}}
<script src="{{asset('/assets/js/jquery-3.1.1.min.js')}}"></script>

{{-- Maily Css --}}
<link href="{{asset('/assets/plugins/jquery-ui.css')}}" rel="stylesheet">
<link href="{{asset('/assets/css/customize.css')}}" rel="stylesheet">
<link href="{{asset('/assets/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

<link href="{{asset('/assets/css/animate.css')}}" rel="stylesheet">
<link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">

<script>
    var BASE_URL = '{{config('app.url')}}'
    var SUFFIX = '{{config('apps.general.suffix')}}'
</script>

{{-- css config --}}
@if(isset($config['css']) && is_array($config['css']))
    @foreach ($config['css'] as $key => $val)
        <link href="{{asset($val)}}" rel="stylesheet">
    @endforeach 
@endif
@if(isset($config['cdn_css']) && is_array($config['cdn_css']))
    @foreach ($config['cdn_css'] as $key => $val)
        <link href="{{$val}}" rel="stylesheet">
    @endforeach 
@endif
