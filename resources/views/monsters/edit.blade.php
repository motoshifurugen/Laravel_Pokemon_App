@extends('layouts.app')

@section('content')

<form method="POST" action="/monsters/{{ $monster->id }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">

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
            <td><input type="text" name="name" value="{{ old('name') == '' ? $monster->name : old('name') }}"></td>
            <td><select name="attribute_id">
                @foreach ($attributes as $attribute)
                    @if ($attribute->id == $monster->attribute_id)
                        <option value="{{ $attribute->id }}" selected>{{ $attribute->name }}</option>
                    @else
                        <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                    @endif
                @endforeach
            </td>
            <td><select name="region_id">
                @foreach ($regions as $region)
                    @if ($region->id == $monster->region_id)
                        <option value="{{ $region->id }}" selected>{{ $region->name }}</option>
                    @else
                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                    @endif
                @endforeach
            </td>
            <td><input type="number" name="size" value="{{ old('size') == '' ? $monster->size : old('size') }}">m</td>
            <td><input type="number" name="weight" value="{{ old('weight') == '' ? $monster->weight : old('weight') }}">kg</td>
            <td><input type="text" name="attack_name" value="{{ old('attack_name') == '' ? $monster->attack_name : old('attack_name') }}"></td>
            <td><input type="text" name="attack_description" value="{{ old('attack_description') == '' ? $monster->attack_description : old('attack_description') }}"></td>
        </tr>
    </table>

    <button type="submit" class="btn btn-outline-primary">更新する</button>
  </form>

  <a href="/monsters">ホームに戻る</a>

  @endsection
