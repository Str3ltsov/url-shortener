<script>
export default {
    name: "InputText",
    props: {
        label: String,
        name: String,
        id: String,
        placeholder: String,
    },
};
</script>

<template>
    <div class="section-form-input-container">
        <label :for="id" class="section-form-label">{{ label }}</label>
        <input
            type="text"
            class="section-form-text"
            :name="name"
            :id="id"
            :placeholder="placeholder"
        />
    </div>
</template>

<style scoped>
.section-form-input-container {
    width: inherit;
    display: flex;
    flex-direction: column;
    gap: 12px;

    .section-form-label {
        font-size: 0.95rem;
        text-shadow: 2.5px 2.5px var(--text-shadow-color);
    }

    .section-form-text {
        height: 2.5rem;
        padding-inline: 12px;
        background-color: var(--input-background-color);
        color: var(--secondary-color);
        border: none;
        outline: none;
        box-shadow: 4px 4px var(--box-shadow-color);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        transition: all 300ms ease;
        opacity: 0.7;

        &:hover,
        &:focus {
            opacity: 1;
        }
    }
}
</style>
