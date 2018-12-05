<div class="card grid-margin stretch-card" id="rule">
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputName1">规则名称</label>
            <input type="text" v-model="rule.name" class="form-control" id="exampleInputName1">
        </div>
        <div class="form-group">
            <label>关键词</label>
            <div class="input-group col-xs-12 mt-3 mb-3" v-for="(v,k) in rule.keywords">
                <input type="text" v-model="v.key" class="form-control file-upload-info">
                <span class="input-group-append">
                       <button class="file-upload-browse btn btn-gradient-primary" type="button" @click="del(k)">删除</button>
                 </span>
            </div>
        </div>
        <div style="margin-left: 45%;">
            <a href="javascript:;" class="btn btn-primary text-center" @click="add()">添加关键词</a>
        </div>

        <textarea hidden name="rule" id="" cols="30" rows="10">@{{ rule }}</textarea>
    </div>
</div>



@push('js')
    <script>
        require(['vue','hdjs'],function (Vue,hdjs) {
            new Vue({
                el:'#rule',
                data:{
                    rule: {!! json_encode($ruleData) !!},
                },
                methods:{
                    add(){
                        this.rule.keywords.push({key:''});
                    },
                    del(k){
                        this.rule.keywords.splice(k,1);
                    }
                }
            })
        })
    </script>
    @endpush
