@extends('layouts.app')
@section('content')

    <div class="row jumbotron p-4 p-md-5 text-white shadow rounded bg-secondary mt-3">
        <div class="col-md-6">
            <h2 class="display-6 font-italic">{{ $doer->name }}</h2>
            <p class="lead my-3">{{ $doer->description }}</p>
            @foreach($doer->categories as $category)
                <p>
                    <a class="btn btn-outline-danger" href="{{ route('posts.index', ['category' => $category->id]) }}">{{ $category->name }}&nbsp;</a>
                </p>
            @endforeach
        </div>
        <div class="col-md-6">
            <img class="rounded-circle mx-auto d-block mb-2" src="/uploads/avatars/{{$doer->user->avatar}}" alt="Company logo" width="150" height="150">
        </div>
    </div>

    <div class="row jumbotron rounded bg-light shadow rounded mt-3">

        <div class="col-12 text-center">
            <h2>NASZE OCENY</h2>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid">
                        <p class="text-secondary text-center">15 Minutes Ago</p>
                    </div>

                    <div class="col-md-10">
                        <p>
                            <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>Maniruzzaman Akash</strong></a>
{{--                            <span class="float-right"><i class="text-warning fa fa-star"></i></span>--}}
                        </p>
                        <div class="clearfix"></div>
                        <p>Lorem Ipsum is simply dummy text of the pr make  but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row jumbotron p-4 p-md-5 text-white shadow rounded bg-secondary mt-3 justify-content-center">
        <div class="media-container-column col-lg-8" data-form-type="formoid">

            <div class="title col-12 text-center">
                <h2 class="pb-3 display-6">NAPISZ DO NAS</h2>
            </div>

            <form class="mbr-form form-active" action="https://mobirise.com/" method="post" data-form-title="Mobirise Form"><input type="hidden" data-form-email="true" value="R46ImfT8lRYLhZq6vpVE63L0V35bOdmwHjgn18Tp/HdDujD3JfWe/8bm7YjE2vjZZ7JFQMRNRIinYQUh3aNa2qi1GshxArFhHAffNuiFsZiNLfMCF8KElmS7V7lbqBIL">
                <div class="row row-sm-offset">
                    <div class="col-md-4 multi-horizontal" data-for="name">
                        <div class="form-group">
                            <label class="form-control-label mbr-fonts-style display-7" for="name-form1-4">Name</label>
                            <input type="text" class="form-control" name="name" data-form-field="Name" required="" id="name-form1-4">
                        </div>
                    </div>
                    <div class="col-md-4 multi-horizontal" data-for="email">
                        <div class="form-group">
                            <label class="form-control-label mbr-fonts-style display-7" for="email-form1-4">Email</label>
                            <input type="email" class="form-control" name="email" data-form-field="Email" required="" id="email-form1-4">
                        </div>
                    </div>
                    <div class="col-md-4 multi-horizontal" data-for="phone">
                        <div class="form-group">
                            <label class="form-control-label mbr-fonts-style display-7" for="phone-form1-4">Phone</label>
                            <input type="tel" class="form-control" name="phone" data-form-field="Phone" id="phone-form1-4">
                        </div>
                    </div>
                </div>
                <div class="form-group" data-for="message">
                    <label class="form-control-label mbr-fonts-style display-7" for="message-form1-4">Message</label>
                    <textarea type="text" class="form-control" name="message" rows="7" data-form-field="Message" id="message-form1-4"></textarea>
                </div>

                <button href="" type="submit" class="btn btn-outline-light">Wyślij formularz</button>
            </form>
        </div>
    </div>


@endsection
