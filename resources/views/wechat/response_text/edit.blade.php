@extends('admin.layouts.master')
@section('content')

        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('wechat.response_text.index')}}" class="card-title d-inline-block text-primary">返回</a>
                            {{--<p class="card-description">--}}


                                {{--Basic form elements--}}
                            {{--</p>--}}
                            <form class="forms-sample" method="post" action="{{route('wechat.response_text.update',$responseText)}}">
                                                        @csrf @method('PUT')

                                {!! $ruleView !!}

                                <div class="card" id="keyword">
                                    <div class="card-body">
                                        <div class="card grid-margin stretch-card">
                                            <div class="card-body">
                                                <div class="form-group" v-for="(v,k) in contents" id="keyword">
                                                    <p class="d-sm-inline-block">回复内容</p>
                                                    <p class="d-sm-inline-block bg-dark p-2 ml-3 text-white float-right" @click="del(k)">删除</p>
                                                    <a href="javascript:;" class="d-sm-inline-block p-2 ml-3" style="color: #FD971F;font-size: 1.4em">😊</a>
                                                    <textarea class="form-control" v-model="v.content"></textarea>
                                                </div>
                                                <textarea hidden name="data" cols="30" rows="10">@{{ contents }}</textarea>
                                                <div style="margin-left: 45%;">
                                                    <a href="javascript:;" class="btn btn-dark text-center" @click="add()">添加回复内容</a>
                                                </div>
                                                {{--@{{contents}}--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-gradient-primary mr-2">提交数据</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('js')
    <script>
        require(['vue'],function (Vue) {
            new Vue({
                el:'#keyword',
                data:{
                    contents:{!! $responseText['content'] !!}
                },
                mounted(){
                    this.emotion();
                },
                update(){
                    this.emotion();
                },
                methods:{
                    emotion(){
                        var _this = this;
                        $('#keyword textarea').each(function () {
                            hdjs.emotion({
                                //点击的元素，可以为任何元素触发
                                btn: $(this).prev('a'),
                                //选中图标后填入的文本框
                                input: $(this),
                                //选择图标后执行的回调函数
                                callback: function (con, btn, input) {
                                    //sconsole.log('选择表情后的执行的回调函数');
                                    //获得 textarea 序号
                                    let index = $(input).index('#keyword-textarea textarea');
                                    //console.log(index);
                                    //这里注意 this 指向问题
                                    // _this.contents[index].content = con;
                                    //将 textarea 数据放置到 vue 中
                                    //_this 在当前方法最前面定义
                                    _this.contents[index].content = input.val();
                                }
                            });
                        })
                    },
                    add(){
                        this.contents.push({content:''});
                    },
                    del(k){
                        this.contents.splice(k,1);
                    }
                }
            })
        })
    </script>
@endpush