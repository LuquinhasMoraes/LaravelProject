<label class="{{ isset($class) ? $class : null }}">
    <span>{{ isset($label) ? $label : "ERRO" }}</span>
    {!! Form::password($input, $attributes) !!}
</label>