{{-- BREADCRUMB --}}
@include('backend.dashboard.component.breadcrumb',['title'=> __('messages.language.index.title')])

<div class="row mt20">
<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5> {{__('messages.language.index.tableHeading')}} </h5>
            @include('backend.language.component.toolbox')
        </div>
        <div class="ibox-content">
            @include('backend.language.component.filter')
            @include('backend.language.component.table')
        </div>
    </div>
</div>
</div>
