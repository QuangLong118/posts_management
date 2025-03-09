<!-- Mainly scripts -->
<script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/assets/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('/assets/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('/assets/js/plugins/pace/pace.min.js')}}"></script>
<script src="{{asset('/assets/js/inspinia.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-ui.js')}}"></script>

<!-- jQuery UI -->
<script src="{{asset('/assets/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

{{-- Script config --}}
@if(isset($config['js']) && is_array($config['js']))
    @foreach ($config['js'] as $key => $val)
        <script src="{{asset($val)}}"></script>
    @endforeach 
@endif
@if(isset($config['cdn_js']) && is_array($config['cdn_js']))
    @foreach ($config['cdn_js'] as $key => $val)
        <script src="{{$val}}"></script>
    @endforeach 
@endif

