@if($users->count())
    @foreach($users as $user)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><a href="{{route('user', $user->id)}}">{{$user->name}}</a></h5>
                <img class="card-img-top img-responsive" src="{{asset('images')}}/person1.jpg" alt="">
                <small>Following
                    <span
                       class="badge badge-primary">{{$user->followings()->get()->count()}}</span></small>
                <small>Follower
                    <span
                       class="badge badge-primary follower">{{$user->followers()->get()->count()}}</span></small>
            </div>
            <button style="margin: 10px" class="btn btn-primary follow-button" data-id="{{$user->id}}">
                <strong>
                    @if(auth()->user()->isFollowing($user))
                        UnFollow
                     @else
                        Follow
                     @endif
                </strong>
            </button>
        </div>
    @endforeach

    @else

    <h1>Nothing Yet!</h1>

@endif
