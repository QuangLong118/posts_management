
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th><input type="checkbox" value="" id="checkAll" class="input-checkbox"></th>
        <th>{{__('messages.user.permission.name')}}</th>
        <th>Canonical</th>
        <th class="text-center">{{__('messages.default.action')}}</th>
    </tr>
    </thead>
    <tbody>
        @if (isset($permissions) && is_object($permissions))
            @foreach($permissions as $permission)
                <tr>
                    <td style="width:30px">
                        <input type="checkbox" value="{{$permission->id}}" class="input-checkbox checkBoxItem">
                    </td>
                    <td style="width:300px">
                        <div class="info-item name">{{$permission->name}}</div>
                    </td>
                    <td style="width:300px">
                        <div class="info-item email">{{$permission->canonical}}</div>
                    </td>
                    <td style="width:150px" class ="text-center">
                        <a href="{{route('user.permission.edit',$permission->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                        <a href="{{route('user.permission.delete',$permission->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

{{$permissions->links('pagination::bootstrap-4')}}
