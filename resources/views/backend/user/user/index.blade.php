{{-- BREADCRUMB --}}

@include('backend.dashboard.component.breadcrumb',['title'=> __('messages.user.user.index.title')])

<div class="row mt20">
<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>{{__('messages.user.user.index.tableHeading')}} </h5>
            @include('backend.user.user.component.toolbox')
        </div>
        <div class="ibox-content">
            @include('backend.user.user.component.filter')
            @include('backend.user.user.component.table')
        </div>
    </div>
</div>
</div>
