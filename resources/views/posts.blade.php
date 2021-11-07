<x-layout>
    @foreach ($posts as $post)
        <article class="{{ $loop -> even ? 'even' : 'odd' }}">
            <a href="/posts/{{$post -> slug}} "><h1> {{$post -> title}} </h1></a>
            <p> {!! $post -> body !!} </p>
        </article>
    @endforeach
</x-layout>


