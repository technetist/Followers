@if($users->count())
    @foreach($users as $user)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><a href="{{route('user', $user->id)}}">{{$user->name}}</a></h5>
                <small>Following <span class="badge badge-primary">{{$user->followings()->get()->count()}}</span></small>
                <small>Follower <span class="badge badge-primary follower">{{$user->followers()->get()->count()}}</span></small>
            </div>
            <button class="btn btn-primary follow-button" data-id="{{$user->id}}"><strong>{{ auth()->user()->isFollowing($user) ? 'Unfollow' : 'Follow' }}</strong></button>
        </div>
    @endforeach
@endif