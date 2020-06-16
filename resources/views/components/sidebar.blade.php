<div class="container">
    <p>タイプ</p>
        @foreach ($attributes as $attribute)
                <label class="pokemon-sidebar-category-label"><a href="{{ route('monsters.index', ['attribute' => $attribute->id]) }}">{{ $attribute->name }}</a></label>
        @endforeach
    {{-- <p>地方</p>
        @foreach ($regions as $region)
                <label class="pokemon-sidebar-category-label"><a href="{{ route('monsters.index', ['region' => $region->id]) }}">{{ $region->name }}</a></label>
        @endforeach --}}
</div>
