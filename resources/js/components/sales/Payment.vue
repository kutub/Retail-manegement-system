<template>
    <div class="card">
        <div class="card-content">
            <section class="orderOption"> 
                <div class="columns p-b-20">
                    <div class="column">
                        <div class="field is-grouped">
                            <p class="control">
                                <button @click="$emit('addOrder', paymentDetail, 'cancel')" class="button is-danger">
                                    <span class="icon is-small">
                                        <i class="fa fa-times"></i>
                                    </span>
                                    <span>Cancel Order</span>
                                </button>
                            </p>
                            <p class="control">
                                <button @click="$emit('addOrder', paymentDetail, 'hold')" class="button is-success">
                                    <span class="icon is-small">
                                        <i class="fa fa-cart-arrow-down"></i>
                                    </span>
                                    <span>Hold</span>
                                </button>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="discount">
                    <div class="columns">
                      <div class="column">
                          <!-- Main container -->
                        <nav class="level">
                        <!-- Left side -->
                            <div class="level-left">
                                <div class="level-item p-r-20">
                                    <p class="subtitle is-5">
                                        Discount all Items By:
                                    </p>
                                </div>
                            </div>
                            <!-- Right side -->
                            <div class="level-right">
                                <p class="level-item" v-if="itemDiscount == false"> <a @click="itemDiscount = true"><span>Set Discount</span></a> </p>

                                <div class="level-item" v-if="itemDiscount == true">
                                    <div class="field has-addons">
                                        <p class="control" style="width:136px">
                                            <input v-model="paymentDetail.total_discount" type="text" placeholder="00" width="50px" class="input is-small">
                                        </p>
                                        <p class="control">
                                            <button  @click="calculateDiscoute(paymentDetail.item_discount),itemDiscount = false" class="button is-small is-success"><i class="fa fa-check"></i></button>
                                        </p>
                                        <p class="control">
                                            <button @click="itemDiscount = false" class="button is-small is-primary"><i class="fa fa-close"></i></button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </nav>
                      </div>
                    </div>
                    <div class="columns">
                        <div class="column">
                            <!-- Main container -->
                            <nav class="level">
                            <!-- Left side -->
                                <div class="level-left">
                                    <div class="level-item">
                                        <p class="subtitle is-5">
                                            Discount Entire Sale:
                                        </p>
                                    </div>
                                </div>
                                <!-- Right side -->
                                <div class="level-right">
                                    <p class="level-item" v-if="totalDiscount == false"> <a @click="totalDiscount = true">Set Discount </a> </p>
                                    <div class="level-item" v-if="totalDiscount == true">
                                    <div class="field has-addons">
                                        <p class="control" style="width:136px">
                                            <input v-model="paymentDetail.total_discount"  type="text" placeholder="00" width="50px" class="input is-small">
                                        </p>
                                        <p class="control">
                                            <button  @click="totalDiscount = false" class="button is-small is-success"><i class="fa fa-check"></i></button>
                                        </p>
                                        <p class="control">
                                            <button @click="totalDiscount = false" class="button is-small is-primary"><i class="fa fa-close"></i></button>
                                        </p>
                                    </div>
                                </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="columns">
                      <div class="column">
                          <!-- Main container -->
                        <nav class="level">
                        <!-- Left side -->
                            <div class="level-left">
                                <div class="level-item">
                                    <p class="subtitle is-5">
                                        Discount Reason:
                                    </p>
                                </div>
                            </div>
                            <!-- Right side -->
                            <div class="level-right">
                                <p class="level-item" v-if="discComments == false"> <a @click="discComments = true">Comments</a> </p>
                            </div>
                        </nav>
                      </div>
                    </div>
                    <div class="columns" v-if="discComments == true">
                        <div class="column">
                            <b-field>
                                <b-input v-model="paymentDetail.disc_reason" placeholder="Comment..."
                                    type="text" expanded>
                                </b-input>
                                <p class="control">
                                    <button @click="discComments = false" class="button is-success"><i class="fa fa-check"></i></button>
                                </p>
                            </b-field>
                        </div>
                    </div>
            </section>
            <section class="subTotal" style="background-color:#f1ffec; margin:20px 0; padding:0 15px;">
                <div class="columns">
                      <div class="column">
                          <!-- Main container -->
                        <nav class="level">
                        <!-- Left side -->
                            <div class="level-left">
                                <div class="level-item">
                                    <p class="subtitle is-5">
                                        Sub Total:
                                    </p>
                                </div>
                            </div>
                            <!-- Right side -->
                            <div class="level-right">
                                <p class="level-item"> <span class=""><strong>&#2547; {{cartTotal}}</strong></span> </p>
                            </div>
                        </nav>
                      </div>
                </div>
            </section>
            <section class="tax">
                <div class="columns">
                      <div class="column">
                          <!-- Main container -->
                        <nav class="level">
                        <!-- Left side -->
                            <div class="level-left">
                                <div class="level-item">
                                    <div class="block">
                                        <span class="tag">
                                            <button class="delete is-small is-danger"></button> 
                                            <span class="p-l-20">{{this.vat}}% Vat</span>
                                        </span>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- Right side -->
                            <div class="level-right">
                                <p class="level-item"> <a class="">&#2547; {{totalVat}}</a></p>
                            </div>
                        </nav>
                      </div>
                </div>
            </section>
            <section class="paymentTotal p-l-10 m-t-20 m-b-20 p-r-10">
                <div class="columns">
                    <div class="column">
                        <h1 class="title is-6 m-b-10">Total:</h1>
                        <h1 class="title is-4 is-success m-l-50" style="color: #6FD64B">{{total}} &#2547;</h1>
                    </div>
                    <div class="column" style="border-right:1px seagreen dotted;">
                        <h1 class="title is-6 m-b-10">Amount Due:</h1>
                        <h1 class="title is-4 is-success m-l-50" style="color: #ff9e28">{{totalDue}} &#2547;</h1>
                    </div>
                </div>
            </section>
            <section class="addPayment">
                <div class="columns">
                    <div class="column">
                        <p>Add Payment</p>
                        <div class="tags are-large">
                            <span v-bind:class="{'is-active': isActive == 'cash' }" @click="paymentBy('cash')"  class="tag">Cash</span>
                            <span v-bind:class="{'is-active': isActive == 'check' }" @click="paymentBy('check')"  class="tag">Check</span>
                            <span v-bind:class="{'is-active': isActive == 'giftCard' }" @click="paymentBy('giftCard')"  class="tag">Gift Card</span>
                            <span v-bind:class="{'is-active': isActive == 'debitCard' }" @click="paymentBy('debitCard')"  class="tag">Debit Card</span>
                            <span v-bind:class="{'is-active': isActive == 'creditCard' }" @click="paymentBy('creditCard')"  class="tag">Credit Card</span>
                            <span v-bind:class="{'is-active': isActive == 'storeAccount' }" @click="paymentBy('storeAccount')"  class="tag">Store Account</span>
                            <span v-bind:class="{'is-active': isActive == 'bkash' }" @click="paymentBy('bkash')"  class="tag">Bkash</span>
                            <span v-bind:class="{'is-active': isActive == 'rocket' }" @click="paymentBy('rocket')"  class="tag">Rocket</span>
                            <span v-bind:class="{'is-active': isActive == 'uCash' }" @click="paymentBy('uCash')"  class="tag">UCash</span>
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <b-field>
                            <b-select v-model="paymentDetail.currency" placeholder="Currency">
                                <option @click="convertByCurrency('taka')"   value="taka">&#2547;</option>
                                <option @click="convertByCurrency('dollar')" value="dollar">$</option>
                                <option @click="convertByCurrency('euro')" value="euro">€</option>
                            </b-select>
                            <b-input type="number" v-model="paymentDetail.cashPayment" placeholder="0,00"></b-input>
                            <p class="control">
                                <button @click="$emit('addOrder', paymentDetail, status)" class="button is-success">Complete Sale</button>
                            </p>
                        </b-field>
                    </div>
                </div>
            </section>
            <section class="dateChange">
                <div class="columns">
                    <div class="column">
                        <b-checkbox v-model="paymentDetail.include_transport">
                            Include Transport
                        </b-checkbox>
                         <b-field v-if="paymentDetail.include_transport">
                            <b-input v-model="paymentDetail.transport_cost" type="number" placeholder="transport cost">
                            </b-input>
                        </b-field>
                    </div>
                </div>
            </section>
    
            <section class="transport p-t-20 m-b-10">
                <div class="columns">
                    <div class="column">
                        <b-field>
                            <b-input v-model="paymentDetail.comments" type="textarea" rows="2"
                                placeholder="Comments">
                            </b-input>
                        </b-field>
                        <b-checkbox v-model="paymentDetail.show_comment">
                            Show comments on receipt
                        </b-checkbox>
                    </div>
                </div>
            </section>
            <section class="dateChange">
                <div class="columns">
                    <div class="column">
                        <b-checkbox v-model="paymentDetail.change_date">
                            Change Sale Date
                        </b-checkbox>
                        <b-datetimepicker v-model="paymentDetail.modified_date" v-if="paymentDetail.change_date"
                            placeholder="Type or select a date..."
                            icon="calendar-today"
                            editable>
                        </b-datetimepicker>
                    </div>
                </div>
            </section>
        </div>
      </div> <!-- end of .card -->
</template>

<script>
    export default {
        name: "payment",
        props:['cartTotal'],
        data() {
            return {
               changeDate: false,
               discComments:false,
               itemDiscount: false,
               totalDiscount: false,
               paymentDetail: {
                   cashPayment: 0,
                   vat:0,
                   currency: 'taka',
                   due:0,
                   total:0,
                   total_discount:0,
               },
               isActive:false,
               vat: 0,
               status:'success',
            }
        },
        mounted(){
            if(location.href.split('=')[1]){
                this.status = 'edit';
            }
        },
        computed:{
            totalVat: function(){
                let vat = Number((this.cartTotal * this.vat)/100).toFixed(2);
                this.paymentDetail.vat = vat;
                return vat;
            },
            total: function(){
                let totalWDisc = (this.cartTotal - (this.cartTotal * this.paymentDetail.total_discount)/100);
                totalWDisc = (totalWDisc + (this.cartTotal * this.vat)/100);
                this.paymentDetail.cashPayment = Number(totalWDisc).toFixed(2);
                this.paymentDetail.total = Number(totalWDisc).toFixed(2);
                return  Number(totalWDisc).toFixed(2);
            },
            totalDue: function(){
                let total = (this.cartTotal - (this.cartTotal * this.paymentDetail.total_discount)/100);
                total = (total + (this.cartTotal * this.vat)/100);
                this.paymentDetail.due = Number(total - this.paymentDetail.cashPayment).toFixed(2);
                return Number(total - this.paymentDetail.cashPayment).toFixed(2);
            }
        },
        methods:{
            paymentBy: function(value){
                this.paymentDetail.payment_type = value;
                this.isActive = value;
            },
            convertByCurrency(value){
                switch (value) {
                    case 'taka':
                        this.paymentDetail.cashPayment = Number(this.total).toFixed(2);
                        break;
                    case 'dollar':
                        this.paymentDetail.cashPayment = Number(this.paymentDetail.cashPayment/80).toFixed(2);
                        break;
                    case 'euro':
                        this.paymentDetail.cashPayment = Number(this.paymentDetail.cashPayment/92).toFixed(2);
                        break;
                    default:
                        break;
                }
            },
        }
    }
</script>
<style scoped>
    .tag{
        font-size: 1rem;
    }
    .tags.are-large .tag:not(.is-normal):not(.is-medium){
        font-size: 0.9rem;
        padding: 20px 10px !important;
        cursor: pointer;
    }
    .is-active{
        background-color: aquamarine;
    }
    .subtitle{
        font-size: 1rem;
    }
    .discount .column{
        padding: 0.1rem 0.75rem;
    }
    .discount .level-right a{
        color: red;
        font-style: italic;
    }
    .paymentTotal .column{
        border-top: 1px seagreen dotted;
        border-left: 1px seagreen dotted;
        border-bottom: 1px seagreen dotted;
    }
</style>