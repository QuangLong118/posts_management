{{-- BREADCRUMB --}}
@include('backend.dashboard.component.breadcrumb',['title'=> __('messages.user.permission.store.'.$config['method'].'.title')])
@include('backend.dashboard.component.formError')

@php
    $url = ($config['method'] == 'create') ? route('user.permission.store') : route('user.permission.update', $permission->id);
@endphp
<form action="{{$url}}"  method="post">
    @csrf
    <div class="wraper wrapper-content animated fadeInRight">
        <div class="row ">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">{{__('messages.default.generalInfo')}}</div>
                    <div class="panel-canonical">
                        <p>{{__('messages.user.permission.store.request.generalInfo')}}</p> 
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
                                    <label for="" class="control-label text-right">{{__('messages.user.permission.name')}} <span class="text-danger">(*)</span></label>
                                    <input type="text" name="name" value="{{old('name',($permission->name) ?? '')}}" class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Canonical <span class="text-danger">(*)</label>
                                    <input type="text" name="canonical" value="{{ old('canonical', ($permission->canonical) ?? '') }}" class="form-control" placeholder="" autocomplete="off">
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
