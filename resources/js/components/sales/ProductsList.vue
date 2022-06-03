<template>
    <section class="container product-container is-fullhd">
        <div class="columns">
            <div class="column" >
                 <!-- <b-field>
                    <p class="control">
                        <b-dropdown>
                            <button class="button" slot="trigger">
                                <span>Filters</span>
                                <b-icon icon="menu-down"></b-icon>
                            </button>

                            <b-dropdown-item value="open_issues">Open Issues and Pull Requests</b-dropdown-item>
                            <b-dropdown-item value="your_issues">Your Issues</b-dropdown-item>
                            <b-dropdown-item value="pull_requests">Your Pull Requests</b-dropdown-item>
                            <b-dropdown-item value="everything">Everything</b-dropdown-item>
                        </b-dropdown>
                    </p>
                    <b-input icon="magnify" type="search" placeholder="Search..."></b-input>
                </b-field> -->
                <div class="field has-addons expanded">
                    <p class="control is-expanded">
                        <b-field >
                            <b-autocomplete 
                                :data="data"
                                placeholder="Enter name or Barcode"
                                field="title"
                                :loading="isFetching"
                                @typing="getAsyncData"
                                @select="option => selected = option" expanded>

                                <template slot-scope="props">
                                    <div class="media" @click="$emit('add',  props.option)">
                                        <div class="media-left">
                                            <img width="32" :src="'/storage/images/products/'+props.option.image.image">
                                        </div>
                                        <div class="media-content">
                                            {{ props.option.name }}
                                            <br>
                                            <small>{{ props.option.generic }}</small>
                                             <br>
                                            <small>
                                                Price: {{ props.option.price.sell_price }},
                                                Stock: <b>{{ props.option.quantity.quantity }}</b>
                                            </small>
                                        </div>
                                    </div>
                                </template>
                                <template slot="footer">
                                    <a >
                                        <span @click="isComponentModalActive = true"> Add new... </span>
                                    </a> 
                                </template>
                                <template slot="empty">No results for {{query}}</template>
                            </b-autocomplete>
                        </b-field>
                    </p>
                    
                </div>
            </div>
        </div>
        <div class="columns is-multiline" style="padding:0 10px">
            <div class="column is-3" style="padding:.20rem" v-for="(item, index) in products" :key="index"> 
                <div class="card product" @click="$emit('add', item)">
                    <div class="card-image">
                        <figure class="image is-4by3">
                        <img v-if="item.image" :src="'/storage/images/products/'+item.image.image" alt="Placeholder image">
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="content">
                           <small>{{item.name}}</small>
                           <small>{{item.generic}}</small>
                           <small>Price: <strong v-if="item.price">{{item.price.sell_price}}</strong></small>
                           <small>Stock: <strong v-if="item.quantity">{{item.quantity.quantity}}</strong></small>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="column" v-if="isFetching" style="display:flex;justify-content:center; align-items:center">
            <img width="250"  :src="'/images/loading.gif'">
        </div>
        <!-- <observer @intersect="intersected"></observer> -->
    </section>
</template>

<script>
    import debounce from 'lodash/debounce';
    import Observer from '../Observer';
    export default {
        name:'productsList',
        props:['products'],
        components:{
           Observer
        },
        data() {
            return {
                isFetching: false,
                query:'',
                data: [],
                page: 1
            }
        },
        methods: {
            // You have to install and import debounce to use it,
            // it's not mandatory though.
            getAsyncData: debounce(function (name) {
                if (!name.length) {
                    this.query = name;
                    this.data = []
                    return
                }
                this.isFetching = true
                axios.get(`/api/find-item/${name}`)
                    .then(({ data }) => {
                        this.data = []
                        data.data.forEach((item) => this.data.push(item))
                    })
                    .catch((error) => {
                        this.data = []
                        throw error
                    })
                    .finally(() => {
                        this.isFetching = false
                    })
            }, 300),
            intersected(){
                this.page++;
                const loadingComponent = this.$buefy.loading.open({
                    container: this.isFullPage ? null : this.$refs.element.$el
                 })
                axios.get(`//medis.com/api/items?page=${this.page}`)
                    .then(res => {
                        res.data.data.forEach((item) => this.products.push(item))
                    })
                    .catch(err => {
                        alert(err.message)
                    })
                    .finally(() => loadingComponent.close())
            }
        }
    }
</script>


<style>
    .product-container{
        box-shadow: 0 0.5em 1em -0.125em rgba(10, 10, 10, 0.1), 0 0px 0 1px rgba(10, 10, 10, 0.02);
        padding: 15px;
    }
    .product{
        border: 1px solid #e8e8e8;
        border-radius: 10px;
    }
    .product:hover{
        cursor: pointer;
        background-color: darkgrey;
    }
    .product .card-content{
        padding: 0.8rem;
    }
   
</style>