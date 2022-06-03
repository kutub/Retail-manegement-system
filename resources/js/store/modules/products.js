
import axios from 'axios';


const BASE_URL = '/api/items';

export default {
    namespaced:true,
    state:{
        items:[],
        item:{}
    },
    getters:{
        items: state => state.items,
        isLoaded: state => !!state.items.length
    },
    actions:{
        fetchTodos({commit, state}, page){
            return axios.get(`${BASE_URL}?page=${page}`, {
                headers: {
                    'Content-Type': 'application/json',
                }})

                .then(res => {
                    var todos = res.data;
                    commit('setTodos', todos);
                    return state.items;
                })
                .catch(err => {
                    alert(err.message)
                })
        },
        fetchTodoById({commit, state}, todoId){
            commit('setTodo', {});
            return axios.get(`${BASE_URL}/${todoId}`)
                .then(res => {
                    const todo = res.data;
                    commit('setTodo', todo);
                    return state.item;
                })
        }
    },
    mutations:{
        setTodos(state, todos){
            // state.todos = todos;
            Vue.set(state, 'items', todos);
        },
        setTodo(state, todo){
            // state.todos = todos;
            Vue.set(state, 'item', todo);
        }
    }
}