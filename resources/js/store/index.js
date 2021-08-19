import Vue from 'vue'
import Vuex from 'vuex'

import moduleAuth from './modules/auth'
import moduleProduct from './modules/product'

Vue.use(Vuex);

const store = new Vuex.Store({
    modules: {
        moduleAuth,
        moduleProduct,
    }
});

export default store;
