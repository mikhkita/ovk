$(document).ready(function(){	
    var isRetina = retina(),
        isDesktop = isTablet = isSmallTablet = isMobile = false;
    function resize(){
       if( typeof( window.innerWidth ) == 'number' ) {
            myWidth = window.innerWidth;
            myHeight = window.innerHeight;
        } else if( document.documentElement && ( document.documentElement.clientWidth || 
        document.documentElement.clientHeight ) ) {
            myWidth = document.documentElement.clientWidth;
            myHeight = document.documentElement.clientHeight;
        } else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
            myWidth = document.body.clientWidth;
            myHeight = document.body.clientHeight;
        }

        isDesktop = isTablet = isSmallTablet = isMobile = false;

        if( myWidth > 1240 ){
            isDesktop = true;
        }else if( myWidth > 999 ){
            isTablet = true;
        }else if( myWidth > 767 ){
            isSmallTablet = true;
        }else{
            isMobile = true;
        }

        isRetina = ( (isDesktop || isTablet) && retina() )?true:false;

        if( $(".b-problem").length ){
            bubblePosition();
        }

        customHandlers["onScroll"]();

        checkMenu();
    }
    customHandlers["onScroll"] = function (scroll){
        var scroll = (document.documentElement && document.documentElement.scrollTop) || document.body.scrollTop;
        // var scroll = $(".content-wrap").scrollTop();

        scrollMenu(scroll);
    }

    // $(".content-wrap").scroll(function(){
    //     var scroll = $(".content-wrap").scrollTop();

    //     scrollMenu(scroll);
    // });

    $(window).resize(resize);

    $(window).on("load", resize);

    resize();

    new FastClick(document.body);

    function scrollMenu(scroll){
        if( isDesktop ){
            var offset = 38*2,
                k = ((scroll/offset > 1)?1:( (scroll/offset <= 0)?(0):(scroll/offset) )),
                top = k*23*-1,
                size = 21.7 - k*5.7,
                mb = 16 - k*5,
                lh = 28 - k*12,
                height = 78 - k*35;
        }else if( isTablet ){
            var offset = 38*2,
                k = ((scroll/offset > 1)?1:( (scroll/offset <= 0)?(0):(scroll/offset) )),
                top = k*23*-1,
                size = 20 - k*4,
                mb = 11,
                lh = 28 - k*12,
                height = 78 - k*35;
        }else if( isSmallTablet ){
            var offset = 38*2,
                k = ((scroll/offset > 1)?1:( (scroll/offset <= 0)?(0):(scroll/offset) )),
                top = k*23*-1,
                size = 18,
                mb = 2,
                lh = 28,
                height = 64 - k*21;
        }else if( isMobile ){
            var offset = 25*2,
                k = ((scroll/offset > 1)?1:( (scroll/offset <= 0)?(0):(scroll/offset) )),
                top = k*23*-1,
                size = 18,
                mb = 2,
                lh = 28,
                height = 64 - k*21;
        }

        $(".b-top-table").css({
            "-webkit-transform" : "translateY("+(top)+"px)",
               "-moz-transform" : "translateY("+(top)+"px)",
                "-ms-transform" : "translateY("+(top)+"px)",
                 "-o-transform" : "translateY("+(top)+"px)",
                    "transform" : "translateY("+(top)+"px)"
        });

        $(".b-phone").css({
            "font-size" : size,
            "margin-bottom" : mb,
            "line-height" : lh+"px"
        });

        $(".b-logo .b-img").css({
            "height" : height
        })

        if( scroll >= offset && !$("body").hasClass("fixed") ){
            $("body").addClass("fixed");
            // $(".b-up-btn").addClass("show");
        }else if( scroll < offset && $("body").hasClass("fixed") ){
            $("body").removeClass("fixed");
            // $(".b-up-btn").removeClass("show");
        }
    }

    var menuTimer = null;
    $(".b-menu-cont .b-menu > li > a").hover(function(){
        clearTimeout(menuTimer);

        moveLine($(this));
    }, function(){
        clearTimeout(menuTimer);

        menuTimer = setTimeout(checkMenu, 300);
    });

    function checkMenu(){
        if( $(".b-menu-cont .b-menu > li > a.active").length ){
            moveLine($(".b-menu-cont .b-menu > li > a.active"));
        }else{
            $(".b-menu-cont .b-line").removeClass("show");
        }
    }

    function moveLine($el){
        $(".b-menu-cont .b-line").addClass("show").css({
            "left" : $el.position().left + parseInt($el.css("padding-left").replace(/\D+/g,"")),
            "width" : $el.width() - 1
        });
    }

    $(".b-pin").click(function(){
        if( $(this).parent(".b-problem").hasClass("active") ){
            $(".b-problem.active").removeClass("active");
        }else{
            $(".b-problem.active").removeClass("active");
            $(this).parents(".b-problem").addClass("active");
            if( isDesktop || isTablet ){
                $(".b-woman-text").removeClass("show");
            }
        }
        return false;
    });

    var open = false;
    $("body").on("mouseup touchend",".b-problem-bubble *, .b-problem-bubble, .b-pin, .b-pin *",function(){
        open = true;
    });
    $("body").on("mousedown touchstart",function() {
        open = false;
    }).on("mouseup touchend", ".b-problems", function(){
        if( !open ){
            $(".b-problem.active").removeClass("active");
            $(".b-woman-text").addClass("show");
        }
    });

    function bubblePosition(){
        $(".b-problem").each(function(){
            var $bubble = $(this).find(".b-problem-bubble"),
                $pin = $(this),
                $triangle = $bubble.find("span"),
                paddingLeft = 48,
                paddingTop = 40,
                margin = 42,
                bubbleW = $bubble.width() + paddingLeft*2,
                bubbleH = $bubble.height() + paddingTop*2,
                topLimit = $(".b-problems h2.b-title").offset().top + $(".b-problems h2.b-title").height() + 96,
                leftLimit = $(".b-problems .b-block").offset().left,
                left = 0,
                top = 0;


            if( $(this).hasClass("g") ){
                top = ($pin.offset().top - bubbleH + $pin.height() + margin > topLimit )?(-1*bubbleH + $pin.height() + margin):( -1*($pin.offset().top - topLimit) );
            }else{
                top = ($pin.offset().top - bubbleH - margin > topLimit )?(-1*bubbleH - margin):( -1*($pin.offset().top - topLimit) );
            }

            if( $(this).hasClass("g") ){
                left = ($pin.offset().left - bubbleW - margin > leftLimit )?(-1*bubbleW - margin):( -1*($pin.offset().left - leftLimit) );
            }else{
                left = ($pin.offset().left - bubbleW + $pin.width() + margin > leftLimit )?(-1*bubbleW + $pin.height() + margin):( -1*($pin.offset().left - leftLimit) );
            }

            $bubble.css({
                "left" : left,
                "top" : top
            });

            // Позиция треугольника

            if( $(this).hasClass("g") ){

                $triangle.css({
                    "top" : top*(-1) + $pin.height()/2 - 25
                });
            }else{
                $triangle.css({
                    "left" : left*(-1) + $pin.width()/2 - 25
                });
            }
        });
    }

    $(".b-service").mouseover(function(){
        $(".b-services-text-item.show").removeClass("show");
        $($(this).attr("data-text")).addClass("show");
    });

    $(".b-services-sub").animate({height: "hide"}, 0);
    $(".b-service.b-service-with-sub>a").click(function(){
        if( $(this).parents(".b-service").hasClass("show") ){
            $(".b-service.show").removeClass("show").find(".b-services-sub").animate({height: "hide", "margin-bottom" : 0}, 300);
        }else{
            $(".b-service.show").removeClass("show").find(".b-services-sub").animate({height: "hide", "margin-bottom" : 0}, 300);
            $(this).parents(".b-service").addClass("show").find(".b-services-sub").animate({height: "show", "margin-bottom" : 24}, 300);
        }

        return false;
    });

    // $(".b-doctors").KitCarousel1({
    //     duration : 500,
    //     fps : 40,
    //     dots : false,
    //     centerMode : true,
    //     buttonEasing : "OutQuad",
    //     prevButtonClass : "b-doctors-btn b-doctors-prev icon-arrow-left",
    //     nextButtonClass : "b-doctors-btn b-doctors-next icon-arrow-right",
    //     styleFunction : function(el, s){
    //         el.attr("class", "b-doctor b-doctor-"+s.id);
    //     },
    //     resize : function(_){
    //         _.o.states = [
    //             {
    //                 id : 1
    //             },
    //             {
    //                 id : 2
    //             },
    //             {
    //                 id : 3
    //             },
    //             {
    //                 id : 4
    //             },
    //             {
    //                 id : 5
    //             },
    //             {
    //                 id : 6
    //             },
    //             {
    //                 id : 7
    //             }
    //         ];
    //     }
    // });

    var prevDoctor = false;
    $(".b-doctors").KitCarousel({
        duration : ( isDesktop || isTablet )?400:500,
        fps : ( isDesktop || isTablet || (!device.mobile() && !device.tablet()) )?30:10,
        dots : false,
        centerMode : true,
        centerIndex : 4,
        buttonEasing : "OutQuart",
        prevButtonClass : "b-doctors-btn b-doctors-prev icon-arrow-left",
        nextButtonClass : "b-doctors-btn b-doctors-next icon-arrow-right",
        beforeChange : function(to){
            if( to != 0 ){
                $(".b-doctor-text.show").addClass("hide").removeClass("show");
            }
        },
        afterChange : function(_){
            if( prevDoctor === $(".b-doctor[data-i='4']").attr("data-s") ) return false;
            prevDoctor = $(".b-doctor[data-i='4']").attr("data-s");
            $($(".b-doctor[data-i='4']").attr("data-text")).removeClass("hide");
            setTimeout(function(){
                $(".b-doctor-text.show").addClass("hide").removeClass("show");
                // $(".b-doctor-text.show").addClass("hide").removeClass("show");
                $($(".b-doctor[data-i='4']").attr("data-text")).addClass("show");
            }, 10);
        },
        afterInit : function(_){
            $($(".b-doctor[data-i='4']").attr("data-text")).addClass("show");

            $(window).on("load", function(){
                if( isRetina ){
                    for( var i in _.items ){
                        loadRetina(_.items[i].find(".b-img"));
                    }
                }
            });
        },
        styleFunction : function(el, s){
            el.css({
                "-webkit-transform" : "translateX("+s.left+"px) scale("+s.scale+")",
                   "-moz-transform" : "translateX("+s.left+"px) scale("+s.scale+")",
                    "-ms-transform" : "translateX("+s.left+"px) scale("+s.scale+")",
                     "-o-transform" : "translateX("+s.left+"px) scale("+s.scale+")",
                        "transform" : "translateX("+s.left+"px) scale("+s.scale+")",
                "opacity" : s.opacity,
                "z-index" : Math.round(s.zindex)
                // "-webkit-filter" : "blur("+(s.blur*5)+"px)",
                // "-moz-filter" : "blur("+(s.blur*5)+"px)",
                // "filter" : "blur("+(s.blur*5)+"px)"
            });

            el.find(".b-img-blur").css({
                "opacity" : s.blur*2
            });

            el.find(".b-img").css({
                "opacity" : 2 - s.blur*2
            });
        },
        resize : function(_){
            if( isDesktop ){
                _.o.states = [
                    {
                        left : -580,
                        opacity: 0,
                        scale : 0.9,
                        zindex : 1,
                        blur : 1
                    },
                    {
                        left : -330,
                        opacity: 0.8,
                        scale : 0.9,
                        zindex : 2,
                        blur : 1
                    },
                    {
                        left : -30,
                        opacity: 0.8,
                        scale : 0.9,
                        zindex : 3,
                        blur : 1
                    },
                    {
                        left : 256,
                        opacity: 0.8,
                        scale : 0.9,
                        zindex : 4,
                        blur : 1
                    },
                    {
                        left : 576,
                        opacity: 1,
                        scale : 1,
                        zindex : 5,
                        blur : 0
                    },
                    {
                        left : 890,
                        opacity: 0.8,
                        scale : 0.9,
                        zindex : 4,
                        blur : 1
                    },
                    {
                        left : 1140,
                        opacity: 0,
                        scale : 0.9,
                        zindex : 3,
                        blur : 1
                    }
                ];
            }else if(isTablet){
                _.o.states = [
                    {
                        left : -794,
                        opacity: 0,
                        scale : 0.9,
                        zindex : 1,
                        blur : 1
                    },
                    {
                        left : -494,
                        opacity: 0.8,
                        scale : 0.9,
                        zindex : 2,
                        blur : 1
                    },
                    {
                        left : -194,
                        opacity: 0.8,
                        scale : 0.9,
                        zindex : 3,
                        blur : 1
                    },
                    {
                        left : 106,
                        opacity: 0.8,
                        scale : 0.9,
                        zindex : 4,
                        blur : 1
                    },
                    {
                        left : 406,
                        opacity: 1,
                        scale : 1,
                        zindex : 5,
                        blur : 0
                    },
                    {
                        left : 706,
                        opacity: 0.8,
                        scale : 0.9,
                        zindex : 4,
                        blur : 1
                    },
                    {
                        left : 1006,
                        opacity: 0,
                        scale : 0.9,
                        zindex : 3,
                        blur : 1
                    }
                ];
            }else if(isSmallTablet){
                _.o.states = [
                    {
                        left : -830,
                        opacity: 0,
                        scale : 0.9,
                        zindex : 1,
                        blur : 1
                    },
                    {
                        left : -830,
                        opacity: 0.8,
                        scale : 0.9,
                        zindex : 2,
                        blur : 1
                    },
                    {
                        left : -730,
                        opacity: 0.8,
                        scale : 0.9,
                        zindex : 3,
                        blur : 1
                    },
                    {
                        left : -330,
                        opacity: 0.8,
                        scale : 0.9,
                        zindex : 4,
                        blur : 1
                    },
                    {
                        left : 70,
                        opacity: 1,
                        scale : 1,
                        zindex : 5,
                        blur : 0
                    },
                    {
                        left : 470,
                        opacity: 0.8,
                        scale : 0.9,
                        zindex : 4,
                        blur : 1
                    },
                    {
                        left : 870,
                        opacity: 0,
                        scale : 0.9,
                        zindex : 3,
                        blur : 1
                    }
                ];
            }else if(isMobile){
                var center = (_.width() - _.slideWidth)/2;
                _.o.states = [
                    {
                        left : center-900,
                        opacity: 0,
                        scale : 0.9,
                        zindex : 3,
                        blur : 1
                    },
                    {
                        left : center-900,
                        opacity: 0,
                        scale : 0.9,
                        zindex : 4,
                        blur : 1
                    },
                    {
                        left : center-600,
                        opacity: 0,
                        scale : 0.9,
                        zindex : 3,
                        blur : 1
                    },
                    {
                        left : center-300,
                        opacity: 0.8,
                        scale : 0.9,
                        zindex : 4,
                        blur : 1
                    },
                    {
                        left : center,
                        opacity: 1,
                        scale : 1,
                        zindex : 5,
                        blur : 0
                    },
                    {
                        left : center+300,
                        opacity: 0.8,
                        scale : 0.9,
                        zindex : 4,
                        blur : 1
                    },
                    {
                        left : center+600,
                        opacity: 0,
                        scale : 0,
                        zindex : 3,
                        blur : 1
                    }
                ];
            }
        }
    });

    
    function loadRetina($el){
        var $this = $el,
            img = new Image(),
            src = $this.attr("data-big");

        img.onload = function(){
            $this.css({
                "background-image" : "url('"+src+"')"
            });

            $(".b-doctor .b-img[data-big='"+src+"']").css({
                "background-image" : "url('"+src+"')"
            });
        };
        img.src = src;
    }

    if( isRetina ){
        $("*[data-retina]").each(function(){
            var $this = $(this),
                img = new Image(),
                src = $this.attr("data-retina");

            img.onload = function(){
                $this.css({
                    "background-image" : "url('"+src+"')"
                });
            };
            img.src = src;
        });
    }

    $(".b-reviews-slider").KitCarousel({
        duration : ( isDesktop || isTablet )?400:500,
        fps : ( isDesktop || isTablet || (!device.mobile() && !device.tablet()) )?60:10,
        dots : false,
        prevButtonClass : "b-reviews-btn b-reviews-prev icon-arrow-left",
        nextButtonClass : "b-reviews-btn b-reviews-next icon-arrow-right",
        afterChange : function(){
            bindFancyReviews();
        },
        style : function(s){
            return {
                "-webkit-transform" : "translateX("+s.left+"px) scale("+s.scale+")",
                   "-moz-transform" : "translateX("+s.left+"px) scale("+s.scale+")",
                    "-ms-transform" : "translateX("+s.left+"px) scale("+s.scale+")",
                     "-o-transform" : "translateX("+s.left+"px) scale("+s.scale+")",
                        "transform" : "translateX("+s.left+"px) scale("+s.scale+")",
                "opacity" : s.opacity
            };
        },
        afterInit : function (_){
            bindFancyReviews(); 
        },
        resize : function(_){
            var cols = (Math.floor(_.width()/_.slideWidth) == 0)?1:Math.floor(_.width()/_.slideWidth),
                margin = Math.floor((_.width() % _.slideWidth)/(cols-1)),
                states = [{
                    left : _.slideWidth*(-1),
                    opacity : 0,
                    scale : 0.7
                }];

            margin = (""+margin == "NaN")?0:margin;

            console.log(""+margin);
            // cols = (cols == 0)?1:cols;

            for (var i = 0; i < cols; i++) {
                states.push({
                    left : i*_.slideWidth+i*margin,
                    opacity : 1,
                    scale : 1
                });   
            }

            states.push({
                left : states[states.length-1].left+_.slideWidth,
                opacity : 0,
                scale : 0.7
            });   

            _.o.states = states;
            console.log(states);
        }
    });

    function bindFancyReviews(){
        $(".fancy-review").each(function(){
            $(this).fancybox({
                padding : 0,
                speed : 300,
                clickOutside : 'close',
                helpers: {
                    overlay: {
                        locked: true 
                    }
                },
                closeTpl : '<button data-fancybox-close class="fancybox-close-small b-popup-close icon-cross"></button>',
                beforeShow: function(){
                    $(".fancybox-wrap").addClass("beforeShow");
                },
                afterShow: function(){
                    $(".fancybox-wrap").removeClass("beforeShow");
                    $(".fancybox-wrap").addClass("afterShow");
                },
                beforeClose: function(){
                    $(".fancybox-wrap").removeClass("afterShow");
                    $(".fancybox-wrap").addClass("beforeClose");
                },
                afterClose: function(){
                    $(".fancybox-wrap").removeClass("beforeClose");
                    $(".fancybox-wrap").addClass("afterClose");
                }
            }).removeClass("fancy-review");
        });
    }

    $(".b-doc-slider").KitCarousel({
        duration : ( isDesktop || isTablet )?400:700,
        fps : 60,
        dots : false,
        centerMode : true,
        prevButtonClass : "b-reviews-btn b-reviews-prev icon-arrow-left",
        nextButtonClass : "b-reviews-btn b-reviews-next icon-arrow-right",
        style : function(s){
            return {
                "-webkit-transform" : "translateX("+s.left+"px) scale("+s.scale+")",
                   "-moz-transform" : "translateX("+s.left+"px) scale("+s.scale+")",
                    "-ms-transform" : "translateX("+s.left+"px) scale("+s.scale+")",
                     "-o-transform" : "translateX("+s.left+"px) scale("+s.scale+")",
                        "transform" : "translateX("+s.left+"px) scale("+s.scale+")",
                "opacity" : s.opacity
            };
        },
        afterInit : function (_){
            setTimeout(function(){
                _.resize();
            },300);
            setTimeout(function(){
                _.resize();
            },1000);
        },
        resize : function(_){
            var cols = Math.floor(_.width()/_.slideWidth),
                margin = Math.floor((_.width() % _.slideWidth)/(cols-1)),
                states = [{
                    left : -250,
                    opacity : 0,
                    scale : 0.7
                }];

            for (var i = 0; i < cols; i++) {
                states.push({
                    left : i*_.slideWidth+i*margin,
                    opacity : 1,
                    scale : 1
                });   
            }

            states.push({
                left : states[states.length-1].left+250,
                opacity : 0,
                scale : 0.7
            });   

            _.o.states = states;
        }
    });

    $.fn.placeholder = function() {
        if(typeof document.createElement("input").placeholder == 'undefined') {
            $('[placeholder]').focus(function() {
                var input = $(this);
                if (input.val() == input.attr('placeholder')) {
                    input.val('');
                    input.removeClass('placeholder');
                }
            }).blur(function() {
                var input = $(this);
                if (input.val() == '' || input.val() == input.attr('placeholder')) {
                    input.addClass('placeholder');
                    input.val(input.attr('placeholder'));
                }
            }).blur().parents('form').submit(function() {
                $(this).find('[placeholder]').each(function() {
                    var input = $(this);
                    if (input.val() == input.attr('placeholder')) {
                        input.val('');
                    }
                });
            });
        }
    }
    $.fn.placeholder();
    
	if( $("#map").length ){
        var bxid = "ololo";
        var myPlace = new google.maps.LatLng(56.465708, 84.960029);
        var myOptions = {
            zoom: 17,
            center: new google.maps.LatLng(56.465808, 84.962329),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            disableDefaultUI: true,
            scrollwheel: false,
            zoomControl: true,
            fullscreenControl: true
        }
        var map = new google.maps.Map(document.getElementById("map"), myOptions); 

        var marker = new google.maps.Marker({
            position: myPlace,
            icon: {
                url: "/bitrix/templates/main/i/pin.svg", // url
                scaledSize: new google.maps.Size(48, 75), // scaled size
                origin: new google.maps.Point(0,0), // origin
                anchor: new google.maps.Point(24,75) // anchor
            },
            animation: google.maps.Animation.DROP,
            map: map,
            title: "«Клиника Восстановительной Ортопедии»"
        });
    }

    //  var options = {
    //     $AutoPlay: true,                                
    //     $SlideDuration: 500,                            

    //     $BulletNavigatorOptions: {                      
    //         $Class: $JssorBulletNavigator$,             
    //         $ChanceToShow: 2,                           
    //         $AutoCenter: 1,                            
    //         $Steps: 1,                                  
    //         $Lanes: 1,                                  
    //         $SpacingX: 10,                              
    //         $SpacingY: 10,                              
    //         $Orientation: 1                             
    //     }
    // };

    // var jssor_slider1 = new $JssorSlider$("slider1_container", options);


    function retina(){
        var mediaQuery = "(-webkit-min-device-pixel-ratio: 1.5),\
            (min--moz-device-pixel-ratio: 1.5),\
            (-o-min-device-pixel-ratio: 3/2),\
            (min-resolution: 1.5dppx)";
        if (window.devicePixelRatio > 1)
            return true;
        if (window.matchMedia && window.matchMedia(mediaQuery).matches)
            return true;
        return false;
    }

});