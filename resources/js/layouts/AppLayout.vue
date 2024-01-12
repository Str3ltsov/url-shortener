<script setup></script>

<template>
    <main class="container">
        <slot />
    </main>
</template>

<style>
.container {
    display: flex;
    flex-direction: column;
    align-items: center;
}
</style>
