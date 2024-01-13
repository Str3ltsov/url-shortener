<script>
export default {
    name: "InputText",
    props: {
        label: String,
        name: String,
        id: String,
        placeholder: String,
        value: {
            default: "",
            type: String || Number,
        },
        disabled: {
            default: false,
            type: Boolean,
        },
    },
};
</script>

<template>
    <div class="input-text-container">
        <label :for="id" class="input-text-label">{{ label }}</label>
        <input
            type="text"
            class="input-text"
            :name="name"
            :id="id"
            :placeholder="placeholder"
            :value="value"
            :disabled="disabled"
        />
    </div>
</template>

<style scoped>
.input-text-container {
    width: inherit;
    display: flex;
    flex-direction: column;
    gap: 12px;

    .input-text-label {
        font-size: 0.95rem;
        text-shadow: 2.5px 2.5px var(--text-shadow-color);
    }

    .input-text {
        height: 2.7rem;
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
