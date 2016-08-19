{{--
分頁選單
@include('components.pagination-bar', ['models' => $models])
--}}

{{-- 必須是分頁後的模型 --}}
@if($models instanceof \Illuminate\Contracts\Pagination\Paginator)
    {{-- 超過一頁才顯示 --}}
    @if($models->lastPage() > 1)
        <div class="ui center aligned attached segment" style="border: none; background: none">
            {!! $models->appends(Request::except(['page']))->render(new Landish\Pagination\SemanticUI($models))  !!}
        </div>
    @endif
@endif
