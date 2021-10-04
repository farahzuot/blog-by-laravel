
<x-layout>
    <article>
        <h1> {{$post->title}} </h1>
        <h4> {{$post->date}} </h4>
        <div> {!! $post->body !!} </div>
    </article>

    <a href="/">Home</a>
</x-layout>

