@if ($albums)
    @foreach ($albums as $album)
        <tr>
            <td scope="row"><button type="button" name="detail"><a href="{{ url('/detail', $album->album_no) }}">詳細</a></button></td>
            <td>{{ $album->album_name }}</td>
            <td>{{ $album->attributeCaption }}</td>
            <td>{{ $album->typeCaption }}</td>
            <td>{{ $album->rarityCaption }}</td>
            <td>{{ $album->weaponCaption }}</td>
            <td>{{ $album->gpCaption }}</td>
            <td>{{ $album->skill1Caption }}</td>
            <td>{{ $album->skill2Caption }}</td>
            <td>{{ $album->assist1Caption }}</td>
            <td>{{ $album->assist2Caption }}</td>
            <td>{{ $album->characteristic1Caption }}</td>
            <td>{{ $album->characteristic2Caption }}</td>
        </tr>
    @endforeach
@endif
