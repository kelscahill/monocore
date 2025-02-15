import domReady from '@roots/sage/client/dom-ready';
import Glide from '@glidejs/glide';
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

/**
 * Application entrypoint
 */
domReady(async () => {
  /**
   * Tabs
   * 1. Check if tab links or tab content exist
   * 2. Add a click event listener to each tab link
   * 3. Get the tab name from the clicked link's data attribute
   * 4. Update the browser's URL without reloading the page
   * 5. Remove the active state from all tab links, then add it to the clicked link
   * 6. Show the relevant tab content and hide others
   * 7. Dispatch a custom event when a tab is changed
   */
  const tabLinks = document.querySelectorAll('.js-tab-link');
  const tabContent = document.querySelectorAll('.js-tab-content');
  /* 1 */
  if (tabLinks.length > 0 && tabContent.length > 0) {
    /* 2 */
    tabLinks.forEach(link => {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        /* 3 */
        const tab = this.getAttribute('data-tab');
        /* 4 */
        history.pushState(null, '', `?tab=${tab}`);
        /* 5 */
        tabLinks.forEach(link => link.classList.remove('this-is-active'));
        this.classList.add('this-is-active');
        /* 6 */
        tabContent.forEach(item => {
          item.style.display = item.id === tab ? 'block' : 'none';
        });
        /* 7 */
        const tabChangedEvent = new CustomEvent('tabChanged', {
          detail: { activeTab: tab },
        });
        document.dispatchEvent(tabChangedEvent);
      });
    });
  }

  /**
   * GSAP animations
   */
  gsap.registerPlugin(ScrollTrigger);

  /**
   * GSAP animations with delays
   */
  const triggers = document.querySelectorAll("section, .js-gsap-trigger");
  if (triggers.length > 0) {
    triggers.forEach((trigger) => {
      /**
       * GSAP Fade in animation
       */
      const gsapFadeIn = trigger.querySelectorAll(".js-gsap-fade-in");
      if (gsapFadeIn.length > 0) {
        gsapFadeIn.forEach((element, index) => {
          gsap.to(
            element,
            {
              opacity: 1,
              duration: 0.8,
              ease: "power1.in",
              scrollTrigger: element,
              delay: index * 0.1, // Adjust the delay for stagger effect
            }
          );
        });
      }

      /**
       * GSAP Scale in animation
       */
      const gsapScaleIn = trigger.querySelectorAll(".js-gsap-scale-in");
      if (gsapScaleIn.length > 0) {
        gsapScaleIn.forEach((element, index) => {
          gsap.to(
            element,
            {
              scale: 1,
              opacity: 1,
              duration: 0.8,
              ease: "power1.in",
              scrollTrigger: element,
              delay: index * 0.1, // Adjust the delay for stagger effect
              transformOrigin: "center center",
            }
          );
        });
      }

      /**
       * GSAP Slide in left animation
       */
      const gsapSlideInLeft = trigger.querySelectorAll(".js-gsap-slide-in-left");
      if (gsapSlideInLeft.length > 0) {
        gsapSlideInLeft.forEach((element, index) => {
          gsap.to(
            element,
            {
              x: 0,
              opacity: 1,
              duration: 0.8,
              ease: "power1.in",
              scrollTrigger: element,
              delay: index * 0.1, // Adjust the delay for stagger effect
            }
          );
        });
      }

      /**
       * GSAP Slide in right animation
       */
      const gsapSlideInRight = trigger.querySelectorAll(".js-gsap-slide-in-right");
      if (gsapSlideInRight.length > 0) {
        gsapSlideInRight.forEach((element, index) => {
          gsap.to(
            element,
            {
              x: 0,
              opacity: 1,
              duration: 0.8,
              ease: "power1.in",
              scrollTrigger: element,
              delay: index * 0.1, // Adjust the delay for stagger effect
            }
          );
        });
      }

      /**
       * GSAP Slide in up animation
       */
      const gsapSlideInUp = trigger.querySelectorAll(".js-gsap-slide-in-up");
      if (gsapSlideInUp.length > 0) {
        gsapSlideInUp.forEach((element, index) => {
          gsap.to(
            element,
            {
              y: 0,
              opacity: 1,
              duration: 0.8,
              ease: "power1.in",
              scrollTrigger: element,
              delay: index * 0.1, // Adjust the delay for stagger effect
            }
          );
        });
      }

      /**
       * GSAP Swing in animation
       */
      const gsapSwingIn = trigger.querySelectorAll(".js-gsap-swing-in");
      if (gsapSwingIn.length > 0) {
        gsapSwingIn.forEach((element, index) => {
          // Create a GSAP timeline for the animation
          const tl = gsap.timeline({ defaults: { ease: 'power2.out' } });

          // Define the animation sequence
          tl.to(element, {
            opacity: 1,
            duration: 0.6,
            rotation: -2,
            ease: 'power2.in',
            delay: index * 0.4,
          }).to(element, {
            rotation: 2,
            duration: 0.8,
            ease: 'power2.inOut',
          }).to(element, {
            rotation: 0,
            duration: 0.6,
            ease: 'power2.out',
          });

          // Use ScrollTrigger to trigger the animation
          ScrollTrigger.create({
            trigger: element,
            start: 'top 80%',
            animation: tl,
            toggleActions: 'play none none none',
          });
        });
      }

    }); // end of triggers foreach
  } // end of trigger if


  document.addEventListener('DOMContentLoaded', () => {
    /**
     * Function to split words and apply GSAP animation
     * 1. Set initial opacity to make the element visible
     * 2. Split the text content into words and spaces
     * 3. Store wordDivs to animate later
     * 4. Loop through each word or space
     * 5. Create divs for words and spaces to apply animation
     * 6. Preserve spaces in the content
     */
    function splitWords(targetElement) {
      targetElement.style.opacity = 1; /* 1 */
      const wordsAndSpaces = targetElement.textContent.trim().match(/(\S+|\s+)/g); /* 2 */
      targetElement.innerHTML = '';
      const wordDivs = []; /* 3 */
      /* 4 */
      wordsAndSpaces.forEach((item) => {
        if (item.trim()) {
          /* 5 */
          const maskDiv = document.createElement('div');
          maskDiv.classList.add('o-mask');
          const wordDiv = document.createElement('div');
          wordDiv.textContent = item;
          maskDiv.appendChild(wordDiv);
          targetElement.appendChild(maskDiv);
          wordDivs.push(wordDiv);
        } else {
          /* 6 */
          targetElement.appendChild(document.createTextNode(item));
        }
      });

      /**
       * Trigger the GSAP animation on the created elements
       */
      gsap.fromTo(wordDivs,
        {
          y: 300,
          opacity: 0,
        },
        {
          y: 0,
          opacity: 1,
          delay: 0.1,
          stagger: 0.05,
          duration: 1,
          ease: "Quint.easeOut",
        }
      );
    }

    /**
     * GSAP Split words fade up animation
     */
    const gsapSplitWords = document.querySelectorAll(".js-gsap-split-words");
    if (gsapSplitWords.length > 0) {
      gsapSplitWords.forEach((element) => {
        gsap.to(element, {
          ease: "Quint.easeOut",
          scrollTrigger: {
            trigger: element,
            start: "top bottom",
            onEnter: () => splitWords(element),
          },
        });
      });
    }

    /**
     * GSAP Shrink Text
     */
    const gsapShrinkText = gsap.utils.toArray('.js-gsap-shrink-text');
    if (gsapShrinkText.length > 0 && window.innerWidth > 720) {
      gsapShrinkText.forEach((element) => {
        const trigger = element.closest("section");
        gsap.to(
          element,
          {
            fontSize: "64px",
            scrollTrigger: {
              trigger: trigger,
              scrub: true,
              start: `top +=80`,
              end: "+=500",
              pin: true,
              pinSpacing: false,
            },
          }
        );
      });
    }

    /**
     * GSAP Scale down animation
     */
    const gsapScaleDown = gsap.utils.toArray(".js-gsap-scale-down");
    if (gsapScaleDown.length > 0) {
      gsapScaleDown.forEach((element) => {
        gsap.to(
          element,
          {
            width: "100%",
            marginLeft: 0,
            marginRight: 0,
            left: 0,
            right: 0,
            scrollTrigger: {
              trigger: element,
              scrub: true,
              start: "top center",
              end: "top +=100",
            },
          }
        );
      });
    }

    /**
     * GSAP Background image animation
     */
    const gsapBackgroundImage = gsap.utils.toArray(".js-gsap-background-image");
    if (gsapBackgroundImage.length > 0) {
      gsapBackgroundImage.forEach((element) => {
        gsap.to(element, {
          backgroundPosition: `50% ${innerHeight / 4}`,
          ease: "none",
          scrollTrigger: {
            trigger: element,
            scrub: true,
          },
        });
      });
    }

    /**
     * GSAP Image reveal animation left
     */
    const gsapImageRevealLeft = gsap.utils.toArray('.js-gsap-image-reveal-left');
    if (gsapImageRevealLeft.length > 0) {
      gsapImageRevealLeft.forEach((element) => {
        gsap.to(
          element,
          {
            clipPath: "inset(0 0% 0 0)",
            duration: 0.8,
            ease: "Quint.easeIn",
            scrollTrigger: element,
          }
        );
      });
    }

    /**
     * GSAP Image reveal animation right
     */
    const gsapImageRevealRight = gsap.utils.toArray('.js-gsap-image-reveal-right');
    if (gsapImageRevealRight.length > 0) {
      gsapImageRevealRight.forEach((element) => {
        gsap.to(
          element,
          {
            clipPath: "inset(0 0 0 0%)",
            duration: 0.8,
            ease: "Quint.easeIn",
            scrollTrigger: element,
          }
        );
      });
    }

    /**
     * GSAP Number animation
     */
    const gsapCounter = gsap.utils.toArray(".js-gsap-number-counter");
    if (gsapCounter.length > 0) {
      const counter = { value: 0 }; // Object to hold the animating value
      gsapCounter.forEach((element) => {
        // Extract the number part and the non-numeric part
        const textContent = element.textContent.trim();
        const numberMatch = textContent.match(/\d+/); // Match the numeric part
        const nonNumericPart = textContent.replace(numberMatch, ''); // Non-numeric part (e.g., '+')

        if (numberMatch) {
          const maxNumber = parseInt(numberMatch[0], 10); // Parse the number from the text

          // Animate the number part only
          gsap.to(counter, {
            value: maxNumber,
            duration: 2, // Duration of the animation
            ease: 'none', // Type of easing (can be adjusted)
            scrollTrigger: {
              trigger: element, // Element to trigger the animation
              start: 'top 80%', // When the element enters the viewport
            },
            onUpdate: () => {
              // Update the text content with the animated number and the non-numeric part
              element.textContent = `${Math.round(counter.value)}${nonNumericPart}`;
            },
          });
        }
      });
    }

    /**
     * GSAP Marquee animation
     */
    const gsapMarquee = gsap.utils.toArray(".js-gsap-marquee");
    if (gsapMarquee.length > 0) {
      gsapMarquee.forEach((element) => {
        const containerWidth = element.parentElement.scrollWidth;
        const contentWidth = element.scrollWidth;
        // Calculate the duration of the animation based on the width difference
        const animationDuration = (containerWidth + contentWidth) / 50;
        gsap.to(element, {
          x: -contentWidth,
          duration: animationDuration,
          ease: "linear",
          repeat: -1,
        });
      });
    }

    /**
     * GSAP Split media content scroll slider
     */
    const gsapSplitMediaContent = gsap.utils.toArray('.c-split-media-content--carousel');
    if (gsapSplitMediaContent.length > 0) {
      gsapSplitMediaContent.forEach((element) => {
        const cards = element.querySelectorAll('.c-card')
        const images = element.querySelectorAll('.c-split-media-content__image')
        ScrollTrigger.create({
          trigger: element,
          pin: true,
          start: "top top",
          end: () => `+=${element.offsetHeight}`,
          onUpdate: (self) => {
            const progress = self.progress;
            const activeIndex = Math.min(Math.floor(progress * cards.length), cards.length - 1); // Ensure last card stays active
            cards.forEach((card, index) => {
              if (index === activeIndex) {
                card.classList.add('is-active');
                images[index].classList.add('is-active');
              } else {
                card.classList.remove('is-active');
                images[index].classList.remove('is-active');
              }
            });
          },
        });
      });
    }
  }); // end of dom ready

  /**
   * Custom cursor on hover
   * 1. Create the custom cursor element
   * 2. Show cursor and adjust position on mousemove only when hovering over .js-custom-hover-cursor element
   * 3. Scale up the cursor when hovering
   * 4. Return to normal size when not hovering
   * 5. Remove mousemove event listener when leaving the .js-custom-hover-cursor element
   */
  const cursorTrigger = document.querySelectorAll('.js-custom-hover-cursor');
  if (cursorTrigger.length > 0 && window.innerWidth > 720) {
    /* 1 */
    const cursor = document.createElement('div');
    cursor.classList.add('o-custom-cursor');
    document.body.appendChild(cursor);

    cursorTrigger.forEach(item => {
      item.addEventListener('mouseenter', () => {
        document.addEventListener('mousemove', onMouseMove); /* 2 */
        gsap.to(cursor, { duration: 0.3, scale: 1 }); /* 3 */
      });
      item.addEventListener('mouseleave', () => {
        gsap.to(cursor, { duration: 0.3, scale: 0 }); /* 4 */
        document.removeEventListener('mousemove', onMouseMove); /* 5 */
      });
    });

    // eslint-disable-next-line no-inner-declarations
    function onMouseMove(e) {
      gsap.to(cursor, { duration: 0.3, left: e.clientX, top: e.clientY });
    }
  }

  /**
   * Glide slider for the features
   */
  const glideFeature = document.querySelectorAll('.c-feature--carousel');
  if (glideFeature.length > 0) {
    glideFeature.forEach((slider) => {
      let startAtVar = 0;
      const featureSlider = new Glide(slider, {
        type: 'carousel',
        startAt: startAtVar,
        perView: 1,
        gap: 0,
      });
      featureSlider.mount();

      const activeSlideCount = document.querySelector('.c-feature__carousel-count-active');
      activeSlideCount.innerText = `0${startAtVar+1}`.slice(-2);

      featureSlider.on('run.after', function() {
        activeSlideCount.innerText = `0${featureSlider.index+1}`.slice(-2);
      });
    });
  }

  /**
   * Glide slider for the grid horizontal 3up layout
   */
  const glideGridHorizontal3up = document.querySelectorAll('.c-grid--horizontal-carousel-3up, .c-grid--slider');
  if (glideGridHorizontal3up.length > 0) {
    glideGridHorizontal3up.forEach((slider) => {
      const shortcode = slider.querySelector('.c-search-filter');
      if (shortcode) {
        shortcode.setAttribute('data-glide-el', 'track');
      }
      const gridHorizontal3upSlider = new Glide(slider, {
        type: 'slider',
        startAt: 0,
        perView: 3,
        gap: 32,
        animationDuration: 1000,
        breakpoints: {
          768: {
            perView: 2,
          },
          480: {
            perView: 1,
            gap: 16,
            peek: {
              before: 0,
              after: 0,
            },
          },
        },
      });
      gridHorizontal3upSlider.mount();
    });
  }

  /**
   * Glide slider for the grid horizontal 4up layout
   */
  const glideGridHorizontal4up = document.querySelectorAll('.c-grid--horizontal-carousel-4up, .js-glide-4up');
  if (glideGridHorizontal4up.length > 0) {
    glideGridHorizontal4up.forEach((slider) => {
      const shortcode = slider.querySelector('.c-search-filter');
      if (shortcode) {
        shortcode.setAttribute('data-glide-el', 'track');
      }
      const gridHorizontal4upSlider = new Glide(slider, {
        type: 'slider',
        startAt: 0,
        perView: 4,
        gap: 32,
        animationDuration: 1000,
        breakpoints: {
          768: {
            perView: 2,
          },
          480: {
            perView: 1,
            gap: 16,
            peek: {
              before: 0,
              after: 0,
            },
          },
        },
      });
      gridHorizontal4upSlider.mount();
    });
  }

  /**
   * toggleClasses()
   *
   * @description
   * toggle specific classes based on data-attr of clicked element
   *
   * @requires
   * 'js-toggle' class and a data-attr with the element to be
   * toggled's class name both applied to the clicked element
   *
   * @example
   * <span class="js-toggle" data-toggled="toggled-class">Toggler</span>
   * <div class="toggled-class">This element's class will be toggled</div>
   *
   * @param {Element} element - element to toggle.
   */
  function toggleClasses(element) {
    const togglePrefix = element.dataset.prefix || 'this';
    let toggled = null;

    // If the element you need toggled is relative to the toggle, add the
    // .js-this class to the parent element and "this" to the data-toggled attr.
    if (element.dataset.toggled == "this") {
      toggled = element.closest('.js-this');
    }
    else {
      toggled = [...document.querySelectorAll(element.dataset.toggled)];
    }
    if (element.getAttribute('aria-expanded') == 'true') {
      element.setAttribute('aria-expanded', 'true');
    }
    else {
      element.setAttribute('aria-expanded', 'false');
    }
    element.classList.toggle(togglePrefix + '-is-active');

    if (toggled && toggled.length) {
      toggled.forEach((el) => {
        el.classList.toggle(togglePrefix + '-is-active');
      })
    } else {
      toggled.classList.toggle(togglePrefix + '-is-active');
    }

    // Remove a class on another element, if needed.
    if (element.dataset.removeClass) {
      document.querySelector('.' + element.dataset.removeClass).classList.remove(element.dataset.removeClass);
    }
  }

  function setUtilities(parentEl) {
    // Toggle class
    [...parentEl.querySelectorAll('.js-toggle:not(.js-toggle--initialized)')].forEach((el) => {
      el.classList.add('js-toggle--initialized');
      el.addEventListener('click', (e) => {
        if (!el.classList.contains('js-not-stop')) {
          e.preventDefault();
          e.stopPropagation();
        }
        toggleClasses(el);
      });
    });

    // Toggle parent class
    [...parentEl.querySelectorAll('.js-toggle-parent:not(.js-toggle-parent--initialized)')].forEach((el) => {
      el.classList.add('js-toggle-parent--initialized');
      el.addEventListener('click', (e) => {
        if (!el.classList.contains('js-not-stop')) {
          e.preventDefault();
        }
        el.classList.toggle('this-is-active');
        el.parentElement.classList.toggle('this-is-active');
      });
    });
  }

  setUtilities(document);
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);

