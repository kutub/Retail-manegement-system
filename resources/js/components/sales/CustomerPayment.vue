<template>
    <section>
        <b-field label="Find a Customer">
            <b-autocomplete
                :data="data"
                placeholder="Find a Customer"
                field="title"
                :loading="isFetching"
                @typing="getAsyncData"
                @select="option => selected = option">

                <template slot-scope="props" >
                    <div class="media" @click="$emit('get-id', props.option)">
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
            </b-autocomplete>
        </b-field>
        <template class="content"  v-if="selected">
            <div class="media" :style="{backgroundColor:'#fff',padding:'10px'}">
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
        </template>
    </section>
</template>

<script>
    import debounce from 'lodash/debounce'

    export default {
        data() {
            return {
                data: [],
                selected: null,
                isFetching: false
            }
        },
        methods: {
            // You have to install and import debounce to use it,
            // it's not mandatory though.
            getAsyncData: debounce(function (name) {
                this.isFetching = true;
                if (!name.length) {
                    this.data = []
                    
                    return
                }
                this.isFetching = true
                axios.get(`/api/find-customer/${name}`)
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
            }, 500)
        }
    }
</script>