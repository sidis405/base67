@component('mail::message')
# Hello {{ $userToNotify->name }}

The post <strong>'{{ $post->title }}'</strong> was updated by the user {{ $actinguser->name }} on {{ $post->created_at->format('d/m/Y H:i') }}.

@component('mail::button', ['url' => route('posts.show', $post)])
Click here to see the updated post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
