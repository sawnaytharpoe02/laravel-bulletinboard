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
});

document.addEventListener("DOMContentLoaded", function () {
    const userImage = document
        .getElementById("user-image-data")
        ?.getAttribute("data-image");
    const addProfileImgBtn = document.querySelector(".edit-profile-image");
    const clearProfileImgBtn = document.querySelector(
        "#clear-profile-image-btn"
    );

    if (userImage) {
        if (addProfileImgBtn) {
            addProfileImgBtn.style.display = "none";
        }
        if (clearProfileImgBtn) {
            clearProfileImgBtn.addEventListener("click", () => {
                if (addProfileImgBtn) {
                    addProfileImgBtn.style.display = "block";
                }
            });
        }
    } else {
        if (addProfileImgBtn) {
            addProfileImgBtn.style.display = "block";
        }
    }
});
