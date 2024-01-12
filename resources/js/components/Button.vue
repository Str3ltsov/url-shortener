<script>
export default {
    name: "Button",
    props: {
        name: String,
    },
};
</script>

<template>
    <div class="section-form-button-container">
        <button type="button" class="section-form-submit-button">
            {{ name }}
        </button>
    </div>
</template>

<style scoped>
.section-form-button-container {
    display: flex;
    justify-content: center;
    width: inherit;
    padding-top: 20px;

    .section-form-submit-button {
        width: 130px;
        height: 45px;
        background-color: var(--button-color);
        color: var(--secondary-color);
        font-size: 0.95rem;
        font-weight: 600;
        border: none;
        box-shadow: 4px 4px var(--box-shadow-color);
        outline: none;
        transition: all 300ms ease;
        opacity: 0.8;

        &:hover,
        &:focus {
            opacity: 1;
        }

        @media (max-width: 520px) {
            width: 100%;
        }
    }
}
</style>
