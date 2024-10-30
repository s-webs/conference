<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show($articleSlug)
    {
        $article = Article::query()->where('slug', $articleSlug)->firstOrFail();
        return view('pages.article.show', compact('article'));
    }
}
