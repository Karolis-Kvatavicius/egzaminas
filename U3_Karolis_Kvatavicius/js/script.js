function validateForm(event) {
    if (event.target[0].value === '' || event.target[1].value === '') {
        alert("Būtina užpildyti visus laukus!");
    } else {
        let alert = document.querySelector(".alert");
        alert.innerText = `Jūsų prenumerata pašto adresui ${event.target[1].value} sėkminga`;
        console.log(alert.classList);
        alert.classList.remove("d-none");
        window.setTimeout(function () {
            alert.classList.add("d-none");
        }, 6000);
    }
}

document.querySelector("form").addEventListener("submit", function (event) {
    event.preventDefault();
    validateForm(event);
});

let stars = document.querySelectorAll("[id^='star-']");
stars.forEach((star) => {
    star.addEventListener("click", function (event) {
        let matches = event.target.id.match(/(\d+)/);
        let course_id = event.target.classList.value.match(/(\d+)/);
        alert(`You left a ${matches[0]} star rating for the course ${course_id[0]}`);
        window.location = `./rate.php?rating=${matches[0]}&course=${course_id[0]}`;
    });
});