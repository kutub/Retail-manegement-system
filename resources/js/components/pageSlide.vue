<template>

    <section style="margin-top:20px">
        <a class="btn transparent" @click="isItemModalActive = true" id="sign-up-btn" style="padding: 10px 15px; margin-left:10px">
            Item List
        </a>
        <a class="btn transparent" @click="isFeatureModalActive = true"  id="sign-up-btn" style="padding: 10px 15px; margin-left:5px">
            Features List
        </a>
        <b-modal :active.sync="isItemModalActive"
            :destroy-on-hide="true"
            aria-role="dialog"
            aria-modal>
            <modal-form></modal-form>
        </b-modal>
            <b-modal :active.sync="isFeatureModalActive"
            :destroy-on-hide="true"
            aria-role="dialog"
            aria-modal>
            <div class="content is-normal" style="background-color:#fff; padding:40px">
                <h2>Features List</h2>
                
                <ul style="text-align:left">
                    <li>Report Generation, Save, Email  & Print</li>
                    <li>Graphical Representation of Reports</li>
                    <li>Remote Monitoring</li>
                    <li>Cloud Based, Global Access</li>
                    <li>Security Ensured</li>
                    <li>Multiple User access</li>
                    <li>Super Admin Features</li>
                    <li>History</li>
                    <li>Sales, Customers and  Product Information</li>
                    <li>Edit Option</li> 
                    <li>Categorical  Representation  </li>
                </ul>
            </div>
        </b-modal>
       
    </section>
</template>

<script>
    import debounce from 'lodash/debounce';
    const ModalForm = {
        template: `
              <div class="content is-normal" style="background-color:#fff; padding:40px">
                <h2>Item List</h2>
                
                <ul style="text-align:left">
                    <li>Home</li>
                    <li>Dash Board</li>
                    <li>Management Items 
                        <ul>
                            <li>Sales</li>
                            <li>Accounts</li>
                            <li>Inventory</li>
                            <li>Customers</li>
                            <li>Suppliers</li>
                        </ul>
                    </li>
                    <li>Classified</li>
                    <li>Navigation Menu</li>
                    
                </ul>
            </div>
        `
    }

    export default {
        name:'customer',
        components: {
            ModalForm
        },
        data() {
            return {
                isItemModalActive: false,
                isFeatureModalActive: false
                
            }
        },
        
    }
</script>