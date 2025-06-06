@props (['user'])
<div {{$attributes}}
    x-data="{
                                following: @json($user->isFollowedBy(auth()->user())),
                                followersCount: @json($user->followers()->count()),
                                follow() {
                                    axios.post('/follow/{{ $user->id }}')
                                    .then(res => {
                                          this.following = !this.following;
                                          this.followersCount = res.data.followersCount;
                                        })
                                            .catch(err => console.error(err));
                                    }
                                 }"
    class="w-[320px]  px-8"
>
    {{ $slot }}
</div>
