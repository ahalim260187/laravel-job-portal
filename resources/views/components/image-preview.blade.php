{{-- @props(['height', 'width', 'source', 'imgName'])
@if ($source)
    <div>
        <img {{ $attributes->merge(['style' => "height: {$height}px; width: {$width}px; object-fit:cover;"]) }}
            src="{{ $source }}" alt=" {{ $imgName }}image preview">
    </div>
@endif --}}

@props(['height' => '100', 'width' => '100', 'source' => null, 'imgName' => 'Default Image'])

@if ($source)
    <div>
        <img {{ $attributes->merge(['style' => "height: {$height}px; width: {$width}px; object-fit:cover;"]) }}
            src="{{ $source }}" alt="{{ $imgName }} image preview">
    </div>
@endif
