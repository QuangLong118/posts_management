@include('backend.dashboard.component.breadcrumb', ['title' => __('messages.user.permission.delete.title')])

<form action="{{ route('user.permission.destroy', $permission->id) }}" method="post" class="box">
    @csrf
    @method('DELETE')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">{{__('messages.default.generalInfo')}}</div>
                    <div class="panel-description">
                        <p>{{__('messages.user.permission.delete.confirm')}} {{ $permission->name }}</p>
                        <p>{{__('messages.user.permission.delete.note')}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">{{__('messages.user.permission.name')}}<span class="text-danger">(*)</span></label>
                                    <input type="text" name="name" value="{{ old('name', ($permission->name) ?? '' ) }}" class="form-control" placeholder="" autocomplete="off" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Canonical <span class="text-danger">(*)</span></label>
                                    <input type="text" name=canonicale" value="{{ old('canonical', ($permission->canonical) ?? '' ) }}" class="form-control" placeholder="" autocomplete="off" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="text-right mb15">
            <button class="btn btn-danger" type="submit" name="send" value="send">{{__('messages.default.delete')}}</button>
        </div>
    </div>
</form>
