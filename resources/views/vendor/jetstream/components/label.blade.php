@props(['value'])
<label class="fw-semibold form-label" {{ $attributes }}>
    {{ $value ?? $slot }}
</label>
