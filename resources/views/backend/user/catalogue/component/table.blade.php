<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th><input type="checkbox" value="" id="checkAll" class="input-checkbox"></th>
        <th>{{__('messages.user.catalogue.name')}}</th>
        <th class="text-center">{{__('messages.default.userCount')}}</th>
        <th class="text-center">{{__('messages.default.description')}}</th>
        <th class="text-center">{{__('messages.default.status')}}</th>
        <th class="text-center">{{__('messages.default.action')}}</th>
    </tr>
    </thead>
    <tbody>
        @if (isset($userCatalogues) && is_object($userCatalogues))
            @foreach($userCatalogues as $userCatalogue)
                <tr>
                    <td>
                        <input type="checkbox" value="{{$userCatalogue->id}}" class="input-checkbox checkBoxItem">
                    </td>
                    <td>
                        <div class="info-item name">{{$userCatalogue->name}}</div>
                    </td>
                    <td>
                        <div class="info-item name text-center">{{$userCatalogue->users_count}} {{__('messages.default.people')}}</div>
                    </td>
                    <td>
                        <div class="info-item name text-center">{{$userCatalogue->description}}</div>
                    </td>
                    <td class ="text-center js-switch-{{$userCatalogue->id}}">
                        <input type="checkbox" value="{{$userCatalogue->publish}}" class="js-switch status " data-field='publish' data-model ='{{$config['model']}}' data-modelID = '{{$userCatalogue->id}}' {{($userCatalogue->publish == 1) ? 'checked' : ''}}>
                    </td>
                    <td class ="text-center">
                        <a href="{{route('user.catalogue.edit',$userCatalogue->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                        <a href="{{route('user.catalogue.delete',$userCatalogue->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

{{$userCatalogues->links('pagination::bootstrap-4')}}
