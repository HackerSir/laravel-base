<div class="form-group row">
    <div class="col-md-10 ml-auto">
        <label class="custom-control custom-checkbox">
            {{ Form::checkbox($name, $value, $checked, array_merge(['class' => 'custom-control-input' . ($errors->has($name) ? ' is-invalid' : '')], $attributes)) }}
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description">{{ $label }}</span>
        </label>
        @if ($errors->has($name))
            <span class="invalid-feedback">
                <strong>{{ $errors->first($name) }}</strong>
            </span>
        @endif
    </div>
</div>
