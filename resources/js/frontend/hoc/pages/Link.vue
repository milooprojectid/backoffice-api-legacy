<template>
    <layout>
        <page-header name="Links"></page-header>
        <div class="content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="box">
                        <div class="box-header">
                            <div class="input-group input-group-sm">
                                <input type="text" name="table_search" class="form-control pull-right" placeholder="search links" v-model="search" @keyup.enter="reloadData">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default btn-flat" data-toggle="collapse" data-target="#options" ref="btnopt"><i class="fa fa-gear"></i></button>
                                    <button type="submit" class="btn btn-default btn-flat" @click="reloadData"><i class="fa fa-search"></i></button>
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
                                <tbody v-if="total !== 0">
                                <tr>
                                    <th>url</th>
                                    <th>source</th>
                                    <th>status</th>
                                </tr>
                                <tr v-for="link in links">
                                    <td><a :href="link.url" target="_blank">{{link.url | limitString}}</a></td>
                                    <td><span class="badge bg-gray">{{link.source}}</span></td>
                                    <td v-html="transformStatus(link.status)"></td>
                                </tr>
                                </tbody>
                                <div v-else class="text-center">
                                    <b>No Data Found.</b>
                                </div>
                            </table>
                        </div>
                        <div class="box-footer clearfix">
                            &nbsp;
                            <span class="label label-default"><small>{{total}} Found</small></span>
                            <span class="label label-default"><small>Page {{page}} of {{totalPage}}</small></span>
                            <span v-if="source.selected" class="label label-default"><small>{{source.selected}}</small></span>
                            <span v-if="status.selected" class="label label-default"><small>{{status.selected | statusString}}</small></span>
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button :class="{ disabled: page === 1 }" class="btn btn-sm btn-default btn-flat" @click="prev"><i class="fa fa-arrow-left"></i></button>
                                    <button :class="{ disabled: page === totalPage }" class="btn btn-sm btn-default btn-flat" @click="next"><i class="fa fa-arrow-right"></i></button>
                                </div>
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
    import PaginateMix from '../../utils/mixins/pagination';
    const statuses = {
        10: 'new',
        20: 'running',
        30: 'completed',
        35: 'invalid',
        40: 'failed'
    };
    export default {
        mixins: [PaginateMix],
        data: () => ({
            links: [],
            source: {
                selected: null,
                options: []
            },
            status: {
                selected: null,
                options: [
                    { value: 10, text: 'New' },
                    { value: 20, text: 'Running' },
                    { value: 30, text: 'Completed' },
                    { value: 35, text: 'Invalid' },
                    { value: 40, text: 'Failed' }
                ]
            }
        }),
        components: {
            Layout,
            PageHeader,
            Select2
        },
        methods:{
            transformStatus: (status) => {
                switch (status) {
                    case 10: return '<span class="badge bg-blue-gradient">new</span>';
                    case 20: return '<span class="badge bg-yellow-gradient">running</span>';
                    case 30: return '<span class="badge bg-green-gradient">completed</span>';
                    case 35: return '<span class="badge bg-black-gradient">invalid</span>';
                    case 40: return '<span class="badge bg-red-gradient">failed</span>';
                }
            },
            async loadData(page = 1, limit = 10, params = {}) {
                const { data } = await LinkRepo.getLinks(page, limit, params);
                const { content: { data: links, total, last_page: totalPage } } = data;
                this.links = links;
                this.total = total;
                this.totalPage = totalPage;
                if (total === 0) this.page = 1;
            },
            async reloadData() {
                this.switchLoading();
                await this.loadData(this.page, this.limit.selected, { search: this.search, status: this.status.selected, source: this.source.selected });
                this.switchLoading();
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
            }
        },
        filters: {
            limitString: (value) => value.substr(0, 30) + (value.length > 30 ? '...' : ''),
            statusString: (status) => statuses[status]
        },
        async mounted(){
            this.switchLoading();
            await SourceRepo.getAllSources()
                .then(({ data }) => {
                    this.source.options = data.content.map(item => ({ value: item.alias, text: item.alias }));
                });
            await this.loadData(this.page, this.limit.selected);
            this.switchLoading();
        }
    }
</script>
