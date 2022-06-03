<template>
    <section class="container is-fullhd">
          
        <div class="columns" style="position:relative;">
            
            <b-loading :is-full-page="isFullPage" v-model="isLoading" :can-cancel="true"></b-loading>
            <div class="column is-7" style="padding-top:0">
                <products-list  :products="products" @add="addItem"></products-list>
                <page-slide></page-slide>
            </div>
            <div class="column is-5" style="background-color: #fff;">
                <b-steps style="position:fixed; height:100vh; overflow:auto"
                    v-model="activeStep"
                    :animated="isAnimated"
                    :has-navigation="hasNavigation"
                    :icon-prev="prevIcon"
                    :icon-next="nextIcon">
                    
                    <b-step-item label="Cart Item" :clickable="isStepsClickable">
                        <cart-item :cart-items="saleItems" :button="isShow" @updatePrice="updatePrice" @updateQty="updateQuantity" @remove="removeItem" @next="onCheckout"></cart-item>
                    </b-step-item>

                    <b-step-item  label="Payment" :clickable="isStepsClickable">
                        <customer @selected-customer="selectedCustomer" @next="onCheckout"></customer>
                        <payment :cart-total="cartTotal" @addOrder="onAddOrder" ></payment>
                    </b-step-item>

                    <template
                        v-if="customNavigation"
                        slot="navigation"
                        slot-scope="{previous, next}">
                        <b-button
                            outlined
                            type="is-danger"
                            icon-pack="fas"
                            icon-left="backward"
                            :disabled="previous.disabled"
                            @click.prevent="previous.action">
                            Previous
                        </b-button>
                        <b-button
                            outlined
                            type="is-success"
                            icon-pack="fas"
                            icon-right="forward"
                            :disabled="next.disabled"
                            @click.prevent="next.action">
                            Next
                        </b-button>
                    </template>
                </b-steps>
            </div>
        </div>
        
    </section>
</template>

<script>
    import cartItem from './CartItem.vue'; 
    import productsList from './ProductsList.vue';
    import customer from './Customer.vue';
    import payment from './Payment.vue';
    import { mapState } from 'vuex'
 

    export default {
        components: {
            cartItem,
            productsList,
            customer,
            payment
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
                // products:[],
                saleItems:[],
                quoteId: null,
                quotes:[],
                quotesId:[],
                customerId:null,
                isShow: true,
                items:[],
                order:[],
                orderId: '',
                isLoading: true,
                isFullPage: true,
                currentLanguage:'en',
            }
        },
        created(){
            // axios.get('/api/items')
            //     .then((response) => {
            //         this.products = response.data.data;
            //     }).catch((error) => {
            //         console.log(error);
            //     });
            this.currentLanguage = location.href.split('/')[3]
            const loadingComponent = this.$buefy.loading.open({
                container: this.isFullPage ? null : this.$refs.element.$el
            })
            this.$store.dispatch('todos/fetchTodos', 1)
            .then(() => loadingComponent.close())
        },
        mounted(){
            if(location.href.split('=')[1]){
                const loadingComponent = this.$buefy.loading.open({
                    container: this.isFullPage ? null : this.$refs.element.$el
                })
                axios.get(`/api/order/${location.href.split('=')[1]}`)
                        .then((response) => {
                            this.orderId = response.data.data.id;
                            
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
                            this.items.quotes.forEach(item => {
                                var quote = {
                                        item_id: item.id,
                                        name:item.item.name,
                                        price: {
                                                sell_price: item.unit_price
                                            },
                                        quantity: item.item_qty,
                                        discount: 0,
                                        total: item.item_total,
                                    }
                                this.saleItems.push(quote);
                                // this.quotesId.push(item.id);
                                this.quotes.push(quote);
                            })
                            
                            if (!!this.customer.customer) {
                                this.customerId = this.customer.customer.id
                            }
                            

                        }).catch((error) => {
                            console.log(error);
                        })
                        .finally(() => loadingComponent.close());
            }
        },
        computed: mapState({
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
            },
            products: state => state.todos.items.data
        }),
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
                        const loadingComponent = this.$buefy.loading.open({
                            container: this.isFullPage ? null : this.$refs.element.$el
                        })
                        this.$store.dispatch('orders/updateQuote', this.quoteId, quote)
                            .then((response) => {
                                this.$buefy.toast.open({
                                    message: 'Item Added correctly!',
                                    type: 'is-success',
                                    duration: 2000,
                                })

                            }, (error) => {
                                console.log(error);
                            })
                            .finally(() => loadingComponent.close());;

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
                    const loadingComponent = this.$buefy.loading.open({
                        container: this.isFullPage ? null : this.$refs.element.$el
                    })
                    this.$store.dispatch('orders/saveQuote', quote)
                        .then((response) => {
                            this.quoteId = response.data.id
                            product['quote_id'] = response.data.id;
                            this.saleItems.push(product);
                            this.quotes.push(response.data);
                            this.quotesId.push(response.data.id);
                            this.$buefy.toast.open({
                                message: 'Item Added correctly!',
                                type: 'is-success',
                                duration: 2000,
                            })
                        }, (error) => {
                            console.log(error);
                    })
                    .finally(() => loadingComponent.close());
                }
            },
            updateQuantity(index, qty){
                this.saleItems[index].total = (this.saleItems[index].price.sell_price * qty);
                this.quotes[index].item_qty = Number(qty);
                this.quotes[index].net_profit = (this.quotes[index].net_profit * Number(qty));
                this.quotes[index].item_total = this.saleItems[index].total;
                    const loadingComponent = this.$buefy.loading.open({
                        container: this.isFullPage ? null : this.$refs.element.$el
                    })
                    this.$store.dispatch('orders/updateQuantity', this.quoteId, this.quotes[index])
                        .then((response) => {
                            this.$buefy.toast.open({
                                message: 'Item Added correctly!',
                                type: 'is-success',
                                duration: 2000,
                            })

                        }, (error) => {
                            console.log(error);
                    })
                    .finally(() => loadingComponent.close());

            },
            updatePrice(index, price){
                this.saleItems[index].total = (this.saleItems[index].quantity * price);
                this.quotes[index].unit_price = price;
                this.quotes[index].item_total = this.saleItems[index].total;
                this.quotes[index].net_profit = ((Number(price) - this.quotes[index].cost_price) * this.quotes[index].item_qty);
                
                const loadingComponent = this.$buefy.loading.open({
                    container: this.isFullPage ? null : this.$refs.element.$el
                })
                this.$store.dispatch('orders/updatePrice', this.quoteId, this.quotes[index])
                    .then((response) => {
                        this.$buefy.toast.open({
                            message: 'Item Added correctly!',
                            type: 'is-success',
                            duration: 2000,
                        })

                    }, (error) => {
                        console.log(error);
                })
                .finally(() => loadingComponent.close());
            },
            removeItem(index, id) {
                if (confirm('Are you sure?')) {
                    this.saleItems.splice(index, 1);
                    this.quotes.splice(index, 1);
                    const loadingComponent = this.$buefy.loading.open({
                        container: this.isFullPage ? null : this.$refs.element.$el
                    })
                    this.$store.dispatch('orders/deleteQuote', id, this.quotes[index])
                    // axios({
                    //     method: 'delete',
                    //     url:`/api/quote/${id}`,
                    //     data: this.quotes[index],
                    //     })
                        .then((response) => {
                            this.$buefy.toast.open({
                                message: 'Item Added correctly!',
                                type: 'is-danger',
                                duration: 2000,
                            })

                        }, (error) => {
                            console.log(error);
                    })
                    .finally(() => loadingComponent.close());
                }

            },
            selectedCustomer(customer){
                console.log(customer);
                this.customerId = customer.id;
            },
            onCheckout(status){
                if(status != 0){
                   this.activeStep = status;
                }else{
                    this.saleItems = [];
                    this.activeStep = status;
                    this.quotes.forEach((element, index) => {
                        const loadingComponent = this.$buefy.loading.open({
                            container: this.isFullPage ? null : this.$refs.element.$el
                        })
                        axios({
                            method: 'delete',
                            url:`/api/quote/${element.id}`,
                            data: element,
                            })
                            .then((response) => {

                            }, (error) => {
                                console.log(error);
                        })
                        .finally(() => loadingComponent.close());
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
                    customer_id: this.customerId,
                    total: data.total,
                    due: data.due,
                    payment_type: data.payment_type,
                    vat: data.vat,
                    currency: data.currency,
                    payment_total: data.cashPayment,
                    comments: data.comments,
                    show_comment: data.show_comment,
                    change_date: data.change_date,
                    include_transport: data.include_transport,
                    modified_date: data.modified_date,
                    transport_cost: data.transport_cost,
                    total_profit: this.netProfit,
                    created_by: 'emon',
                    discount: data.total_discount,
                    discount_reason: data.disc_reason,
                    status:(status == 'edit' ? 'success' : status),
                    quotes:this.quotesId,
                    id: this.orderId,
                }
                if(status == 'edit'){
                     const loadingComponent = this.$buefy.loading.open({
                        container: this.isFullPage ? null : this.$refs.element.$el
                    })
                    axios({
                        method: 'put',
                        url:`/api/order/${this.orderId}/edit`,
                        data: orderData,
                        })
                        .then((response) => {
                            this.$router.push({ path: 'invoice', query: { orderId: response.data.id }});
                        }, (error) => {
                            console.log(error);
                        })
                        .finally(() => loadingComponent.close());
                }else{
                    const loadingComponent = this.$buefy.loading.open({
                        container: this.isFullPage ? null : this.$refs.element.$el
                    })
                    axios({
                        method: 'post',
                        url:'/api/order',
                        data: orderData,
                        })
                        .then((response) => {
                            if(status == 'success'){
                                 this.$router.push({ path: 'invoice', query: { orderId: response.data.id }});
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
                                // location.reload();
                            }
                            
                        }, (error) => {
                            console.log(error);
                    })
                    .finally(() => loadingComponent.close());
                }
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