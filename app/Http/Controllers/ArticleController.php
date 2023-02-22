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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        try 
        {
            // return response()->json(['7ama'=>'okkkk']);
            $articles = Article::get();
            return view('articles.index', compact('articles'));
        } 
        catch (Exception $ex)
        {
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
        $requested = Article::find($article->id);
        return view('articles.create', $requested);
    }


    public function edit(Article $article)
    {
        return view('articles.edit', $article);
    }

    public function store(ArticleRequest $request)
    {
        try {
            // Profile::find(1)->contributions();
            $last_article =  Article::create($request->validated());

            if ($request->tags) 
            {
                foreach($request->tags as $tags_found)
                {
                    DB::table('article_tag')->insert([
                        ['article_id' => $last_article->id, 'tag_id' => $tags_found]
                    ]);
                }
            }
            if ($request->sponsers) 
            {
                foreach($request->sponsers as $found_sponsers)
                {
                    DB::table('article_sponser')->insert([
                        ['article_id'=> $last_article->id, 'sponser_id'=>$found_sponsers]
                    ]);
                }
            }
            if ($request->profiles) 
            {
                foreach($request->profiles as $found_profiles)
                {
                    DB::table('article_profile')->insert([
                        ['article_id'=> $last_article->id, 'profile_id'=>$found_profiles]
                    ]);
                }
            }

            if ($request->cover) 
            {
                $newly_added_cover_path ='images/ariticleimages/'.Carbon::now()->toDateString() . '' .$request->file('cover')->hashName();
                Storage::disk('public')->put($newly_added_cover_path, file_get_contents($request->cover)); 
                $url = Storage::url($newly_added_cover_path);
                // $last_article->cover = $url;
                $last_article->update(['cover'=>$url]);
            }
            return redirect('/admin/articles');
        } 
        catch (Exception $ex) 
        {
            dd($ex);
            // return redirect('/admin/articles')->withErrors('could not perform the action');
        }
    }

    public function update()
    {
       
    }

    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect('/admin/articles');
    }
}
