@extends('index')

@section('title')
    Articles
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h5>Articles</h5>
        <a href="{{ route('articles.create') }}" class="btn btn-default custom-button"><i class="fa fa-plus"></i>New Article</a>
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
            @foreach ($articles as $key => $article)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $article->title_en }}</td>
                    <td>{{ $article->body_en }}</td>
                    <td title="{{ $article->created_at }}">{{ $article?->created_at?->diffForHumans() }}</td>
                    <td title="{{ $article->updated_at }}">{{ $article?->updated_at?->diffForHumans() }}</td>
                    <td>
                        <form action="{{ route('articles.destroy', $article->id) }} " method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-times"></i></button>
                        </form>
                        {{-- <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-outline-secondary btn-sm"><i class="fa fa-edit"></i></a> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('script')
    <script>
        
    </script>
@endsection
