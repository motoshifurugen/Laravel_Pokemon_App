@extends('layouts.app')

@section('content')

<table class="table">
    <tr>
        <th>名前</th>
        <th>タイプ</th>
        <th>地域</th>
        <th>高さ</th>
        <th>重さ</th>
        <th>技の名前</th>
        <th>技の説明</th>
    </tr>
    <tr>
        <td>{{ $monster->name }}</td>
        <td><select disabled name="attribute_id">
            @foreach ($attributes as $attribute)
                @if ($attribute->id == $monster->attribute_id)
                    <option value="{{ $attribute->id }}" selected>{{ $attribute->name }}</option>
                @else
                    <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                @endif
            @endforeach</td>
            <td><select disabled name="region_id">
                @foreach ($regions as $region)
                    @if ($region->id == $monster->region_id)
                        <option value="{{ $region->id }}" selected>{{ $region->name }}</option>
                    @else
                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                    @endif
                @endforeach</td>
        <td>{{ $monster->size }}</td>
        <td>{{ $monster->weight }}</td>
        <td>{{ $monster->attack_name }}</td>
        <td>{{ $monster->attack_description }}</td>
    </tr>
</table>


{{-- <div class="row">
    <div class="col-5">
        @if($monster->isFavoritedBy(Auth::user()))
        <a href="/monsters/{{ $monster->id }}/favorite" class="btn pokemon-favorite-button text-favorite w-100">
            <i class="fa fa-heart"></i>
            お気に入り解除
        </a>
        @else
        <a href="/monsters/{{ $monster->id }}/favorite" class="btn pokemon-favorite-button text-favorite w-100">
            <i class="fa fa-heart"></i>
            お気に入り
        </a>
        @endif
    </div>
</div> --}}

<a href="/monsters">ホームに戻る</a>

@endsection
