<template>
    <div>
        <div class="columns">
            <!-- Main container -->
            <div class="column m-t-15">
                <b-tabs type="is-boxed">
                    <b-tab-item>
                        <template #header>
                            <router-link :to="{name: 'index'}"><i class="fa fa-home" aria-hidden="true" style="margin-right:5px"></i>Products List</router-link>
                        </template>
                    </b-tab-item>
                    <b-tab-item>
                        <template #header>
                            <router-link :to="{name: 'create'}"><i class="fa fa-plus" aria-hidden="true" style="margin-right:5px"></i> Create Products</router-link> 
                        </template>
                    </b-tab-item>
                    <b-tab-item>
                        <template #header>
                            <router-link :to="{name: 'add-product'}"><i class="fa fa-reply-all" aria-hidden="true" style="margin-right:5px"></i> Add Products</router-link> 
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
    import index from './Index';
    import CreateItem from './createItemForm';
    import editItem from './editItemForm.vue';
    import addProduct from '../buy/ReceiveProduct.vue';

    export default {
       
        router: new VueRouter({
            mode: 'history',
            base: 'bn/home/product',
            routes: [
                {
                    path: '/view',
                    name: 'index',
                    component: index
                },
                {
                    path: '/create',
                    name: 'create',
                    component: CreateItem
                },
                {
                    path: '/edit',
                    name: 'edit-product',
                    component: editItem
                },
                {
                    path: '/add',
                    name: 'add-product',
                    component: addProduct
                },
                {
                    path: '/',
                    redirect: {name: 'index'}
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