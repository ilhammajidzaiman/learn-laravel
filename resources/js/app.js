import "bootstrap";
import "bootstrap-icons/font/bootstrap-icons.css";

import * as FilePond from "filepond";
import "filepond/dist/filepond.min.css";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css";

const inputElement = document.querySelector('input[type="file"].filepond');
FilePond.registerPlugin(FilePondPluginImagePreview);
const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");

FilePond.create(inputElement).setOptions({
    server: {
        process: "/uploads/process",
        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
    },
});
