<form action="{{route('user.user.index')}}">
    <div class="filter-wrapper">
        <div class="uk-flex uk-flex-middle uk-flex-space-between">
            <div class="perpage">
                <div class="uk-flex uk-flex-middle uk-flex-space-between">
                    <?php $perpage=request('perpage') ?: old('perpage') ?>
                    
                    <select name = "perpage" class = "form-control input-sm perpage filter mr10">
                        @for($i=20;$i<=200;$i+=20)
                            <option {{($perpage == $i) ? 'selected' : ''}} value="{{$i}}">{{$i}} {{__('messages.default.record')}}</option>
                        @endfor
                    </select>

                </div>
            </div>
            <div class="action">
                <div class="uk-flex uk-flex-middle">
                    <div class = "ml10 ">
                        <?php
                            $publishArray = __('messages.publish');
                            $publish = request()->has('publish') ? request('publish') : -1;
                            $userCatalogue = request()->has('user_catalogue_id') ? request('user_catalogue_id') : 0;
                            
                        ?>
                        <select name = "publish" class = "form-control mr10 setupSelect2">
                            <option value="-1" selected="selected">{{__('messages.default.choose')}}  {{__('messages.default.status')}}</option>
                            @foreach ($publishArray as $key=>$value)
                                <option {{($publish == $key) ? 'selected' : ''}} value="{{$key}}">{{$value}}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    <div class = "ml10">
                        <select name = "user_catalogue_id" class = "form-control mr10 setupSelect2">
                            <option value="0" selected="selected">{{__('messages.default.choose')}}  {{__('messages.default.userCatalogue')}}</option>
                            @foreach ($userCatalogues as $key=>$value)
                                <option {{($userCatalogue == $value->id) ? 'selected' : ''}} value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="uk-search uk-flex uk-flex-middle mr10 ml10 mt5">
                        <div class="input-group">
                            <input type="text" name="keyword" value="{{request('keyword') ?: old('keyword')}}" placeholder="{{__('messages.default.search')}}" class="form-control">
                            <span class="input-group-btn">
                                <button type="submit" name="search" value="search" class="btn btn-primary mb0 btn-sm">{{__('messages.default.search')}}</button>
                            </span>
                        </div>
                    </div>
                    <div class="uk-flex uk-flex-middle">
                        {{-- <a href="{{route('user.user.permission')}}" class="btn btn-warning mt5 mr10"><i class="fa fa-plus mr5"></i> {{__('messages.user.permission.name')}}</a> --}}
                        <a href="{{route('user.user.create')}}" class="btn btn-danger mt5"><i class="fa fa-plus mr5"></i> {{__('messages.user.user.store.create.title')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>