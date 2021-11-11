//animation list: flip, slice, box3D, pixel, fade, glide, card

$(document).ready(function () {

    $('.slideWiz').slideWiz({
        auto: false,
        speed: 5000,
        row: 12,
        col: 35,
        animation: [
          'box3D'
        ],
        file: [
            {
                src: {
                    cover: "../img/slide1.jpg"
                },
                title: 'ENHANCE YOUR',
                titles: 'CUSTOMERS EXPERIENCE',
                descLength: 220,
                button: {
                    text: 'Trusted Solutions',
                    url: 'https://www.facebook.com',
                    class: 'btn btn-medium btn-primary',
                    texts: 'Reliable Services',
                    urls: 'https://www.youtube.com',
                },
            },
            {
                src: {
                    cover: "../img/slide3.jpg"
                },
                title: 'slideWiz Library - 2',
                desc: "2: slideWiz is a JQuery based library created by a Nigerian Software " +
                "Engineer by the name 'Wisdom Emenike' who at the time of writing this library " +
                "works at Imaxinacion Technology, one of Nigeria's leading IT companies.",
                button: {
                    text: 'Expert Trainers',
                    url: 'https://www.facebook.com',
                    class: 'btn btn-medium btn-primary',
                    texts: 'Overview',
                    urls: 'https://www.youtube.com',
                },
            }
        ]

    });

});
