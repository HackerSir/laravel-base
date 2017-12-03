<div class="form-group row">
    <label for="{{ $name }}" class="col-md-2 col-form-label">{{ $label }}</label>

    <div class="col-md-10">
        {{ Form::email($name, $value, array_merge(['class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : '')], $attributes)) }}
        @if($hint)
            <small class="form-text text-muted">{{ $hint }}</small>
        @endif

        @if ($errors->has($name))
            <span class="invalid-feedback">
                <strong>{{ $errors->first($name) }}</strong>
            </span>
        @endif
    </div>
</div>
