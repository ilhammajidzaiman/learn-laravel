import * as FilePond from "filepond";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";

const inputElement = document.querySelector('input[type="file"].filepond');
FilePond.registerPlugin(FilePondPluginImagePreview);
const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");

FilePond.create(inputElement).setOptions({
    server: {
        process: "/filepond/upload",
        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
    },
});
