<div class="py-3">
    <div class="fs-3">
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
                        <a href="{{ route($key) }}" class="text-primary-kai">{{ $item }}</a>
                        <i class="ti ti-chevron-right mx-1"></i>
                    @endif
                @endif
            @endforeach
        @endif
    </div>
</div>
