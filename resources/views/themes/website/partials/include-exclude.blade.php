@php
$tourGroupCount = count($tourGroups);
$remaing = $tourGroupCount % 4;
$default = 'col-xs-12 col-sm-12 col-md-3 col-lg-3';
if ($remaing == 1) {
    $remaingClass = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
} elseif ($remaing == 2) {
    $remaingClass = 'col-xs-12 col-sm-12 col-md-6 col-lg-6';
} elseif ($remaing == 3) {
    $remaingClass = 'col-xs-12 col-sm-12 col-md-4 col-lg-4';
}
@endphp
<div class="row">
    @foreach ($tourGroups as $group)
        <div class="@if ($loop->remaining < $remaing) {{ $remaingClass }} @else {{ $default }} @endif" style="text-align: center">
            <span class="sm-title">{{ $group->name }}</span>
            @foreach ($group->tourData as $item)
                <p><i class="{{ $class }}" aria-hidden="true"></i>
                    {{ $item->item }}</p>
            @endforeach
        </div>
    @endforeach
</div>
