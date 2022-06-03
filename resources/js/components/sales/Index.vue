<template>
    <div class="container">
        <b-loading :is-full-page="isFullPage" v-model="isLoading" :can-cancel="true"></b-loading>
        <div class="box">
            <article class="media">
                <div class="media-content">
                    <div class="content">
                        <nav class="level is-mobile">
                            <div class="level-item has-text-centered">
                                <div>
                                    <p class="heading">Total Sales</p>
                                    <p class="title">{{salesTotal}}&#2547;</p>
                                </div>
                            </div>
                            <div class="level-item has-text-centered">
                                <div>
                                    <p class="heading">Cash Received</p>
                                    <p class="title">{{paymentTotal}}&#2547;</p>
                                </div>
                            </div>
                            <div class="level-item has-text-centered">
                                <div>
                                    <p class="heading">Total Due</p>
                                    <p class="title">{{dueTotal}}&#2547;</p>
                                </div>
                            </div>
                            <div class="level-item has-text-centered">
                                <div>
                                    <p class="heading">Cash Balance</p>
                                    <p class="title">{{Number(salesTotal - dueTotal).toFixed(2)}}&#2547;</p>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </article>
        </div>
        <div class="box">
            <article class="media">
                <div class="media-content">
                    <div class="content">
                        <section class="columns">
                            <div class="column is-5">
                                <div class="buttons has-addons">
                                    <button class="button" v-bind:class="{ 'is-success is-selected': isActive == 'today'}" @click="getFilterData('today')">Today</button>
                                    <button class="button" v-bind:class="{ 'is-success is-selected': isActive == 'lastDay'}" @click="getFilterData('lastDay')">Last Day</button>
                                    <button class="button" v-bind:class="{ 'is-success is-selected': isActive == 'lastWeek'}" @click="getFilterData('lastWeek')">Last Week</button>
                                    <button class="button" v-bind:class="{ 'is-success is-selected': isActive == 'lastMonth'}" @click="getFilterData('lastMonth')">Last Month</button>
                                </div>
                            </div>
                            <div class="column is-3">
                                 <b-field >
                                    <b-datepicker
                                        placeholder="Select Date"
                                        v-model="dates"
                                        range>
                                    </b-datepicker>
                                    <b-button
                                        @click="getFilterData(dates)"
                                        label="Go"
                                        type="is-primary" />
                                </b-field>
                            </div>
                            <div class="column is-4">
                                <div class="field has-addons ">
                                    <div class="control is-expanded">
                                        <input class="input" v-model="searchValue" type="text" placeholder="Find a repository">
                                    </div>
                                    <div class="control">
                                        <a class="button is-info" @click="onOrderSearch(searchValue)">
                                        Search
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <section class="columns">
                        <div class="column">
                            <b-table
                                    :data="data"
                                    ref="table"
                                    detailed
                                    hoverable
                                    custom-detail-row
                                    :default-sort="['id', 'asc']"
                                    detail-key="id"
                                    @details-open="(row, index) => {
                                            $buefy.toast.open(`Expanded ${row.id}`)
                                    }"
                                    :show-detail-icon="showDetailIcon">

                                    <template slot-scope="props">
                                        <b-table-column
                                            field="id"
                                            :visible="columnsVisible['id'].display"
                                            :label="columnsVisible['id'].title"
                                            width="120"
                                            sortable
                                            centered
                                        >
                                            <template v-if="showDetailIcon">
                                                {{ props.row.id }}
                                            </template>
                                            <template v-else>
                                                <a @click="toggle(props.row)">
                                                    {{ props.row.id }}
                                                </a>
                                            </template>
                                        </b-table-column>
                                        <b-table-column
                                            field="customer"
                                            :visible="columnsVisible['customer'].display"
                                            :label="columnsVisible['customer'].title"
                                            sortable
                                            centered
                                        >
                                          <template v-if="props.row.customer">
                                                {{ props.row.customer.name }}
                                            </template>
                                            <template v-else>
                                               {{ 'Unknown' }}
                                            </template>
                                            
                                        </b-table-column>
                                        <b-table-column
                                            field="payment"
                                            :visible="columnsVisible['payment'].display"
                                            :label="columnsVisible['payment'].title"
                                            sortable
                                            centered
                                        >
                                            {{ props.row.payment_total }}
                                        </b-table-column>
                                        <b-table-column
                                            field="due"
                                            :visible="columnsVisible['due'].display"
                                            :label="columnsVisible['due'].title"
                                            sortable
                                            centered
                                        >
                                            {{ props.row.due }}
                                        </b-table-column>
                                        <b-table-column
                                            field="total"
                                            :visible="columnsVisible['total'].display"
                                            :label="columnsVisible['total'].title"
                                            sortable
                                            centered
                                        >
                                            {{ props.row.total }}
                                        </b-table-column>

                                        <b-table-column
                                            field="created_at"
                                            :visible="columnsVisible['created_at'].display"
                                            :label="columnsVisible['created_at'].title"
                                            sortable
                                            centered
                                        >
                                            {{ props.row.created_at}}
                                        </b-table-column>

                                        <b-table-column
                                            :visible="columnsVisible['status'].display"
                                            :label="columnsVisible['status'].title"
                                            centered
                                        >
                                            <span :class="
                                                    [
                                                        'tag',
                                                        {'is-danger': props.row.status == 'cancel'},
                                                        {'is-success': props.row.status == 'success'},
                                                        {'has-background-warning': props.row.status == 'hold'}
                                                    ]">
                                                {{ props.row.status }}
                                            </span>
                                        </b-table-column>

                                        <b-table-column
                                            :visible="columnsVisible['action'].display"
                                            :label="columnsVisible['action'].title"
                                            centered
                                            
                                        >
                                            <span v-if="props.row.status == 'hold'">
                                                <router-link class="button is-light" :to="{name: 'create-order', query: { order: props.row.id}}">Edit</router-link>
                                            </span>
                                            <span v-if="props.row.status != 'hold'">
                                                <router-link class="button is-light" :to="{name: 'print-invoice', query: { orderId: props.row.id, Print: 'only' }}">Print</router-link>
                                            </span>
                                        </b-table-column>
                                    </template>

                                    <template slot="detail" slot-scope="props" >
                                        <tr style="background-color:#e8e8e8">
                                            <th></th>
                                            <th></th>
                                            <th class="has-text-centered">Quote Id#</th>
                                            <th class="has-text-centered">Name</th>
                                            <th class="has-text-centered">Quantity</th>
                                            <th class="has-text-centered">Unite Price</th>
                                            <th class="has-text-centered">Total</th>
                                            <th></th>
                                        </tr>
                                        <tr style="background-color:#e8e8e8"  v-for="item in props.row.quotes" :key="item.id">
                                            <td></td>
                                            <td v-if="showDetailIcon"></td>
                                            <td v-show="columnsVisible['id'].display" class="has-text-centered">{{ item.id }}</td>
                                            <td v-show="columnsVisible['name'].display" class="has-text-centered">{{ item.item.name }}</td>
                                            <td v-show="columnsVisible['quantity'].display" class="has-text-centered">{{ item.item_qty }}</td>
                                            <td v-show="columnsVisible['total'].display" class="has-text-centered">{{ item.unit_price }}</td>
                                            <td v-show="columnsVisible['detail'].display" class="has-text-centered">
                                                {{ item.item_total }}
                                            </td>
                                            <td></td>
                                        </tr>
                                    </template>
                                </b-table>
                        
                        </div>
                    </section>
                    </div>
                </div>
            </article>
        </div>
        
    </div>
</template>

<script>
import debounce from 'lodash/debounce'
    export default {
         data() {
            return {
                selected: null,
                isFetching: false,
                data: [],
                query:'',
                dates: [],
                isActive:'today',
                searchValue: '',
                columnsVisible: {
                    id: { title: 'Order Id', display: true },
                    customer: { title: 'Customer', display: true },
                    total: { title: 'Total', display: true },
                    payment: { title: 'Payment', display: true },
                    due: { title: 'Due', display: true },
                    created_at: { title: 'Created At', display: true },
                    name: { title: 'Name', display: true },
                    quantity: { title: 'Quantity', display: true },
                    unit: { title: 'Unite Price', display: true },
                    detail: { title: 'Detail', display: true },
                    status: { title: 'Status', display: true },
                    action: { title: 'Action', display: true },
                },
                showDetailIcon: true,
                isLoading: false,
                isFullPage: true
            }
        },
        mounted() {
            const loadingComponent = this.$buefy.loading.open({
                container: this.isFullPage ? null : this.$refs.element.$el
            })
            axios.get('/api/lastOrder')
            .then((response) => {
                this.data = response.data.data;
                
            }).catch((error) => {
                console.log(error);
            })
            .finally(() => loadingComponent.close());
        },
        computed: {
            salesTotal: function(){
                let sum = 0;
                for (var index in this.data) {
                    if (this.data[index].status == 'success') {
                        sum = sum + Number(this.data[index].total)
                    }
                }
                return Number(sum).toFixed(2);
            },
            paymentTotal: function(){
                let payment = 0;
                for (var index in this.data) {
                    if (this.data[index].status == 'success') {
                        payment = payment + Number(this.data[index].payment_total);
                    }
                    
                }
                return Number(payment).toFixed(2);
            },
            dueTotal: function(){
                let due = 0;
                for (var index in this.data) {
                    if (this.data[index].status == 'success') {
                        due = due + Number(this.data[index].due);
                    }
                   
                }
                return Number(due).toFixed(2);
            }
        },
        methods: {
            toggle(row) {
                this.$refs.table.toggleDetails(row)
            },
            onOrderSearch(name) {
                axios({
                    method: 'get',
                    url:'/api/lastOrder',
                    params: {
                        filter: 'search',
                        data: name
                    }
                    })
                    .then((response) => {
                        this.data = response.data.data
                    }, (error) => {
                        console.log(error);
                });
            },
            getFilterData(value){

                this.isActive = value;
                if(value.length == 2){
                    axios({
                    method: 'get',
                    url:'/api/lastOrder',
                    params: {
                        filter: 'date',
                        date: this.dates
                    }
                    })
                    .then((response) => {
                        console.log(response.data.data);
                        this.data = response.data.data;
                    }, (error) => {
                        console.log(error);
                });
                }else{
                    
                    axios({
                        method: 'get',
                        url:'/api/lastOrder',
                        params: {
                            filter: value,
                        }
                        })
                        .then((response) => {
                            console.log(response.data.data);
                            this.data = response.data.data;
                        }, (error) => {
                            console.log(error);
                    });
                }
            }
        }

    }
</script>
