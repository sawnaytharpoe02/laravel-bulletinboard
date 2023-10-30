import * as FilePond from "filepond";
import "filepond/dist/filepond.min.css";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css";

const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");

FilePond.registerPlugin(FilePondPluginImagePreview);

const inputElement = document.querySelector("#image");
FilePond.create(inputElement);

FilePond.setOptions({
    server: {
        process: "/tmp-upload",
        revert: "/tmp-delete",
        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
    },
    maxFileSize: 10 * 1024 * 1024,
    oninitfile: function () {
        hideEditProfileImage();
    },
});

function hideEditProfileImage() {
    const profileImage = document.querySelector("#preview-profile-image");
    if (profileImage) {
        profileImage.style.display = "none";
    }
    return;
}
