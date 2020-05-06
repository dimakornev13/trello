require('bootstrap');

import moment from "moment";
import Vue from 'vue';

window.$ = require('jquery');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

Vue.filter('date', (value) => {
    if (!value)
        return;

    return moment(String(value)).format('MM/DD/YYYY hh:mm')
})
