@include('backend.dashboard.component.setLanguage')

<!DOCTYPE html>
<html>

<head>
    {{-- HEAD --}}
    @include('backend.dashboard.component.head')

</head>

<body>
    <div id="wrapper">
        {{-- SIDEBAR --}}
        @include('backend.dashboard.component.sidebar')
        <div id="page-wrapper" class="gray-bg">
            {{-- NAV --}}
            @include('backend.dashboard.component.nav')
            {{-- CONTENT --}}
            @include($template)
            {{-- FOOTER --}}
            @include('backend.dashboard.component.footer')
        </div>
    </div>
    {{-- SCRIPT --}}
    @include('backend.dashboard.component.script')
    
</body>
</html>
