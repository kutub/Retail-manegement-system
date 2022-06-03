<template>
    <section>
        <div class="card m-t-15">
            <header class="card-header" style="background-color:#00d1b2">
                <h1 style="color:#fff; font-size:20px" class="card-header-title has-text-centered">Add New Item</h1>
            </header>
            <b-loading :is-full-page="isFullPage" v-model="isLoading" :can-cancel="true"></b-loading>
            <div class="card-content" style="background-color:#e8e8e8">
                <b-steps
                    v-model="activeStep"
                    :animated="isAnimated"
                    :has-navigation="hasNavigation"
                    :icon-prev="prevIcon"
                    :icon-next="nextIcon">
                    <b-step-item label="Item Info" :clickable="isStepsClickable">
                        
                        <div class="card m-t-20">
                            <header class="card-header">
                                <h1 class="card-header-title has-text-centered">Item Information <span style="font-size:12px; padding:5px 0 0 5px"> (Fields in red are required)</span></h1>
                            </header>
                            <div class="card-content">
                                <template>
                                    <section>
                                        <div class="field is-horizontal">
                                            <div class="field-body">
                                                
                                                <b-field label="Brand name"
                                                    type="is-danger"
                                                    :message="error">
                                                    <b-input type="text" v-model="fields.name" placeholder="Brand name">
                                                    </b-input>
                                                </b-field>

                                                <b-field label="Generic name"
                                                    type="is-danger"
                                                    :message="error">
                                                    <b-input type="text" v-model="fields.generic" placeholder="Generic name">
                                                    </b-input>
                                                </b-field>
                                                
                                                <b-field
                                                    label="Pick a category"
                                                    type="is-danger"
                                                    message="">
                                                    <b-select v-model="fields.category_id" placeholder="Select a character" expanded>
                                                        <option
                                                            v-for="(option, key) in categories"
                                                            :value="key"
                                                            :key="key">
                                                             {{ option }}
                                                        </option>
                                                    </b-select>
                                                </b-field>

                                                <b-field label="Pick a supplier" type="is-danger">
                                                    <b-select v-model="fields.supplier_id" placeholder="Select a character" expanded>
                                                        <option
                                                            v-for="(option, key) in suppliers"
                                                            :value="key"
                                                            :key="key">
                                                             {{ option }}
                                                        </option>
                                                    </b-select>
                                                </b-field>

                                            </div>
                                        </div>

                                        <div class="field is-horizontal">
                                            <div class="field-body">
                                                
                                                <b-field label="UPC/EAN/ISBN">
                                                    <b-input type="text" v-model="fields.upc_ean_isbn" placeholder="UPC/EAN/ISBN: e.g B00005N5PF">
                                                    </b-input>
                                                </b-field>

                                                <b-field label="Product ID">
                                                    <b-input type="text" v-model="fields.product_id" placeholder="Product ID: e.g 4011200296908">
                                                    </b-input>
                                                </b-field>

                                                <b-field label="Additional Item Numbers">
                                                    <b-input type="text" v-model="fields.additional_item_no" placeholder="Additional Item Numbers">
                                                    </b-input>
                                                </b-field>

                                            </div>
                                        </div>

                                        <div class="field is-horizontal">
                                            <div class="field-body">
                                                
                                                <b-field label="Add tags">
                                                    <b-taginput
                                                        v-model="fields.tags"
                                                        ellipsis
                                                        icon="label"
                                                        placeholder="Add a tag">
                                                    </b-taginput>
                                                </b-field>

                                                <b-field label="Manufacturer">
                                                    <b-input v-model="fields.manufacturer"  placeholder="e.g. Unitech"> </b-input>
                                                </b-field>

                                            </div>
                                        </div>
                                        <b-field label="Description">
                                            <b-input v-model="fields.description" type="textarea"></b-input>
                                        </b-field>

                                        <div class="field is-horizontal">
                                            <div class="field-body">
                                                
                                                 <b-checkbox v-model="fields.is_service">
                                                    Is Service
                                                </b-checkbox>

                                                <b-checkbox v-model="fields.allow_alt_description"> 
                                                    Allow Alt Description
                                                </b-checkbox>

                                                <b-checkbox v-model="fields.item_has_serial_number">
                                                    Item Has Serial Number
                                                </b-checkbox>

                                                <b-checkbox v-model="fields.disable_loyalty">
                                                    Disable Loyalty
                                                </b-checkbox>

                                            </div>
                                        </div>

                                        <div class="field is-horizontal">
                                            <div class="field-body">
                                                
                                                <b-field label="Brand">
                                                    <b-input type="text" v-model="fields.brand"> 
                                                    </b-input>
                                                </b-field>

                                                <b-field label="Year">
                                                    <b-input type="text" v-model="fields.year">
                                                    </b-input>
                                                </b-field>

                                                <b-field label="Parts Number">
                                                    <b-input type="text" v-model="fields.parts_no">
                                                    </b-input>
                                                </b-field>

                                            </div>
                                        </div>
                                    </section>
                                </template>

                            </div>
                            <footer class="p-b-20 m-r-20">
                                <div class="field is-grouped is-grouped-right">
                                    <p class="control">
                                        <a @click="checkUniqe(fields, 'item')"  class="button is-success">
                                        Save
                                        </a>
                                    </p>
                                    <p class="control">
                                        <a @click="onSkip()" class="button is-danger">
                                        Skip
                                        </a>
                                    </p>
                                </div>

                            </footer>
                        </div>

                    </b-step-item>

                    <b-step-item label="Variation" :clickable="isStepsClickable" :type="{'is-success': isProfileSuccess}">
                        <div class="card m-t-20">
                            <header class="card-header">
                                <h1 class="card-header-title has-text-centered"> Variations <span style="font-size:12px; padding:5px 0 0 5px"> (Fields in red are required)</span></h1>
                            </header>
                            <div class="card-content">
                                <template>
                                    <section>
                                        <b-field horizontal label="Item Attributes:">
                                            <b-select @click="onGetAttibute()" placeholder="Select an Attributes" expanded>
                                                <option v-for="(option, key) in attributes"
                                                            :value="key"
                                                            :key="key" @click="onAddAttribute(key)">{{option}}</option>
                                            </b-select>
                                        </b-field>
                                        <div class="field is-horizontal" v-if="isAttribute">
                                            <div class="field-label is-normal">
                                                <label class="label"></label>
                                            </div>
                                            <div class="field-body">
                                                <table id="attributes" class="table is-narrow is-fullwidth">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Values</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <tr v-for="(attr, index) in attributesList" :key="index">
                                                            <td>{{attr.name}}</td>
                                                            <td>
                                                                <b-taginput
                                                                    :value="attr.attribute.split(',')"
                                                                    ellipsis
                                                                    icon="label"
                                                                    placeholder="Add a tag">
                                                                </b-taginput>
                                                            </td>
                                                            <td>
                                                                <b-button @click="onAttributeDelete(index)">Delete</b-button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
           
                                        <div class="field is-horizontal">
                                            <div class="field-label is-normal">
                                                <label class="label">Item Variations:</label>
                                            </div>
                                            <div class="field-body">
                                                <table id="item_variations" class="table is-narrow is-fullwidth">
                                        
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Attributes</th>
                                                            <th>Item Number</th>
                                                            <th>Variation ID</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <tr  v-for="(variation, index) in variations" :key="index">
                                                            <td>
                                                                <b-field>
                                                                    <b-input type="text" v-model="variation.name"></b-input>
                                                                </b-field>
                                                            </td>
                                                            <td>
                                                                <b-field>
                                                                    <b-input type="text" v-model="variation.attribute"></b-input>
                                                                </b-field>
                                                            </td>
                                                            <td>
                                                                <b-field>
                                                                    <b-input type="text" v-model="variation.item_no"></b-input>
                                                                </b-field>
                                                            </td>
                                                            <td>
                                                                <b-field>
                                                                    <b-input type="text" v-model="variation.variation_id"></b-input>
                                                                </b-field>
                                                            </td>
                                                            <td>
                                                                <b-field>
                                                                        <b-button @click="onVariationDelete(index)">Delete</b-button>
                                                                </b-field>
                                                            </td>
                                                            <td>
                                                                <b-button @click="onAddVariation(variation = {})">
                                                                    Add Variation
                                                                </b-button>
                                                            </td>
                                                        </tr>
                                                        <tr v-if="isVariation">
                                                            <td>
                                                                <b-button @click="onAddVariation(variation)">
                                                                    Add Item Variation
                                                                </b-button>
                                                            </td>
                                                        </tr>
                                                    </tbody>                    
                                                </table>
                                            </div>
                                        </div>                                                                                
                                    </section>
                                </template>

                            </div>
                            <footer class="p-b-20 m-r-20">
                                <div class="field is-grouped is-grouped-right">
                                    <p class="control">
                                        <a @click="checkUniqe(fields, 'variation')"  class="button is-success">
                                        Save
                                        </a>
                                    </p>
                                    <p class="control">
                                        <a @click="onSkip()" class="button is-danger">
                                        Skip
                                        </a>
                                    </p>
                                </div>

                            </footer>
                        </div>
                    </b-step-item>

                    <b-step-item  label="Pricing" :clickable="isStepsClickable">
                        <div class="card m-t-20">
                            <header class="card-header">
                                <h1 class="card-header-title has-text-centered">Pricing <span style="font-size:12px; padding:5px 0 0 5px"> (Fields in red are required) </span></h1>
                            </header>
                            <div class="card-content">
                                <template>
                                    <section>
                                        <div class="field is-horizontal">
                                           
                                            <div class="field-body">
                                                 <b-field label="Cost Price (Without Tax)" type="is-danger">
                                                    <b-input type="text" v-model="fields.cost_price" autofocus required></b-input>
                                                </b-field>
                                                <b-field label="Selling Price" type="is-danger">
                                                    <b-input type="text" v-model="fields.selling_price" required></b-input>
                                                </b-field>
                                            </div>
                                        </div>
           
                                        <b-field label="Promo Price">
                                            <b-input type="text" v-model="fields.promo_price" ></b-input>
                                        </b-field>

                                        <div class="field is-horizontal">
                                           
                                            <div class="field-body">
                                                <b-field label="Promo Start Date">
                                                    <b-datepicker
                                                        placeholder="Click to select..."
                                                        v-model="fields.start"
                                                        editable>
                                                    </b-datepicker>
                                                </b-field>
                                                <b-field label="Promo End Date">
                                                    <b-datepicker
                                                        placeholder="Click to select..."
                                                        v-model="fields.end"
                                                        editable>
                                                    </b-datepicker>
                                                </b-field>
                                            </div>
                                        </div>
                                        <div class="block m-t-30">
                                            <b-checkbox  v-model="fields.include_tax">
                                                Prices Include Tax
                                            </b-checkbox>
                                            <b-checkbox class="m-l-10" v-model="fields.change_price">
                                                Change Cost Price During Sale
                                            </b-checkbox>
                                            <b-checkbox class="m-l-10" v-model="fields.override_commission">
                                                Override Default Commission
                                            </b-checkbox>
                                            <b-checkbox class="m-l-10" v-model="fields.override_tax">
                                                Override Default Tax
                                            </b-checkbox>
                                        </div>
                                    </section>
                                </template>

                            </div>
                            <footer class="p-b-20 m-r-20">
                                <div class="field is-grouped is-grouped-right">
                                    <p class="control">
                                        <a @click="checkUniqe(fields, 'pricing')"  class="button is-success">
                                        Save
                                        </a>
                                    </p>
                                    <p class="control">
                                        <a @click="onSkip()" class="button is-danger">
                                        Skip
                                        </a>
                                    </p>
                                </div>

                            </footer>
                        </div>
                    </b-step-item>

                    <b-step-item  label="Inventory" :clickable="isStepsClickable">
                        <div class="card m-t-20">
                            <header class="card-header">
                                <h1 class="card-header-title has-text-centered">Inventory <span style="font-size:12px; padding:5px 0 0 5px"> (Fields in red are required)</span></h1>
                            </header>
                            <div class="card-content">
                                <template>
                                    <section>
                                        <b-field horizontal label="Reorder Level:">
                                            <b-input v-model="fields.reorder_level" placeholder="Reorder Level" type="text"></b-input>
                                        </b-field>

                                        <b-field horizontal label="Replenish Level:">
                                            <b-input v-model="fields.replenish_level" placeholder="Replenish Level" type="text"></b-input>
                                        </b-field>

                                        <b-field horizontal label="Days To Expiration:">
                                            <b-datepicker
                                                placeholder="Click to select..."
                                                v-model="fields.expiration_date"
                                                editable>
                                            </b-datepicker>
                                        </b-field>

                                        <b-field horizontal label="Current Quantity:" type="is-danger">
                                            <b-input placeholder="Quantity" type="text" v-model="fields.quantity"></b-input>
                                        </b-field>

                                        <b-field  horizontal label="Inventory To Add/Subtract:">
                                            <b-input placeholder="Inventory To Add/Subtract:" type="text" v-model="fields.inventory_add_subs"></b-input>
                                        </b-field>

                                        <b-field horizontal label="Comments:">
                                            <b-input type="textarea"
                                                maxlength="200"
                                                v-model="fields.comments"
                                                placeholder="Type comment here...">
                                            </b-input>
                                        </b-field>
                                    </section>
                                </template>

                            </div>
                            <footer class="p-b-20 m-r-20">
                                <div class="field is-grouped is-grouped-right">
                                    <p class="control">
                                        <a @click="checkUniqe(fields, 'inventory')"  class="button is-success">
                                        Save
                                        </a>
                                    </p>
                                    <p class="control">
                                        <a @click="onSkip()" class="button is-danger">
                                        Skip
                                        </a>
                                    </p>
                                </div>

                            </footer>
                        </div>
                    </b-step-item>

                    <b-step-item  label="Images" :clickable="isStepsClickable">
                        <div class="card m-t-20">
                            <header class="card-header">
                                <h1 class="card-header-title has-text-centered"> Upload Images <span style="font-size:12px; padding:5px 0 0 5px"> (Fields in red are required) </span></h1>
                            </header>
                            <div class="card-content has-text-centered">
                                <template>
                                    <section>
                                        <drop-zone :options="dropzoneOption" id="dz" ref="dropzone"></drop-zone>
                                    </section>
                                </template>

                            </div>
                            <footer class="p-b-20 m-r-20">
                                <div class="field is-grouped is-grouped-right">
                                    <p class="control">
                                        <a @click="checkUniqe(fields, 'image')"  class="button is-success">
                                        Save
                                        </a>
                                    </p>
                                    <p @click="onSkip()" class="control">
                                        <a class="button is-danger">
                                        Skip
                                        </a>
                                    </p>
                                </div>

                            </footer>
                        </div>
                    </b-step-item>

                    <b-step-item label="Locations" :clickable="isStepsClickable" disabled>
                        <div class="card m-t-20">
                            <header class="card-header">
                                <h1 class="card-header-title has-text-centered">Location Information <span style="font-size:12px; padding:5px 0 0 5px"> (Fields in red are required)</span></h1>
                            </header>
                            <div class="card-content">
                                <template>
                                    <section>
                                        <b-field horizontal label="Location At Store:">
                                            <b-input v-model="fields.at_store" placeholder="Location At Store" type="text"></b-input>
                                        </b-field>

                                        <b-field horizontal label="Reorder Level:">
                                            <b-input v-model="fields.reorder_level" placeholder="Reorder Level" type="text"></b-input>
                                        </b-field>

                                        <b-field horizontal label="Replenish Level:">
                                            <b-input v-model="fields.replenish_level" placeholder="Replenish Level" type="text"></b-input>
                                        </b-field>
                                        <b-field horizontal label="Override Prices:">
                                             <b-checkbox v-model="fields.override_prices"></b-checkbox>
                                        </b-field>
                                        <b-field horizontal label="Override Default Tax:">
                                             <b-checkbox v-model="fields.override_tax"></b-checkbox>
                                        </b-field>
                                    </section>
                                </template>

                            </div>
                            <footer class="p-b-20 m-r-20">
                                <div class="field is-grouped is-grouped-right">
                                    <p class="control">
                                        <a @click="checkUniqe(fields, 'location')"  class="button is-success">
                                        Submit
                                        </a>
                                    </p>
                                    <p class="control">
                                        <a @click="onSkip()" class="button is-danger">
                                        Skip
                                        </a>
                                    </p>
                                </div>

                            </footer>
                        </div>
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

    import vue2Dropzone from 'vue2-dropzone';
    import 'vue2-dropzone/dist/vue2Dropzone.min.css';

    export default {
        components:{
            dropZone:vue2Dropzone
        },
        data() {
            return {
                dropzoneOption:{
                    url:'/en/home/items/add-image',
                    thumbnailWidth:200,
                    headers: {
                        'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
                    },
                    success(file, res) {
                        file.filename = res;
                    }
                },
                activeStep: 0,
                showSocial: false,
                isAnimated: true,
                hasNavigation: true,
                customNavigation: true,
                prevIcon: 'chevron-left',
                nextIcon: 'chevron-right',
                isStepsClickable: true,
                isProfileSuccess: true,
                suppliers: [],
                selected: null,
                categories: [],
                tags: [],
                dropFiles: [],
                isItemUnique: true,
                error:'',
                fields:{ 
                    cost_price: null,
                    selling_price:null,
                    quantity: null
                },
                edited: false,
                isVariation: true,
                variation: {
                    name: '',
                    attribute:'',
                    item_no:'',
                    variation_id:''
                },
                variations: [],
                isAttribute: false,
                attributes:[],
                attributesList:[],
                attributesItem: [1, 2],
                itemId:'',
                isLoading: true,
                isFullPage: true,
            }
        },
        computed: {
        },
        created(){
            axios.get('/en/home/items/categories')
                .then((response) => {
                    this.categories = response.data;
                }).catch((error) => {
                    console.log(error);
                });
            axios.get('/en/home/items/suppliers')
                .then((response) => {
                    this.suppliers = response.data;
                }).catch((error) => {
                    console.log(error);
                });
        },
        methods: {
            deleteDropFile(index) {
                this.dropFiles.splice(index, 1)
            },
            
            checkUniqe(data, model){
                console.log(data);
                const loadingComponent = this.$buefy.loading.open({
                    container: this.isFullPage ? null : this.$refs.element.$el
                })
                if(this.edited == false && model == 'item'){
                    axios.get('/en/home/items/unique', {
                    params: {
                        name: data.name
                    }
                    }).then((response) => {
                        console.log(response.data)
                        if(response.data == false){
                            this.error = 'Item Name Must be unique';
                        }else{
                            axios({
                                method: 'post',
                                url:'/en/home/items',
                                data: data,
                                params: {
                                    model: model
                                }
                                })
                                .then((response) => {
                                    this.$buefy.toast.open({
                                        message: 'Item Information Added correctly!',
                                        type: 'is-success',
                                        duration: 5000,
                                    })
                                    this.activeStep = this.activeStep + 1;
                                    this.edited = true;
                                    this.onGetAttibute();
                                    console.log(response.data);
                                    this.itemId = response.data;
                                    loadingComponent.close()
                                }, (error) => {
                                    console.log(error);
                            });
                        }
                    }).catch((error) => {
                        console.log(error);
                    });
                }else if(model != 'item' && model == 'variation') {
                    const loadingComponent = this.$buefy.loading.open({
                        container: this.isFullPage ? null : this.$refs.element.$el
                    })
                    axios({
                            method: 'post',
                            url:'/en/home/items',
                            data: this.attributesItem,
                            params: {
                                model: model,
                                id: this.itemId
                            }
                            })
                            .then((response) => {
                                this.$buefy.toast.open({
                                    message: `Item ${model} Added correctly!`,
                                    type: 'is-success',
                                    duration: 5000,
                                })
                                this.activeStep = this.activeStep + 1;
                                loadingComponent.close()
                            }, (error) => {
                                console.log(error);
                        });
                } else if(model != 'item' && model == 'pricing' || model == 'inventory' || model == 'location' || model == 'image'){
                    data.items_id = this.itemId || 23;
                    let files = this.$refs.dropzone.getAcceptedFiles();
                    if (files.length > 0 && files[0].filename) {
                        data.image = files[0].filename;
                    }
                    
                    var validate = true; 
                    if(model == 'pricing'){
                        validate = data.cost_price != null && data.selling_price != null ? true : false;
                    }else if(model == 'inventory'){
                        validate = data.quantity != null ? true : false;
                    }
                    if(validate){
                     
                        axios({
                            method: 'post',
                            url:'/en/home/items',
                            data: data,
                            params: {
                                model: model,
                            }
                            })
                            .then((response) => {
                                this.$buefy.toast.open({
                                    message: `Item ${model} Added correctly!`,
                                    type: 'is-success',
                                    duration: 5000,
                                })
                                if (model == 'location') {
                                    location.href = '/en/home/product';
                                }else{
                                    this.activeStep = this.activeStep + 1;
                                }
                                loadingComponent.close()
                                console.log(response.data);
                            }, (error) => {
                                console.log(error);
                        });
                    }
                    
                } 
                else{
                    console.log('data editable')
                }
                
            },
            onAddVariation(data){
                this.isVariation = false;
                this.variations.push(data);
                console.log(this.variations);
            },
            onGetAttibute(){
                axios.get('/en/home/items/attributes')
                .then((response) => {
                    this.attributes = response.data;
                    console.log(this.attributes);
                }).catch((error) => {
                    console.log(error);
                });
            },
            onAddAttribute(id){
                console.log(id);
                this.isAttribute = true;
                axios.get('/en/home/items/attribute/'+id)
                .then((response) => {
                    this.attributesList.push(response.data);
                }).catch((error) => {
                    console.log(error);
                });
            },
            onAttributeDelete(index){
                this.attributesList.splice(index, 1);
            },
            onVariationDelete(index){
                this.variations.splice(index, 1);
            },
            onSkip(){
                if (this.activeStep == 5) {
                    location.href = '/en/home/product';
                } else {
                    this.activeStep = this.activeStep + 1;
                }
            }
        }
    }
</script>
