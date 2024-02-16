document.querySelectorAll(".nav-link").forEach(function (element) {
    element.addEventListener("click", function () {
        // Close all other collapses
        document
            .querySelectorAll(".collapse.show")
            .forEach(function (collapse) {
                collapse.classList.remove("show");
            });
    });
});
