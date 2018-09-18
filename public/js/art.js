$(function() {
  $(".heart").on("click", function(e) {
    e.preventDefault();
    const $link = $(e.currentTarget);
    const $heart = $link.find(".fa-heart");
    const $likes = $link.find(".likes");

    $heart.toggleClass("far").toggleClass("fa");

    $.ajax({
      method: "POST",
      url: $link.attr("href")
    }).done(function(data) {
      $likes.html(data.hearts);
    });
  });
});
