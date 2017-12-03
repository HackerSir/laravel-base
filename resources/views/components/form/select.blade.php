<div class="form-group row">
    <label for="{{ $name }}" class="col-md-2 col-form-label">{{ $label }}</label>

    <div class="col-md-10">
        {{ Form::select($name, $list, $selected, array_merge(['class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : '')], $selectAttributes), $optionAttributes) }}


        @if ($errors->has(str_replace('[]','',$name)))
            <span class="invalid-feedback" style="display: block;">
                <strong>{{ $errors->first(str_replace('[]','',$name)) }}</strong>
            </span>
        @endif
    </div>
</div>
