var gridMasonry;
(function ($, win) {
    "use strict";

    var
        $win,
        winWidth,
        winHeight,
        $popupPanel,
        $popupContent,
        $popupLink,
        $closePopup,
        offset,
        offset_opacity,
        scroll_top_duration,
        $back_to_top,
        categories_check,
        iframePDF,
        itemProduct,
        itemProject,
        itemRelated,
        itemAlbumNav;

    var init = function () {
        $win = $(win);
        offset = 38;
        offset_opacity = 1200;
        scroll_top_duration = 700;
        $back_to_top = $('.cd-top');
        categories_check = [];
        iframePDF = $('.slider-pf-for').find('iframe');
        $popupPanel = $(".popup-panel");
        $popupContent = $(".popup-content");
        $popupLink = $(".popup-link");
        $closePopup = $(".close-popup");
        

        $win.on("load resize", function () {

            winWidth = window.innerWidth;
            winHeight = window.innerHeight;

            iframePDF.css({
                "height": winHeight - 120 + "px"
            });

            // Fix item height = width   
            itemProduct     = $('.product');  
            itemProject     = $('.project');
            itemRelated     = $('.block-slider-item.slick-slide');
            itemAlbumNav    = $('.slider-album__item.slick-slide');
                    
            fixHeightItem(itemProduct);
            fixHeightItem(itemProject);
            fixHeightItem(itemRelated);
            fixHeightItem(itemAlbumNav);

            // onScroll();
            // mainMenu();
            fixedHeader();
            widthColFilterForm()

        });

        $(document).click(function (e) {
            if (!$("#bs-navbar").is(e.target) && $("#bs-navbar").has(e.target).length === 0) {
                $('nav.collapse').collapse('hide');
            }
        });

        // aboutScroll();
        pageload();

        popupFn();
        smoothScroll();
        backtotopShow();
        scrollDiscover();
        scrollBar();
        subscribe();
        subcribeSubmit();
        mainMenu();
        fixedHeader();

        mainSlider();
        bannerSlider();
        blockSlider();
        categoriesSlider();
        productSlider();
        projectSlider();
        profileSlider();
        timelineSlider();

        map();

        rating();
        sidebar();
        imgLoad();
        gridLightBox();
        navcatTab();
        filterForm();
        pagination();

        faqSearch();
    };

    function pageload() {
        $(".page_load").fadeOut("slow");
    };

    function popupFn() {
        // POP UP
        $popupContent.hide();
        $popupPanel.hide();
        $popupLink.click(function (e) {
            e.preventDefault();
            $popupContent.hide();
            var target = $(this).attr("data-target");
            var $popupTarget = $('.popup-content[data-content="' + target + '"]');
            $popupTarget.parent('.popup-panel').fadeIn(100);
            $popupTarget.show();
        });

        // close popup
        $closePopup.click(function () {
            $popupPanel.fadeOut(100);
        });
    };

    function smoothScrollLink(e) {

        e.preventDefault();

        var
            $this = $(this),
            href = $this.attr("href"),
            $target = $((href == "#" || href == "" || !href) ? "html" : href),
            position = $target.offset().top;

        $('a').each(function () {
            $this.removeClass('active');
        })
        $this.addClass('active');

        $("body, html").animate({
            "scrollTop": position
        }, 500);

    };

    var smoothScroll = function () {
        $('a[href^="#"]').on('click', smoothScrollLink);
    };

    function fixedHeader() {
        var $header_mobile = $('.navbar');
        var $top = $('.top');
        var $header = $('header');
        $(window).scroll(function () {
            ($(this).scrollTop() > offset) ? $header.addClass('padding_head') : $header.removeClass('padding_head');
            ($(this).scrollTop() > offset) ? $header_mobile.addClass('fixed') : $header_mobile.removeClass('fixed');
            ($(this).scrollTop() > offset) ? $top.addClass('fixed') : $top.removeClass('fixed');
        });
    };

    function backtotopShow() {
        $(window).scroll(function () {
            ($(this).scrollTop() > offset) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
            if ($(this).scrollTop() > offset_opacity) {
                $back_to_top.addClass('cd-fade-out');
            }
        });
    };

    function scrollDiscover() {
        // Discover Button & Scroll To Div
        $(".scroll-cat").click(function () {
            $('html,body').animate({
                    scrollTop: $(".scroll-target").offset().top
                },
                'slow');
            e.preventDefault();
        });
    };

    function scrollBar() {
        $('.scrollbar-outer').scrollbar();
    };

    function mainMenu() {
        if ($(window).width() < 768) {
            $(".dropdown-nav").hide();
            $(".button-dropdown.active").next(".dropdown-nav").show();
            $(".button-dropdown").click(function () {
                // $(this).next("ul.dropdown-nav").stop().slideToggle();
                // $(this).toggleClass('active');
                var $dropdownNav = $(this).next("ul.dropdown-nav");
                if ($dropdownNav.is(":visible") == true) {
                    $dropdownNav.stop().slideUp();
                    $(this).removeClass('active');
                } else {
                    $dropdownNav.stop().slideDown();
                    $(this).addClass('active');
                }
            });
        }
    };

    function mainSlider() {
        //Main slide
        $('.slider-main-group').slick({
            dots: true,
            infinite: true,
            autoplay: true,
            speed: 500,
            fade: true,
            cssEase: 'linear',
            responsive: [{
                breakpoint: 480,
                settings: {
                    arrows: false
                }
            }]
        });
    };

    function bannerSlider() {
        //slider banner
        $('.slider-banner').slick({
            dots: false,
            arrows: true,
            infinite: true,
            autoplay: true,
            speed: 500,
            fade: true,
            cssEase: 'linear',
            responsive: [{
                breakpoint: 768,
                settings: {
                    arrows: false,
                    dots: true
                }
            },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        dots: true,
                        adaptiveHeight: true
                    }
                }
            ]
        });
    };

    function blockSlider() {
        // block Slider
        $(".block-slider").slick({
            dots: false,
            infinite: true,
            slidesToShow: 6,
            slidesToScroll: 1,
            responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 1
                }
            },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 820,
                    settings: {
                        dots: true,
                        arrows: false,
                        slidesToShow: 4,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 680,
                    settings: {
                        dots: true,
                        arrows: false,
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        dots: true,
                        arrows: false,
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        dots: true,
                        arrows: false,
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    };

    function categoriesSlider() {
        $(".categories-slider").slick({
            dots: false,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            centerMode: true,
            responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 380,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    };

    function productSlider() {
        // Album Product Slider
        $('.slider-for').on("init.slick", function (event, slick) {
            zoomProduct();
        });
        $('.slider-for').slick({
            infinite: true, // Dung add
            mobileFirst: true, // Dung add
            adaptiveHeight: true, // Truong Nguyen add
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            centerMode: true,
            fade: true,
            asNavFor: '.slider-nav'
        }).on('afterChange', function(event, slick, currentSlide){
            zoomProduct();
        });
        
        
        $('.slider-nav').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: false,
            arrows: true,
            vertical: true,
            verticalSwiping: true,
            focusOnSelect: true,
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    vertical: false
                }
            },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        vertical: true
                    }
                },
                {
                    breakpoint: 620,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 481,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        vertical: false
                    }
                }
            ]
        });
        $('.slider-for').slickLightbox({
            slick: {
                itemSelector: 'a',
                navigateByKeyboard: true,

                // dots: false,
                // infinite: true,
                // centerMode: true,
                // slidesToShow: 1,
                // slidesToScroll: 1,
                // mobileFirst: true
            }
        });
    };

    function zoomProduct() {
        // if (typeof $(".zoom img.zoom-img")[0] != 'undifined') {
        //     var zoomEle = $($(".zoom.slick-active img.zoom-img")[0]);
        //     $.removeData(zoomEle, 'elevateZoom');//remove zoom instance from image
            
        //     $('.zoomContainer').remove();// remove zoom container from DOM
        //     zoomEle.elevateZoom({
        //         zoomWindowWidth 	: 535,
        //         zoomWindowHeight    : 535,
        //         zoomWindowOffetx	: 25,
        //         zoomWindowOffety	: -13,
        //         zoomWindowPosition	: 1,
        //         lensSize            : 50,
        //         borderSize          : 1,
        //         scrollZoom          : true
        //     });
        // }

        var zoomEle = $(".zoom.slick-active img.zoom-img");

        $.removeData(zoomEle, 'elevateZoom');//remove zoom instance from image
        $('.zoomContainer').remove();// remove zoom container from DOM

        // Check Desktop active zoom
        winWidth = window.innerWidth;        
        if(winWidth >= 1024) {
            zoomEle.elevateZoom({
                zoomWindowWidth 	: 535,
                zoomWindowHeight    : 535,
                zoomWindowOffetx	: 25,
                zoomWindowOffety	: -13,
                zoomWindowPosition	: 1,
                lensSize            : 500,
                borderSize          : 1,
                scrollZoom          : false
            });
        }        
    };

    function projectSlider() {
        // Album Slider Project
        $('.slider-project-for').slick({
            infinite: true, // Dung add
            mobileFirst: true, // Dung add

            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            centerMode: true,
            fade: true,
            asNavFor: '.slider-project-nav'
        });
        $('.slider-project-nav').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.slider-project-for',
            dots: false,
            arrows: true,
            vertical: true,
            verticalSwiping: true,
            focusOnSelect: true,
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    vertical: false
                }
            },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        vertical: true
                    }
                },
                {
                    breakpoint: 620,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 481,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        vertical: false
                    }
                }
            ]
        });
        $('.slider-project-for').slickLightbox({
            slick: {
                itemSelector: 'a',
                navigateByKeyboard: true,

                // dots: false,
                // infinite: true,
                // centerMode: true,
                // slidesToShow: 1,
                // slidesToScroll: 1,
                // mobileFirst: true
            }
        });

        // Add content lightbox
        $(".slider-project-for").click(function () {
            var $lbcontent = $(this).find(".slick-current").children(".lightbox-content").html();
            $(".slick-lightbox-slick-item-inner").append($lbcontent);
        });
        // var sProjectFor = $('.slider-project-for .slick-current');
        // addContentLightBox(sProjectFor);
    };

    function profileSlider() {
        // Profile slider
        // $('.slider-pf-for').slick({
        //     slidesToShow: 1,
        //     slidesToScroll: 1,
        //     arrows: false,
        //     fade: true,
        //     asNavFor: '.slider-pf-nav'
        // });
        $('.slider-pf-nav').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            // asNavFor: '.slider-pf-for',
            dots: false,
            arrows: true,
            focusOnSelect: true,
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 620,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 481,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });

        // Click slideNav PDF
        $('.slider-profile__item').add('.slider-pf-nav button.slick-arrow').on('click', function() {
            loadPDF();
        });
        
    };

    function loadPDF() {
        var itemCurrent = $('.slider-profile__item.slick-current a');
        var pathPDF = itemCurrent.attr('path');
        var linkFull = itemCurrent.attr('href');

        $('#view_full_pdf').attr('href', linkFull);
        $('#view_pdf').attr('src', pathPDF);
    };

    function timelineSlider() {
        // Slider Timeline
        $(".timeline-slider").slick({
            dots: false,
            arrows: true,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            centerMode: true,
            adaptiveHeight: true,
            responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 380,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    };

    function addContentLightBox(lbEl) {
        var $lbEl = $(lbEl);
        $lbEl.click(function () {
            var $lbcontent = $(this).find(".lightbox-content").html();
            $(".slick-lightbox-slick-item-inner").append($lbcontent);
        });
    };

    // Subscribe
    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    };

    function subscribeKeyup() {
        $('.btn_subscribe').prop('disabled', true);
        $(".email_subscribe").keyup(function () {
            var value = $(this).val();
            if ((value != "") && (validateEmail(value))) {
                // validateEmail(value);
                $('.btn_subscribe').prop('disabled', false);
            } else {
                $('.btn_subscribe').prop('disabled', true);
            }
        });
    };

    function subscribe() {
        // $(".subscribable__content").hide();
        $(".subscribable__title").click(function () {
            // $(".subscribable__content").stop().slideToggle();
            $(this).parents('.subscribable').toggleClass('active');
            $('.fb-wrap, .fb-chat-live').removeClass('active');

            subscribeKeyup();
        });
    };

    function subcribeSubmit() {
        $('#btn_subscribe').click(function () {
            var form = $(this).closest('form');
            var url = form.attr('action');

            var name = $('#subscribe_name').val();
            var email = $('#subscribe_email').val();

            if (email) {
                $(this).prop('disabled', true);
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _token: window.laravel_token,
                        name: name,
                        email: email
                    },
                }).done(function (res) {
                    toastr["success"](res.message);

                    form[0].reset();
                });
            } else {
                toastr["error"]('Please enter an email');
            }

            return false;
        });
    };

    function rating() {
        $('input.rating').rating();
    };

    function sidebar() {
        $(".button-sidebar__open").click(function () {
            $(".sidebar").slideDown();
            $(this).hide();
            // $(".button-sidebar__close").show();
        });
        $(".button-sidebar__close").click(function () {
            $(".sidebar").slideUp();
            // $(this).hide();
            $(".button-sidebar__open").show();
        });
    };

    function masonryGrid() {
        gridMasonry = $('.grid').masonry({
            itemSelector: '.grid-item',
            columnWidth: '.grid-sizer',
            gutter: 5
        });
    };

    function imgLoad() {
        $("img").one("load", function () {
            // do stuff
            masonryGrid();
        }).each(function () {
            if (this.complete) $(this).load();
        });
    };

    function gridLightBox() {
        $('.grid').slickLightbox({
            slick: {
                itemSelector: 'a',
                navigateByKeyboard: true,
                dots: false,
                infinite: true,
                centerMode: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                mobileFirst: true,
                // caption: 'caption'
            }
        });

        // Add content lightbox
        $('body').on('click', '.grid-item', function () {
            $(this).parents('.tab-pane').find('.grid-item').each(function () {
                var el = $(this),
                    content = el.find(".lightbox-content");
                $('[data-slick-index="' + (el.index() - 1).toString() + '"]').find($('.slick-lightbox-slick-item-inner')).append(content.html());
            });
        })

        $('body').on('click', '.lightbox-title .link', function (e) {
            e.preventDefault();
            e.stopPropagation();
            var href = $(this).data('href');
            // window.location.href = href;
            window.open(href);
            return false;
        });

    };

    function navcatTab() {
        $(".nav-cat__tab").click(function () {
            $(".nav-cat__tab").removeClass("active");
            $(this).addClass("active");
        });
    };

    function filterForm() {
        //============ Filter ============//
        $(".filter-select-box .icon_close").hide();
        $(".filter-option-box").hide();

        /* == Click f-select show option == */
        $(".f-select").click(function () {
            var $this = $(this);
            var target = $(this).attr("data-target");
            var isUp = $this.next('i').hasClass('up');

            if (isUp) {
                $this.next('i').removeClass('up');
            } else {
                $(".f-select").next('i').removeClass('up');
                $this.next('i').addClass('up');
            }

            // show option
            $(".filter-option-box").not($('.filter-option-box[data-content="' + target + '"]')).fadeOut();
            $('.filter-option-box[data-content="' + target + '"]').fadeToggle();
        });

        /* == Click icon arrow show option == */
        $(".arrow_triangle-down").click(function () {
            var target = $(this).prev().attr("data-target");

            // arrow
            $(this).toggleClass('up');
            // show option
            $(".filter-option-box").not($('.filter-option-box[data-content="' + target + '"]')).fadeOut();
            $('.filter-option-box[data-content="' + target + '"]').fadeToggle();
        });

        // Click selecte item option
        $(".f-option dt").click(function () {
            var filter_option_box = $(this).parents('.filter-option-box');
            var filter_select_box = filter_option_box.prev('.filter-select-box');
            var f_select = filter_select_box.children(".f-select");
            var f_select_input = filter_select_box.children(".f-select-input");

            var arrow_triangle = filter_select_box.children('.arrow_triangle-down');
            var icon_close = filter_select_box.children('.filter-select-box .icon_close');

            $(".f-option dt").removeClass("selected");
            $(this).addClass("selected");
            var text = $(this).children('span').html();
            var _value = $(this).attr('val');
            // console.log(value);
            f_select.text(text);
            f_select_input.val(_value);

            var inputval = f_select_input.val();
            // console.log(inputval); /* get value input*/

            filter_select_box.addClass('active');
            filter_option_box.fadeOut();
            arrow_triangle.hide();
            icon_close.show();
        });

        // remove select option
        $(".filter-select-box .icon_close").click(function () {
            var arrow_triangle = $(this).prev(".arrow_triangle-down");
            var f_select = arrow_triangle.prev(".f-select");
            var properties = f_select.attr("data-properties");
            var filter_select_box = f_select.parent();
            var filter_option_box = filter_select_box.next();

            filter_option_box.fadeOut();
            filter_select_box.removeClass('active');
            f_select.text(properties);
            arrow_triangle.removeClass('up');
            arrow_triangle.show();
            $(this).hide();
        });

        //Filter
        $('.clearform').click(function (e) {
            e.preventDefault();

            $('.f-select').each(function () {
                var properties = $(this).attr("data-properties");
                $(this).text(properties);
            });
            $('.filter-option-box').fadeOut();
            $('.filter-select-box').removeClass('active');
            $('.arrow_triangle-down').removeClass('up');
            $('.arrow_triangle-down').show();
            $('.filter-select-box .icon_close').hide();
        });

        // Attach file
        var inputFile = $('.input-file');

        inputFile.change(function () {
            console.log(this.value);
            if (this.value == null || this.value == "") {
                $(this).prev('i').removeClass('font-color-brand');
                console.log($(this).prev('i'));
            } else {
                $(this).prev('i').addClass('font-color-brand');
            }
        });
    };

    function widthColFilterForm() {
        var numCol = $('.col-filter-box').length;
        var widthRow = $('.row-filter-box').width();
        var widthCol = (widthRow - numCol * 12) / numCol;
        $('.col-filter-box').css('width', widthCol);
    }

    function faqSearch() {
        $('#faq-text-search').bind('keyup change', function (ev) {
            var searchTerm = $(this).val();
            // remove any old highlighted terms
            $("body.faq_page .tab-content").unhighlight();

            // disable highlighting if empty
            if (searchTerm) {
                // highlight the new term
                $("body.faq_page .tab-content").highlight(searchTerm, {
                    accentInsensitive: true
                });
            }
        });
    };

    function pagination() {
        $('ul.pagination li.active')
            .prev().addClass('show-mobile')
            .prev().addClass('show-mobile');
        $('ul.pagination li.active')
            .next().addClass('show-mobile')
            .next().addClass('show-mobile');
        $('ul.pagination')
            .find('li:first-child, li:last-child, li.active')
            .addClass('show-mobile');
    };

    // Where to Buy - Map
    function map() {

        // Where to buy page
        // Active Categories tabs
        $(".cat-item a").click(function () {
            categories_check = [];
            $(this).parent("li").toggleClass("active");
            $(this).next("input").click();
            jQuery('li.cat-item').each(function () {
                if (jQuery(this).hasClass('active')) {
                    categories_check.push(jQuery(this).data('id'));
                }
            });

            window.updateRegionList();
            return false;
        });
    };

    window.updateRegionList = function () {
        console.log('updateRegionList');
        if (categories_check.length) {
            var pattern = categories_check.join('|');
            var re = new RegExp(pattern, "i");
            var categories_item = false;
            jQuery('.list-store .item').each(function () {
                categories_item = jQuery(this).data('categories');
                if (!re.test(categories_item)) {
                    jQuery(this).hide();
                } else {
                    jQuery(this).show();
                }
            });
        } else {
            jQuery('.list-store .item').show();
        }
        updateRegionValid();
    }

    function updateRegionValid() {

        var regionListItem = null;
        jQuery('li.has-child').each(function () {
            regionListItem = jQuery(this);
            regionListItem.show();
            if (!jQuery('li.item', regionListItem).is(':visible')) {
                regionListItem.hide();
            }
        });
    };

    function fixHeightItem(item) {
        var $item = $(item);
        var $itemWidth = $item.width();
        $item.css('height', $itemWidth);
    };

    $(function () {
        init();
    });

})(jQuery, window);