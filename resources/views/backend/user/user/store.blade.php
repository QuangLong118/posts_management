{{-- BREADCRUMB --}}
@include('backend.dashboard.component.breadcrumb',['title'=> __('messages.user.user.store.'.$config['method'].'.title')])
@include('backend.dashboard.component.formError')

@php
    $url = ($config['method'] == 'create') ? route('user.user.store') : route('user.user.update', $user->id);
@endphp
<form action="{{$url}}"  method="post">
    @csrf
    <div class="wraper wrapper-content animated fadeInRight">
        <div class="row ">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">{{__('messages.default.generalInfo')}}</div>
                    <div class="panel-description">
                        <p>{{__('messages.user.user.store.request.generalInfo')}}</p> 
                        <p>{!! __('messages.default.noteMandatory')!!}</p> 
                    </div>
                    {{-- <div class="panel-description">Lưu ý : Những trường đánh dấu <span class="text-danger">(*)</span> là bắt buộc</div> --}}
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">{{__('messages.default.email')}}<span class="text-danger">(*)</span></label>
                                    <input type="text" name="email" value="{{old('email',($user->email) ?? '')}}" class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">{{__('messages.user.user.name')}}<span class="text-danger">(*)</span></label>
                                    <input type="text" name="name" value="{{old('name',($user->name) ?? '')}}" class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">{{__('messages.default.userCatalogue')}}<span class="text-danger">(*)</span></label>
                                    <select name="user_catalogue_id" class="form-control setupSelect2">
                                        <option value="0" selected="selected">{{__('messages.default.choose')}}  {{__('messages.default.userCatalogue')}}</option>
                                        @foreach($userCatalogues as $key => $value)
                                        <option {{ 
                                            $value->id == old('user_catalogue_id', (isset($user->user_catalogue_id)) ? $user->user_catalogue_id : '') ? 'selected' : '' 
                                            }}  
                                            value="{{ $value->id  }}">{{ $value->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">{{__('messages.default.birthday')}}</label>
                                    <input type="date" name="birthday" value="{{ old('birthday', (isset($user->birthday)) ? date('Y-m-d', strtotime($user->birthday)) : '') }}" class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        @if($config['method']=='create')
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">{{__('messages.default.password')}}<span class="text-danger">(*)</span></label>
                                    <input type="text" name="password" value="" class="form-control" placeholder="" autocomplete="off">
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">{{__('messages.default.retypePassword')}}<span class="text-danger">(*)</span></label>
                                    <input type="text" name="re_password" value="" class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="row mb15">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">{{__('messages.default.avatar')}}</label>
                                    <input type="text" name="image" value="{{ old('image', ($user->image) ?? '') }}" class="form-control upload-image" placeholder="" autocomplete="off" data-upload="Images">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">{{__('messages.default.contactInfo')}}</div>
                    <div class="panel-description">
                        <p>{{__('messages.user.user.store.request.contactInfo')}}</p> 
                        <p>{!!__('messages.default.noteMandatory')!!}</p> 
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">{{__('messages.default.province')}} <span class="text-danger">(*)</span></label>
                                    <select name="province_id" class="form-control setupSelect2 provinces location" data-target="districts">
                                        <option value="0">[Chọn Thành phố]</option>
                                        @if(isset($provinces))
                                            @foreach($provinces as $province)
                                            <option @if(old('province_id') == $province->code) selected @endif value="{{ $province->code }}">{{ $province->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">{{__('messages.default.district')}}<span class="text-danger">(*)</span></label>
                                    <select name="district_id" class="form-control setupSelect2 districts location" data-target="wards">
                                        <option value="0">[Chọn Quận/Huyện]</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">{{__('messages.default.ward')}}<span class="text-danger">(*)</span></label>
                                    <select name="ward_id" class="form-control setupSelect2 wards">
                                        <option value="0">[Chọn Phường/Xã]</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">{{__('messages.default.address')}}</label>
                                    <input type="text" name="address" value="{{ old('addresss', ($user->address) ?? '') }}" class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">{{__('messages.default.phoneNumber')}}<span class="text-danger">(*)</span></label>
                                    <input type="text" name="phone" value="{{ old('phone', ($user->phone) ?? '') }}" class="form-control" placeholder="" autocomplete="off">
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">{{__('messages.default.description')}}</label>
                                    <input type="text" name="description" value="{{ old('description', ($user->description) ?? '') }}" class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right">
            <button class="btn btn-primary" type="submit" name="send" value="send">{{__('messages.default.save')}}</button>
        </div>
    </div>
</form>

<script>
    var province_id = '{{ (isset($user->province_id)) ? $user->province_id : old('province_id') }}'
    var district_id = '{{ (isset($user->district_id)) ? $user->district_id : old('district_id') }}'
    var ward_id = '{{ (isset($user->ward_id)) ? $user->ward_id : old('ward_id') }}'
</script>