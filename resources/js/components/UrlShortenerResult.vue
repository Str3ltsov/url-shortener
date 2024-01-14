<script>
export default {
    name: "UrlShortenerResult",
};
</script>

<template>
    <div class="section-result">
        <div class="section-result-full-input-button-container">
            <label for="short_url" class="section-result-label">
                Your generated short url:
            </label>
            <div class="section-result-input-button-container">
                <input
                    type="text"
                    class="section-result-input"
                    name="short_url"
                    id="short_url"
                    placeholder="https://example.com/folder/[hash]"
                    :value="$page.props.flash.shortUrl"
                    disabled
                />
                <button type="button" class="section-result-copy-button">
                    <font-awesome-icon
                        icon="fa-solid fa-clipboard"
                        class="button-icon"
                    />
                    Copy
                </button>
            </div>
        </div>
    </div>
</template>

<style scoped>
.section-result {
    display: flex;
    flex-direction: column;
    width: 100%;
    gap: 25px;

    .section-result-full-input-button-container {
        display: flex;
        flex-direction: column;
        gap: 12px;

        .section-result-label {
            font-size: 0.95rem;
            text-shadow: 2.5px 2.5px var(--text-shadow-color);
        }

        .section-result-input-button-container {
            display: flex;
            align-items: center;

            .section-result-input {
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
                width: 100%;

                &:hover,
                &:focus {
                    opacity: 1;
                }
            }

            .section-result-copy-button {
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
                width: 135px;
                border-left: 3px solid var(--box-shadow-color);

                &:hover,
                &:focus {
                    opacity: 1;
                }

                .button-icon {
                    font-size: 1.1rem;
                    filter: invert(100%) saturate(0%);
                }
            }
        }
    }
}
</style>
