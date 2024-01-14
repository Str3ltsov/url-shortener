<script>
import InputText from "./InputText.vue";
import InputCheckbox from "./InputCheckbox.vue";
import Button from "./Button.vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

export default {
    name: "UrlShortenerForm",
    components: {
        InputText,
        InputCheckbox,
        Button,
    },
    setup() {
        const showFolderNameInput = ref(false);

        const toggleShowFolderNameInput = () => {
            showFolderNameInput.value = !showFolderNameInput.value;
        };

        const shortUrlForm = useForm({
            url: null,
            folder: null,
        });

        const postGenerateShortUrl = () => {
            if (!showFolderNameInput.value) {
                shortUrlForm.folder = null;
            }

            shortUrlForm.post(route("generateShortUrl"));
        };

        return {
            showFolderNameInput,
            toggleShowFolderNameInput,
            shortUrlForm,
            postGenerateShortUrl,
        };
    },
};
</script>

<template>
    <form @submit.prevent="postGenerateShortUrl" class="section-form">
        <InputText
            label="Enter your url:"
            name="url"
            id="url"
            placeholder="https://example.com"
            v-model="shortUrlForm.url"
        />
        <InputCheckbox
            label="Add folder"
            name="add-folder"
            id="add-folder"
            @checkboxClicked="toggleShowFolderNameInput"
        />
        <Transition>
            <InputText
                v-if="showFolderNameInput"
                label="Enter your folder name:"
                name="folder"
                id="folder"
                placeholder="(Valid symbols: A-Z, a-z, 0-9, -, _)"
                v-model="shortUrlForm.folder"
            />
        </Transition>
        <div class="section-form-submit-button-container">
            <Button type="submit" name="Generate" icon="fa-solid fa-bolt" />
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
}
</style>
