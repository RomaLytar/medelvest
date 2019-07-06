
$(function () {
  $('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
  });
  $('.slider-nav').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    focusOnSelect: true,
    prevArrow: false,
    nextArrow: false
  });


  $(".phone .wrapper .tab").click(function () {
    $(".phone .wrapper .tab").removeClass("active").eq($(this).index()).addClass("active");
    $(".phone .tab_item").hide().eq($(this).index()).fadeIn()
  }).eq(0).addClass("active");

  $(".account_tab .wrapper .tab").click(function () {
    $(".account_tab .wrapper .tab").removeClass("active").eq($(this).index()).addClass("active");
    $(".account_tab .tab_item").hide().eq($(this).index()).fadeIn()
  }).eq(0).addClass("active");

  $(".account_story .wrapper2 .tab2").click(function () {
    $(".account_story .wrapper2 .tab2").removeClass("active").eq($(this).index()).addClass("active");
    $(".account_story .tab_item2").hide().eq($(this).index()).fadeIn()
  }).eq(0).addClass("active");

  $('.popup-with-form').magnificPopup({
    type: 'inline',
    preloader: false,
    focus: '#name',
    callbacks: {
      beforeOpen: function () {
        if ($(window).width() < 700) {
          this.st.focus = false;
        } else {
          this.st.focus = '#name';
        }
      }
    }
  });
  $('.popup-with-video').magnificPopup({
    type: 'inline',
    preloader: false,
    focus: '#name',

    callbacks: {
      beforeOpen: function () {
        if ($(window).width() < 700) {
          this.st.focus = false;
        } else {
          this.st.focus = '#name';
        }
      }
    }
  });
});
$(function () {
  $('.btn_menu').click(function () {
    $('.left_menu, .btn_row, .menu ul, .menu ul li').toggleClass('active')
  });
});
$(function () {
  $('.btn_menu2').click(function () {
    $('.category_menu_ul, .category_menu ul, .category_menu ul li, .btn_menu2').toggleClass('active')
  });
});


$(function () {
  $('.filtr').click(function () {
    $('.filter_content, .filter_content .row, .filtr img, .text_filtr, .filtr').toggleClass('active');


  });
});



$('.popup-with-form').magnificPopup({
  type: 'inline',
  preloader: false,
  focus: '#name',

  callbacks: {
    beforeOpen: function () {
      if ($(window).width() < 700) {
        this.st.focus = false;
      } else {
        this.st.focus = '#name';
      }
    }
  }
});
$('.popup-callback').magnificPopup({
  type: 'inline',
  preloader: false,
  focus: '#name',

  callbacks: {
    beforeOpen: function () {
      if ($(window).width() < 700) {
        this.st.focus = false;
      } else {
        this.st.focus = '#name';
      }
    }
  }
});



$(function () {
  $('.btn_massage').click(function () {
    $('.massage, .massage_form, .btn_massage').toggleClass('active')
  });
});
$(function () {
  $('.btn_massage_mobil').click(function () {
    $('.massage, .massage_form, .btn_massage, .btn_massage_mobil').toggleClass('active')
  });
});

$(function () {
  $('.plus').click(function () {
    $(this).toggleClass('active')
  });
});
$("color_filter .wrapper .tab").click(function () {
  $(".color_filter .wrapper .tab").removeClass("active").eq($(this).index()).addClass("active");
  $(".color_filter .tab_item").hide().eq($(this).index()).fadeIn()
}).eq(0).addClass("active");


$(".color_filter .wrapper .tab").click(function () {
  $(".color_filter .wrapper .tab").removeClass("active").eq($(this).index()).addClass("active");
  $(".color_filter .tab_item").hide().eq($(this).index()).fadeIn()
}).eq(0).addClass("active");

$('.popup-gallery').magnificPopup({
  delegate: 'a',
  type: 'image',
  tLoading: 'Loading image #%curr%...',
  mainClass: 'mfp-img-mobile',
  gallery: {
    enabled: true,
    navigateByImgClick: true,
    preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
  },

});
$(function () {
  $('.slider').slick({
    slidesToShow: 4,
    prevArrow: $('.prev'),
    nextArrow: $('.next'),
    responsive: [
      {
        breakpoint: 995,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 430,
        settings: {

          slidesToShow: 1
        }
      }

    ]

  });
});

$(function () {
  $('.btn_info').click(function () {
    $('.add, .footer').toggleClass('active');
  });
});

$(window).on('load', function () {
  var $preloader = $('#preloader'),
    $svg_anm = $preloader.find('#preloader');
  $svg_anm.fadeOut();
  $preloader.delay(500).fadeOut('slow');

});

/////////////// FOR DELETE FIRS CONSTRUCTOR LLIDER ON DESCTOP

function deleteSlider() {
  let windowWidt = $(window).width();
  let firstSlider = $('.firstConstructorSlider');
  let appendItem = $('.first-step .data');
  if (windowWidt > 992) {
    firstSlider.detach();
  } else if (windowWidt < 992) {
    firstSlider.appendTo(appendItem[0])
  }
}

$(window).on('load resize', deleteSlider)


$(function () {

  $("#slider-range").slider({
    min: 0,
    max: 100000,
    values: [0, 100000],
    range: true,
    stop: function (event, ui) {
      $("input#minCost").val($("#slider-range").slider("values", 0));
      $("input#maxCost").val($("#slider-range").slider("values", 1));
    },
    slide: function (event, ui) {
      $("input#minCost").val($("#slider-range").slider("values", 0));
      $("input#maxCost").val($("#slider-range").slider("values", 1));
    }
  });
  $("input#minCost").change(function () {
    var value1 = $("input#minCost").val();
    var value2 = $("input#maxCost").val();

    if (parseInt(value1) > parseInt(value2)) {
      value1 = value2;
      $("input#minCost").val(value1);
    }
    $("#slider-range").slider("values", 0, value1);
  });


  $("input#maxCost").change(function () {
    var value1 = $("input#minCost").val();
    var value2 = $("input#maxCost").val();

    if (value2 > 100000) { value2 = 100000; $("input#maxCost").val(100000) }

    if (parseInt(value1) > parseInt(value2)) {
      value2 = value1;
      $("input#maxCost").val(value2);
    }
    $("#slider-range").slider("values", 1, value2);
  });
});

$(function () {

  $("#slider-width").slider({
    min: 0,
    max: 100000,
    values: [0, 100000],
    range: true,
    stop: function (event, ui) {
      $("input#minCost2").val($("#slider-width").slider("values", 0));
      $("input#maxCost2").val($("#slider-width").slider("values", 1));
    },
    slide: function (event, ui) {
      $("input#minCost2").val($("#slider-width").slider("values", 0));
      $("input#maxCost2").val($("#slider-width").slider("values", 1));
    }
  });
  $("input#minCost2").change(function () {
    var value1 = $("input#minCost2").val();
    var value2 = $("input#maxCost2").val();

    if (parseInt(value1) > parseInt(value2)) {
      value1 = value2;
      $("input#minCost2").val(value1);
    }
    $("#slider-width").slider("values", 0, value1);
  });


  $("input#maxCost").change(function () {
    var value1 = $("input#minCost2").val();
    var value2 = $("input#maxCost2").val();

    if (value2 > 100000) { value2 = 100000; $("input#maxCost2").val(100000) }

    if (parseInt(value1) > parseInt(value2)) {
      value2 = value1;
      $("input#maxCost2").val(value2);
    }
    $("#slider-width").slider("values", 1, value2);
  });
});

$(function () {

  $("#slider-height").slider({
    min: 0,
    max: 100000,
    values: [0, 100000],
    range: true,
    stop: function (event, ui) {
      $("input#minCost3").val($("#slider-height").slider("values", 0));
      $("input#maxCost3").val($("#slider-height").slider("values", 1));
    },
    slide: function (event, ui) {
      $("input#minCost3").val($("#slider-height").slider("values", 0));
      $("input#maxCost3").val($("#slider-height").slider("values", 1));
    }
  });
  $("input#minCost3").change(function () {
    var value1 = $("input#minCost3").val();
    var value2 = $("input#maxCost3").val();

    if (parseInt(value1) > parseInt(value2)) {
      value1 = value2;
      $("input#minCost3").val(value1);
    }
    $("#slider-height3").slider("values", 0, value1);
  });


  $("input#maxCost3").change(function () {
    var value1 = $("input#minCost3").val();
    var value2 = $("input#maxCost3").val();

    if (value2 > 100000) { value2 = 100000; $("input#maxCost3").val(100000) }

    if (parseInt(value1) > parseInt(value2)) {
      value2 = value1;
      $("input#maxCost3").val(value2);
    }
    $("#slider-height").slider("values", 1, value2);
  });
});

$(function () {

  $("#slider-depth").slider({
    min: 0,
    max: 100000,
    values: [0, 100000],
    range: true,
    stop: function (event, ui) {
      $("input#minCost4").val($("#slider-depth").slider("values", 0));
      $("input#maxCost4").val($("#slider-depth").slider("values", 1));
    },
    slide: function (event, ui) {
      $("input#minCost4").val($("#slider-depth").slider("values", 0));
      $("input#maxCost4").val($("#slider-depth").slider("values", 1));
    }
  });
  $("input#minCost4").change(function () {
    var value1 = $("input#minCost4").val();
    var value2 = $("input#maxCost4").val();

    if (parseInt(value1) > parseInt(value2)) {
      value1 = value2;
      $("input#minCost4").val(value1);
    }
    $("#slider-depth").slider("values", 0, value1);
  });


  $("input#maxCost4").change(function () {
    var value1 = $("input#minCost4").val();
    var value2 = $("input#maxCost4").val();

    if (value2 > 100000) { value2 = 100000; $("input#maxCost4").val(100000) }

    if (parseInt(value1) > parseInt(value2)) {
      value2 = value1;
      $("input#maxCost4").val(value2);
    }
    $("#slider-depth").slider("values", 1, value2);
  });
});


/// config //////
var touchHover = function () {
  $('[data-hover]').click(function (e) {
    e.preventDefault();
    var $this = $(this);
    var onHover = $this.attr('data-hover');
    var linkHref = $this.attr('href');
    if (linkHref && $this.hasClass(onHover)) {
      location.href = linkHref;
      return false;
    }
    $this.toggleClass(onHover);
  });
};
$(document).ready(function () { touchHover(); });
$(function ($) {
  var allAccordions = $('.accordion div.data');
  var allAccordionItems = $('.accordion .accordion-item');
  $('.accordion > .accordion-item').click(function () {
    if ($(this).hasClass('open')) {
      $(this).removeClass('open');
      $(this).next().slideUp("slow");
    }
    else {
      allAccordionItems.removeClass('open');
      $(this).addClass('open');
      $(this).next().slideDown("slow");
      return false;
    }
  });
});
$(".tabConf").click(function () {
  $(".img_tab").removeClass("active").eq($(this).index()).addClass("active");
  $(".titel-config").removeClass("active").eq($(this).index()).addClass("active");
  $(".titel-config").hide().eq($(this).index()).fadeIn();
  $('.price-value').addClass('active');
  $(".price-value").hide().eq($(this).index()).fadeIn();


});
$(".tab_size").click(function () {
  $(".img_tab1").removeClass("active").eq($(this).index()).addClass("active");
  $(".stick").removeClass("active").eq($(this).index()).addClass("active");
  $('.btn_config').css('display', 'none');
  $(".img_wardrob").removeClass("active").eq($(this).index()).addClass("active");
  $(".back").addClass("active");
  $(".size_box").hide().eq($(this).index()).fadeIn();
  $(".btn-next-step").addClass('active');
});

$(".door").click(function () {
  $(".img_tab1").removeClass("active").eq($(this).index()).addClass("active");
  $(".stick").removeClass("active").eq($(this).index()).addClass("active");
  $('.btn_config').css('display', 'none');
  $(".img_wardrob").removeClass("active").eq($(this).index()).addClass("active");
  $(".back").addClass("active");
  $(".size_box").hide().eq($(this).index()).fadeIn();
  $(".btn-next-step").addClass('active');

});

$(".size_box").click(function () {
  $(".img_tab1").removeClass("active").eq($(this).index()).addClass("active");
  $(".stick").removeClass("active").eq($(this).index()).addClass("active");
  $(".img_wardrob").removeClass("active").eq($(this).index()).addClass("active");
  $(".back").addClass('active');
  $('.btn_config').css('display', 'none');
  $(".btn-next-step").addClass('active');
  // $('.titel-config').css('display', 'none');
  $(".size_box").hide().eq($(this).index()).fadeIn();
});


$(".back").click(function () {
  $(".back").removeClass("active");
  $(".img_wardrob").removeClass("active");
  $(".size_box").show().eq($(this).index()).fadeIn();
  $('.btn_config').css('display', 'block');
});
$(function () {
  var counter = 0;
  $(".next-arrow").click(function () {
    counter += 630;
    $(".slider_box2").scrollLeft(counter);
  });
  $(".prev-arrow").click(function () {
    counter -= 630;
    $(".slider_box2").scrollLeft(counter);
  });
});

$(".door").click(function () {
  $(".img_tab3").removeClass("active").eq($(this).index()).addClass("active");
  $(".price-value1").removeClass("active").eq($(this).index()).addClass("active");
  $(".price-value1").hide().eq($(this).index()).fadeIn();
});
$(".tab_size").click(function () {
  $(".img_tab3").removeClass("active").eq($(this).index()).addClass("active");
  $(".price-value2").removeClass("active").eq($(this).index()).addClass("active");
  $(".price-value2").hide().eq($(this).index()).fadeIn();
});
$(".color").click(function () {
  $(".img_tab3").removeClass("active").eq($(this).index()).addClass("active");
  $(".price-value3").removeClass("active").eq($(this).index()).addClass("active");
  $(".price-value3").hide().eq($(this).index()).fadeIn();
});
$(".color-block").click(function () {
  $(".img_tab3").removeClass("active").eq($(this).index()).addClass("active");
  $(".price-value4").removeClass("active").eq($(this).index()).addClass("active");
  $(".price-value4").hide().eq($(this).index()).fadeIn();
});
$(".tab_fasad").click(function () {
  $(".img_tab3").removeClass("active").eq($(this).index()).addClass("active");
  $(".price-value5").removeClass("active").eq($(this).index()).addClass("active");
  $(".price-value5").hide().eq($(this).index()).fadeIn();
});
$(".tab_addition").click(function () {
  $(".img_tab3").removeClass("active").eq($(this).index()).addClass("active");
  $(".price-value6").removeClass("active").eq($(this).index()).addClass("active");
  $(".price-value6").hide().eq($(this).index()).fadeIn();
});


$(".btn-next-step").click(function () {
  $('.btn-next-step').css('display', 'none');
  // $('.btn-second-step').css('display', 'block');
  $('.first-step').css('display', 'none');
  $('.second-step').css('display', 'block');
  $('.step2').addClass('active');
  $('.step1').removeClass('active');
});
$(".color-block").click(function () {
  $('.btn-second-step').addClass('active');
});
$(".add-more").click(function () {
  $('.btn-third-step').addClass('active');
});
$('.city').click(function () {
  $('.city_popup_box').addClass('active');
});

$(".btn-second-step").click(function () {
  $('.btn-second-step').css('display', 'none');
  // $('.btn-third-step').css('display', 'block');
  $('.first-step').css('display', 'none');
  $('.second-step').css('display', 'none');
  $('.third-step').css('display', 'block');
  $('.step1').removeClass('active');
  $('.step2').removeClass('active');
  $('.step3').addClass('active');

});

$(".btn-third-step").click(function () {
  $('.btn-second-step').css('display', 'none');
  $('.btn-third-step').css('display', 'none');
  $('.first-step').css('display', 'none');
  $('.second-step').css('display', 'none');
  $('.third-step').css('display', 'none');
  $('.fourth-step').css('display', 'block');
  $('.step1').removeClass('active');
  $('.step2').removeClass('active');
  $('.step3').removeClass('active');
  $('.step4').addClass('active');

});

$('.close-city').click(function () {
  $('.city_popup_box').removeClass('active');
});
$('.city').click(function () {
  $('.city_popup_box').addClass('active');
});



document.getElementById('btn-third-step').addEventListener('click', () => {

  let sum = Array.from(document.querySelectorAll('input[type="radio"]')).reduce(function (res, el) {
    if (el.checked) {
      return res + parseInt(el.getAttribute('data-cost'))
    }
    return res
  }, 0)
  configuratorTotalCost.innerHTML = sum + ' грн';
})


let acceptTerm = document.getElementById('accept-term')
acceptTerm.addEventListener('click', () => {
  let btnToOrder = document.querySelector('.btn-toorder');
  if (acceptTerm.checked) {
    btnToOrder.disabled = false;
  } else {
    btnToOrder.disabled = true;
  }
})


/// => KITCHEN CONFIGURATOR
$(".kitchen-slider1").slick({
  prevArrow: '<i class="fas fa-chevron-left"></i>',
  nextArrow: '<i class="fas fa-chevron-right"></i>',
  slidesPerRow: 2,
  rows: 2,
  responsive: [
  ]
});

$(".tabModel").click(function () {
  // $(".img_tab3").removeClass("active").eq($(this).index()).addClass("active");
  $(".kitchen-price-value").removeClass("active").eq($(this).index()).addClass("active");
  $(".kitchen-price-value").hide().eq($(this).index()).fadeIn();
});
$(".kitchen-fasad").click(function () {
  // $(".img_tab3").removeClass("active").eq($(this).index()).addClass("active");
  $(".kitchen-price-value1").removeClass("active").eq($(this).index()).addClass("active");
  $(".kitchen-price-value1").hide().eq($(this).index()).fadeIn();
});
$(".kitchen-corps-color").click(function () {
  // $(".img_tab3").removeClass("active").eq($(this).index()).addClass("active");
  $(".kitchen-price-value2").removeClass("active").eq($(this).index()).addClass("active");
  $(".kitchen-price-value2").hide().eq($(this).index()).fadeIn();
});
$(".kitchen-location").click(function () {
  // $(".img_tab3").removeClass("active").eq($(this).index()).addClass("active");
  $(".kitchen-price-value3").removeClass("active").eq($(this).index()).addClass("active");
  $(".kitchen-price-value3").hide().eq($(this).index()).fadeIn();
});
$(".kitchen-tableTop-color").click(function () {
  // $(".img_tab3").removeClass("active").eq($(this).index()).addClass("active");
  $(".kitchen-price-value4").removeClass("active").eq($(this).index()).addClass("active");
  $(".kitchen-price-value4").hide().eq($(this).index()).fadeIn();
});
$(".kitchen-base-color").click(function () {
  // $(".img_tab3").removeClass("active").eq($(this).index()).addClass("active");
  $(".kitchen-price-value5").removeClass("active").eq($(this).index()).addClass("active");
  $(".kitchen-price-value5").hide().eq($(this).index()).fadeIn();
});
$(".kitchen-eaves-color").click(function () {
  // $(".img_tab3").removeClass("active").eq($(this).index()).addClass("active");
  $(".kitchen-price-value6").removeClass("active").eq($(this).index()).addClass("active");
  $(".kitchen-price-value6").hide().eq($(this).index()).fadeIn();
});
$(".kitchen-corps-color").click(function () {
  $('.btn-next-step').addClass('active');
});

$('.btn-to-secondStep').click(function () {
  $('.first-step').css('display', 'none');
  $('.second-step').css('display', 'block');
  $('.kitchen-slider1').css('display', 'none');
  $('.kitchen-sections').css('display', 'block');
  $('.step1').removeClass('active');
  $('.step2').addClass('active');
})
$('.btn-to-thirdStep').click(function () {
  $('.second-step').css('display', 'none');
  $('.third-step').css('display', 'block');
  $('.kitchen-sections').css('display', 'none');
  $('.step2').removeClass('active');
  $('.step3').addClass('active');
})


let kitchenModules = Array.from(document.getElementsByClassName('modulesType'));

kitchenModules.forEach(el => el.addEventListener('click', openAdditionalModules));

function openAdditionalModules(event) {
  event = event || window.event;
  if (event.target.classList.contains('openAdd')) {
      this.getElementsByClassName('modulesType-additionalBlock')[0].classList.toggle('openAddBlock')
      event.target.classList.toggle('rotateAdd');
  }   
}


let dropMenuWrap = Array.from(document.getElementsByClassName('size-dropMenu-open'));

dropMenuWrap.forEach(el => el.addEventListener('click', openDropMenu));

function openDropMenu(event) {
  event = event || window.event;
  if (event.target.classList.contains('size-dropMenu-inp')) {
    this.getElementsByTagName('UL')[0].classList.toggle('openDropMenu')
  }
  if(event.target.tagName == 'LI'){
    this.getElementsByTagName('INPUT')[0].value = event.target.innerHTML
  }

}
