let resources = document.getElementById("resources-tab");

let resource_buttons = resources.querySelectorAll("button");
resource_buttons.forEach((button) => {
    button.addEventListener("click", resourceButtonClicked);
});

function resourceButtonClicked(e) {
    let current_primary = resources.querySelector(".text-bg-primary");
    current_primary.classList.replace("text-bg-primary", "tab-secondary");
    current_primary.childNodes[1].classList.add("text-black");
    e.target.parentElement.classList.replace(
        "tab-secondary",
        "text-bg-primary"
    );
    e.target.classList.remove("text-black");
}
let images = document.querySelectorAll("img");
images.forEach((image) => {
    image.addEventListener("error", imageNotFound);
});

function imageNotFound(e) {
    e.target.src = "images/not-found.webp";
    // console.clear();
}

let faqs = document.querySelectorAll("[data-bs-toggle='collapse']");

faqs.forEach((faq) => {
    faq.addEventListener("click", faqIconChange);

    function faqIconChange(e) {
        let elem = e.target.parentElement;
        if (elem.querySelector("i").classList.contains("fa-circle-minus")) {
            elem.querySelector("i").classList.replace(
                "fa-circle-minus",
                "fa-circle-plus"
            );
        } else {
            if (document.querySelector(".fa-circle-minus")) {
                document
                    .querySelector(".fa-circle-minus")
                    .classList.replace("fa-circle-minus", "fa-circle-plus");
            }
            elem.querySelector("i").classList.replace(
                "fa-circle-plus",
                "fa-circle-minus"
            );
        }
    }
});

document
    .querySelector("#resource-tab-dropdown")
    .addEventListener("change", resourceValueChange);
function resourceValueChange(e) {
    document.getElementById(`${e.target.value}-tab`).click();
}

window.onload = (e) => {
    let resourceUl = document.getElementById("resources-tab");
    resourceUl
        .querySelectorAll("li")[0]
        .classList.replace("tab-secondary", "text-bg-primary");
    resourceUl
        .querySelectorAll("button")[0]
        .classList.replace("text-black", "active");

    let tabContent = document.getElementById("tab-content");
    tabContent.querySelectorAll("div")[0].classList.add("show");
    tabContent.querySelectorAll("div")[0].classList.add("active");
};
