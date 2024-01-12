<script>
import AppLayout from "../layouts/AppLayout.vue";

export default {
    name: "UrlShortener",
    components: {
        AppLayout,
    },
};
</script>

<template>
    <AppLayout>
        <div class="information">
            <h1 class="information-title">URL Shortener</h1>
            <p class="information-description">
                Generate a short url from your url.
            </p>
        </div>
    </AppLayout>
</template>

<style scoped>
.information {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: 6px;

    .information-title {
        font-size: 2.4rem;
        text-shadow: 4px 4px var(--box-shadow-color);
    }

    .information-description {
        font-size: 1.2rem;
        text-shadow: 3px 3px var(--box-shadow-color);
    }
}
</style>
