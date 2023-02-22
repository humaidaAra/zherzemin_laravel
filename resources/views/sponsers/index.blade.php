@extends('index')

@section('title')
    Sponsers
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h5>Sponsers</h5>
        <a href="{{ route('sponsers.create') }}" class="btn btn-default custom-button"><i class="fa fa-plus"></i>New Sponser</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>URL</th>
                <th>Created at</th>
                <th>Updated at</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sponsers as $key => $sponser)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $sponser->name }}</td>
                    <td style=";overflow: hidden;">{{ $sponser->url }}</td>
                    <td title="{{ $sponser->created_at }}">{{ $sponser->created_at->diffForHumans() }}</td>
                    <td title="{{ $sponser->updated_at }}">{{ $sponser->updated_at->diffForHumans() }}</td>
                    <td>
                        {{-- <a href="{{ route('sponsers.edit', $sponser->id) }}" class="btn btn-outline-secondary btn-sm"><i class="fa fa-edit"></i></a> --}}
                        <form action="{{ route('sponsers.destroy', $sponser->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-secondary btn-sm" ><i class="fa fa-times"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
