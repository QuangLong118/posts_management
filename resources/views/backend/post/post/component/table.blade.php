<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th  style="width:30px"><input type="checkbox" value="" id="checkAll" class="input-checkbox"></th>
        <th>{{__('messages.post.post.name')}}</th>
        @include('backend.language.component.languageTh')
        {{-- <th style="width : 80px" class="text-center">{{__('messages.default.location')}}</th> --}}
        <th class="text-center" style="width:150px">{{__('messages.default.status')}}</th>
        <th class="text-center" style="width:150px">{{__('messages.default.action')}}</th>
    </tr>
    </thead>
    <tbody>
        @if (isset($posts) && is_object($posts))
            @foreach($posts as $post)
                <tr>
                    <td id="{{$post->id}}">
                        <input type="checkbox" value="{{$post->id}}" class="input-checkbox checkBoxItem">
                    </td>
                    <td>
                        <div class="uk-flex uk-flex-middle">
                            <div class="image mr5">
                                <div class="image-cover"><img class="img-post" src="{{$post->image}}" alt=""></div>
                            </div>
                            <div class="main-info">
                                <div class="name"><span class="maintitle">{{$post->name}}</span></div>
                                <div class="catalogue">
                                    <span class="text-danger">{{__('messages.default.postCatalogue')}}</span>
                                    @foreach ($post->post_catalogues as $post_catalogue)
                                        @php  $post_catalogue_language = $post_catalogue->post_catalogue_language($currentLanguage)->get()->first(); @endphp
                                        <a href="{{route('post.post.index',['post_catalogue_id'=>$post_catalogue->id])}}" title="">{{$post_catalogue_language->name}}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </td>
                    @include('backend.language.component.languageTd', ['model' => $post, 'modeling' => 'Post'])
                    {{-- <td>
                        <input type="text" name="order" value="{{$post->order}}" class="form-control sort-order" data-id="{{$post->id}}" data-model="{{$config['model']}}">
                    </td> --}}
                    <td class ="text-center js-switch-{{$post->id}}">
                        <input type="checkbox" value="{{$post->publish}}" class="js-switch status " data-field='publish' data-model ='{{$config['model']}}' data-modelID = '{{$post->id}}' {{($post->publish == 1) ? 'checked' : ''}}>
                    </td>
                    <td class ="text-center">
                        <a href="{{route('post.post.edit',$post->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                        <a href="{{route('post.post.delete',$post->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

