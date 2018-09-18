$(function() {
    $(".heart").on("click", function(e) {
        e.preventDefault();
        $link = $(this);

        $(this)
            .find(".fa-heart")
            .toggleClass("far")
            .toggleClass("fa");

        $.ajax({
            method: "POST",
            url: $link.attr("href")
        });
    });
});
