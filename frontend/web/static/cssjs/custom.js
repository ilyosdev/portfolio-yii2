// const baseUrl = window.location.origin;
//
// $("body *").click(function (e) {
//     if (e.target != this) return;
//     $('body').removeClass('loggedin');
// });
// $('#nav a, #next, .post a.title, .post .more, .carousel a').on('click', function (e) {
//     e.preventDefault();
//     $('body').addClass('off');
//     setTimeout(function () {
//         window.location = $this.attr('href');
//     }, 400);
//     $('#nav').addClass('loading');
//     var $this = $(this);
//     $this.attr('href')
// });
//
// function ChangeUrl(url) {
//     history.replaceState('data to be passed', '', url);
// }
//
// const anchor = document.getElementsByTagName('a');
// const rootApp = document.getElementById('app');
//
//
// function requestGet(url) {
//     $.ajax({
//         url: url,
//         type: 'get',
//     })
//         .done(function ({isOk, data}) {
//             if (isOk) {
//                 rootApp.innerHTML = data;
//             }
//         })
//         .fail(function (err) {
//             // requestGet(url);
//             alert(err)
//         });
// }
//
// $(document).ready(function () {
//     [...anchor].forEach(a => {
//         if (a.classList[1] === 'aroute') {
//             a.addEventListener('click', e => {
//                 e.preventDefault();
//                 console.log(e.target.hash);
//                 const url = e.target.hash.slice(1);
//                 // stop();
//                 ChangeUrl(baseUrl + '/' + url)
//                 requestGet(window.location.href)
//             })
//         }
//     })
// });
//


$('.works-slider').slick({
    dots: true,
    infinite: true,
    speed: 800,
    slidesToShow: 1,
    adaptiveHeight: true
});