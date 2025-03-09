@foreach ($languages as $language)
    @if($language->canonical===session('app_locale'))
        @continue
    @endif
    <th class='text-center' style="width : 150px;">
        <div style="display : inline-block">
            <img class="language-flag" src="{{ asset(preg_replace('#^/public#', '', $language->image)) }}" alt="" >  
        </div>
    </th>
@endforeach