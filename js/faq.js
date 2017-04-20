$(function () {
    // Insere os itens formatados do F.A.Q.
    $("#faq_items").owlCarousel({
        jsonPath: 'files/faq.json',
        jsonSuccess: showFaqSuccess,

        autoPlay: 10000,
        stopOnHover: true,

        items: 3,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [979, 3],
        itemsTablet: [768,2],
        itemsMobile: [479, 1]
    });

    // Insere os itens formatados do F.A.Q.
    function showFaqSuccess(data) {
        var content = "";
        for (var i in data["items"]) {
            var item = data["items"][i];
            content += addContent(item.title, item.answer);
        }

        $("#faq_items").html(content);
    }

    // Âncoras correspondentes aos itens do menu
    function addContent(title, answer) {
        var content = '';
        content += '<div class="card card-block text-xs-center">';
        content += '<h4 class="card-title">' + title + '</h4>';
        content += '<p class="card-text">' + answer + '</p>';
        content += '</div>';
        return content;
    }
});
