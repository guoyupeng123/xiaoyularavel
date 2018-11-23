{{--评论模块--}}
<div class="card-body" id="cardbody">
    <div class="mb-3">
        <div class="row">
            <div class="col">
                <a href="#!" class="btn btn-sm btn-white">😍 4</a>
                <a href="#!" class="btn btn-sm btn-white">👍 3</a>
                <a href="#!" class="btn btn-sm btn-white">Add Reaction</a>
            </div>
            <div class="col-auto">
                <a href="#!" class="btn btn-sm btn-white">Share</a>
            </div>
        </div>
    </div>
    <!-- Divider -->
    <hr>
    <!-- Comments -->
    <div class="comment mb-3">
        <div class="row">
            <div class="col-auto">
                <!-- Avatar -->
                @auth()
                    <div class="avatar">
                        <img src="{{auth()->user()->icon}}" alt="..." class="avatar-img rounded-circle">
                    </div>
                @endauth
            </div>
            <div class="col ml--2">
                <!-- Body -->
                <div class="comment-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="comment-title">Ryu Duke</h5>
                        </div>
                        <div class="col-auto">
                            <time class="comment-time">11:12</time>
                        </div>
                    </div>
                    <!-- Text -->
                    <p class="comment-text">
                        I'm onboard for sure. Sign me up to prototype anytime.
                    </p>
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
                <div id="editormd">
                    <textarea style="display:none;"></textarea>
                </div>
            </form>
                @else
                {{--<div class="" style=" ">--}}
                    <a href="" class="w-100 bg-info text-center pt-3 pb-3 label text-white" style="display: block;border-radius:10px">请登陆</a>
                {{--</div>--}}
            @endauth
        </div>
    </div> <!-- / .row -->
</div>


@push('js')
    <script>
        require(['hdjs','vue'],function(hdjs,Vue){
            new Vue({
                el: '#cardbody',
                data: {},
                methods:{

                },
                mounted(){
                    hdjs.editormd("editormd", {
                        width: '100%',
                        height: 300,
                        toolbarIcons : function() {
                            return [
                                "undo","|",
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
                }


            })
        })
    </script>
    @endpush