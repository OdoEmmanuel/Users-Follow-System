@extends('layouts.app')
@section('content')
    <script src="{{asset('js/scripts.js')}}" defer></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>{{ auth()->user()->id == $user->id ? 'My Profile' : $user->name}}</h1>

                <img class="card-img-top img-responsive" src="{{asset('images')}}/person{{$user->id}}.jpeg" alt="">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">

                        <a
                          class="nav-item nav-link active"
                          id="nav-home-tab"
                          data-toggle="tab"
                          href="#followers"
                          role="tab"
                          aria-controls="nav-home"
                          aria-selected="true">Followers <span
                          class="badge badge-primary">{{$user->followers()->get()->count()}}</span></a>

                        <a
                          class="nav-item nav-link"
                          id="nav-profile-tab"
                          data-toggle="tab"
                          href="#following"
                          role="tab"
                          aria-controls="nav-profile"
                          aria-selected="false">Following <span
                          class="badge badge-primary">{{$user->followings()->get()->count()}}</span></a>

                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="followers" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="card-columns">
                            @include('users', ['users'=>$user->followers()->get()])
                        </div>
                    </div>

                    <div class="tab-pane fade" id="following" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="card-columns">
                            @include('users', ['users'=>$user->followings()->get()])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
