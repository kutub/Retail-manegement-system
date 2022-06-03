<template>
    <div class="container cart-container">
        <div class="columns">
            <div class="column">
                <div class="card" style="width:100%">
                    <div class="card-content">
                    <table class="table is-narrow is-fullwidth">
                        <thead>
                        <tr v-if="currentLanguage == 'en'">
                            <th>Item Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Delete</th>
                        </tr>
                        <tr v-else>
                            <th>পণ্যের নাম</th>
                            <th>দাম</th>
                            <th>পরিমাণ</th>
                            <th>মোট</th>
                            <th>ডিলিট</th>
                        </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(item, index) in cartItems" :key="index">
                                    <td>{{item.name}}</td>
                                    <td>
                                        <div class="field has-addons">
                                            <p class="control">
                                                <input v-if="item.price" type="text" class="input is-small" name="sPrice" v-model="item.price.sell_price" :disabled="prcDisable">
                                            </p>
                                            <p class="control">
                                                <button  v-if="!prcDisable" @click="$emit('updatePrice', index, item.price.sell_price), prcDisable = true" class="button is-small is-success"><i class="fa fa-check"></i></button>
                                                <button v-if="prcDisable" @click="prcDisable = false" class="button is-small is-primary"><i class="fa fa-pencil"></i></button>
                                            </p>
                                        </div>
                                    </td>
                                    <td >
                                        <div class="field has-addons">
                                            <p class="control">
                                                <input type="text" v-model="item.quantity" class="input is-small" :disabled="qtyDisabled">
                                            </p>
                                            <p class="control">
                                                <button  v-if="!qtyDisabled" @click="$emit('updateQty', index, item.quantity), qtyDisabled = true" class="button is-small is-success"><i class="fa fa-check"></i></button>
                                                <button v-if="qtyDisabled" @click="qtyDisabled = false" class="button is-small is-primary"><i class="fa fa-plus"></i></button>
                                            </p>
                                        </div>
                                        
                                        
                                    </td>
                                    <td class="itemTotal text-center" style="padding-top:12px; font-weight: bold;">
                                        {{item.total}}
                                    <td>
                                    <div class="btn-group pull-right">
                                        <button @click="$emit('remove', index, item.quote_id)" class="button is-small is-danger"><i class="fa fa-times"></i></button>
                                    </div>  
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div v-if="cartItems[0] && isShow"  class="field is-grouped">
                            <p class="control">
                                <button @click="$emit('next', 0)" class="button is-danger">
                                    <span class="icon is-small">
                                        <i class="fa fa-times"></i>
                                    </span>
                                    <span v-if="currentLanguage == 'en'">Cancel</span>
                                    <span v-else>বাতিল করুন</span>
                                </button>
                            </p>
                            <p class="control">
                                <button @click="$emit('next', 1)" class="button is-success">
                                    <span class="icon is-small">
                                        <i class="fa fa-cart-arrow-down"></i>
                                    </span>
                                    <span v-if="currentLanguage == 'en'">Checkout</span>
                                    <span v-else>অর্ডার তৈরি করুন</span>
                                </button>
                            </p>
                    </div>
                    </div>
                </div> <!-- end of .card -->
            </div>
        </div>
        
    </div>
    
</template>

<script>
    export default {
        name: "cartItem",
        props:['cartItems', 'button'],
        data() {
            return {
               items: _.cloneDeep(this.cartItems),
               isShow: _.cloneDeep(this.button),
               qtyDisabled: true,
               prcDisable: true,
               currentLanguage:'en'
            }
        },
        created() {
             this.currentLanguage = location.href.split('/')[3]
        },
        
    }
</script>

<style>
    .cart-container{
        background-color: #fff;
    }
</style>