<template>
    <the-header></the-header>
        <h3 class="text-center" v-if="isAuthenticated"> Your Are Logged In </h3>
        <h3 class="text-center" v-else> Please Login for full access </h3>
        <router-view></router-view>
    <the-footer></the-footer>
</template>

<script>
import TheHeader from "./components/TheHeader.vue";
import TheFooter from "./components/TheFooter.vue";
import {mapActions, mapGetters} from "vuex";

export default {
    name: "App",
    components:{
        TheHeader,TheFooter,
    },
    computed: {
        ...mapGetters({
            isAuthenticated: 'isAuthenticated',
        })
    },
}
</script>
