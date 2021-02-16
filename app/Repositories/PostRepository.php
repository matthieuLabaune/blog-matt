<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    /**
     * @return mixed
     */
    protected function queryActive()
    {
        return Post::select(
            'id',
            'slug',
            'image',
            'title',
            'excerpt',
            'user_id')
            ->with('categories:title')
            ->whereActive(true);
    }

    /**
     * @return mixed
     */
    protected function queryActiveOrderByDate()
    {
        return $this->queryActive()->latest();
    }

    /**
     * @param $nbrPages
     * @return mixed
     */
    public function getActiveOrderByDate($nbrPages)
    {
        return $this->queryActiveOrderByDate()->paginate($nbrPages);
    }

    /**
     * @return mixed
     */
    public function getHeros()
    {
        return $this->queryActive()->with('categories')->latest('updated_at')->take(5)->get();
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function getPostBySlug($slug)
    {
        // Post for slug with user, tags and categories
        $post = Post::with(
            'user:id,name,email',
            'tags:id,tag,slug',
            'categories:title,slug'
        )
            ->withCount('validComments')
            ->whereSlug($slug)
            ->firstOrFail();
        // Previous post
        $post->previous = $this->getPreviousPost($post->id);
        // Next post
        $post->next = $this->getNextPost($post->id);
        return $post;
    }

    /**
     * @param $id
     * @return mixed
     */
    protected function getPreviousPost($id)
    {
        return Post::select('title', 'slug')->latest('id')->firstWhere('id', '<', $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    protected function getNextPost($id)
    {
        return Post::select('title', 'slug')->oldest('id')->firstWhere('id', '>', $id);
    }

    /**
     * @param $nbrPages
     * @param $category_slug
     * @return mixed
     */
    public function getActiveOrderByDateForCategory($nbrPages, $category_slug)
    {
        return $this->queryActiveOrderByDate()
            ->whereHas('categories', function ($q) use ($category_slug) {
                $q->where('categories.slug', $category_slug);
            })->paginate($nbrPages);
    }

    /**
     * @param $nbrPages
     * @param $tag_slug
     * @return mixed
     */
    public function getActiveOrderByDateForTag($nbrPages, $tag_slug)
    {
        return $this->queryActiveOrderByDate()
            ->whereHas('tags', function ($q) use ($tag_slug) {
                $q->where('tags.slug', $tag_slug);
            })->paginate($nbrPages);
    }

    /**
     * @param $n
     * @param $search
     * @return mixed
     */
    public function search($n, $search)
    {
        return $this->queryActiveOrderByDate()
            ->where(function ($q) use ($search) {
                $q->where('excerpt', 'like', "%$search%")
                    ->orWhere('body', 'like', "%$search%")
                    ->orWhere('title', 'like', "%$search%");
            })->paginate($n);
    }
}
