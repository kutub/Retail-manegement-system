<template>
    <section>
        <b-loading :is-full-page="isFullPage" v-model="isLoading" :can-cancel="true"></b-loading>
        <b-tabs position="is-centered" class="block">
            <b-tab-item label="History">
                <table class="table is-narrow is-fullwidth">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Date</th>
                        <th>Sub Total</th>
                        <th>Due</th>
                        <th class="has-text-right">Payment Total</th>
                        <th class="has-text-right">Action</th>
                    </tr>
                    </thead>
        
                    <tbody>
                        <tr v-for="item in items.purchase" :key="item.id">
                            <th>{{item.id}}</th>
                            <td>{{item.created_at | formatDate}}</td>
                            <td>{{item.total}}</td>
                            <td>{{item.due}}</td>
                            <td class="has-text-right">{{item.payments}}</td>
                            <td class="has-text-right">
                                <a :href="`/bn/home/sales/invoice?orderId=${item.id}&Print=only`" class="button is-light">Print</a>
                            </td>
                            
                        </tr>
                        
                    </tbody>
                </table>
            </b-tab-item>
            <b-tab-item label="Payments">
                <table class="table is-narrow is-fullwidth">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Date</th>
                        <th>Sub Total</th>
                        <th>Due</th>
                        <th class="has-text-right">Payment Total</th>
                        <th class="has-text-right">Action</th>
                    </tr>
                    </thead>
        
                    <tbody>
                        <tr v-for="item in items.purchase" :key="item.id">
                            <th>{{item.id}}</th>
                            <td>{{item.created_at | formatDate}}</td>
                            <td>{{item.total}}</td>
                            <td>{{item.due}}</td>
                            <td class="has-text-right">{{item.payments}}</td>
                            <td class="has-text-right">
                                <a :href="`/bn/home/sales/invoice?orderId=${item.id}&Print=only`" class="button is-light">Print</a>
                            </td>
                            
                        </tr>
                        
                    </tbody>
                </table>
            </b-tab-item>
            <b-tab-item label="Statement"></b-tab-item>
        </b-tabs>
    </section>
</template>
<script>
export default {
    name:'supplierHistory',
    data() {
        return {
            items:[],
            isLoading: false,
            isFullPage: true
        }
    },
    created() {
        const id = location.href.split('/')[6]
        const loadingComponent = this.$buefy.loading.open({
            container: this.isFullPage ? null : this.$refs.element.$el
        })
        axios({
            method: 'get',
            url:`api/supplier/${id}`,
            })
            .then((response) => {
                this.items = response.data.data;
                loadingComponent.close()
            })
            .catch((error) => {
                loadingComponent.close()
            })
    },
}
</script>

<style>
.observer{
    height: 1px;
}
</style>