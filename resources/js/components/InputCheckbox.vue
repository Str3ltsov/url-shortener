<script>
export default {
    name: "InputCheckbox",
    props: {
        label: String,
        name: String,
        id: String,
    },
    data() {
        return {
            showFolderNameInput: false,
        };
    },
    methods: {
        sentShowFolderNameInput() {
            this.showFolderNameInput = !this.showFolderNameInput;
            this.$emit("showFolderNameInput", this.showFolderNameInput);
        },
    },
};
</script>

<template>
    <div class="section-form-input-container">
        <label :for="id" class="section-form-checkbox-label">
            <input
                type="checkbox"
                class="section-form-checkbox"
                :name="name"
                :id="id"
                @click="sentShowFolderNameInput"
            />
            <span class="checkbox-icon">&#10003;</span>
            {{ label }}
        </label>
    </div>
</template>

<style scoped>
.section-form-input-container {
    width: inherit;
    display: flex;
    flex-direction: column;
    gap: 12px;

    .section-form-checkbox-label {
        font-size: 0.95rem;
        text-shadow: 2.5px 2.5px var(--text-shadow-color);
    }

    .section-form-checkbox-label {
        display: flex;
        align-items: center;
        gap: 12px;
        position: relative;
        cursor: pointer;
        position: relative;

        &::after {
            content: "";
            position: absolute;
            bottom: -2px;
            left: 30px;
            width: 91px;
            height: 2px;
            background-color: var(--primary-color);
        }

        .section-form-checkbox {
            appearance: none;
            -webkit-appearance: none;
            width: 18px;
            height: 18px;
            background-color: var(--input-background-color);
            box-shadow: 4px 4px var(--box-shadow-color);
            border: none;
            border-radius: 0;
            outline: none;
            transition: all 300ms ease;
            opacity: 0.7;

            &:hover,
            &:focus {
                opacity: 1;
            }

            &:checked ~ .checkbox-icon {
                opacity: 1;
            }
        }

        .checkbox-icon {
            opacity: 0;
            position: absolute;
            top: -10px;
            left: 1px;
            font-size: 1.7rem;
            transition: opacity 50ms linear;
            color: var(--secondary-color);
            text-shadow: none;
        }
    }
}
</style>
