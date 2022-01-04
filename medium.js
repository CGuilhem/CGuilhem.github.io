$(function () {
    var mediumPromise = new Promise(function (resolve) {
    var $content = $('#jsonContent');
    var data = {
        rss: 'https://medium.com/feed/@rennes1fac'
    };
    $.get(' https://api.rss2json.com/v1/api.json?rss_url=https%3A%2F%2Fmedium.com%2Ffeed%2F%40rennes1fac', data, function (response) {
        if (response.status == 'ok') {
            $("#profile-picture").append(`<img src="${response.feed["image"]}" class="profile-picture">`)
            var display = '';
            $.each(response.items, function (k, item) {
                display += `<div class="article">`;
                var src = item["thumbnail"]; // use thumbnail url
                display += `<img src="${src}" class="article-image" alt="Photo de l'article">`;
                display += `<div class="article-body">`;
                display += `<h4 class="article-title"><a href="${item.link}">${item.title}</a></h4>`;
                var yourString = item.description.replace(/<img[^>]*>/g,""); //replace with your string.
                yourString = yourString.replace('h4', 'p');
                yourString = yourString.replace('h3', 'p');
                var maxLength = 480; // maximum number of characters to extract
                //trim the string to the maximum length
                var trimmedString = yourString.substr(0, maxLength);
                //re-trim if we are in the middle of a word
                trimmedString = trimmedString.substr(0, Math.min(trimmedString.length, trimmedString.lastIndexOf(" ")))
                display += `<p class="article-text">${trimmedString}...</p>`;
                
                var pubDateComplete = item["pubDate"];
                var pubDate = pubDateComplete.substr(0, 10);
                var date = new Date(pubDate).toString().substring(0, 15);
                display += `<div class="article-footer"><div class="article-information"><img src="${response.feed["image"]}" class="profile-picture-xs"><span class="dot">&bull;</span><p class="date">${date}</p></div>`;

                display += `<a href="${item.link}" target="_blank" class="article-button" >Read More</a>`;
                display += '</div></div></div>';
                return k < 3;  //display the number of articles (here : 4, max : 10)
            });

            resolve($content.html(display));
        }
    });
});

mediumPromise.then(function()
    {
        //Pagination
        pageSize = 4;  //number of articles (max : 10)

        var pageCount = $(".card").length / pageSize;

        for (var i = 0; i < pageCount; i++) {
            $("#pagin").append(`<li class="page-item"><a class="page-link" href="#">${(i + 1)}</a></li> `);
        }
        $("#pagin li:nth-child(1)").addClass("active");
        showPage = function (page) {
            $(".card").hide();
            $(".card").each(function (n) {
                if (n >= pageSize * (page - 1) && n < pageSize * page)
                    $(this).show();
            });
        }

        showPage(1);

        $("#pagin li").click(function () {
            $("#pagin li").removeClass("active");
            $(this).addClass("active");
            showPage(parseInt($(this).text()))
            return false;
        });
    });
});