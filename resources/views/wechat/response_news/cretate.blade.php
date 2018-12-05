@extends('admin.layouts.master')
@section('content')

    <div class="content-wrapper">
        <div class="page-header">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route('wechat.response_news.index')}}" class="card-title d-inline-block text-muted">图文回复列表</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="{{route('wechat.response_news.create')}}" class="card-title d-inline-block text-primary" style="vertical-align: inherit;">添加图文回复</a>
                    </li>
                </ol>
            </nav>
        </div>
        <form class="forms-sample" method="post" action="{{route('wechat.response_news.store')}}">
            @csrf
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        {!! $ruleView !!}
                    </div>
                </div>
            </div>
            <div class="row" id="news-create">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12" style="margin-top: 20%">
                                <img :src="news.picurl" alt="" width="100%">
                                <p class="text-center p-3 bg-dark text-white">@{{news.title}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">回复图文</h4>
                            <div class="card" id="">
                                <div class="card-body">
                                    <div class="card grid-margin stretch-card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">图文标题</label>
                                                <input type="text" v-model="news.title" class="form-control" id="exampleInputUsername1" placeholder="标题">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">图文描述</label>
                                                <input type="text" v-model="news.discription" class="form-control" id="exampleInputUsername1" placeholder="描述">
                                            </div>
                                            <div class="input-group mb-3">
                                                <label for="exampleInputUsername1">选择图片</label>
                                                <div class="input-group mb-1">
                                                    <input class="form-control" readonly="" v-model="news.picurl">
                                                    <div class="input-group-append">
                                                        <button @click="upImagePc" class="btn btn-secondary" type="button">单图上传</button>
                                                    </div>
                                                </div>
                                                <div style="display: inline-block;position: relative;">
                                                    <img :src="news.picurl" class="img-responsive img-thumbnail" width="150">
                                                    <em class="close" style="position: absolute;top: 3px;right: 8px;" onclick="removeImg(this)">×</em>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">跳转地址</label>
                                                <input type="text" v-model="news.url" class="form-control" id="exampleInputUsername1" placeholder="URL">
                                            </div>
                                            <textarea name="data" id="" cols="30" rows="10">@{{ news }}</textarea>
                                            <button type="submit" class="btn btn-gradient-primary mr-2">提交数据</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            @{{ news }}
                        </div>
                    </div>
                </div>




            </div>
        </form>
    </div>@endsection

@push('js')
    <script>
        require(['vue','hdjs','bootstrap'],function (Vue,hdjs) {
            new Vue({
                el:'#news-create',
                data:{
                    news:{
                        'title':'这是默认标题',
                        'discription':'',
                        'picurl':"{{asset('org/images/banner.jpg')}}",
                        'url':''
                    }
                },
                methods:{
                    upImagePc() {
                        hdjs.image((images) => {
                            //上传成功的图片，数组类型
                            this.news.picurl = images[0];
                        })
                    }
                }
            })
        })
    </script>
@endpush