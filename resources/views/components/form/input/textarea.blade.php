<textarea {{ $attributes->merge(['class' => 'form-control rounded-4' . ($errors->has($name) ? ' is-invalid' : '')]) }}> {{ $value ?? $slot }}</textarea>
