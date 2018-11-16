<template>
    <layout>
        <page-header name="Home"></page-header>
        <div class="content">
            <div class="row">
                <info-box name="Source Registered" :value="source.all" color="yellow" :progress="calculateProgress(source.all, source.active)" icon="newspaper-o">
                    {{source.active}} / {{source.all}} active
                </info-box>
                <info-box name="Link Stored" :value="link.all" color="yellow" :progress="calculateProgress(link.all, link.done)" icon="link">
                    {{link.done}} / {{link.all}} crawled
                </info-box>
                <info-box name="Raw Stored" :value="raw.all" color="yellow" :progress="calculateProgress(raw.all, raw.done)" icon="database">
                    {{raw.done}} / {{raw.all}} processed
                </info-box>
                <info-box name="Corpus" :value="corpus.all" color="yellow" :progress="corpus.all" icon="book">
                    {{corpus.all}} available
                </info-box>
            </div>
            <div class="row">
                <div class="col-md-6"><chart/></div>
                <!--<div class="col-md-6"><calendar/></div>-->
            </div>
        </div>
    </layout>
</template>
<script>
    import PageHeader from '../../components/PageHeader';
    import InfoBox from '../../components/InfoBox';
    import Layout from '../layouts/Default';
    import HomeRepo from '../../repository/home_repo';
    import Chart from '../../components/Chart';
    import Listener from '../../utils/listener';
    export default {
        data:() => ({
            source: {
                all: 0,
                active: 0
            },
            link: {
                all: 0,
                done: 0
            },
            raw: {
                all: 0,
                done: 0
            },
            corpus: {
                all: 0
            }
        }),
        components:{
            PageHeader,
            InfoBox,
            Layout,
            Chart
        },
        methods:{
            calculateProgress: (a, b) => (100 / parseFloat(a)) * parseFloat(b),
            linkChanged({ all, done }) {
                if (all) this.link.all += all;
                if (done) this.link.done += done;
            },
            rawChanged({ all, done }) {
                if (all) this.raw.all += all;
                if (done) this.raw.done += done;
            }
        },
        mounted(){
            HomeRepo.getSummary()
                .then(({ data: { content: { source, link, raw, corpus } } }) => {
                    this.source = source;
                    this.link = link;
                    this.raw = raw;
                    this.corpus = corpus;
                })
                .then(() => {
                    const listener = new Listener('home');
                    listener.bind('link-changed', this.linkChanged);
                    listener.bind('raw-changed', this.rawChanged);
                })
        }
    }
</script>
