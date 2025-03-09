{{-- BREADCRUMB --}}
@include('backend.dashboard.component.breadcrumb',['title'=> __('messages.user.catalogue.store.'.$config['method'].'.title')])
@include('backend.dashboard.component.formError')

@php
    $url = ($config['method'] == 'create') ? route('user.catalogue.store') : route('user.catalogue.update', $userCatalogue->id);
@endphp
<form action="{{$url}}"  method="post">
    @csrf
    <div class="wraper wrapper-content animated fadeInRight">
        <div class="row ">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">{{__('messages.default.generalInfo')}}</div>
                    <div class="panel-description">
                        <p>{{__('messages.user.catalogue.store.request.generalInfo')}}</p>     
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
                                    <label for="" class="control-label">{{__('messages.user.catalogue.name')}}<span class="text-danger">(*)</span></label>
                                    <input type="text" name="name" value="{{old('name',($userCatalogue->name) ?? '')}}" class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label">{{__('messages.default.description')}}</label>
                                    <input type="text" name="description" value="{{ old('description', ($userCatalogue->description) ?? '') }}" class="form-control" placeholder="" autocomplete="off">
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
    var province_id = '{{ (isset($userCatalogue->province_id)) ? $userCatalogue->province_id : old('province_id') }}'
    var district_id = '{{ (isset($userCatalogue->district_id)) ? $userCatalogue->district_id : old('district_id') }}'
    var ward_id = '{{ (isset($userCatalogue->ward_id)) ? $userCatalogue->ward_id : old('ward_id') }}'
</script>