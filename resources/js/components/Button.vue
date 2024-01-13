<script>
export default {
    name: "Button",
    props: {
        name: String,
        icon: String,
    },
};
</script>

<template>
    <div class="section-form-button-container">
        <button type="button" class="section-form-submit-button">
            <font-awesome-icon :icon="icon" class="button-icon" />
            {{ name }}
        </button>
    </div>
</template>

<style scoped>
.section-form-button-container {
    display: flex;
    justify-content: center;
    width: inherit;

    .section-form-submit-button {
        height: 2.7rem;
        padding-inline: 20px;
        background-color: var(--button-color);
        color: var(--secondary-color);
        font-size: 1rem;
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

        .button-icon {
            font-size: 1.1rem;
            filter: invert(100%) saturate(0%);
        }
    }
}
</style>
