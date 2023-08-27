<?php
if(ZX_SLIDESHOW_STATUS == 'true') {
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
    jQuery(window).on("load", function () {
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            <?php if(ZX_SLIDESHOW_AUTOPLAY == 'true') { ?>
            autoplay: {
                delay: <?php echo ZX_SLIDESHOW_PAUSE; ?>,
            },
            <?php } ?>
            effect: '<?php echo ZX_SLIDESHOW_EFFECT; ?>',
            direction: 'horizontal',
            speed: <?php echo ZX_SLIDESHOW_ANIM_SPEED; ?>,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            on: {
                init: function () {
                    var currentSlide = this.slides[this.activeIndex];
                    var title = currentSlide.querySelector(".slideTitle");
                    var subtitle = currentSlide.querySelector(".slideSubtitle");
                    var leadin = currentSlide.querySelector(".slideLeadin");
                    var text = currentSlide.querySelector(".slideText");
                    var button = currentSlide.querySelector(".slideButton");
                    title && title.classList.remove("hidden");
                    subtitle && subtitle.classList.remove("hidden");
                    leadin && leadin.classList.remove("hidden");
                    text && text.classList.remove("hidden");
                    button && button.classList.remove("hidden");
                    title && title.classList.add("animate__animated");
                    subtitle && subtitle.classList.add("animate__animated");
                    leadin && leadin.classList.add("animate__animated");
                    text && text.classList.add("animate__animated");
                    button && button.classList.add("animate__animated");
                },
                slideChangeTransitionEnd: function () {
                    var previousSlideIndex = this.previousIndex;
                    var previousSlide = this.slides[previousSlideIndex];
                    var previousTitle = previousSlide.querySelector(".slideTitle");
                    var previousSubtitle = previousSlide.querySelector(".slideSubtitle");
                    var previousLeadin = previousSlide.querySelector(".slideLeadin");
                    var previousText = previousSlide.querySelector(".slideText");
                    var previousButton = previousSlide.querySelector(".slideButton");
                    previousTitle && previousTitle.classList.remove("animate__animated");
                    previousSubtitle && previousSubtitle.classList.remove("animate__animated");
                    previousLeadin && previousLeadin.classList.remove("animate__animated");
                    previousText && previousText.classList.remove("animate__animated");
                    previousButton && previousButton.classList.remove("animate__animated");

                    var currentSlide = this.slides[this.activeIndex];
                    var title = currentSlide.querySelector(".slideTitle");
                    var subtitle = currentSlide.querySelector(".slideSubtitle");
                    var leadin = currentSlide.querySelector(".slideLeadin");
                    var text = currentSlide.querySelector(".slideText");
                    var button = currentSlide.querySelector(".slideButton");

                    // Add the hidden class to the title and subtitle elements
                    title && title.classList.add("hidden");
                    subtitle && subtitle.classList.add("hidden");
                    leadin && leadin.classList.add("hidden");
                    text && text.classList.add("hidden");
                    button && button.classList.add("hidden");

                    // Remove the animate__animated class from the previous slide
                    setTimeout(function () {
                        previousTitle && previousTitle.classList.add("hidden");
                        previousSubtitle && previousSubtitle.classList.add("hidden");
                        previousLeadin && previousLeadin.classList.add("hidden");
                        previousText && previousText.classList.add("hidden");
                        previousButton && previousButton.classList.add("hidden");
                    }, 10);

                    // Apply the animation classes to the current slide after a small delay
                    setTimeout(function () {
                        title && title.classList.remove("hidden");
                        subtitle && subtitle.classList.remove("hidden");
                        leadin && leadin.classList.remove("hidden");
                        text && text.classList.remove("hidden");
                        button && button.classList.remove("hidden");
                        title && title.classList.add("animate__animated");
                        subtitle && subtitle.classList.add("animate__animated");
                        leadin && leadin.classList.add("animate__animated");
                        text && text.classList.add("animate__animated");
                        button && button.classList.add("animate__animated");
                    }, 20);
                },
            },
        });
    });
</script>

<?php } ?>
