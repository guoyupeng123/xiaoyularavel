{{--评论模块--}}
<div class="card-body" id="cardbody">
    <div class="mb-3">
        <div class="row">
            <div class="col">
            </div>
            <div class="col-auto mr--3">

                <div class="avatar-group d-none d-sm-flex">
                    @foreach($article->zan as $zan)
                    <a href="{{route('member.user.show',$zan->user)}}" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Ab Hadley">
                        <img src="{{$zan->user->icon}}" alt="..." class="avatar-img rounded-circle border border-white">
                    </a>
                    @endforeach

                </div>

            </div>
            <div class="col-auto" id="dianzan">
                @auth()
                    {{--这里判断当前文章的点赞数据里面是否有当前登陆用户，如果有则显示取消点赞，如果没有则显示点赞--}}
                    @if($article->zan->where('user_id',auth()->id())->first())
                        <a href="{{route('home.zan.make',['type'=>'article','id'=>$article['id'],'url'=>url()->full()])}}" class="btn btn-sm btn-white">取消点赞</a>
                    @else
                        <a href="{{route('home.zan.make',['type'=>'article','id'=>$article['id'],'url'=>url()->full()])}}" class="btn btn-sm btn-white">👍 点赞</a>
                    @endif
                @else
                    {{--这句话代表如果如果用户没有登录的话，则跳转到登录页面，登陆成功后，返回原页面--}}
                    <a href="{{route('login',['url'=>url()->full()])}}" class="btn btn-sm btn-white">👍 点赞</a>
                @endauth

            </div>
        </div> <!-- / .row -->
    </div>
    <!-- Divider -->
    <hr>

    <!-- Comments -->
    <div class="comments mb-3" v-for="v in comments" :id="'comment'+v.id">
        <div class="row">

            <div class="col-auto">
                <!-- Avatar -->
                <div class="avatar">
                    <img :src="v.user.icon" alt="..." class="avatar-img rounded-circle">
                </div>
            </div>
            <div class="col ml--2">
                <!-- Body -->
                <div class="comment-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="comment-title">@{{v.user.name}}</h5>
                        </div>
                        <div class="col-auto">
                            <time class="comment-time">@{{v.created_at}}</time>
                        </div>
                        <div class="col-0" @click="zan(v)" style="cursor: nw-resize !important;">
                            <time class="comment-time">👍 | @{{ v.zan_num }}</time>
                        </div>
                    </div>

                    <!-- Text -->
                    <p class="comment-text pimg" v-html="v.content"></p>

                </div>
            </div>

        </div> <!-- / .row -->
    </div>
    <!-- Divider -->

    <hr>
    <!-- Form -->
    <div class="row align-items-start">
        <div class="col-auto">
            @auth()
                <div class="avatar">
                    <img src="{{auth()->user()->icon}}" alt="..." class="avatar-img rounded-circle">
                </div>
            @endauth
        </div>
        <div class="col ml--2">
            <!-- Input -->
            @auth()
                <form>
                    <div id="editormd"><textarea style="display:none;"></textarea></div>
                    <button class="btn btn-primary" @click.prevent="send()">发表评论</button>
                </form>
            @else
                {{--<div class="" style=" ">--}}
                <a href="{{route('login',['url'=>url()->full()])}}"
                   class="w-100 bg-info text-center pt-3 pb-3 label text-white"
                   style="display: block;border-radius:10px">请登陆</a>
                {{--</div>--}}
            @endauth
        </div>
    </div> <!-- / .row -->
</div>

@push('css')
    <style>
        .pimg p img {
            max-width: 100% !important;
        }
    </style>
@endpush
@push('js')
    <script>
        require(['hdjs', 'vue', 'axios', 'MarkdownIt', 'marked', 'highlight'], function (hdjs, Vue, axios, MarkdownIt, marked) {
            var vm = new Vue({
                el: '#cardbody',
                data: {
                    comment: {content: ''},//当前评论
                    comments: [],//全部评论
                },
                updated(){
                    hdjs.scrollTo('body',location.hash,1000, {queue:true});
                },
                methods: {
                    @auth()
                    send() {
                        axios.post('{{route('home.comment.store')}}', {
                            content: this.comment.content,
                            article_id: '{{$article['id']}}',
                        }).then((response) => {//遇到问题，this的指向有问题
                            // console.log(111);
                            // console.log(response.data.comment);
                            this.comments.push(response.data.comment);

                            //将 markdown 转为 html
                            let md = new MarkdownIt();
                            response.data.comment.content = md.render(response.data.comment.content);
                            $(document).ready(function () {
                                $('pre code').each(function (i, block) {
                                    hljs.highlightBlock(block);
                                });
                            });

                        });
                        //清空 vue 数据
                        this.comment.content = '';
                        //清空编辑器内容
                        //选中所有内容
                        editormd.setSelection({line: 0, ch: 0}, {line: 9999999, ch: 9999999});
                        //将选中文本替换成空字符串
                        editormd.replaceSelection("");
                    },
                    //点赞
                    zan(v){
                        let url = '/home/zan/make?type=comment&id='+v.id;
                        axios.get(url).then((response)=>{
                            //console.log(response.data.num);
                            v.zan_num = response.data.zan_num;
                            //console.log(v);
                        })
                    }
                    @endauth
                },
                mounted() {
                    @auth()
                    hdjs.editormd("editormd", {
                        width: '100%',
                        height: 300,
                        toolbarIcons: function () {
                            return [
                                "undo", "|",
                                "bold", "del", "italic", "quote", "|",
                                "list-ul", "list-ol", "hr", "|",
                                "link", "hdimage", "code-block", "|",
                                "watch", "preview", "fullscreen"
                            ]
                        },
                        //后台上传地址，默认为 hdjs配置项window.hdjs.uploader
                        server: '',
                        //editor.md库位置
                        path: "{{asset('org/hdjs')}}/package/editor.md/lib/",
                        //监听编辑器变化
                        onchange: function () {
                            //给 vu 对象中 comment 属性中 content 设置值
                            vm.$set(vm.comment, 'content', this.getValue());
                        }
                    });
                    @endauth
                    axios.get('{{route('home.comment.index',['article_id'=>$article['id']])}}')
                        .then((response) => {
                            // console.log(response);
                            this.comments = response.data.comments;
                            let md = new MarkdownIt();
                            //console.log(this.comments);
                            //这一部分都是将返回的数据，逐个进行代码高亮
                            this.comments.forEach((v, k) => {
                                v.content = md.render(v.content)
                            });

                            $(document).ready(function () {
                                $('pre code').each(function (i, block) {
                                    hljs.highlightBlock(block);
                                });
                            });
                        });
                },
            });
        })
    </script>
@endpush