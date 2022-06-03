<template>
    <section class="container is-fullhd">
        <div class="columns">
            <div class="column">
                <div class="card">
                    <div class="card-content">
                        <div class="content">
                            <div class="field has-addons expanded">
                                <p class="control is-expanded">
                                    <b-field label="Find a Customer">
                                        <b-autocomplete
                                            :data="data"
                                            placeholder="Type a name: e.g. emon.."
                                            field="title"
                                            :loading="isFetching"
                                            @typing="getAsyncData"
                                            @select="option => selected = option" expanded>

                                            <template slot-scope="props">
                                                <div class="media" @click="$emit('selected-customer', props.option)">
                                                    <div class="media-left">
                                                        <img v-if="props.option.image" width="32" :src="`/uploads/customer_images/${props.option.image}`">
                                                    </div>
                                                    <div class="media-content">
                                                        {{ props.option.name }}
                                                        <br>
                                                        <small>
                                                            Mobile: {{ props.option.mobile }},<br>
                                                            Address: <p>{{ props.option.address_1 }}</p>
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
                                <p class="control">
                                    <b-field label="New Customer">
                                        <a @click="isComponentModalActive = true" class="button is-primary "><i class="fa fa-user-plus m-r-10"></i> Add New</a>
                                    </b-field>
                                </p>
                            </div>
                            
                             <!-- <template class="content" >
                                <p><b>Customer:</b></p>
                                <div class="media">
                                    <div class="media-left">
                                        <img v-if="selected.image" width="32" :src="`/uploads/customer_images/${selected.image}`">
                                    </div>
                                    <div class="media-content">
                                        {{ selected.name }}
                                        <br>
                                        <small>
                                            Mobile: {{ selected.mobile }},<br>
                                            Address: {{ selected.address_1 }}
                                        </small>
                                    </div>
                                </div>
                            </template> -->
                            <div class="field is-grouped" v-if="isCheckout">
                                <p class="control">
                                    <button @click="$emit('next', 0)" class="button is-danger">
                                        <span class="icon is-small">
                                            <i class="fa fa-times"></i>
                                        </span>
                                        <span>Cancel</span>
                                    </button>
                                </p>
                                <p class="control">
                                    <button @click="$emit('next', 2)" class="button is-success">
                                        <span class="icon is-small">
                                            <i class="fa fa-cart-arrow-down"></i>
                                        </span>
                                        <span>Checkout</span>
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <b-modal :active.sync="isComponentModalActive"
                    has-modal-card
                    trap-focus
                    :destroy-on-hide="false"
                    aria-role="dialog"
                    aria-modal>
                    <modal-form :formFields="formFields" @add="addCustomer"></modal-form>
                </b-modal>
            </div>
        </div>
    </section>
</template>

<script>
    import debounce from 'lodash/debounce';
    const ModalForm = {
        props: ['formFields'],
        template: `
            <form @submit.prevent>
                <div class="modal-card" style="width: 500px">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Create New Customer</p>
                    </header>
                    <section class="modal-card-body">
                        <b-field label="First Name">
                            <b-input
                                type="text"
                                v-model="formFields.first_name"
                                placeholder="First Name"
                                required>
                            </b-input>
                        </b-field>

                        <b-field label="Last Name">
                            <b-input
                                type="text"
                                v-model="formFields.last_name"
                                placeholder="Last Name">
                            </b-input>
                        </b-field>

                        <b-field label="Mobile Number">
                            <b-input
                                type="text"
                                v-model="formFields.mobile"
                                placeholder="Mobile">
                            </b-input>
                        </b-field>

                        <b-field label="Address">
                            <b-input
                                type="text"
                                v-model="formFields.address_1"
                                placeholder="Address">
                            </b-input>
                        </b-field>
                        <b-field label="Balance">
                            <b-input
                                type="text"
                                v-model="formFields.balance"
                                placeholder="Store Balance">
                            </b-input>
                        </b-field>

                    </section>
                    <footer class="modal-card-foot">
                        <button class="button" type="button" @click="$parent.close()">Close</button>
                        <button class="button is-primary" @click="$emit('add', formFields), $parent.close()">Add Customer</button>
                    </footer>
                </div>
            </form>
        `
    }

    export default {
        name:'customer',
        components: {
            ModalForm
        },
        data() {
            return {
                data: [],
                selected: null,
                isFetching: false,
                isComponentModalActive: false,
                isCheckout:false,
                formFields: {
                    first_name: null,
                    last_name: null,
                    mobile: null, 
                    email: null,
                    image:null,
                    status:null,
                    city:null,
                    state:null,
                    country:null,
                    zip:null,
                    address_1:null,
                    address_2:null,
                    comments:null,
                    balance:null,
                    credit_limit:null,
                    account:null,
                    bkash_number:null,
                    amount_for_next_point:null,
                    test:null,
                    tier_name:null,
                    percentage:null,
                    points:null,
                    disable_loyalty:0,
                    override_tax:0,
                    taxable:1,
                },
                query:''
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
                axios.get(`/api/find-customer/${name}`)
                    .then(({ data }) => {
                        this.data = []
                        data.data.forEach((item) => this.data.push(item))
                        console.log(this.data)
                    })
                    .catch((error) => {
                        this.data = []
                        throw error
                    })
                    .finally(() => {
                        this.isFetching = false
                    })
            }, 500),
            addCustomer: function(fields){
                axios({
                    method: 'post',
                    url:'/api/add-customer',
                    data: fields,
                    })
                    .then((response) => {
                        this.selected = response.data.data;
                        this.$emit('selected-customer', this.selected);
                        this.$buefy.toast.open({
                            message: 'Customer Added correctly!',
                            type: 'is-success',
                            duration: 2000,
                        })
                    }, (error) => {
                        console.log(error);
                });
            }
        }
    }
</script>