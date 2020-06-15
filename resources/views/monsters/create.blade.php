@extends('layouts.app')

@section('content')

<h1>新しいポケモン</h1>

<form method="POST" action="/monsters">
    {{ csrf_field() }}
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
            <td><input type="text" name="name"></td>
            <td>
                <select name="attribute_id">
                    @foreach($attributes as $attribute)
                    <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <select name="region_id">
                    @foreach($regions as $region)
                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                    @endforeach
                </select>
            </td>
            <td><div><input type="number" name="size">m</div></td>
            <td><div><input type="number" name="weight">kg</div></td>
            <td><input type="text" name="attack_name"></td>
            <td><input type="text" name="attack_description"></td>
        </tr>
    </table>

    <button type="submit" class="btn btn-outline-primary" >保存する</button>
</form>

<a href="/monsters">ホームに戻る</a>

@endsection

