@extends('index')

@section('title')
    Create new Sponser
@endsection

@section('content')
    <h3><i class="fa fa-plus"></i> Create Sponser</h3>
    <form action="{{ route('sponsers.store') }}" method="POST">
        @csrf
        <div class="form-floating">
            <input type="text" name="name" id="name" placeholder="Sponser Name" class="form-control" required>
            <label for="name">Sponser Name</label>
        </div>
        <div class="form-floating my-4">
            <input type="text" name="url" id="link" placeholder="Link to website" class="form-control" required>
            <label for="link">Sponser's Website Link</label>
        </div>
        <div class="row">
            <div class="col-3">
                <button type="submit" class="bttn"><i class="fa fa-check"></i> Publish</button>
            </div>
            <div class="col-3">
                <button type="reset" class="bttn text-muted"><i class="fa fa-undo text-muted"></i> Clear</button>
            </div>
        </div>
    </form>
@endsection
