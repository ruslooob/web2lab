"use strict";

let createScreenshotButton = document.querySelector('.btn-create-screenshot');
let createScreenshotForm = document.querySelector('.create-screenshot-form');
createScreenshotButton.addEventListener('click', function (e) {
    e.preventDefault();
    fetch('/screenshots/add', {
        method: 'POST',
        body: new FormData(createScreenshotForm)
    })
        .then(response => {
            console.log(response)
            return response.json();
        })
        .then(result => {
            if (result.errors) {
                alert(result.errors);
            } else {
                // window.location.reload();
            }
        }).catch(error => console.log(error));
});