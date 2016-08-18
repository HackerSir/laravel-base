{{--
顏色下拉選單
@include('form.field.color', ['errors' => $errors, 'label' => '標籤', 'model' => isset($模型) ? $模型 : null])
--}}

<div class="field required{{ ($errors->has('color'))?' error':'' }}">
    <label>{{ $label or '顏色' }}</label>
    <div class="ui fluid selection dropdown">
        @if(isset($model))
            <input type="hidden" name="color" value="{{ $model->color }}">
        @else
            <input type="hidden" name="color">
        @endif
        <i class="dropdown icon"></i>
        <div class="default text">
            <span class="ui tag label single line" style="margin-left: 10px">請選擇{{ $label or '顏色' }}</span>
        </div>
        <div class="menu">
            @foreach(\App\Color::pluck('name') as $color)
                <div class="item" data-value="{{ $color }}">
                    <span class="ui tag label single line {{ $color }}" style="margin-left: 10px">{{ $color }}</span>
                </div>
            @endforeach
        </div>
    </div>
</div>
