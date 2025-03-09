<?php 
    $segment = request()->segment(1);
?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img-circle" src="{{asset('/assets/img/my_avatar.jpg')}}" />
                         </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Dương Quang Long</strong>
                         </span> <span class="text-muted text-xs block">Developer <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="">Hồ sơ</a></li>
                        <li><a href="">Liên hệ</a></li>
                        <li><a href="">Mail</a></li>
                        <li class="divider"></li>
                        <li><a href="{{route('auth.logout')}}">{{__('messages.default.logout')}}</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            @foreach(__('modules') as $key => $val)
            <li class = "{{in_array($segment,$val['name']) ? 'active' : ''}}">
                <a href=""><i class="{{$val['icon']}}"></i> <span class="nav-label">{{$val['title']}}</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    @if(isset($val['subModule']))
                        @foreach($val['subModule'] as $module)
                            <li><a href="{{route($module['route'])}}">{{$module['title']}}</a></li>
                        @endforeach
                    @endif 
                </ul>
            </li>
            @endforeach
        </ul>

    </div>
</nav>