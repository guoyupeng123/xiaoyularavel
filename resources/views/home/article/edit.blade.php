@extends('home.layouts.master')

@section('homecentend')
    <div class="main-content">

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8">

                    <!-- Header -->
                    <div class="header mt-md-5">
                        <div class="header-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <!-- Title -->
                                    <h1 class="header-title">
                                        文章发表
                                    </h1>
                                </div>
                            </div> <!-- / .row -->
                        </div>
                    </div>

                    <!-- Form -->
                    <form class="mb-4" method="post" action="{{route('home.article.update',$article)}}">
                        @csrf @method('PUT')
                        <!-- Project name -->
                        <div class="form-group">
                            <label>文章标题</label>
                            <input type="text" name="title" class="form-control" value={{$article->title}}>
                        </div>
                        <div class="form-group">
                            <label>所属栏目</label>
                            <select class="form-control" name="category_id">
                                <option value="">请选择</option>
                                @foreach($category as $value)
                                <option @if($value['id'] == $article['category_id']) selected @endif value="{{$value->id}}">{{$value->title}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <!-- Project description -->
                        <!-- Project description -->
                        <div class="form-group">
                            <label class="mb-1">
                                文章内容
                            </label>
                            <div id="editormd">
                                <textarea style="display:none;" name="content">{{$article->content}}</textarea>
                            </div>
                        </div>


                        <!-- Buttons -->
                        <button class="btn btn-block btn-primary">
                            发布文章
                        </button>

                    </form>

                    @push('js')
                        <script>
                            require(['hdjs'], function (hdjs) {
                                hdjs.editormd("editormd", {
                                    width: '100%',
                                    height: 300,
                                    toolbarIcons : function() {
                                        return [
                                            "bold", "del", "italic", "quote","|",
                                            "list-ul", "list-ol", "hr", "|",
                                            "link", "hdimage", "code-block", "|",
                                            "watch", "preview", "fullscreen"
                                        ]
                                    },
                                    //后台上传地址，默认为 hdjs配置项window.hdjs.uploader
                                    server:'',
                                    //editor.md库位置
                                    path: "{{asset('org/hdjs')}}/package/editor.md/lib/"
                                });
                            });

                        </script>
                        @endpush

                </div>
            </div> <!-- / .row -->
        </div>

    </div>
    @endsection