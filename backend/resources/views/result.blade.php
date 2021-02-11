@if ($albums)
    @foreach ($albums as $album)
        <tr>
            <td data-album_no="{{ $album->album_no }}"><button type="button" name="detail">詳細</button></td>
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


