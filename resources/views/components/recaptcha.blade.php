<div class="row form-group">
    <label class="col-form-label col-sm-2 required">機器人驗證</label>
    <div class="col-sm-10">
        {!! ReCaptcha::htmlFormSnippet() !!}
        @if($errors->has('g-recaptcha-response'))
            <div class="invalid-feedback" style="display: block">{{ $errors->first('g-recaptcha-response') }}</div>
        @endif
    </div>
</div>

@section('js')
    @parent
    {!! ReCaptcha::htmlScriptTagJsApi() !!}
@endsection
