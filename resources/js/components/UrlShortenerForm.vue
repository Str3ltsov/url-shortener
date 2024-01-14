<script>
import InputText from "./InputText.vue";
import InputCheckbox from "./InputCheckbox.vue";
import Button from "./Button.vue";
import { useForm, usePage } from "@inertiajs/vue3";
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

        const shortUrlForm = useForm({
            url: null,
            folder: null,
        });

        const toggleShowFolderNameInput = () => {
            showFolderNameInput.value = !showFolderNameInput.value;
        };

        const postGenerateShortUrl = () => {
            if (!showFolderNameInput.value) {
                shortUrlForm.folder = null;
            }

            shortUrlForm.post(route("generateShortUrl"), {
                onSuccess: () => console.info(usePage().props.flash.success),
                onError: () => console.error(usePage().props.flash.exception),
            });
        };

        return {
            showFolderNameInput,
            shortUrlForm,
            toggleShowFolderNameInput,
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
            :error="shortUrlForm.errors.url"
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
                :error="shortUrlForm.errors.folder"
            />
        </Transition>
        <div class="section-form-submit-button-container">
            <Button
                type="submit"
                :disabled="shortUrlForm.progress"
                name="Generate"
                icon="fa-solid fa-bolt"
            />
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
