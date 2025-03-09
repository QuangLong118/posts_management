@include('backend.dashboard.component.breadcrumb',['title'=> __('messages.language.translate.title')])
@include('backend.dashboard.component.formError')

<form action="{{ route('language.storeTranslate') }}" method="post">
    @csrf
    <input type="hidden" name="option[id]" value="{{ $option['id'] }}">
    <input type="hidden" name="option[languageID]" value="{{ $option['languageID'] }}">
    <input type="hidden" name="option[model]" value="{{ $option['model'] }}">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-6">
                @include('backend.post.component.content', ['model' => ($object) ?? null, 'disabled' => 1])
                @include('backend.post.component.seo', ['model' => ($object) ?? null, 'disabled' => 1])
            </div>
            <div class="col-lg-6">
                @include('backend.post.component.translate', ['model' => ($objectTransate) ?? null])
                @include('backend.post.component.seoTranslate', ['model' => ($objectTransate) ?? null])
            </div>
        </div>
        <div class="text-right mb15 fixed-bottom">
            <button class="btn btn-primary" type="submit" name="send" value="send">{{ __('messages.default.save') }}</button>
        </div>
    </div>
</form>