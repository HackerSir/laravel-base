<h4 class="ui image header">
    {{ Html::image(Gravatar::src($email, 80), null, ['class'=>'ui tiny avatar image']) }}
    <div class="content">
        {{ link_to_route('user.show', $name, $id, ['class' => 'ui large blue header']) }}
        <div class="sub header">
            @foreach($roles as $role)
                {!! $role['tag'] !!}
            @endforeach
        </div>
    </div>
</h4>
