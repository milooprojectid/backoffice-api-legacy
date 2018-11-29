<template>
    <layout>
        <page-header name="Sources"></page-header>
        <div class="content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="box">
                        <div class="box-header">
                            <div class="input-group input-group-sm">
                                <input type="text" name="table_search" class="form-control pull-right" placeholder="search sources" v-model="search" @keyup.enter="reloadData">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default btn-flat" data-toggle="collapse" data-target="#options" ref="btnopt"><i class="fa fa-gear"></i></button>
                                    <button type="submit" class="btn btn-default btn-flat" @click="reloadData"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                            <div class="collapse" id="options">
                                <br>
                                <select2 name="status" :options="status.options" @select-changed="selectChanged"></select2>
                                <select2 name="limit" :options="limit.options" @select-changed="selectChanged"></select2>
                            </div>
                        </div>
                        <div class="box-body">
                            <table class="table table-striped">
                                <tbody v-if="total !== 0">
                                <tr>
                                    <th>name</th>
                                    <th>alias</th>
                                    <th>url</th>
                                    <th>status</th>
                                </tr>
                                <tr v-for="source in sources">
                                    <td>{{source.name}}</td>
                                    <td>{{source.alias}}</td>
                                    <td><a :href="source.url" target="_blank">{{source.url}}</a></td>
                                    <td v-html="transformStatus(source.status)" @click="changeStatus(source)"></td>
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
    import SourceRepo from '../../repository/source_repo';
    import Select2 from '../../components/form/Select';
    import PaginateMix from '../../utils/mixins/pagination';
    const statuses = {
        0: 'inactive',
        1: 'active'
    };
    export default {
        mixins: [PaginateMix],
        data: () => ({
            sources: [],
            status: {
                selected: null,
                options: [
                    { value: 0, text: 'Inactive' },
                    { value: 1, text: 'Active' }
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
                    case 0: return '<span class="badge bg-red"><i class="fa fa-times"></i></span>';
                    case 1: return '<span class="badge bg-green"><i class="fa fa-check"></i></span>';
                }
            },
            async loadData(page = 1, limit = 10, params = {}) {
                const { data } = await SourceRepo.getSources(page, limit, params);
                const { content: { data: sources, total, last_page: totalPage } } = data;
                this.sources = sources;
                this.total = total;
                this.totalPage = totalPage;
                if (total === 0) this.page = 1;
            },
            async reloadData() {
                this.switchLoading();
                await this.loadData(this.page, this.limit.selected, { search: this.search, status: this.status.selected });
                this.switchLoading();
            },
            selectChanged ({ name, value }){
                switch (name) {
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
            changeStatus (source){
                SourceRepo.changeStatus(source._id)
                    .then(() => {
                        const index = this.sources.indexOf(source);
                        const old = this.sources[index].status;
                        this.sources[index].status = old === 1 ? 0 : 1;
                    });
            }
        },
        filters: {
            statusString: (status) => statuses[status]
        },
        async mounted(){
            this.switchLoading();
            await this.loadData(this.page, this.limit.selected);
            this.switchLoading()
        }
    }
</script>
