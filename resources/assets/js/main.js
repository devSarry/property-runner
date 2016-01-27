var Vue = require('Vue');

Vue.use(require('vue-resource'));

import unitsPanel from './components/unitsPanel.vue';

//noinspection JSUnresolvedVariable
new Vue({
    el: '#app',

    components: { unitsPanel }
});