<template>
    <div class="container">
        <div class="columns">
            <div class="column p-r-50 p-l-30">
                
                <div class="box box-good p-l-30 p-r-30">
                    <div id="printMe">
                        <div class="box-header">
                            <div class="columns is-mobile">
                                <div class="column is-6">
                                    <div class="icon is-large"><i class="is-awesome-icon-content mdi mdi-48px">IA</i></div>
                                </div>
                                <div class="column is-6">
                                    <p class="has-text-right">Invoice date: {{invoiceDate}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="box-content m-t-20">
                            <div class="columns is-mobile">
                                <div class="column is-7">
                                    <div class="content">
                                        From
                                        <strong>{{office.name}}</strong><br>
                                        {{office.address}}<br>
                                        Phone: {{office.mobile_1}}<br>
                                        Email: {{office.email}}
                                    </div>
                                </div>
                                <div class="column is-5">
                                    <div class="content has-text-right">
                                        <b>Invoice {{invoiceId}}</b>
                                        <br>
                                        <br>
                                        <b>Order ID:</b> {{order.id}}<br>
                                        <b>Payment Due:</b> {{invoiceDate}}<br>
                                    </div>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column is-6">
                                    <div class="content" v-if="customer.customer">
                                        To
                                        <strong>{{customer.customer.name}}</strong><br>
                                        {{customer.customer.address_1}}<br>
                                        Phone: {{customer.customer.mobile}}<br>
                                        Email: {{customer.customer.email}}
                                    </div>
                                    <div class="content" v-if="!customer.customer">
                                        <b-field horizontal  label="To" type="is-success">
                                            <b-input v-model="customer.name" placeholder="Name" size="is-small"></b-input>
                                        </b-field>
                                        <b-field horizontal label="Address" type="is-success">
                                            <b-input v-model="customer.address_1" placeholder="Address" size="is-small"></b-input>
                                        </b-field>
                                        <b-field horizontal label="Mobile" type="is-success">
                                            <b-input v-model="customer.mobile" placeholder="Mobile" size="is-small"></b-input>
                                        </b-field>
                                        <b-field horizontal label="Email" type="is-success">
                                            <b-input type="email" v-model="customer.email" placeholder="Email" size="is-small"></b-input>
                                        </b-field>
                                    </div>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column is-12">
                                    <div class="table-is-responsive">
                                        <table class="table is-striped is-narrow is-hoverable is-fullwidth">
                                        <thead>
                                            <tr>
                                            <th>ID#</th>
                                            <th>Product Name</th>
                                            <th>Description</th>
                                            <th>Qty</th>
                                            <th>Unit Price</th>
                                            <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in items.quotes" :key="index">
                                                <td>{{item.id}}</td>
                                                <td>{{item.item.name}}</td>
                                                <td>{{item.item.detail}}</td>
                                                <td>{{item.item_qty}}</td>
                                                <td>{{item.unit_price}}</td>
                                                <td>{{item.item_total}}</td>
                                            </tr>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column is-7 m-t-20">
                                    <div class="notification">
                                        Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit lorem ipsum dolor sit amet,
                                        consectetur adipiscing elit
                                    </div>
                                </div>
                                <div class="column is-5">
                                    <ul class="list-group list-group-unbordered">
                                        <li class="list-group-item">
                                            <b>Subtotal:</b> <p class="is-pulled-right">{{order.sub_total}}</p>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Tax(7%):</b> <p class="is-pulled-right">{{order.vat}}</p>
                                        </li>
                                        <li class="list-group-item" v-if="order.include_transport == 1">
                                            <b>Shipping:</b> <p class="is-pulled-right">{{order.transport_cost}}</p>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Payment:</b> <p class="is-pulled-right">{{order.payment_total}}</p>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Due:</b> <p class="is-pulled-right">{{order.due}}</p>
                                        </li> 
                                        <li class="list-group-item">
                                            <b>Total:</b> <p class="is-pulled-right"><b>{{Number(order.total+ Number(order.transport_cost)).toFixed(2)}}</b></p>
                                        </li>
                                        <li class="list-group-item m-t-10" style="border:none" v-if="customer.customer">
                                            <b style="font-style:italic;">Note: <span style="font-style:normal;font-weight: normal;">Current/Previus Due </span></b> 
                                            <p class="is-pulled-right"><b>{{Number(order.due) + Number(customer.customer.balance)}}</b></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="box-footer has-text-right m-t-30 m-b-30 no-print">
                        <a class="button" @click="onCancel">Cancel</a>
                        <a class="button is-info" v-if="onlyPrint == 'only'" @click="onPrint">Print</a>
                        <a class="button is-primary" v-if="onlyPrint != 'only'" @click="onAddPayment">
                            <span class="icon">
                                <i class="fa fa-credit-card"></i>
                            </span>
                            <span>Add Payment</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                invoiceId: null,
                invoiceDate:null,
                order:[],
                items:[],
                customer:{},
                onlyPrint:this.$route.query.Print,
                isLoading: false,
                isFullPage: true,
                office:'',
            }
        },
        created(){
            this.getOrderById();
            this.onOfficeInfo();
        },

        methods:{
            getOrderById(){
                if(this.$route.query){
                    const loadingComponent = this.$buefy.loading.open({
                        container: this.isFullPage ? null : this.$refs.element.$el
                    })
                    axios.get(`/api/order/${this.$route.query.orderId}`)
                        .then((response) => {
                            this.items = Object.keys(response.data.data).reduce((object, key) => {
                                                if (key == 'quotes') {
                                                    object[key] = response.data.data[key]
                                                }
                                                return object
                                            }, {})
                            this.customer = Object.keys(response.data.data).reduce((object, key) => {
                                                if (key == 'customer') {
                                                    object[key] = response.data.data[key]
                                                }
                                                return object
                                            }, {})
                            this.order = Object.keys(response.data.data).reduce((object, key) => {
                                                if (key != 'customer' && key != 'quotes') {
                                                    object[key] = response.data.data[key]
                                                }
                                                return object
                                            }, {})
                       
                            //invoice unique id
                            var cId = this.customer.customer ? this.customer.customer.id : 'N';
                            var currentDate = new Date();
                            var date = currentDate.getDate();
                            var month = currentDate.getMonth(); 
                            var year = currentDate.getFullYear();
                            var id = 'ID'+this.$route.query.orderId+'DT'+date+(month+1)+year+'C'+cId;
                            this.invoiceDate = date+'-'+(month+1)+'-'+year;
                            this.invoiceId = id;

                        }).catch((error) => {
                            console.log(error);
                    })
                    .finally(() => loadingComponent.close());
                }
            },
            
            onAddPayment(){
                var receive = {
                    receive_head: 'from-invoice',
                    account_head: this.order.payment_type,
                    received_by: 'emon',
                    total: this.order.payment_total,
                    comments: null,
                    customer_id: this.order.customer_id,
                    order_id: this.order.id,
                    invoice_id: null,
                }
                this.onlyPrint = 'only'
                if (this.order.payment_total > 0) {
                    const loadingComponent = this.$buefy.loading.open({
                        container: this.isFullPage ? null : this.$refs.element.$el
                    })
                    axios({
                        method: 'post',
                        url:'/home/receive',
                        data: receive,
                    })
                        .then((response) => {

                           var cash = {
                               receive_id:response.data.id,
                               expense_id:null,
                               total:response.data.total,
                               debited:null,
                               credited:response.data.total,
                               balance:response.data.total,
                               account_head:'from-invoice',
                               bank_id:null,
                               comments:null,
                            }
                            axios({
                                method: 'post',
                                url:'/home/cash',
                                data: cash,
                            })
                                .then((response) => {
                                    this.$htmlToPaper('printMe');
                                }, (error) => {
                                    console.log(error);
                            });

                        }, (error) => {
                            console.log(error);
                    })
                    .finally(() => loadingComponent.close());
                }
                if (this.order.due > 0) {
                    const loadingComponent = this.$buefy.loading.open({
                        container: this.isFullPage ? null : this.$refs.element.$el
                    })
                    axios({
                        method: 'post',
                        url:'/home/receivable',
                        data: receive,
                    })
                        .then((response) => {
                            
                        }, (error) => {
                            console.log(error);
                    })
                    .finally(() => loadingComponent.close());
                }
                
            },
            onPrint(){
                this.$htmlToPaper('printMe');
            },
            onCancel(){
                this.$router.push({ path: 'create-order'});
            },
            onOfficeInfo(){
                const loadingComponent = this.$buefy.loading.open({
                    container: this.isFullPage ? null : this.$refs.element.$el
                })
                axios.get(`/en/home/office/0`)
                    .then((response) => {

                        this.office = response.data[0];

                    }).catch((error) => {
                        console.log(error);
                    })
                    .finally(() => loadingComponent.close());
            }
        }
    }
</script>

<style scoped>
    .box-header{
        border-bottom: 1px solid #dbdbdb;
    }
    .list-group-item{
        border-bottom: 1px solid #dbdbdb;
        padding: 0.75rem 0;
    }
</style>