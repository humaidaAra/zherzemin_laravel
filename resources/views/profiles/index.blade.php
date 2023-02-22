@extends('index')

@section('title')
    Profile
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h5>Profile</h5>
        <a href="{{ route('profiles.create') }}" class="btn btn-default custom-button"><i class="fa fa-plus"></i>New  Profile</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Created at</th>
                <th>Updated at</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($profiles as $key => $profile)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $profile->name }}</td>
                    <td title="{{ $profile->created_at }}">{{ $profile->created_at->diffForHumans() }}</td>
                    <td title="{{ $profile->updated_at }}">{{ $profile->updated_at->diffForHumans() }}</td>
                    <td>
                        {{-- <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-outline-secondary btn-sm"><i class="fa fa-edit"></i></a> --}}
                        <form action="{{ route('profiles.destroy', $profile->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button  type="submit" class="btn btn-outline-secondary btn-sm"><i class="fa fa-times"></i></a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
