<div class="ibox">
    <div class="ibox-title">
        <h5>{{__('messages.default.choose')}} {{__('messages.post.parentCatalogue')}}<span class="text-danger">(*)</span></h5>
    </div>
    <div class="ibox-content">
        <div class="row mb15">
            <div class="col-lg-12">
                <div class="form-row">
                    <span class="text-danger notice">{{__('messages.post.noteRoot')}}</span>
                    <select name="post_catalogue_id" class="form-control setupSelect2" id="">
                        @foreach ($dropdown as $key=>$value)
                            <option {{$key == old('post_catalogue_id', (isset($post->post_catalogue_id)) ? $post->post_catalogue_id : '') ? 'selected' : ''}}
                                value="{{$key}}">{{$value}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        {{-- Lấy danh sách danh mục phụ --}}
        @php
            $catalogue = [];
            if(isset($post)){
                foreach ($post->post_catalogues as $key => $value) {
                    $catalogue[] = $value->id;
                }
            }
        @endphp

        <div class="row mb15">
            <div class="col-lg-12">
                <div class="form-row">
                    <label class="control-label">{{__('messages.post.subCatalogue')}}</label>
                    <select multiple name="catalogue[]" class="form-control setupSelect2" id="">
                        @foreach ($dropdown as $key=>$value)
                            <option 
                            @if (is_array(old('catalogue',(isset($catalogue)) ? $catalogue : [])) && $key !== (isset($post->post_catalogue_id)??0)  && in_array($key,old('catalogue',(isset($catalogue)) ? $catalogue : []))) 
                                selected 
                            @endif
                            value="{{$key}}">{{$value}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ibox">
    <div class="ibox-title">
        <h5>{{__('messages.default.choose')}} {{__('messages.default.avatar')}} </h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-row">
                    <span class="image img-cover image-target"><img class = "img-not-found" src="{{ old('image',($post->image) ?? asset('assets\img\no_found_img.jpg'))}}" alt=""></span>
                    <input type="hidden" name="image" value="{{old('image',($post->image) ?? '')}}">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ibox">
    <div class="ibox-title">
        <h5>{{__('messages.default.advanceConfig')}} </h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-row">
                    <div class="mb10">
                        <select name="publish" class="form-control setupSelect2" id="">
                            <option value="-1">{{__('messages.default.choose')}} {{__('messages.default.status')}} </option>
                            @foreach (__('messages.publish') as $key=>$val)
                            <option {{ 
                                $key == old('publish', (isset($post->publish)) ? $post->publish : '') ? 'selected' : '' 
                                }}  
                                value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="">
                        <select name="follow" class="form-control setupSelect2" id="">
                            <option value="-1">{{__('messages.default.choose')}} {{__('messages.default.navigation')}} </option>
                            @foreach (__('messages.follow') as $key=>$val)
                            <option {{ 
                                $key == old('follow', (isset($post->follow)) ? $post->follow : '') ? 'selected' : '' 
                                }}  
                                value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>