<template>
    <layout>
        <page-header name="Link"></page-header>
        <div class="content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="box">
                        <div class="box-header">
                            <div class="input-group input-group-sm">
                                <input type="text" name="table_search" class="form-control pull-right" placeholder="search links">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default btn-flat" data-toggle="collapse" data-target="#options"><i class="fa fa-gear"></i></button>
                                    <button type="submit" class="btn btn-default btn-flat"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                            <div class="collapse" id="options">
                                <br>
                                <select2 name="source" :options="source.options" @select-changed="selectChanged"></select2>
                                <select2 name="status" :options="status.options" @select-changed="selectChanged"></select2>
                                <select2 name="limit" :options="limit.options" @select-changed="selectChanged"></select2>
                            </div>
                        </div>
                        <div class="box-body">
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <!--<th>id</th>-->
                                    <th>url</th>
                                    <th>source</th>
                                    <th>status</th>
                                </tr>
                                <tr v-for="link in links">
                                    <!--<td>{{link._id}}</td>-->
                                    <td><a :href="link.url" target="_blank">{{link.url | limitString}}</a></td>
                                    <td><span class="badge bg-gray">{{link.source}}</span></td>
                                    <td v-html="transformStatus(link.status)"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="box-footer clearfix">
                            &nbsp<small><b>{{total}} Found</b></small> / <b><small>Page {{page}} of {{totalPage}}</small></b>
                            <div class="pull-right">
                                <ul class="pagination pagination-sm no-margin pull-right">
                                    <li @click="prev"><span class="fa fa-arrow-left"></span></li>
                                    <li @click="next"><span class="fa fa-arrow-right"></span></li>
                                </ul>
                            </div>
                        </div>
                        <div v-if="loading" class="overlay">
                            <i class="fa fa-refresh fa-spin"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
    import PageHeader from '../../components/PageHeader';
    import Layout from '../layouts/Default';
    import LinkRepo from '../../repository/link_repo';
    import SourceRepo from '../../repository/source_repo';
    import Select2 from '../../components/form/Select';
    export default {
        data: () => ({
            links: [],
            loading: false,
            source: {
                selected: null,
                options: []
            },
            status: {
                selected: null,
                options: [
                    { value: 10, text: 'New' }
                ]
            },
            limit: {
                selected: 10,
                options: [
                    { value: 5, text: 5 },
                    { value: 10, text: 10 },
                    { value: 15, text: 15 },
                    { value: 20, text: 20 }
                ]
            },
            total: 0,
            page: 1,
            totalPage: 1
        }),
        components: {
            Layout,
            PageHeader,
            Select2
        },
        methods:{
            transformStatus: (status) => {
                switch (status) {
                    case 10: return '<span class="badge bg-blue">new</span>';
                    case 20: return '<span class="badge bg-yellow">running</span>';
                    case 30: return '<span class="badge bg-green">completed</span>';
                    case 35: return '<span class="badge bg-black">invalid</span>';
                    case 40: return '<span class="badge bg-red">failed</span>';
                }
            },
            async loadData(page = 1, limit = 10) {
                const { data } = await LinkRepo.getLinks(page, limit);
                const { content: { data: links, total, last_page: totalPage } } = data;
                this.links = links;
                this.total = total;
                this.totalPage = totalPage;
            },
            async reloadData() {
                await this.loadData(this.page, this.limit.selected);
            },
            selectChanged ({ name, value }){
                switch (name) {
                    case 'source': {
                        this.source.selected = value;
                        break;
                    }

                    case 'status': {
                        this.status.selected = value;
                        break;
                    }

                    case 'limit': {
                        this.limit.selected = value;
                        break;
                    }
                }
            },
            async next(){
                if (this.page !== this.totalPage){
                    this.page += 1;
                    await this.reloadData();
                }
            },
            async prev(){
                if (this.page > 1){
                    this.page += -1;
                    await this.reloadData();
                }
            }
        },
        filters: {
            limitString: (value) => value.substr(0, 30) + '...'
        },
        async mounted(){
            this.loading = true;
            await SourceRepo.getAllSource()
                .then(({ data }) => {
                    this.source.options = data.content.map(item => ({ value: item.alias, text: item.alias }));
                });
            await this.loadData(this.page, this.limit.selected);
            this.loading = false;
        }
    }
</script>
