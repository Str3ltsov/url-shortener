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
        <InputCheckbox label="Add folder" name="add-folder" id="add-folder" />
        <InputText
            label="Enter your folder name:"
            name="folder"
            id="folder"
            placeholder="(Valid symbols: A-Z, a-z, 0-9, -, _)"
        />
        <Button name="Generate" />
    </form>
</template>

<style scoped>
.section-form {
    display: flex;
    flex-direction: column;
    width: 100%;
    gap: 25px;
}
</style>
