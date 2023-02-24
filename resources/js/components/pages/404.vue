<template>
    <div class="error-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="error-content">
                        <h1>404</h1>
                        <h2>Oops! Page Not Found!</h2>
                        <p>The page you are looking for does not exist. It might have been moved or deleted.</p>
                        <div class="button">
                            <router-link :to="{name: 'home'}" class="btn"> Back to Home </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "404"
}
</script>
