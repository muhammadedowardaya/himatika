const cards = document.querySelectorAll(".card.gerak");

cards.forEach((card) => {
    const label = card.childNodes[1];

    card.addEventListener("mouseover", function () {
        if (label.classList.contains("show_label") == false) {
            label.classList.add("show_label");
        }

        gsap.to(".show_label", {
            ease: "expo.outout",
            x: 250,
            onComplete: function () {
                label.classList.remove("show_label");
            },
        });
    });

    card.addEventListener("mouseleave", function () {
        if (label.classList.contains("off_label") == false) {
            label.classList.add("off_label");
        }

        gsap.to(".off_label", {
            ease: "expo.outout",
            x: -250,
            onComplete: function () {
                label.classList.remove("off_label");
            },
        });

        if (label.classList.contains("show_label") == true) {
            label.classList.remove("show_label");
        }
    });
});
