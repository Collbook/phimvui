@if ($errors->any())
    <div class="error">
        <ul class=" alert alert-danger">
            @foreach ($errors->all() as $error)
                <li >{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif