<x-layout>
    @foreach ($posts as $post)
        <article class="{{ $loop -> even ? 'even' : 'odd' }}">
            <a href="/posts/{{$post -> slug}} "><h1> {{$post -> title}} </h1></a>
            <p>
                <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
            </p>
            <p> {!! $post -> excerpt !!} </p>
        </article>
    @endforeach
</x-layout>


