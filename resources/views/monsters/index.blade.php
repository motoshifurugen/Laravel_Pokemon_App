<table class="table">
    <tr>
        <th>名前</th>
        {{-- <th>タイプ</th>
        <th>地域</th> --}}
        {{-- <th>高さ</th>
        <th>重さ</th> --}}
        <th>技の名前</th>
        <th>技の説明</th>
    </tr>
    @foreach($monsters as $monster)

    <tr>
      <td>{{ $monster->name }}</td>
      {{-- <td><select disabled name="attribute_id">
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
            @endforeach</td> --}}
      {{-- <td>{{ $monster->size }}</td>
      <td>{{ $monster->weight }}</td> --}}
      <td>{{ $monster->attack_name }}</td>
      <td>{{ $monster->attack_description }}</td>

      <td><div class="d-flex"><a href="/monsters/{{ $monster->id }}" class="btn btn-outline-primary">見る</a></div></td>
      <td><div class="d-flex"><a href="/monsters/{{ $monster->id }}/edit" class="btn btn-outline-primary">編集する</a></div></td>
      <td>
        <div class="d-flex">
        <form action="/monsters/{{ $monster->id }}" method="POST">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="submit" class="btn btn-outline-danger">野生に返す</button>
        </form>
        </div>
      </td>
    </tr>

    @endforeach
    </table>
    <a href="/monsters/create">新しく追加する</a>
