{{-- BREADCRUMB --}}
@include('backend.dashboard.component.breadcrumb',['title'=> __('messages.post.post.store.'.$config['method'].'.title')])
@include('backend.dashboard.component.formError')

@php
    $url = ($config['method'] == 'create') ? route('post.post.store') : route('post.post.update', $post->id);
@endphp
<form action="{{$url}}"  method="post">
    @csrf
    <div class="wraper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-9">
                {{-- Thông tin chung  --}}
                @include('backend.post.component.content')
                {{-- Album ảnh --}}
                @include('backend.post.component.album')
                {{-- Thông tin SEO --}}
                @include('backend.post.component.seo')
            </div>
            <div class="col-lg-3">
                @include('backend.post.post.component.aside')
            </div>
        </div>
        
        <div class="text-right">
            <button class="btn btn-primary" type="submit" name="send" value="send">{{__('messages.default.save')}}</button>
        </div>
    </div>
</form>

