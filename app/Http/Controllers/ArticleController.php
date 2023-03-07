<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Profile;
use App\Models\Sponser;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Hamcrest\Core\IsTypeOf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function index()
    {
        try {
            $articles = Article::get();
            return view('articles.index', compact('articles'));
        } catch (Exception $ex) {
            dd($ex);
            // return view('404');
        }
    }

    public function create()
    {
        $tags = Tag::get();
        $sponsers = Sponser::get();
        $profiles = Profile::get();
        return view('articles.create')->with([
            'tags' => $tags,
            'sponsers' => $sponsers,
            'profiles' => $profiles
        ]);
    }

    public function show(Article $article)
    {
    }


    public function edit($id)
    {
        $tags = Tag::get();
        $sponsers = Sponser::get();
        $profiles = Profile::get();

        $article = Article::find($id);
        $article_tags = array_map(
            function ($element) {
                return $element['id'];
            },
            $article->tags()->get()->toArray()
        );
        $article_sponsers = array_map(
            function ($element) {
                return $element['id'];
            },
            $article->sponsers()->get()->toArray()
        );
        $article_profiles = array_map(
            function ($element) {
                return $element['id'];
            },
            $article->profiles()->get()->toArray()
        );


        return view('articles.edit')->with([
            'article' => $article,
            'article_tags' => $article_tags,
            'article_sponsers' => $article_sponsers,
            'article_profiles' => $article_profiles,
            'tags' => $tags,
            'sponsers' => $sponsers,
            'profiles' => $profiles
        ]);
    }

    public function store(ArticleRequest $request)
    {
        try {
            $last_article =  Article::create($request->validated());

            if ($request->tags) {
                $last_article->tags->attach($request->tags);
            }
            if ($request->sponsers) {
                $last_article->sponsers()->attach($request->sponsers);
            }
            if ($request->profiles) {
                $last_article->profiles()->attach($request->profiles);
            }

            if ($request->cover) {
                $now = Carbon::now()->toDateString();
                $newly_added_cover_path = 'images/ariticleimages/' . $now . '' . $request->file('cover')->hashName();
                Storage::disk('public')->put($newly_added_cover_path, file_get_contents($request->cover));
                $url = Storage::url($newly_added_cover_path);
                // $url = asset('storage/'.$newly_added_cover_path);
                $last_article->update(['cover' => $url]);
            }
            return redirect('/admin/articles');
        } catch (Exception $ex) {
            dd($ex);
            // return redirect('/admin/articles')->withErrors('could not perform the action');
        }
    }

    public function update(ArticleRequest $request, $id)
    {
        try {

            $article = Article::find($id);
            $article->update($request->validated());
            if ($request->tags) {
                $article->tags()->sync($request->tags);
            }
            if ($request->sponsers) {
                $article->sponsers()->sync($request->sponsers);
            }
            if ($request->profiles) {
                $article->profiles()->sync($request->profiles);
            }

            if ($request->cover) {
                $newly_added_cover_path = 'images/ariticleimages/' . Carbon::now()->toDateString() . '' . $request->file('cover')->hashName();
                Storage::disk('public')->put($newly_added_cover_path, file_get_contents($request->cover));
                $url = Storage::url($newly_added_cover_path);
                $article->update(['cover' => $url]);
            }
            return redirect('/admin/articles');
        } catch (Exception $ex) {
            dd($ex);
            // return redirect('/admin/articles')->withErrors('could not perform the action');
        }
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->tags()->detach();
        $article->sponsers()->detach();
        $article->profiles()->detach();
        $article->delete();
        return redirect('/admin/articles');
    }
}
