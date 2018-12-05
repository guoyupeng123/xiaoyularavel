@extends('admin.layouts.master')
@section('content')

    <div class="content-wrapper" id="add">
        <div class="row">
            <div class="col-3">
                <div class="buttonhh mt--3">
                    <div class="mobile">
                        <div class="mobile-container">
                            <dl v-for="(v,k) in menus.button">
                                {{--一级菜单--}}
                                <dt @click.stop="editCurrentMenu(v)"><i class="mdi mdi-close-circle mr-1" @click.stop="delTopMenu(k)"></i>@{{ v.name }}</dt>
                                {{--一级菜单--}}

                                {{--二级菜单--}}
                                <dd v-for="(m,n) in v.sub_button" @click.stop="editCurrentMenu(m)"><i class="mdi mdi-close-circle mr-1" style="color: #FF7F27" @click.stop="delSubMenu(v,n)"></i>@{{ m.name }}</dd>
                                {{--二级菜单--}}
                                <dd @click="addSubMenu(v)" v-if="v.sub_button.length<5">
                                    <i class="mdi mdi-plus text-primary"></i>
                                </dd>
                            </dl>
                            <dl class="icodt" v-if="menus.button.length < 3">
                                <dt @click="addTopMenu"><i class="mdi mdi-plus text-primary"></i></dt>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">微信栏目添加</h4>
                        <p class="card-description">column add</p>
                        <form class="forms-sample" method="post" action="{{route('wechat.button.update',$button)}}">
                            @csrf @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputUsername1">
                                    栏目标题
                                </label>
                                <input type="text" name="title" value="{{$button['title']}}" class="form-control" id="exampleInputUsername1">
                            </div>
                            <div class="text-primary" id="fengexian" style="font-size: 2em;">
                                -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">
                                    菜单名称
                                </label>
                                <input type="text" v-model="currentMenu.name" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">属性</label>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" v-model="currentMenu.type" value="view" id="membershipRadios1" value="" checked="">
                                                链接
                                                <i class="input-helper"></i></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" v-model="currentMenu.type" value="click" id="membershipRadios2" value="option2">
                                                关键词
                                                <i class="input-helper"></i></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" v-if="currentMenu.type == 'view'">
                                <label for="exampleInputUsername1">
                                    链接
                                </label>
                                <input type="text" v-model="currentMenu.url" class="form-control" id="exampleInputUsername1">
                            </div>
                            <div class="form-group" v-if="currentMenu.type == 'click'">
                                <label for="exampleInputUsername1">
                                    关键词
                                </label>
                                <input type="text" v-model="currentMenu.key" class="form-control" id="exampleInputUsername1">
                            </div>
                            <div class="form-group" v-if="currentMenu.type != 'click' && currentMenu.type != 'view'">
                                <label for="exampleInputUsername1">
                                    请选择上方属性
                                </label>
                                <input type="text" class="form-control" disabled="disabled"  id="exampleInputUsername1" placeholder="当前无数据">
                            </div>
                            <button type="submit" class="btn btn-gradient-primary mr-2">保存</button>
                            <textarea name="data" hidden id="" cols="30" rows="10">@{{ menus }}</textarea>
                            {{--@{{  currentMenu }}<br>--}}
                            {{--@{{  menus }}--}}
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </div>




@endsection




@push('js')
    <script>
        require(['hdjs', 'vue'], function (hdjs, Vue) {
            new Vue({
                el: '#add',
                data: {
                    //当前编辑的菜单
                    currentMenu:{},
                    //全部菜单数据
                    menus:  {!! $button['data'] !!}
                },
                methods: {
                    // 增加一级栏目
                    addTopMenu(){
                        if (this.menus.button.length<3){
                            // 给一个默认值
                            var html = {type:'click',name:'neme',key:'',sub_button:[]};
                            this.menus.button.push(html);
                            this.currentMenu = html;
                        }
                    },
                    // 删除一级栏目
                    delTopMenu(k){
                        this.menus.button.splice(k,1);
                    },
                    //添加二级菜单
                    addSubMenu(v){
                        if (v.sub_button.length < 5){
                            var html = {type:'click',name:'name',key:''};
                            v.sub_button.push(html);
                            this.currentMenu = html;
                        }
                    },
                    // 删除二级菜单
                    delSubMenu(v,n){
                        v.sub_button.splice(n,1);
                    },
                    // 编辑
                    editCurrentMenu(v){
                        this.currentMenu = v;
                    }


                }

            })
        })
    </script>
@endpush
