<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th><input type="checkbox" value="" id="checkAll" class="input-checkbox"></th>
        <th class="text-center">{{__('messages.default.avatar')}}</th>
        <th>{{__('messages.user.user.name')}}</th>
        <th>{{__('messages.default.email')}}</th>
        <th>{{__('messages.default.userCatalogue')}}</th>
        <th>{{__('messages.default.address')}}</th>
        <th class="text-center">{{__('messages.default.phoneNumber')}}</th>
        <th class="text-center">{{__('messages.default.status')}}</th>
        <th class="text-center">{{__('messages.default.action')}}</th>
    </tr>
    </thead>
    <tbody>
        @if (isset($users) && is_object($users))
            @foreach($users as $user)
                <tr>
                    <td style="width:30px">
                        <input type="checkbox" value="{{$user->id}}" class="input-checkbox checkBoxItem">
                    </td>
                    <td style="width:150px">
                        <span  class="text-center image img-cover"><img class="img-flag" src="{{asset(preg_replace('#^/public#', '', $user->image))}}" alt=""></span>
                    </td>
                    <td style="width:260px">
                        <div class="info-item name">{{$user->name}}</div>
                    </td>
                    <td style="width:260px">
                        <div class="info-item email">{{$user->email}}</div>
                    </td>
                    <td>
                        <div class="address-item group">{{$user->user_catalogues->name}}</div>
                    </td>
                    <td style="width:260px">
                        <div class="address-item address">{{$user->address}}</div>
                    </td>

                    <td style="width:150px">
                        <div class="info-item phone text-center">{{$user->phone}}</div>
                    </td>
                    <td style="width:150px" class ="text-center js-switch-{{$user->id}}">
                        <input type="checkbox" value="{{$user->publish}}" class="js-switch status " data-field='publish' data-model = '{{$config['model']}}' data-modelID = '{{$user->id}}' {{($user->publish == 1) ? 'checked' : ''}}>
                    </td>
                    <td style="width:150px" class ="text-center">
                        <a href="{{route('user.user.edit',$user->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                        <a href="{{route('user.user.delete',$user->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

{{$users->links('pagination::bootstrap-4')}}
