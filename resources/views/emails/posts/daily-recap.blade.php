@component('mail::message')
# Hi {{ $user->name }}

Here is a recap of posts for {{ $date->format('d/m/Y') }}

<ol>
    @foreach($posts as $post)
        <li><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a> by {{ $post->user->name }}</li>
    @endforeach
</ol>

@component('mail::button', ['url' => route('posts.index')])
Go to blog
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
