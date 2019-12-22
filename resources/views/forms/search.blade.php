<form action="/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="search" placeholder="wyszukaj ogłoszenie">
        <button type="submit" class="btn btn-default">
            <span class="fa fa-search"></span>
        </button>
    </div>
</form>
