
import axios from 'axios';


// const BASE_URL = '//medis.com';

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
        saveQuote({commit, state}, quote){
            return axios.post(`/api/quote`, quote)
                .then(res => {
                    const quote = res
                    commit('saveQuote', quote)
                    return state.quote
                })
        },
        updateQuote({commit, state}, quoteId, data){
            return axios.put(`/api/quote/${quoteId}`, data)
            .then(res => {
                const quote = res
                // commit('saveQuote', quote)
                return state.quote
            })
        },
        updateQuantity({commit, state}, quoteId, data){
            return axios.put(`/api/quote/${quoteId}`, data)
            .then(res => {
                const quote = res
                // commit('saveQuote', quote)
                return state.quote
            })
        },
        updatePrice({commit, state}, quoteId, data){
            return axios.put(`/api/quote/${quoteId}`, data)
            .then(res => {
                const quote = res
                // commit('saveQuote', quote)
                return state.quote
            })
        },
        deleteQuote({commit, state}, id, data){
            return axios.delete(`/api/quote/${id}`, data)
            .then(res => {
                const quote = res
                commit('deleteQuote', quote)
                return state.quote
            })
        }
    },
    mutations:{
        saveQuote(state, quote){
            return state.quote = quote
        },
        deleteQuote(state, quote){
            return state.quote = quote
        }
    }
}