<div class="ibox">
    <div class="ibox-title">
        <h5>{{__('messages.default.choose')}} {{__('messages.post.parentCatalogue')}}<span class="text-danger">(*)</span></h5>
    </div>
    <div class="ibox-content">
        <div class="row mb15">
            <div class="col-lg-12">
                <div class="form-row">
                    <span class="text-danger notice">{{__('messages.post.noteRoot')}}</span>
                    <select name="parent_id" class="form-control setupSelect2" id="">
                        @foreach ($dropdown as $key=>$value)
                            <option {{$key == old('parent_id', (isset($postCatalogue->parent_id)) ? $postCatalogue->parent_id : '') ? 'selected' : ''}}
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
        <h5>{{__('messages.default.choose')}} {{__('messages.default.avatar')}}</h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-row">
                    <span class="image img-cover image-target"><img class = "img-not-found" src="{{ old('image',($postCatalogue->image) ?? asset('assets\img\no_found_img.jpg'))}}" alt=""></span>
                    <input type="hidden" name="image" value="{{old('image',($postCatalogue->image) ?? '')}}">
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
                            <option value="-1">{{__('messages.default.choose')}} {{__('messages.default.status')}}</option>
                            @foreach (__('messages.publish') as $key=>$val)
                            <option {{ 
                                $key == old('publish', (isset($postCatalogue->publish)) ? $postCatalogue->publish : '') ? 'selected' : '' 
                                }}  
                                value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="">
                        <select name="follow" class="form-control setupSelect2" id="">
                            <option value="-1">{{__('messages.default.choose')}} {{__('messages.default.navigation')}}</option>
                            @foreach (__('messages.follow') as $key=>$val)
                            <option {{ 
                                $key == old('follow', (isset($postCatalogue->follow)) ? $postCatalogue->follow : '') ? 'selected' : '' 
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