@extends('index')

@section('title')
    Exhibitions
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h5>Exhibitions</h5>
        <a href="{{ route('exhibitions.create') }}" class="btn btn-default custom-button"><i class="fa fa-plus"></i>New  Exhibitons</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Created at</th>
                <th>Updated at</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($exhibitions as $key => $exhibition)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $exhibition->title_en }}</td>
                    <td>{{ $exhibition->body_en }}</td>
                    <td title="{{ $exhibition->created_at }}">{{ $exhibition->created_at->diffForHumans() }}</td>
                    <td title="{{ $exhibition->updated_at }}">{{ $exhibition->updated_at->diffForHumans() }}</td>
                    <td>
                        <form action="{{ route('exhibitions.destroy', $exhibition->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-times"></i></button>
                        </form>
                        {{-- <a href="{{ route('exhibitions.edit', $exhibition->id) }}" class="btn btn-outline-secondary btn-sm"><i class="fa fa-edit"></i></a> --}}
                        {{-- <a href="{{ route('exhibitions.destroy', $exhibition->id) }}" class="btn btn-outline-secondary btn-sm"><i class="fa fa-times"></i></a> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
