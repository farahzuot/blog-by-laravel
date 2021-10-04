<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $date, $body, $slug)
    {
        $this->title = $title;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all() {
        // when update or create a new post the cache data should be cleared.
        return cache() -> rememberForever('post.all',function (){
            return collect(File::files(resource_path('posts')))
                ->map(function ($file) {
                    $document = YamlFrontMatter::parseFile($file);
                    return new Post(
                        $document->title,
                        $document->date,
                        $document->body(),
                        $document->slug
                    );
                })
                -> sortByDesc('date');
        });
    }


    public static function find($slug) {
        $post = static::all() -> firstWhere('slug', $slug);
        if (! $post) {
            throw new ModelNotFoundException();
        }
        return $post;
    }

}
