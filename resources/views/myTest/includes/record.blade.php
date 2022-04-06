@foreach($records as $record)
    <tr>
        <th scope="row">{{ $record->id }}</th>
        <td>{{ $record->title }}</td>
        <td>{{ $record->date_modified }}</td>
        <td>
            <a href="#">@include('myTest.includes.edit-icon')</a>
            &nbsp;
            <a href="#">@include('myTest.includes.trash-icon')</a>
        </td>
    </tr>
@endforeach
