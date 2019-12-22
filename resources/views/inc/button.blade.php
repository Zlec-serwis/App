{{ Form::open(['method' => 'GET', 'url' => $url]) }}

<nav class="navbar navbar-expand-md">
<div class="row">

    @foreach(\App\Address::orderBy('city', 'ASC')->get() as $address)

        <label for="{{ $address->city }}" class="btn btn-outline-dark mr-2">
            {{ Form::radio('city', $address->id, Request::get('city') == $address->id, ['id'=>$address->city, 'onclick' => 'submit()', 'class' => 'clean']) }}
            <b class="active">{{ $address->city }}</b>
        </label>

    @endforeach

</div>
</nav>

<nav class="navbar navbar-expand-md">
    <div class="row">

        @foreach(\App\Category::orderBy('name', 'ASC')->get() as $category)

                <label for="{{ $category->name }}" class="btn btn-outline-dark mr-2 ">
                    {{ Form::radio('category', $category->id, Request::get('category') == $category->id, ['id'=>$category->name, 'onclick' => 'submit()', 'class' => 'clean']) }}
                    <b class="active">{{ $category->name }}</b>
                </label>

        @endforeach

    </div>
</nav>

{{ Form::close() }}


