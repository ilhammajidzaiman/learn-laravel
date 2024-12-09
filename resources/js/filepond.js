import * as FilePond from "filepond";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";

const inputElement = document.querySelector("#file");
const attachmentInputElement = document.querySelector("#attachment");

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

FilePond.create(attachmentInputElement).setOptions({
    server: {
        process: "/filepond/upload",
        fetch: null,
        revert: null,
        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
    },
    allowMultiple: true,
});
