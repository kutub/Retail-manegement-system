<template>
    <section>
        <b-loading :is-full-page="isFullPage" v-model="isLoading" :can-cancel="true"></b-loading>
        <b-field grouped group-multiline>
            <div class="control">
                <b-switch v-model="showDetailIcon">{{data}}</b-switch>
            </div>
        </b-field>

       <b-table
                                    :data="data.data"
                                    ref="table"
                                    detailed
                                    :paginated="isPaginated"
                                    :per-page="perPage"
                                    :current-page.sync="currentPage"
                                    :pagination-simple="isPaginationSimple"
                                    :pagination-position="paginationPosition"
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
                                            field="name"
                                            :visible="columnsVisible['name'].display"
                                            :label="columnsVisible['name'].title"
                                            sortable
                                            centered
                                        >
                                          <template v-if="props.row.name">
                                                {{ props.row.name }}
                                            </template>
                                            <template v-else>
                                               {{ 'Unknown' }}
                                            </template>
                                            
                                        </b-table-column>
                                        <b-table-column
                                            field="generic"
                                            :visible="columnsVisible['generic'].display"
                                            :label="columnsVisible['generic'].title"
                                            sortable
                                            centered
                                        >
                                            {{ props.row.generic }}
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

    </section>
</template>

<script>
    // const data = require('@/data/sample.json')
    import { mapState } from 'vuex'
    export default {
        data() {
            return {
                defaultOpenedDetails: [1],
                showDetailIcon: true,
                columnsVisible: {
                    id: { title: 'Order Id', display: true },
                    name: { title: 'Brand Name', display: true },
                    generic: { title: 'Generic Name', display: true },
                    payment: { title: 'Payment', display: true },
                    due: { title: 'Due', display: true },
                    created_at: { title: 'Created At', display: true },
                    // name: { title: 'Name', display: true },
                    quantity: { title: 'Quantity', display: true },
                    unit: { title: 'Unite Price', display: true },
                    detail: { title: 'Detail', display: true },
                    status: { title: 'Status', display: true },
                    action: { title: 'Action', display: true },
                },
                showDetailIcon: true,
                isLoading: false,
                isFullPage: true,
                isPaginated: true,
                isPaginationSimple: false,
                isPaginationRounded: false,
                paginationPosition: 'bottom',
                defaultSortDirection: 'asc',
                sortIcon: 'arrow-up',
                sortIconSize: 'is-small',
                currentPage: 1,
                perPage: 5
            }   
        },
        created() {
            this.currentLanguage = location.href.split('/')[3]
            const loadingComponent = this.$buefy.loading.open({
                container: this.isFullPage ? null : this.$refs.element.$el
            })
            this.$store.dispatch('todos/fetchTodos', 1)
            .then(() => loadingComponent.close())
        },
        computed: mapState({
            data: state => state.todos.items
        }),
    }
</script>
