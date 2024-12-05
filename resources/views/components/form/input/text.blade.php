<input {{ $attributes->merge(['class' => 'form-control rounded-pill' . ($errors->has($name) ? ' is-invalid' : '')]) }}>
