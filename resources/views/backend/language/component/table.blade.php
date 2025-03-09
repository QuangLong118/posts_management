
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th><input type="checkbox" value="" id="checkAll" class="input-checkbox"></th>
        <th class="text-center">{{__('messages.default.image')}}</th>
        <th>{{__('messages.language.name')}}</th>
        <th>Canonical</th>
        <th>{{__('messages.default.description')}}</th>
        <th class="text-center">{{__('messages.default.status')}}</th>
        <th class="text-center">{{__('messages.default.action')}}</th>
    </tr>
    </thead>
    <tbody>
        @if (isset($languages) && is_object($languages))
            @foreach($languages as $language)
                <tr>
                    <td style="width:30px">
                        <input type="checkbox" value="{{$language->id}}" class="input-checkbox checkBoxItem">
                    </td>
                    <td style="width:300px">
                        <span  class="text-center image img-cover"><img class="img-flag" src="{{asset(preg_replace('#^/public#', '', $language->image))}}" alt=""></span>
                    </td>
                    <td style="width:300px">
                        <div class="info-item name">{{$language->name}}</div>
                    </td>
                    <td style="width:300px">
                        <div class="info-item email">{{$language->canonical}}</div>
                    </td>
                    <td>
                        <div class="info-item email">{{$language->description}}</div>
                    </td>
                    <td style="width:150px" class ="text-center js-switch-{{$language->id}}">
                        <input type="checkbox" value="{{$language->publish}}" class="js-switch status " data-field='publish' data-model = '{{$config['model']}}' data-modelID = '{{$language->id}}' {{($language->publish == 1) ? 'checked' : ''}}>
                    </td>
                    <td style="width:150px" class ="text-center">
                        <a href="{{route('language.edit',$language->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                        <a href="{{route('language.delete',$language->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>


