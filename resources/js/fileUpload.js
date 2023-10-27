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
        restore: "/tmp-restore",
        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
    },
    oninitfile: function () {
        hideEditProfileImage();
    },
});

function hideEditProfileImage() {
    const profileImage = document.querySelector(".preview-profile-image");
    profileImage.style.display = "none";
}
