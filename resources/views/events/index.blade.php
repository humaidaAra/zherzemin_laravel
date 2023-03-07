@extends('index')

@section('title')
    Events
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h5>Events</h5>
        <a href="{{ route('events.create') }}" class="btn btn-default custom-button"><i class="fa fa-plus"></i>New  Event</a>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
            @foreach ($events as $key => $event)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $event->title_en }}</td>
                    <td>{{ $event->description_en }}</td>
                    <td title="{{ $event->created_at }}">{{ $event->created_at->diffForHumans() }}</td>
                    <td title="{{ $event->updated_at }}">{{ $event->updated_at->diffForHumans() }}</td>
                    <td>
                        <form action="{{ route('events.edit', $event->id) }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-folder-open"></i>Open</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('events.destroy', $event->id) }} " method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-times"></i></button>
                        </form>
                        {{-- <a href="{{ route('events.edit', $event->id) }}" class="btn btn-outline-secondary btn-sm"><i class="fa fa-edit"></i></a> --}}
                        {{-- <a href="{{ route('events.destroy', $event->id) }}" class="btn btn-outline-secondary btn-sm"><i class="fa fa-times"></i></a> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
