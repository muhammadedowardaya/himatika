const cards = document.querySelectorAll(".card.gerak");
const kategoriLabel = document.querySelectorAll(".kategoriLabel");

cards.forEach((card) => {
    const label = card.childNodes[1];

    card.addEventListener("mouseover", function () {
        if (label.classList.contains("dropdown") == false) {
            label.classList.add("dropdown");
        }

        gsap.to(".dropdown", {
            ease: "expo.outout",
            x: 250,
            onComplete: function () {
                label.classList.remove("dropdown");
            },
        });
    });

    card.addEventListener("mouseleave", function () {
        if (label.classList.contains("dropdownOff") == false) {
            label.classList.add("dropdownOff");
        }

        gsap.to(".dropdownOff", {
            ease: "expo.outout",
            x: -250,
            onComplete: function () {
                label.classList.remove("dropdownOff");
            },
        });

        if (label.classList.contains("dropdown") == true) {
            label.classList.remove("dropdown");
        }
    });
});
