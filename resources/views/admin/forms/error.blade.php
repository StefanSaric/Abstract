@if($errors->any())
    <div class="list-group">
        @foreach($errors->all() as $error)
            <h6 class="list-group-item-heading alert alert-danger">{{ $error }}</h6>
        @endforeach
    </div>
@endif

