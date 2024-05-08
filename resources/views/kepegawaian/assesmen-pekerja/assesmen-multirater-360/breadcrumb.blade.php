<div class="fs-2">
    @if (isset($breadcrumb))
        @foreach ($breadcrumb as $key => $item)
            <?php $index = array_search($key, array_keys($breadcrumb)); ?>
            @if ($index == 0)
                <a class="text-muted"> {{ $item }}</a>
                <i class="ti ti-chevron-right mx-1"></i>
            @elseif ($index == count($breadcrumb) - 1)
                {{ $item }}
            @else
                @if (str_contains($key, 'group'))
                    <a class="text-muted"> {{ $item }}</a>
                    <i class="ti ti-chevron-right mx-1"></i>
                @else
                    <a href="{{ route($key) }}">{{ $item }}</a>
                    <i class="ti ti-chevron-right mx-1"></i>
                @endif
            @endif
        @endforeach
    @endif
</div>
