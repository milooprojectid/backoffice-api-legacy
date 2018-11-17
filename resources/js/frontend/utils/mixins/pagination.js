export default {
    data: () => ({
        limit: {
            selected: 10,
                options: [
                { value: 5, text: 5 },
                { value: 10, text: 10 },
                { value: 15, text: 15 },
                { value: 20, text: 20 }
            ]
        },
        search: null,
        total: 0,
        page: 1,
        totalPage: 1,
        loading: false
    }),
    methods: {
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
        },
        switchLoading(){
            this.loading = !this.loading;
        }
    }
}
