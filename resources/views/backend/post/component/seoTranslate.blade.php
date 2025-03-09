<div class="ibox">
    <div class="ibox-title">
        <h5>{{__('messages.post.seo.config')}}</h5>
    </div>
    <div class="ibox-content">
        <div class="seo-container">
            <div class="translate-meta-title">
                {{ 
                    (old('meta_title', ($model->meta_title) ?? '')) ? old('meta_title', ($model->meta_title) ?? '') : __('messages.post.seo.unFillTitle')
                }}
                </div>
            <div class="translate-canonical">{{ (old('canonical', ($model->canonical) ?? '')) ? config('app.url').old('canonical', ($model->canonical) ?? '').config('apps.general.suffix') :   __('messages.post.seo.unFillCanonical')  }}</div>
            <div class="translate-meta-description">
                {{ 
                    (old('meta_description', ($model->meta_title) ?? '')) ? old('meta_description', ($model->meta_title) ?? '') : __('messages.post.seo.unFillDescription')  
                }}
            </div>
        </div>
        <div class="seo-wrapper">
            <div class="row mb15">
                <div class="col-lg-12">
                    <div class="form-row">
                        <label for="" class="control-label text-left">
                            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                <span>{{__('messages.post.seo.title')}}</span>
                                <span class="count_meta-title">0 {{ __('messages.default.character') }}</span>
                            </div>
                        </label>
                        <input 
                            type="text"
                            name="translate_meta_title"
                            value="{{ old('meta_title', ($model->meta_title) ?? '' ) }}"
                            class="form-control"
                            placeholder=""
                            autocomplete="off"
                        >
                    </div>
                </div>
            </div>
            <div class="row mb15">
                <div class="col-lg-12">
                    <div class="form-row">
                        <label for="" class="control-label text-left">
                            <span>{{ __('messages.post.seo.keyword')}}</span>
                        </label>
                        <input 
                            type="text"
                            name="translate_meta_keyword"
                            value="{{ old('meta_keyword', ($model->meta_keyword) ?? '' ) }}"
                            class="form-control"
                            placeholder=""
                            autocomplete="off"
                        >
                    </div>
                </div>
            </div>
            <div class="row mb15">
                <div class="col-lg-12">
                    <div class="form-row">
                        <label for="" class="control-label text-left">
                            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                <span>{{__('messages.post.seo.description')}}</span>
                                <span class="count_meta-description">0 {{ __('messages.default.character') }}</span>
                            </div>
                        </label>
                        <textarea 
                            name="translate_meta_description"
                            class="form-control"
                            placeholder=""
                            autocomplete="off"
                        >{{ old('meta_description', ($model->meta_description) ?? '') }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row mb15">
                <div class="col-lg-12">
                    <div class="form-row">
                        <label for="" class="control-label text-left">
                            <span>{{__('messages.post.seo.canonical')}} <span class="text-danger">*</span></span>
                        </label>
                       <div class="input-wrapper">
                            <input 
                                type="text"
                                name="translate_canonical"
                                value="{{ old('translate_canonical', ($model->canonical) ?? '' ) }}"
                                class="form-control seo-canonical"
                                placeholder=""
                                autocomplete="off"
                            >
                            <span class="baseUrl">{{ config('app.url') }}</span>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>