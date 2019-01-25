@if($users->count())
    @foreach($users as $user)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><a href="{{route('user', $user->id)}}">{{$user->name}}</a></h5>
                <img src="{{ url('/storage/uploads/person'.$user->id.'.jpeg') }}" alt="Profile Image" class="card-img-top img-fluid">
                <small>Following <span class="badge badge-primary">{{$user->followings()->get()->count()}}</span></small>
                <small>Follower <span class="badge badge-primary follower">{{$user->followers()->get()->count()}}</span></small>
                @if(Auth::id() !== $user->id)<button style="display: block" class="btn btn-primary follow-button mx-auto my-2" data-id="{{$user->id}}"><strong>{{ auth()->user()->isFollowing($user) ? 'Unfollow' : 'Follow' }}</strong></button>@endif
            </div>
        </div>
    @endforeach
@endif