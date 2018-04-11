<label class="{{ isset($class) ? $class : null }}">
    <span>{{ isset($label) ? $label : "ERRO" }}</span>
    {!! Form::text($input, isset($value) ? $value : null, $attributes) !!}

</label>