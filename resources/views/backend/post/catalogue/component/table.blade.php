<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th  style="width:30px"><input type="checkbox" value="" id="checkAll" class="input-checkbox"></th>
        <th>{{__('messages.post.catalogue.name')}}</th>
        @include('backend.language.component.languageTh')
        <th class="text-center" style="width:150px">{{__('messages.default.status')}}</th>
        <th class="text-center" style="width:150px">{{__('messages.default.action')}}</th>
    </tr>
    </thead>
    <tbody>
        @if (isset($postCatalogues) && is_object($postCatalogues))
            @foreach($postCatalogues as $postCatalogue)
                <tr>
                    <td>
                        <input type="checkbox" value="{{$postCatalogue->id}}" class="input-checkbox checkBoxItem">
                    </td>
                    <td>
                        <div class="info-item name">{{str_repeat('|-----|',(($postCatalogue->level>0)?($postCatalogue->level-1):0)).$postCatalogue->name}}</div>
                    </td>
                    @include('backend.language.component.languageTd', ['model' => $postCatalogue, 'modeling' => 'PostCatalogue'])
                    
                    <td class ="text-center js-switch-{{$postCatalogue->id}}">
                        <input type="checkbox" value="{{$postCatalogue->publish}}" class="js-switch status " data-field='publish' data-model ='{{$config['model']}}' data-modelID = '{{$postCatalogue->id}}' {{($postCatalogue->publish == 1) ? 'checked' : ''}}>
                    </td>
                    <td class ="text-center">
                        <a href="{{route('post.catalogue.edit',$postCatalogue->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                        <a href="{{route('post.catalogue.delete',$postCatalogue->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

{{$postCatalogues->links('pagination::bootstrap-4')}}
