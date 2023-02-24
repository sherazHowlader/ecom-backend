<template>
    <the-slider></the-slider>
<!--    <featured-categories></featured-categories>-->
    <trending-product></trending-product>

</template>

<script>
import theSlider from "../TheSlider.vue";
import featuredCategories from "../home/featured-categories.vue";
import trendingProduct from "../home/trending-product.vue";

export default {
    name: "home-page",

    components:{
        theSlider,
        featuredCategories,
        trendingProduct,
    }
}
</script>

<style scoped>

</style>
