@extends('index')

@section('title')
    Tags
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h5>Tags</h5>
        <a href="{{ route('tags.create') }}" class="btn btn-default custom-button"><i class="fa fa-plus"></i>New Tag</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Enabled</th>
                <th>Created at</th>
                <th>Updated at</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $key => $tag)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $tag->name_en }}</td>
                    <td>True</td>
                    <td title="{{ $tag->created_at }}">{{ $tag->created_at->diffForHumans() }}</td>
                    <td title="{{ $tag->updated_at }}">{{ $tag->updated_at->diffForHumans() }}</td>
                    <td>
                        <form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-secondary btn-sm"><i class="fa fa-times"></i></button>
                        </form>
                        {{-- <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-outline-secondary btn-sm"><i class="fa fa-edit"></i></a>
                        <a type="submit" form=""><a href="{{ route('tags.destroy', $tag->id) }}" class="btn btn-outline-secondary btn-sm"><i class="fa fa-times"></i></a> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
