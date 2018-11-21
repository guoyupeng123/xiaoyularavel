<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller{


    public function __construct(){
//      设置没有登录的用户
        $this->middleware('auth',[
//            这几个方法都不能访问
//              'only'=>['create','store','edit','update','destroy']
//            除了这几个用户都不能访问
                'except'=>['index','show']
        ]);
    }
//  首页
    public function index(Request $request){
//        制作侧边栏目
//        dd($request->toArray());//接受的是传递过来的参数
//        获取category传过来的参数
        $category = $request->query('category');
        $articles = Article::latest();//最新排序
        if($category){
//            判断获取数据
            $articles = $articles->where('category_id',$category);
        }
//        让数据传入模型循环
        $article = $articles->paginate(10);

////        获取数据库里面的数据
//        $article = Article::latest()->paginate(10);//分页
//        获得文章类别
        $categories = Category::all();


//        dd($article);
        return view('home.article.index',compact('article','categories'));
    }

//  文章增加页面
    public function create(){
//        首先获得所有栏目的数据
        $category = Category::all();
        return view('home.article.create',compact('category'));
    }

//  文章增加页面
    public function store(ArticleRequest $request,Article $article){
//        获取当前用户的id
//        dd(auth()->id());
//        dd($request->all());
//        因为用户提交的数据里面没有当前用户的id，所以用这种写法
        $article->title = $request->title;
        $article->category_id = $request->category_id;
        $article->content = $request['content'];
        $article->user_id = auth()->id();
//        dd($article);//已经有用户的idseed
        $article->save();
        return redirect()->route('home.article.index')->with('success','发布成功');
}

//  文章内容显示页面
    public function show(Article $article){
        return view('home.article.show',compact('article'));

    }

//  编辑页面
    public function edit(Article $article){
        $this->authorize('update',$article);
//      首先获得所有栏目的数据
        $category = Category::all();
        return view('home.article.edit',compact('category','article'));
    }

//  更新页面
    public function update(Request $request, Article $article){

        $this->authorize('update',$article);
//        获取当前用户的id
//        dd(auth()->id());
//        dd($request->all());
//        因为用户提交的数据里面没有当前用户的id，所以用这种写法
        $article->title = $request->title;
        $article->category_id = $request->category_id;
        $article->content = $request['content'];
        $article->user_id = auth()->id();
//        dd($article);//已经有用户的id
        $article->save();
        return redirect()->route('home.article.index')->with('success','修改成功');
    }

//  删除
    public function destroy(Article $article){
        $this->authorize('delete',$article);
        $article->delete();
        return redirect()->route('home.article.index')->with('success','删除成功');
    }
}
