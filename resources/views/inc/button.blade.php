{{ Form::open(['method' => 'GET', 'url' => $url]) }}
    <nav class="navbar navbar-expand-md">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-link ">
                        @foreach(\App\Address::orderBy('city', 'ASC')->get() as $address)
                            {{ Form::radio('city', $address->id, Request::get('city') == $address->id, ['onclick' => 'submit()']) }}
                            <b>{{ $address->city }}</b>
                        @endforeach
                    </li>
                </ul>
            </div>
        </div>
        </nav>
    <nav class="navbar navbar-expand-md">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    @foreach(\App\Category::orderBy('name', 'ASC')->get() as $category)
                        {{ Form::radio('category', $category->id, Request::get('category') == $category->id, ['onclick' => 'submit()']) }}
                        <b>{{ $category->name }}</b>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
{{ Form::close() }}
