@extends ('layout')

@section('title')
    {{"HomePage"}}
@endsection

@section('content')
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Email</th>
                <th>Remarks</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Description</th>
                <th>Website</th>
                <th>Location</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->lastname }}</td>
                    <td>{{ $teacher->firstname }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>{{ $teacher->remarks }}</td>
                    <td>{{ $teacher->phone }}</td>
                    <td>{{ $teacher->address }}</td>
                    <td>{{ $teacher->description }}</td>
                    <td>{{ $teacher->website }}</td>
                    <td>{{ $teacher->location_id }}</td>
                    <td>{{ $teacher->category_id }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{$teachers->links()}}
@endsection
