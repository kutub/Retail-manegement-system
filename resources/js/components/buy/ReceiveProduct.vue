<template>
    <section class="container is-fullhd">
        <div class="columns">
            <div class="column">
                <div class="field has-addons expanded">
                    <p class="control is-expanded">
                        <b-field>
                            <b-autocomplete
                                :data="data"
                                placeholder="Enter name or Barcode"
                                field="title"
                                :loading="isFetching"
                                @typing="getAsyncData"
                                @select="option => selected = option" expanded>

                                <template slot-scope="props">
                                    <div class="media" @click="addItem(props.option)">
                                        <div class="media-left">
                                            <img width="32" :src="'/storage/images/products/'+props.option.image.image">
                                        </div>
                                        <div class="media-content">
                                            {{ props.option.name }}
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
        <div class="columns">
            <div class="column is-8">
                <cart-item-purchase :cart-items="saleItems" :button="isShow" @updatePrice="updatePrice" @updateQty="updateQuantity" @remove="removeItem" @next="onCheckout"></cart-item-purchase>
            </div>
            <div class="column is-4">
                <supplier @selected-customer="customer" @next=""></supplier>
                <payment :cart-total="cartTotal" @addOrder="onAddOrder" ></payment>
            </div>
        </div>
        
    </section>
</template>

<script>
    import cartItemPurchase from './CartItemPurchase.vue'; 
    import supplier from './Suppliers.vue';
    import payment from '../sales/Payment.vue';
    import debounce from 'lodash/debounce';
    export default {
        components: {
            cartItemPurchase,
            payment,
            supplier
        },
        data() {
            return {
                activeStep: 0,
                isAnimated: true,
                hasNavigation: true,
                customNavigation: true,
                prevIcon: 'chevron-left',
                nextIcon: 'chevron-right',
                isStepsClickable: true,
                isProfileSuccess: false,
                products:[],
                saleItems:[],
                quoteId: null,
                quotes:[],
                quotesId:[],
                data:[],
                customerId:null,
                isFetching: false,
                query:'',
                isShow: false,
            }
        },
        created(){
            // axios.get('/api/items')
            // .then((response) => {
            //     this.products = response.data.data;
            //     console.log(this.products)
            // }).catch((error) => {
            //     console.log(error);
            // });
        },
        computed: {
            cartTotal: function(){
                let sum = 0;
                for (var index in this.saleItems) {
                    sum = sum+(this.saleItems[index].price.sell_price * this.saleItems[index].quantity);
                }
                return sum;
            },
            cartQty: function(){
                let qty = 0;
                for (var index in this.saleItems) {
                    qty = qty + Number(this.saleItems[index].quantity);
                }
                return qty;
            },
            netProfit: function(){
                let profit = 0;
                for (var index in this.quotes) {
                    let itemProfit = Number(this.quotes[index].unit_price - this.quotes[index].cost_price);
                    profit = profit + (itemProfit * Number(this.quotes[index].item_qty));
                }
                return profit;
            }
        },
        methods:{
            addItem(product){
                var whichProduct;
                var existing = this.saleItems.filter(function(item, index){
                    if (item.id == Number(product.id)) {
                        whichProduct = index;
                        return true;
                    }else{
                        return false;
                    }
                });
                if (existing.length) {
                    
                        this.saleItems[whichProduct].quantity++
                        this.saleItems[whichProduct].total = this.saleItems[whichProduct].price.sell_price * this.saleItems[whichProduct].quantity;
                        this.quotes[whichProduct].item_qty++;
                        var quote = {
                            item_id: this.saleItems[whichProduct].id,
                            unit_price: this.saleItems[whichProduct].price.sell_price,
                            cost_price: product.price.cost_price,
                            net_profit: (this.saleItems[whichProduct].price.sell_price - this.saleItems[whichProduct].price.cost_price) * this.saleItems[whichProduct].quantity,
                            item_qty: this.saleItems[whichProduct].quantity,
                            discount: 0,
                            item_total: this.saleItems[whichProduct].total,
                            created_by:'emon',
                            status: 'success',
                            customer_id: null,
                        }
                        var inventory = {
                            quantity: this.saleItems[whichProduct].quantity, 
                        }
                        axios({
                            method: 'put',
                            url:`/api/pquote/${this.quoteId}`,
                            data: quote,
                        })
                            .then((response) => {
                                this.$buefy.toast.open({
                                    message: 'Item Added correctly!',
                                    type: 'is-success',
                                    duration: 2000,
                                })

                            }, (error) => {
                                console.log(error);
                        });
                        axios({
                            method: 'put',
                            url:`/en/home/product/${this.saleItems[whichProduct].id}`,
                            data: inventory,
                        })
                        .then((response) => {
                            this.$buefy.toast.open({
                                message: 'Item Update correctly!',
                                type: 'is-success',
                                duration: 2000,
                            })

                        }, (error) => {
                            console.log(error);
                        });

                }else{
                    product['quantity'] = 1;
                    var price = (product.price == null ? 0 : product.price.sell_price);
                    product.total = (price * product['quantity']) || 0;
                    var quote = {
                        item_id: product.id,
                        unit_price: price,
                        cost_price: product.price.cost_price,
                        net_profit: (price - product.price.cost_price),
                        item_qty: product.quantity,
                        discount: 0,
                        item_total: product.total,
                        created_by:'emon',
                        status: 'success',
                        customer_id: null,
                    }

                    var inventory = {
                        quantity: product.quantity,
                        items_id: product.id
                    }

                    axios({
                        method: 'post',
                        url:'/api/pquote',
                        data: quote,
                        })
                        .then((response) => {
                            this.quoteId = response.data.id
                            this.saleItems.push(product);
                            this.quotes.push(response.data);
                            this.quotesId.push(response.data.id);
                            axios({
                                method: 'put',
                                url:`/api/purchase-update`,
                                data: inventory,
                                params: {
                                    model: 'inventory',
                                }
                                })
                                .then((response) => {

                                }, (error) => {
                                    console.log(error);
                            });
                            this.$buefy.toast.open({
                                message: 'Item Added correctly!',
                                type: 'is-success',
                                duration: 2000,
                            })
                        }, (error) => {
                            console.log(error);
                    });
                    
                }
            },
            updateQuantity(index, qty){
                this.saleItems[index].total = (this.saleItems[index].price.sell_price * qty);
                this.quotes[index].item_qty = Number(qty);
                this.quotes[index].net_profit = (this.quotes[index].net_profit * Number(qty));
                this.quotes[index].item_total = this.saleItems[index].total;
                var inventory = {
                    quantity: qty,
                    items_id: this.saleItems[index].id
                }
                axios({
                        method: 'put',
                        url:`/api/pquote/${this.quoteId}`,
                        data: this.quotes[index],
                        })
                        .then((response) => {
                            this.$buefy.toast.open({
                                message: 'Item Added correctly!',
                                type: 'is-success',
                                duration: 2000,
                            })

                            axios({
                                method: 'put',
                                url:`/api/purchase-update`,
                                data: inventory,
                                params: {
                                    model: 'inventory',
                                }
                                })
                                .then((response) => {

                                }, (error) => {
                                    console.log(error);
                            });

                        }, (error) => {
                            console.log(error);
                    });

            },
            updatePrice(index, price){
                this.saleItems[index].total = (this.saleItems[index].quantity * price);
                this.quotes[index].unit_price = price;
                this.quotes[index].item_total = this.saleItems[index].total;
                this.quotes[index].net_profit = ((Number(price) - this.quotes[index].cost_price) * this.quotes[index].item_qty);
                var inventory = {
                    price: price,
                    items_id: this.saleItems[index].id
                }
                axios({
                        method: 'put',
                        url:`/api/pquote/${this.quoteId}`,
                        data: this.quotes[index],
                        })
                        .then((response) => {
                            this.$buefy.toast.open({
                                message: 'Item Added correctly!',
                                type: 'is-success',
                                duration: 2000,
                            })

                            axios({
                                method: 'put',
                                url:`/api/purchase-update`,
                                data: inventory,
                                params: {
                                    model: 'pricing',
                                }
                                })
                                .then((response) => {

                                }, (error) => {
                                    console.log(error);
                            });

                        }, (error) => {
                            console.log(error);
                    });
            },
            removeItem(index) {
                
                if (confirm('Are you sure?')) {
                    this.saleItems.splice(index, 1);
                    this.quotes.splice(index, 1);
                    axios({
                        method: 'delete',
                        url:`/api/pquote/${this.quoteId}`,
                        data: this.quotes[index],
                        })
                        .then((response) => {
                            this.$buefy.toast.open({
                                message: 'Item Added correctly!',
                                type: 'is-danger',
                                duration: 2000,
                            })

                        }, (error) => {
                            console.log(error);
                    });
                }

            },
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
            }, 500),
            customer(customer){
                this.customerId = customer.id;
            },
            onCheckout(status){
                if(status != 0){
                   this.activeStep = status;
                }else{
                    this.saleItems = [];
                    this.activeStep = status;
                    this.quotes.forEach((element, index) => {
                        axios({
                            method: 'delete',
                            url:`/api/pquote/${element.id}`,
                            data: element,
                            })
                            .then((response) => {

                            }, (error) => {
                                console.log(error);
                        });
                    });
                    this.$buefy.toast.open({
                        message: 'Quote Deleted correctly!',
                        type: 'is-danger',
                        duration: 2000,
                    })
                }
            },
            onAddOrder(data, status){
                var orderData = {
                    sub_total: this.cartTotal,
                    supplier_id: this.customerId,
                    total: data.total,
                    due: data.due,
                    payment_type: data.payment_type,
                    vat: data.vat,
                    currency: data.currency,
                    payments: data.cashPayment,
                    notes: data.comments,
                    show_comment: data.show_comment,
                    change_date: data.change_date,
                    include_transport: data.include_transport,
                    modified_date: data.modified_date,
                    trasport: data.transport_cost,
                    total_profit: this.netProfit,
                    created_by: 'emon',
                    discount: data.total_discount,
                    discount_reason: data.disc_reason,
                    status:status,
                    quotes:this.quotesId,
                }
                axios({
                        method: 'post',
                        url:'/api/purchase',
                        data: orderData,
                        })
                        .then((response) => {
                            if(status == 'success'){
                                // this.$router.push({ path: '/bn/home/invoice', query: { orderId: response.data.id }});
                                // location.href = `/home/order/${response.data.id}`;
                            }else{
                                this.$buefy.toast.open({
                                    message: `Order ${status}`,
                                    type: 'is-success',
                                    duration: 2000,
                                 })

                                this.saleItems = [];
                                orderData = [];
                                this.activeStep = 0;
                                location.reload();
                            }
                            
                        }, (error) => {
                            console.log(error);
                });
            },

        }
    }
</script>


<style scoped>
  input{
    border-radius: 4px;
  }
  #customer{
    position: relative;
  }
  #customer div.searchBox{
    position: absolute;
    top: 83px;
    left: 0;
    right: 0;
    z-index: 99999;
    padding: 0 15px;
  }
  #customer div.searchBox ul li:hover{
    cursor: pointer;
    background-color: darkgrey;
  }
  #customer div.searchBox ul li{
    background-color: blanchedalmond;
  }
</style>