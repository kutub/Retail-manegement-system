<template>
    <div>
        <div class="columns">
            <!-- Main container -->
            <div class="column m-t-15">
                <b-tabs type="is-boxed">
                    <b-tab-item>
                        <template #header>
                            <router-link :to="{name: 'create-order'}"><i class="fa fa-cart-arrow-down" aria-hidden="true" style="margin-right:5px"></i>  Start Sales Register</router-link>
                        </template>
                    </b-tab-item>
                    <b-tab-item>
                        <template #header>
                            <router-link :to="{name: 'index'}"><i class="fa fa-bar-chart" aria-hidden="true" style="margin-right:5px"></i> Sales Report</router-link> 
                        </template>
                    </b-tab-item>
                    <b-tab-item>
                        <template #header>
                            <router-link :to="{name: 'return-product'}"><i class="fa fa-reply-all" aria-hidden="true" style="margin-right:5px"></i> Sales Return</router-link> 
                        </template>
                    </b-tab-item>
                </b-tabs>
            </div>
           
        </div>
        <div class="columns">
            <div class="column">
                <router-view></router-view>
            </div>
        </div>          
        
    </div>
</template>

<script>
    import VueRouter from 'vue-router';    
    import index from './Index.vue';
    import CreateOrder from './CreateOrder.vue';
    import ReturnProduct from './ReturnProduct.vue';
    import PrintInvoice from './PrintInvoice.vue';

    export default {
       
        router: new VueRouter({
            mode: 'history',
            base: 'bn/home/sales',
            routes: [
                {
                    path: '/view',
                    name: 'index',
                    component: index
                },
                {
                    path: '/create',
                    name: 'create-order',
                    component: CreateOrder
                },
                {
                    path: '/return',
                    name: 'return-product',
                    component: ReturnProduct
                },
                {
                    path: '/invoice',
                    name: 'print-invoice',
                    component: PrintInvoice
                },
                {
                    path: '/',
                    redirect: {name: 'create-order'}
                },
                {
                    path: '*', 
                    redirect: '/'
                }
            ]
        }),
                
    }
</script>

<style>
    .b-tabs .tab-content{
        padding: 0;
    }
    .tabs ul{
        background-color: #ededed;
        margin-right: 25px;
    }
    .tabs.is-boxed li.is-active a{
        border: none;
    }
    .container{
        max-width: 100%;
    }
    .tabs.is-boxed li.is-active{
        border-bottom: 3px solid #00d1b2;
    }
    .tabs li.is-active a{
        color: #00d1b2;
    }
</style>