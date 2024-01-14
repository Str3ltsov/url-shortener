<script>
import InputText from "./InputText.vue";
import InputCheckbox from "./InputCheckbox.vue";
import Button from "./Button.vue";

export default {
    name: "UrlShortenerForm",
    components: {
        InputText,
        InputCheckbox,
        Button,
    },
    data() {
        return {
            showFolderNameInput: false,
        };
    },
    methods: {
        receiveShowFolderNameInput(showFolderNameInput) {
            this.showFolderNameInput = showFolderNameInput;
        },
    },
};
</script>

<template>
    <form method="post" action="" class="section-form">
        <InputText
            label="Enter your url:"
            name="url"
            id="url"
            placeholder="https://example.com"
        />
        <InputCheckbox
            label="Add folder"
            name="add-folder"
            id="add-folder"
            @showFolderNameInput="receiveShowFolderNameInput"
        />
        <Transition>
            <InputText
                v-if="showFolderNameInput"
                label="Enter your folder name:"
                name="folder"
                id="folder"
                placeholder="(Valid symbols: A-Z, a-z, 0-9, -, _)"
            />
        </Transition>
        <div class="section-form-submit-button-container">
            <Button type="button" name="Generate" icon="fa-solid fa-bolt" />
        </div>
    </form>
</template>

<style scoped>
.section-form {
    display: flex;
    flex-direction: column;
    width: 100%;
    gap: 25px;

    .section-form-submit-button-container {
        display: flex;
        justify-content: center;
        width: inherit;
        margin-top: 20px;
    }

    .v-enter-active {
        transition: opacity 300ms ease;
    }

    .v-leave-active {
        transition: opacity 200ms ease;
    }

    .v-enter-from,
    .v-leave-to {
        opacity: 0;
    }
}
</style>
