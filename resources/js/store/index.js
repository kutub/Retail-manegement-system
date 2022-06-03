import Vue from 'vue';
import Vuex from 'vuex';

import axios from 'axios';

import todos from './modules/products';
import orders from './modules/orders';
Vue.use(Vuex);


export default new Vuex.Store({
    modules:{
        todos,
        orders
    },
    state: {
        // todos: [],
    },
    getters: {

    },
    actions:{
        // fetchTodos(context){
        //    return axios.get(BASE_URL)
        //         .then(res => {
        //             const todos = res.data;
        //             context.commit('setTodos', todos)
        //         })
        //     }
    },
    mutations:{
        setTodos(state, todos){
            // state.todos = todos;
            Vue.set(state, 'todos', todos);
        }
    }
})