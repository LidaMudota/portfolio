document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('.header');
    const menuToggle = document.querySelector('[data-menu-toggle]');
    const megaMenu = document.getElementById('mega-menu');
    const mobileToggle = document.querySelector('[data-mobile-nav-toggle]');
    const mobileNav = document.getElementById('mobile-nav');
    const mobileNavLinks = document.querySelectorAll('.mobile-nav__link');
    const mobileViewport = window.matchMedia('(max-width: 1024px)');
    const phoneInputs = document.querySelectorAll('[data-phone-input]');
    const forms = document.querySelectorAll('[data-consultation-form]');
    const directionsScope = document.querySelector('#work-directions-page, #home-page');
    const directionCards = directionsScope?.querySelectorAll('#specialization .spec-card') || [];
    const directionModal = directionsScope?.querySelector('[data-direction-modal]');
    const directionModalTitle = directionModal?.querySelector('[data-direction-modal-title]');
    const directionModalText = directionModal?.querySelector('[data-direction-modal-text]');
    const directionModalImage = directionModal?.querySelector('[data-direction-modal-image]');
    const directionModalWarning = directionModal?.querySelector('[data-direction-modal-warning]');
    const directionModalGallery = directionModal?.querySelector('[data-direction-modal-gallery]');
    const directionModalTextDivider = directionModal?.querySelector('[data-direction-modal-divider-text]');
    const directionModalGalleryDivider = directionModal?.querySelector('[data-direction-modal-divider-gallery]');
    const directionCloseButtons = directionModal?.querySelectorAll('[data-direction-close]');
    const directionDataScript = directionsScope?.querySelector('[data-work-directions-json]');
    const modalRoot = document.body;


    const cookieNotice = document.querySelector('[data-cookie-notice]');
    const cookieAcceptButton = document.querySelector('[data-cookie-accept]');
    const cookieRejectButton = document.querySelector('[data-cookie-reject]');
    const cookiePreferenceKey = 'site_cookie_preference';
    const yandexMetrikaCounterId = 109206745; // Публичный ID счетчика; перед production-запуском заменить на ID клиента.

    const getLenisPreventElement = (node) => {
        if (node instanceof Element) return node;
        return node?.parentElement instanceof Element ? node.parentElement : null;
    };

    const shouldPreventLenis = (node) => {
        const element = getLenisPreventElement(node);
        if (!element) return false;

        const excludedSelector = [
            '[data-lenis-prevent]',
            '[data-direction-modal]',
            '[data-carousel]',
            '[data-carousel-viewport]',
            '.modal',
            '.direction-modal',
            '.mega-menu',
            '.mobile-nav',
            '.dropdown',
            '.results-slider',
            '.location-map__frame',
            'textarea',
            'select',
            'input',
            'iframe',
            'object',
            'embed',
            '[contenteditable="true"]'
        ].join(',');

        if (element.closest(excludedSelector)) return true;

        if (element.closest('[data-scrollable], .scrollable, .simplebar-content-wrapper')) return true;

        let current = element;
        while (current && current !== document.body && current !== document.documentElement) {
            const computedStyle = window.getComputedStyle(current);
            const canScrollY = /(auto|scroll)/.test(computedStyle.overflowY) && current.scrollHeight > current.clientHeight;
            const canScrollX = /(auto|scroll)/.test(computedStyle.overflowX) && current.scrollWidth > current.clientWidth;

            if (canScrollY || canScrollX) return true;
            current = current.parentElement;
        }

        return false;
    };

    const initSmoothScroll = () => {
        const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        if (reduceMotion || typeof window.Lenis === 'undefined') {
            return null;
        }

        const lenis = new window.Lenis({
            duration: 1.24,
            easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
            smoothWheel: true,
            syncTouch: false,
            wheelMultiplier: 1.5,
            touchMultiplier: 1,
            autoResize: true,
            anchors: false,
            prevent: shouldPreventLenis,
        });

        document.documentElement.classList.add('lenis-active');
        window.__siteLenis = lenis;

        const scrollToHash = (hash) => {
            if (!hash || hash === '#') return false;

            const targetId = hash.slice(1);
            const target = document.getElementById(targetId);
            if (!(target instanceof Element)) return false;

            const headerOffset = header?.offsetHeight || 0;
            lenis.scrollTo(target, {
                offset: -(headerOffset + 12),
                lock: false,
            });

            return true;
        };

        document.addEventListener('click', (event) => {
            const clickedElement = getLenisPreventElement(event.target);
            const link = clickedElement?.closest('a[href^="#"]');
            if (!(link instanceof HTMLAnchorElement)) return;
            if (link.target || link.hasAttribute('download')) return;
            if (shouldPreventLenis(link)) return;

            const url = new URL(link.href, window.location.href);
            if (url.pathname !== window.location.pathname || url.search !== window.location.search) return;
            if (!scrollToHash(url.hash)) return;

            event.preventDefault();
            window.history.pushState(null, '', url.hash);
        });

        if (window.location.hash) {
            requestAnimationFrame(() => scrollToHash(window.location.hash));
        }

        const raf = (time) => {
            lenis.raf(time);
            requestAnimationFrame(raf);
        };

        requestAnimationFrame(raf);

        return lenis;
    };

    const siteLenis = initSmoothScroll();

    const loadYandexMetrika = () => {
        if (window.__yandexMetrikaLoaded) return;
        window.__yandexMetrikaLoaded = true;

        (function (m, e, t, r, i, k, a) {
            m[i] = m[i] || function () {
                (m[i].a = m[i].a || []).push(arguments);
            };
            m[i].l = 1 * new Date();

            for (let j = 0; j < document.scripts.length; j += 1) {
                if (document.scripts[j].src === r) return;
            }

            k = e.createElement(t);
            a = e.getElementsByTagName(t)[0];
            k.async = 1;
            k.src = r;
            a.parentNode?.insertBefore(k, a);
        })(window, document, 'script', `https://mc.yandex.ru/metrika/tag.js?id=${yandexMetrikaCounterId}`, 'ym');

        window.ym(yandexMetrikaCounterId, 'init', {
            ssr: true,
            clickmap: true,
            accurateTrackBounce: true,
            trackLinks: true,
        });
    };

    const setCookiePreference = (value) => {
        try {
            localStorage.setItem(cookiePreferenceKey, value);
        } catch (error) {
            return;
        }
    };

    const getCookiePreference = () => {
        try {
            return localStorage.getItem(cookiePreferenceKey);
        } catch (error) {
            return null;
        }
    };

    const hideCookieNotice = () => {
        if (cookieNotice) {
            cookieNotice.setAttribute('hidden', 'hidden');
        }
    };

    const loadOptionalScripts = () => {
        const scripts = document.querySelectorAll('script[data-cookie-category="optional"]');

        scripts.forEach((script) => {
            if (script.dataset.cookieLoaded === '1') return;

            const src = script.dataset.cookieSrc;
            if (!src) return;

            const runtimeScript = document.createElement('script');
            runtimeScript.src = src;
            runtimeScript.async = true;
            runtimeScript.charset = script.getAttribute('charset') || 'utf-8';
            runtimeScript.dataset.cookieLoaded = '1';
            script.parentNode?.insertBefore(runtimeScript, script.nextSibling);
            script.dataset.cookieLoaded = '1';
        });
    };

    const applyCookiePreference = (value) => {
        if (value === 'accepted') {
            loadOptionalScripts();
            loadYandexMetrika();
        }

        if (value === 'accepted' || value === 'necessary') {
            hideCookieNotice();
        }
    };

    const setupCookieNotice = () => {
        const preference = getCookiePreference();

        if (preference === 'accepted' || preference === 'necessary') {
            applyCookiePreference(preference);
            return;
        }

        if (!cookieNotice) return;

        cookieNotice.removeAttribute('hidden');

        cookieAcceptButton?.addEventListener('click', () => {
            setCookiePreference('accepted');
            applyCookiePreference('accepted');
        });

        cookieRejectButton?.addEventListener('click', () => {
            setCookiePreference('necessary');
            applyCookiePreference('necessary');
        });
    };

    const directionDetailsMap = (() => {
        if (!directionDataScript) return {};

        try {
            return JSON.parse(directionDataScript.textContent || '{}');
        } catch (error) {
            return {};
        }
    })();

    const toggleSection = (button, section) => {
        if (!button || !section) return;
        const isHidden = section.hasAttribute('hidden');
        if (isHidden) {
            section.removeAttribute('hidden');
            button.setAttribute('aria-expanded', 'true');
        } else {
            section.setAttribute('hidden', 'hidden');
            button.setAttribute('aria-expanded', 'false');
        }
    };

    if (menuToggle && megaMenu) {
        menuToggle.addEventListener('click', () => {
            if (mobileNav && !mobileNav.hasAttribute('hidden')) {
                mobileNav.setAttribute('hidden', 'hidden');
                mobileToggle?.setAttribute('aria-expanded', 'false');
            }
            toggleSection(menuToggle, megaMenu);
        });
    }

    if (mobileToggle && mobileNav) {
        mobileToggle.addEventListener('click', () => {
            if (megaMenu && !megaMenu.hasAttribute('hidden')) {
                megaMenu.setAttribute('hidden', 'hidden');
                menuToggle?.setAttribute('aria-expanded', 'false');
            }
            toggleSection(mobileToggle, mobileNav);
        });

        mobileNavLinks.forEach((link) => {
            link.addEventListener('click', () => {
                mobileNav.setAttribute('hidden', 'hidden');
                mobileToggle.setAttribute('aria-expanded', 'false');
            });
        });
    }

    document.addEventListener('click', (event) => {
        const target = event.target;
        const clickedInsideMega = megaMenu?.contains(target);
        const clickedMegaButton = menuToggle?.contains(target);
        const clickedInsideMobile = mobileNav?.contains(target);
        const clickedMobileButton = mobileToggle?.contains(target);

        if (megaMenu && !megaMenu.hasAttribute('hidden') && !clickedInsideMega && !clickedMegaButton) {
            megaMenu.setAttribute('hidden', 'hidden');
            menuToggle?.setAttribute('aria-expanded', 'false');
        }

        if (mobileNav && !mobileNav.hasAttribute('hidden') && !clickedInsideMobile && !clickedMobileButton) {
            mobileNav.setAttribute('hidden', 'hidden');
            mobileToggle?.setAttribute('aria-expanded', 'false');
        }
    });

    document.addEventListener('keydown', (event) => {
        if (event.key !== 'Escape') return;
        if (directionModal && !directionModal.hasAttribute('hidden')) {
            closeDirectionModal();
        }
        if (megaMenu && !megaMenu.hasAttribute('hidden')) {
            megaMenu.setAttribute('hidden', 'hidden');
            menuToggle?.setAttribute('aria-expanded', 'false');
        }
        if (mobileNav && !mobileNav.hasAttribute('hidden')) {
            mobileNav.setAttribute('hidden', 'hidden');
            mobileToggle?.setAttribute('aria-expanded', 'false');
        }
    });

    const syncNavByViewport = () => {
        if (!mobileViewport.matches && mobileNav && !mobileNav.hasAttribute('hidden')) {
            mobileNav.setAttribute('hidden', 'hidden');
            mobileToggle?.setAttribute('aria-expanded', 'false');
        }
        if (mobileViewport.matches && megaMenu && !megaMenu.hasAttribute('hidden')) {
            megaMenu.setAttribute('hidden', 'hidden');
            menuToggle?.setAttribute('aria-expanded', 'false');
        }
    };

    mobileViewport.addEventListener('change', syncNavByViewport);
    syncNavByViewport();

    setupCookieNotice();

    window.addEventListener('scroll', () => {
        header?.classList.toggle('is-scrolled', window.scrollY > 12);
    });

    const applyPhoneMask = (value) => {
        const digits = value.replace(/\D/g, '').slice(0, 11);
        const normalized = digits.startsWith('8') ? `7${digits.slice(1)}` : digits;
        const clean = normalized.startsWith('7') ? normalized : `7${normalized}`;
        const parts = clean.match(/^(7)(\d{0,3})(\d{0,3})(\d{0,2})(\d{0,2})$/);
        if (!parts) return value;

        let result = '+7';
        if (parts[2]) result += ` (${parts[2]}`;
        if (parts[2] && parts[2].length === 3) result += ')';
        if (parts[3]) result += ` ${parts[3]}`;
        if (parts[4]) result += `-${parts[4]}`;
        if (parts[5]) result += `-${parts[5]}`;
        return result;
    };

    phoneInputs.forEach((phoneInput) => {
        phoneInput.addEventListener('input', (event) => {
            event.target.value = applyPhoneMask(event.target.value);
        });
    });

    const showFormAlert = (form, type, message) => {
        let alert = form.querySelector('[data-form-alert]');

        if (!alert) {
            alert = document.createElement('div');
            alert.setAttribute('data-form-alert', '1');
            alert.setAttribute('role', type === 'success' ? 'status' : 'alert');
            form.prepend(alert);
        }

        alert.className = `alert ${type === 'success' ? 'alert--success' : 'alert--error'}`;
        alert.textContent = message;
    };

    forms.forEach((form) => {
        form.addEventListener('submit', async (event) => {
            event.preventDefault();

            const fields = form.querySelectorAll('[required]');
            let hasError = false;

            fields.forEach((field) => {
                const isCheckbox = field.type === 'checkbox';
                const value = isCheckbox ? field.checked : field.value.trim();
                const fieldWrapper = isCheckbox ? field.closest('.checkbox') : field;
                fieldWrapper?.classList.remove('is-invalid');

                if (!value) {
                    hasError = true;
                    fieldWrapper?.classList.add('is-invalid');
                }
            });

            const phoneInput = form.querySelector('[data-phone-input]');
            if (phoneInput && phoneInput.value.replace(/\D/g, '').length < 11) {
                hasError = true;
                phoneInput.classList.add('is-invalid');
            }

            if (hasError) {
                showFormAlert(form, 'error', 'Проверьте заполнение обязательных полей формы.');
                return;
            }

            const submitButton = form.querySelector('button[type="submit"]');
            submitButton?.setAttribute('disabled', 'disabled');

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    body: new FormData(form),
                    credentials: 'same-origin',
                });

                const payload = await response.json();

                if (!response.ok || !payload.success) {
                    showFormAlert(form, 'error', payload.message || 'Не удалось отправить форму.');
                    return;
                }

                showFormAlert(form, 'success', payload.message || 'Форма успешно отправлена.');
                form.reset();
                const startedAt = form.querySelector('input[name="form_started_at"]');
                if (startedAt) startedAt.value = String(Math.floor(Date.now() / 1000));

                if (payload.redirect) {
                    setTimeout(() => {
                        window.location.href = payload.redirect;
                    }, 400);
                }
            } catch (error) {
                showFormAlert(form, 'error', 'Ошибка соединения. Повторите попытку позже.');
            } finally {
                submitButton?.removeAttribute('disabled');
            }
        });
    });

    let activeDirectionTrigger = null;
    let savedScrollY = 0;
    let isScrollLocked = false;

    const focusableSelector = 'a[href], button:not([disabled]), textarea, input, select, [tabindex]:not([tabindex="-1"])';

    const updateDirectionModalOffset = () => {
        if (!directionModal) return;
        const headerHeight = header?.offsetHeight || 0;
        const topOffset = Math.max(headerHeight + 16, 76);
        directionModal.style.setProperty('--direction-modal-top-offset', `${topOffset}px`);
    };

    const ensureModalInBody = (modalElement) => {
        if (!(modalElement instanceof HTMLElement)) return;
        if (modalElement.parentElement === modalRoot) return;
        modalRoot.appendChild(modalElement);
    };

    const lockPageScroll = () => {
        if (isScrollLocked) return;
        savedScrollY = window.scrollY || window.pageYOffset || 0;
        siteLenis?.stop();
        document.body.classList.add('modal-open');
        document.body.style.top = `-${savedScrollY}px`;
        isScrollLocked = true;
    };

    const unlockPageScroll = () => {
        if (!isScrollLocked) return;

        const lockedOffset = Number.parseInt(document.body.style.top || '0', 10);
        const restoreScrollY = Number.isNaN(lockedOffset) ? savedScrollY : Math.abs(lockedOffset);
        const htmlScrollBehavior = document.documentElement.style.scrollBehavior;

        document.documentElement.style.scrollBehavior = 'auto';
        document.body.classList.remove('modal-open');
        document.body.style.removeProperty('top');
        window.scrollTo(0, restoreScrollY);
        siteLenis?.scrollTo(restoreScrollY, { immediate: true, force: true });
        siteLenis?.start();
        document.documentElement.style.scrollBehavior = htmlScrollBehavior;

        isScrollLocked = false;
    };


    const getDirectionImageCropClass = (src) => {
        const normalized = String(src || '').split(/[?#]/, 1)[0].trim();
        if (!normalized) return '';

        const filename = normalized.split('/').pop();
        if (!filename) return '';

        return `direction-modal__image--${filename.replace(/\.[^.]+$/, '').replace(/[^a-zA-Z0-9_-]+/g, '-').toLowerCase()}`;
    };

    const normalizeDirectionImagePairs = (details) => {
        const pairs = Array.isArray(details.imagePairs) ? details.imagePairs : [];
        return pairs
            .map((pair) => ({
                before: pair?.before?.src ? pair.before : null,
                after: pair?.after?.src ? pair.after : null,
                clinicalTitle: typeof pair?.clinical_title === 'string' ? pair.clinical_title : '',
            }))
            .filter((pair) => pair.before && pair.after);
    };

    const createDirectionImageSquare = (image, fallbackAlt) => {
        const imageElement = document.createElement('img');
        imageElement.className = 'direction-modal__image';
        const cropClass = getDirectionImageCropClass(image.src || '');
        if (cropClass) {
            imageElement.classList.add(cropClass);
        }
        imageElement.src = image.src;
        imageElement.alt = image.alt || fallbackAlt;
        imageElement.loading = 'lazy';
        imageElement.decoding = 'async';

        return imageElement;
    };

    const createDirectionImageBlock = (image, fallbackAlt, labelText) => {
        const imageBlock = document.createElement('div');
        imageBlock.className = 'direction-modal__image-block';

        const label = document.createElement('p');
        label.className = 'direction-modal__image-label';
        label.textContent = labelText;

        const imageLink = document.createElement('a');
        imageLink.className = 'direction-modal__image-frame';
        imageLink.href = image.src;
        imageLink.target = '_blank';
        imageLink.rel = 'noopener noreferrer';
        imageLink.setAttribute('aria-label', `Открыть изображение ${labelText} в полном размере`);

        imageLink.append(createDirectionImageSquare(image, fallbackAlt));
        imageBlock.append(imageLink, label);
        return imageBlock;
    };

    const createClinicalCaseTitle = (text) => {
        const title = document.createElement('p');
        title.className = 'direction-modal__case-title';
        title.textContent = text;
        return title;
    };

    const createDirectionArrowButton = (direction, ariaLabel) => {
        const button = document.createElement('button');
        button.type = 'button';
        button.className = `direction-modal__carousel-arrow direction-modal__carousel-arrow--${direction}`;
        button.setAttribute('data-carousel-nav', direction);
        button.setAttribute('aria-label', ariaLabel);
        button.innerHTML = direction === 'prev' ? '&#8249;' : '&#8250;';
        return button;
    };

    const getBeforeAfterLabels = (pair, title) => {
        const caseTitle = (pair.clinicalTitle || title || '').toLowerCase();
        const isEmaCase = caseTitle.includes('эмболизации маточных артерий');

        return {
            beforeText: isEmaCase ? 'До эмболизации' : 'До стентирования',
            afterText: isEmaCase ? 'После эмболизации' : 'После стентирования'
        };
    };

    const createDesktopPairsCarousel = (pairs, title) => {
        const desktopCarousel = document.createElement('section');
        desktopCarousel.className = 'direction-modal__carousel direction-modal__carousel--desktop desktop-carousel';
        desktopCarousel.setAttribute('aria-label', 'Карусель пар фотографий');
        desktopCarousel.setAttribute('data-carousel', 'desktop');
        desktopCarousel.setAttribute('data-lenis-prevent', '');
        desktopCarousel.dataset.index = '0';
        desktopCarousel.dataset.max = String(Math.max(0, pairs.length - 1));

        const prevButton = createDirectionArrowButton('prev', 'Предыдущая пара фото');
        const nextButton = createDirectionArrowButton('next', 'Следующая пара фото');
        const viewport = document.createElement('div');
        viewport.className = 'direction-modal__desktop-viewport';
        viewport.setAttribute('data-carousel-viewport', 'desktop');

        pairs.forEach((pair, index) => {
            const pairElement = document.createElement('div');
            pairElement.className = 'direction-modal__desktop-pair carousel-pair';
            pairElement.classList.toggle('is-active', index === 0);
            pairElement.hidden = index !== 0;
            const { beforeText, afterText } = getBeforeAfterLabels(pair, title);
            const beforeAlt = `${beforeText} — ${pair.clinicalTitle || title}`;
            const afterAlt = `${afterText} — ${pair.clinicalTitle || title}`;
            pairElement.append(
                createClinicalCaseTitle(pair.clinicalTitle || title),
                createDirectionImageBlock(pair.before, beforeAlt, beforeText),
                createDirectionImageBlock(pair.after, afterAlt, afterText)
            );
            viewport.append(pairElement);
        });

        const hasNavigation = pairs.length > 1;
        prevButton.disabled = !hasNavigation;
        nextButton.disabled = !hasNavigation;
        prevButton.hidden = !hasNavigation;
        nextButton.hidden = !hasNavigation;

        desktopCarousel.append(prevButton, viewport, nextButton);
        return desktopCarousel;
    };

    const createMobileCasesCarousel = (pairs, title) => {
        const mobileCarousel = document.createElement('section');
        mobileCarousel.className = 'direction-modal__carousel direction-modal__carousel--mobile';
        mobileCarousel.setAttribute('aria-label', 'Карусель клинических случаев до и после');
        mobileCarousel.setAttribute('data-carousel', 'mobile');
        mobileCarousel.setAttribute('data-lenis-prevent', '');
        mobileCarousel.dataset.index = '0';
        mobileCarousel.dataset.max = String(Math.max(0, pairs.length - 1));

        const prevButton = createDirectionArrowButton('prev', 'Предыдущая пара До/После');
        const nextButton = createDirectionArrowButton('next', 'Следующая пара До/После');
        const viewport = document.createElement('div');
        viewport.className = 'direction-modal__mobile-viewport';
        viewport.setAttribute('data-carousel-viewport', 'mobile');

        const counter = document.createElement('p');
        counter.className = 'direction-modal__mobile-counter';
        counter.setAttribute('data-carousel-mobile-counter', '');

        pairs.forEach((pair, index) => {
            const slide = document.createElement('article');
            slide.className = 'direction-modal__mobile-case';
            slide.hidden = index !== 0;

            const { beforeText, afterText } = getBeforeAfterLabels(pair, title);
            const beforeAlt = `${beforeText} — ${pair.clinicalTitle || title}`;
            const afterAlt = `${afterText} — ${pair.clinicalTitle || title}`;
            slide.append(
                createClinicalCaseTitle(pair.clinicalTitle || title),
                createDirectionImageBlock(pair.before, beforeAlt, beforeText),
                createDirectionImageBlock(pair.after, afterAlt, afterText)
            );
            viewport.append(slide);
        });

        mobileCarousel.append(prevButton, counter, viewport, nextButton);
        updateMobileCarousel(mobileCarousel);
        return mobileCarousel;
    };

    const getLoopedCarouselIndex = (currentIndex, maxIndex, direction) => {
        if (maxIndex <= 0) return 0;

        if (direction === 'next') {
            const nextIndex = currentIndex + 1;
            return nextIndex > maxIndex ? 0 : nextIndex;
        }

        const prevIndex = currentIndex - 1;
        return prevIndex < 0 ? maxIndex : prevIndex;
    };

    const updateDesktopCarousel = (carousel) => {
        const pairs = Array.from(carousel.querySelectorAll('.direction-modal__desktop-pair'));
        const currentIndex = Number.parseInt(carousel.dataset.index || '0', 10);
        const maxIndex = Number.parseInt(carousel.dataset.max || '0', 10);
        const prevButton = carousel.querySelector('[data-carousel-nav="prev"]');
        const nextButton = carousel.querySelector('[data-carousel-nav="next"]');
        const hasNavigation = maxIndex > 0;

        pairs.forEach((pair, pairIndex) => {
            pair.classList.toggle('is-active', pairIndex === currentIndex);
            pair.hidden = pairIndex !== currentIndex;
        });

        if (prevButton instanceof HTMLButtonElement) prevButton.disabled = !hasNavigation;
        if (nextButton instanceof HTMLButtonElement) nextButton.disabled = !hasNavigation;
    };

    const updateMobileCarousel = (carousel) => {
        const slides = Array.from(carousel.querySelectorAll('.direction-modal__mobile-case'));
        const currentIndex = Number.parseInt(carousel.dataset.index || '0', 10);
        const maxIndex = Number.parseInt(carousel.dataset.max || '0', 10);
        const prevButton = carousel.querySelector('[data-carousel-nav="prev"]');
        const nextButton = carousel.querySelector('[data-carousel-nav="next"]');
        const mobileCounter = carousel.querySelector('[data-carousel-mobile-counter]');
        const hasNavigation = maxIndex > 0;

        slides.forEach((slide, slideIndex) => {
            slide.hidden = slideIndex !== currentIndex;
        });

        if (mobileCounter instanceof HTMLElement) {
            mobileCounter.textContent = `${currentIndex + 1} из ${maxIndex + 1}`;
        }

        if (prevButton instanceof HTMLButtonElement) prevButton.disabled = !hasNavigation;
        if (nextButton instanceof HTMLButtonElement) nextButton.disabled = !hasNavigation;
    };

    const renderDirectionGallery = (pairs, title) => {
        if (!directionModalGallery) return;
        directionModalGallery.replaceChildren();

        if (pairs.length === 0) {
            directionModalGallery.setAttribute('hidden', 'hidden');
            return;
        }

        const desktopCarousel = createDesktopPairsCarousel(pairs, title);
        const mobileCarousel = createMobileCasesCarousel(pairs, title);

        directionModalGallery.append(desktopCarousel, mobileCarousel);
        directionModalGallery.removeAttribute('hidden');
    };

    let mobileGallerySwipeState = null;

    const handleMobileGalleryTouchStart = (event) => {
        const target = event.target.closest('[data-carousel="mobile"]');
        if (!(target instanceof HTMLElement)) return;
        if (!window.matchMedia('(max-width: 768px)').matches) return;
        const touch = event.changedTouches?.[0];
        if (!touch) return;
        mobileGallerySwipeState = { x: touch.clientX, y: touch.clientY, carousel: target };
    };

    const handleMobileGalleryTouchEnd = (event) => {
        if (!mobileGallerySwipeState) return;
        const touch = event.changedTouches?.[0];
        if (!touch) {
            mobileGallerySwipeState = null;
            return;
        }

        const deltaX = touch.clientX - mobileGallerySwipeState.x;
        const deltaY = touch.clientY - mobileGallerySwipeState.y;
        const horizontalThreshold = 44;
        const verticalThreshold = 30;

        if (Math.abs(deltaX) < horizontalThreshold || Math.abs(deltaY) > verticalThreshold) {
            mobileGallerySwipeState = null;
            return;
        }

        const carousel = mobileGallerySwipeState.carousel;
        const direction = deltaX < 0 ? 'next' : 'prev';
        const currentIndex = Number.parseInt(carousel.dataset.index || '0', 10);
        const maxIndex = Number.parseInt(carousel.dataset.max || '0', 10);
        const nextIndex = getLoopedCarouselIndex(currentIndex, maxIndex, direction);

        if (nextIndex !== currentIndex) {
            carousel.dataset.index = String(nextIndex);
            updateMobileCarousel(carousel);
        }

        mobileGallerySwipeState = null;
    };

    const openDirectionModal = (card, trigger) => {
        if (!directionModal || !directionModalTitle || !directionModalText || !directionModalImage || !card) return;

        const title = card.querySelector('.spec-card__title')?.textContent?.trim() || '';
        const icon = card.querySelector('.spec-card__icon img');
        const directionId = card.dataset.directionId || '';
        const details = directionDetailsMap[directionId] || {};
        const paragraphs = Array.isArray(details.paragraphs) ? details.paragraphs : [];
        const images = Array.isArray(details.images) ? details.images : [];
        const imagePairs = normalizeDirectionImagePairs(details);
        const primaryImage = images[0]?.src || details.icon || icon?.getAttribute('src') || '';
        const primaryImageAlt = images[0]?.alt || details.title || title || 'Иллюстрация направления работы';

        activeDirectionTrigger = trigger || card;
        ensureModalInBody(directionModal);
        updateDirectionModalOffset();
        directionModalTitle.textContent = details.title || title;
        directionModalText.replaceChildren();
        paragraphs.forEach((paragraph) => {
            const paragraphElement = document.createElement('p');
            paragraphElement.className = 'direction-modal__paragraph';
            paragraphElement.textContent = paragraph;
            directionModalText.append(paragraphElement);
        });

        directionModalImage.src = primaryImage;
        directionModalImage.alt = primaryImageAlt;

        if (directionModalWarning) {
            if (details.warning) {
                directionModalWarning.textContent = details.warning;
                directionModalWarning.removeAttribute('hidden');
            } else {
                directionModalWarning.textContent = '';
                directionModalWarning.setAttribute('hidden', 'hidden');
            }
        }

        renderDirectionGallery(imagePairs, details.title || title);

        if (directionModalTextDivider) {
            const shouldShowTextDivider = paragraphs.length > 0 || Boolean(details.warning) || imagePairs.length > 0;
            directionModalTextDivider.toggleAttribute('hidden', !shouldShowTextDivider);
        }

        if (directionModalGalleryDivider) {
            directionModalGalleryDivider.toggleAttribute('hidden', imagePairs.length === 0);
        }

        directionModal.removeAttribute('hidden');
        directionModal.classList.remove('is-closing');
        lockPageScroll();

        requestAnimationFrame(() => {
            directionModal.classList.add('is-open');
            const firstFocusable = directionModal.querySelector(focusableSelector);
            firstFocusable?.focus();
        });
    };

    const closeDirectionModal = () => {
        if (!directionModal || directionModal.hasAttribute('hidden')) return;

        directionModal.classList.remove('is-open');
        directionModal.classList.add('is-closing');

        window.setTimeout(() => {
            directionModal.classList.remove('is-closing');
            directionModal.setAttribute('hidden', 'hidden');
            unlockPageScroll();
            if (activeDirectionTrigger instanceof HTMLElement) {
                activeDirectionTrigger.focus();
            }
            activeDirectionTrigger = null;
        }, 180);
    };

    directionCards.forEach((card) => {
        const detailsButton = card.querySelector('[data-direction-open]');
        card.setAttribute('tabindex', '0');
        card.setAttribute('role', 'button');
        card.setAttribute('aria-haspopup', 'dialog');

        card.addEventListener('click', (event) => {
            if (event.target.closest('[data-direction-open]')) return;
            openDirectionModal(card, card);
        });

        card.addEventListener('keydown', (event) => {
            if (event.target !== card) return;
            if (event.key !== 'Enter' && event.key !== ' ') return;
            event.preventDefault();
            openDirectionModal(card, card);
        });

        detailsButton?.addEventListener('click', (event) => {
            event.stopPropagation();
            openDirectionModal(card, detailsButton);
        });
    });

    directionCloseButtons?.forEach((closeButton) => {
        closeButton.addEventListener('click', closeDirectionModal);
    });

    directionModalGallery?.addEventListener('click', (event) => {
        const button = event.target.closest('[data-carousel-nav]');
        if (!(button instanceof HTMLButtonElement)) return;

        const carousel = button.closest('[data-carousel]');
        if (!(carousel instanceof HTMLElement)) return;

        const direction = button.dataset.carouselNav;
        if (direction !== 'prev' && direction !== 'next') return;

        const currentIndex = Number.parseInt(carousel.dataset.index || '0', 10);
        const maxIndex = Number.parseInt(carousel.dataset.max || '0', 10);
        const nextIndex = getLoopedCarouselIndex(currentIndex, maxIndex, direction);

        if (nextIndex === currentIndex) return;
        carousel.dataset.index = String(nextIndex);

        if (carousel.dataset.carousel === 'desktop') {
            updateDesktopCarousel(carousel);
            return;
        }

        updateMobileCarousel(carousel);
    });

    directionModalGallery?.addEventListener('touchstart', handleMobileGalleryTouchStart, { passive: true });
    directionModalGallery?.addEventListener('touchend', handleMobileGalleryTouchEnd, { passive: true });

    window.addEventListener('resize', () => {
        if (!directionModal || directionModal.hasAttribute('hidden')) return;
        updateDirectionModalOffset();
    });

    const diplomaTriggers = document.querySelectorAll('[data-diploma-open]');
    const diplomaModal = document.querySelector('[data-diploma-modal]');
    const diplomaImage = diplomaModal?.querySelector('img');
    const diplomaClose = diplomaModal?.querySelector('[data-diploma-close]');

    diplomaTriggers.forEach((trigger) => {
        trigger.addEventListener('click', () => {
            if (!diplomaModal || !diplomaImage) return;
            diplomaImage.src = trigger.dataset.image || '';
            diplomaImage.alt = trigger.dataset.alt || 'Документ';
            diplomaModal.removeAttribute('hidden');
        });
    });

    diplomaClose?.addEventListener('click', () => diplomaModal?.setAttribute('hidden', 'hidden'));

    const diplomaCarousels = document.querySelectorAll('[data-diplomas-carousel]');

    diplomaCarousels.forEach((carousel) => {
        const viewport = carousel.querySelector('[data-carousel-viewport]');
        const track = carousel.querySelector('[data-carousel-track]');
        const originalSlides = Array.from(track?.children || []);
        const prevButton = carousel.querySelector('[data-carousel-prev]');
        const nextButton = carousel.querySelector('[data-carousel-next]');
        const currentSlideIndicator = carousel.querySelector('[data-carousel-current]');
        const totalSlidesIndicator = carousel.querySelector('[data-carousel-total]');

        if (!viewport || !track || originalSlides.length < 2) return;

        const cloneCount = originalSlides.length;
        const prependClones = originalSlides.map((slide) => slide.cloneNode(true));
        const appendClones = originalSlides.map((slide) => slide.cloneNode(true));

        prependClones.forEach((slide) => {
            track.insertBefore(slide, track.firstChild);
        });
        appendClones.forEach((slide) => {
            track.appendChild(slide);
        });

        const slides = Array.from(track.children);
        const realSlidesCount = originalSlides.length;
        let settleTimerId = null;
        let resizeRafId = null;
        let indicatorRafId = null;

        if (totalSlidesIndicator) {
            totalSlidesIndicator.textContent = String(realSlidesCount);
        }

        const getStep = () => {
            const firstSlide = slides[cloneCount];
            if (!(firstSlide instanceof HTMLElement)) return viewport.clientWidth;
            const trackStyles = window.getComputedStyle(track);
            const gap = Number.parseFloat(trackStyles.columnGap || trackStyles.gap || '0') || 0;
            return firstSlide.getBoundingClientRect().width + gap;
        };

        const getLoopMetrics = () => {
            const step = getStep();
            const prependWidth = cloneCount * step;
            const realTrackWidth = realSlidesCount * step;
            return { step, prependWidth, realTrackWidth };
        };

        const setScrollWithoutAnimation = (left) => {
            const prevSnapType = viewport.style.scrollSnapType;
            viewport.style.scrollSnapType = 'none';
            viewport.scrollTo({ left, behavior: 'auto' });
            requestAnimationFrame(() => {
                viewport.style.scrollSnapType = prevSnapType;
            });
        };

        const normalizeLoopPosition = () => {
            const { step, prependWidth, realTrackWidth } = getLoopMetrics();
            if (!step || !realTrackWidth) return;

            const beforeRealSlides = prependWidth - step * 0.5;
            const afterRealSlides = prependWidth + realTrackWidth - step * 0.5;
            const currentScroll = viewport.scrollLeft;

            if (currentScroll < beforeRealSlides) {
                setScrollWithoutAnimation(currentScroll + realTrackWidth);
                return;
            }

            if (currentScroll >= afterRealSlides) {
                setScrollWithoutAnimation(currentScroll - realTrackWidth);
            }
        };

        const scrollToInitialRealSlide = () => {
            const { prependWidth } = getLoopMetrics();
            setScrollWithoutAnimation(prependWidth);
        };

        const updateSlideIndicator = () => {
            if (!currentSlideIndicator) return;
            const { step, prependWidth } = getLoopMetrics();
            if (!step) return;

            const rawIndex = Math.round((viewport.scrollLeft - prependWidth) / step);
            const normalizedIndex = ((rawIndex % realSlidesCount) + realSlidesCount) % realSlidesCount;
            currentSlideIndicator.textContent = String(normalizedIndex + 1);
        };

        const scheduleNormalize = () => {
            if (settleTimerId !== null) {
                window.clearTimeout(settleTimerId);
            }

            settleTimerId = window.setTimeout(() => {
                settleTimerId = null;
                normalizeLoopPosition();
            }, 90);
        };

        const scrollByStep = (direction) => {
            viewport.scrollBy({
                left: getStep() * direction,
                behavior: 'smooth',
            });
        };

        const scheduleIndicatorUpdate = () => {
            if (indicatorRafId !== null) return;
            indicatorRafId = window.requestAnimationFrame(() => {
                indicatorRafId = null;
                updateSlideIndicator();
            });
        };

        prevButton?.addEventListener('click', () => scrollByStep(-1));
        nextButton?.addEventListener('click', () => scrollByStep(1));
        viewport.addEventListener('scroll', () => {
            scheduleNormalize();
            scheduleIndicatorUpdate();
        }, { passive: true });
        viewport.addEventListener('pointerup', normalizeLoopPosition);
        viewport.addEventListener('touchend', normalizeLoopPosition, { passive: true });
        window.addEventListener('resize', () => {
            if (resizeRafId !== null) {
                window.cancelAnimationFrame(resizeRafId);
            }

            resizeRafId = window.requestAnimationFrame(() => {
                resizeRafId = null;
                normalizeLoopPosition();
                updateSlideIndicator();
            });
        });

        scrollToInitialRealSlide();
        updateSlideIndicator();
    });

    directionModal?.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            event.preventDefault();
            closeDirectionModal();
            return;
        }

        if (event.key !== 'Tab') return;

        const focusables = Array.from(directionModal.querySelectorAll(focusableSelector))
            .filter((node) => !node.hasAttribute('disabled') && node.getAttribute('aria-hidden') !== 'true');

        if (!focusables.length) return;

        const first = focusables[0];
        const last = focusables[focusables.length - 1];
        const active = document.activeElement;

        if (event.shiftKey && active === first) {
            event.preventDefault();
            last.focus();
        } else if (!event.shiftKey && active === last) {
            event.preventDefault();
            first.focus();
        }
    });


    const mediaQueryReduced = window.matchMedia('(prefers-reduced-motion: reduce)');
    const mediaQueryDesktop = window.matchMedia('(min-width: 992px)');
    const shouldReduceMotion = () => mediaQueryReduced.matches;

    const initPageEnter = () => {
        if (shouldReduceMotion()) {
            document.body.classList.add('is-page-ready');
            return;
        }

        requestAnimationFrame(() => {
            document.body.classList.add('is-page-ready');
        });
    };

    const initRevealAnimations = () => {
        const pageRoot = document.querySelector('.site-shell > main') || document.querySelector('main.inner-page') || document.querySelector('main') || document.body;
        const topLevelSections = Array.from(pageRoot.children).filter((node) => node.matches('section'));
        const firstThreeSections = topLevelSections.slice(0, 3);
        const firstThreeSectionSet = new Set(firstThreeSections);

        firstThreeSections.forEach((section) => {
            section.setAttribute('data-no-scroll-motion', '');
        });

        const isInFirstThreeSections = (node) => {
            const section = node?.closest('section');
            return Boolean(section && firstThreeSectionSet.has(section));
        };
        const isMotionExcluded = (node) => Boolean(node?.closest('[data-no-scroll-motion]')) || isInFirstThreeSections(node);
        const revealRoots = [
            '.hero__content',
            '.section__head',
            '.inner-hero .container',
            '.about__content',
            '.about__visual',
            '.consultation',
            '.footer__inner',
            '.doctor-intro__grid',
            '.doctor-highlight',
            '.doctor-text',
            '.doctor-specialties',
            '.doctor-contribution',
            '.doctor-clinic__card',
            '.inner-section > .container > *:not(script)',
            '.location-map'
        ];

        const revealNodes = new Set();
        revealRoots.forEach((selector) => {
            document.querySelectorAll(selector).forEach((node) => {
                if (isMotionExcluded(node)) return;
                revealNodes.add(node);
            });
        });

        const staggerGroups = [
            '.spec-grid .spec-card',
            '.results-slider .result-card',
            '.inner-grid > *',
            '.doc-grid .doc-card',
            '.doctor-facts .doctor-facts__item',
            '.doctor-specialties .doctor-specialty',
            '.doctor-contribution .doctor-contribution__item',
            '.faq details'
        ];

        staggerGroups.forEach((selector) => {
            document.querySelectorAll(selector).forEach((node) => {
                if (isMotionExcluded(node)) return;
                revealNodes.add(node);
            });
        });

        const revealElements = Array.from(revealNodes);
        if (!revealElements.length) return;

        revealElements.forEach((element, index) => {
            const mode = index % 3;
            element.classList.add('motion-reveal');
            element.classList.add(mode === 0 ? 'motion-reveal--up' : mode === 1 ? 'motion-reveal--left' : 'motion-reveal--right');
        });

        if (firstThreeSections.length) {
            firstThreeSections.forEach((section) => {
                section.querySelectorAll('.motion-reveal').forEach((element) => {
                    element.classList.add('is-revealed');
                });
            });
        }

        if (shouldReduceMotion()) {
            revealElements.forEach((element) => element.classList.add('is-revealed'));
            return;
        }

        const staggerParents = document.querySelectorAll('.spec-grid, .results-slider, .inner-grid, .doc-grid, .doctor-facts, .doctor-specialties, .doctor-contribution, .faq');
        staggerParents.forEach((parent) => {
            const children = parent.querySelectorAll('.motion-reveal');
            children.forEach((child, index) => {
                child.style.setProperty('--motion-delay', `${Math.min(index * 55, 220)}ms`);
            });
        });

        const revealObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('is-revealed');
                observer.unobserve(entry.target);
            });
        }, {
            rootMargin: '0px 0px -12% 0px',
            threshold: 0.16,
        });

        revealElements.forEach((element) => revealObserver.observe(element));
    };

    const initButtonGlint = () => {
        const glintButtons = [
            document.querySelector('.hero .button--accent'),
            document.querySelector('.consultation .button--accent'),
            document.querySelector('.footer__cta .button--accent')
        ].filter(Boolean);

        glintButtons.forEach((button) => button.classList.add('button--glint'));
    };

    const initMouseFollow = () => {
        if (shouldReduceMotion() || !mediaQueryDesktop.matches) return;

        const targets = [
            document.querySelector('.hero__image-card'),
            document.querySelector('.about__visual'),
            document.querySelector('.doctor-intro__visual')
        ].filter(Boolean);

        if (!targets.length) return;

        targets.forEach((target) => {
            target.classList.add('motion-float');
            target.style.setProperty('--mf-x', '0px');
            target.style.setProperty('--mf-y', '0px');
        });

        let rafId = null;
        let mouseX = 0;
        let mouseY = 0;

        const update = () => {
            targets.forEach((target) => {
                const rect = target.getBoundingClientRect();
                const centerX = rect.left + rect.width / 2;
                const centerY = rect.top + rect.height / 2;
                const offsetX = ((mouseX - centerX) / window.innerWidth) * 10;
                const offsetY = ((mouseY - centerY) / window.innerHeight) * 10;
                const clampedX = Math.max(Math.min(offsetX, 8), -8);
                const clampedY = Math.max(Math.min(offsetY, 8), -8);

                target.style.setProperty('--mf-x', `${clampedX.toFixed(2)}px`);
                target.style.setProperty('--mf-y', `${clampedY.toFixed(2)}px`);
            });

            rafId = null;
        };

        window.addEventListener('mousemove', (event) => {
            mouseX = event.clientX;
            mouseY = event.clientY;
            if (!rafId) rafId = requestAnimationFrame(update);
        }, { passive: true });
    };

    const initScrollParallax = () => {
        if (shouldReduceMotion()) return;

        const targets = [
            ...document.querySelectorAll('.about__image, .doctor-intro__image, .result-card__image, .media-placeholder')
        ].filter((node) => !node.closest('.hero__shape'));

        if (!targets.length) return;

        targets.forEach((target) => target.classList.add('motion-parallax'));

        let ticking = false;

        const update = () => {
            const viewportHeight = window.innerHeight;

            targets.forEach((target) => {
                const rect = target.getBoundingClientRect();
                if (rect.bottom < -40 || rect.top > viewportHeight + 40) return;

                const progress = ((rect.top + rect.height / 2) - viewportHeight / 2) / viewportHeight;
                const shift = Math.max(Math.min(progress * -12, 12), -12);
                target.style.setProperty('--scroll-shift', `${shift.toFixed(2)}px`);
            });

            ticking = false;
        };

        const onScroll = () => {
            if (ticking) return;
            ticking = true;
            requestAnimationFrame(update);
        };

        window.addEventListener('scroll', onScroll, { passive: true });
        window.addEventListener('resize', onScroll, { passive: true });
        onScroll();
    };


    const initMapParallax = () => {
        if (shouldReduceMotion() || !mediaQueryDesktop.matches) return;

        const mapPanel = document.querySelector('[data-map-panel]');
        const mapCopy = document.querySelector('[data-map-copy]');
        if (!mapPanel || !mapCopy) return;

        let ticking = false;

        const update = () => {
            const rect = mapPanel.getBoundingClientRect();
            const viewportCenter = window.innerHeight / 2;
            const panelCenter = rect.top + rect.height / 2;
            const progress = (panelCenter - viewportCenter) / window.innerHeight;
            const shift = Math.max(Math.min(progress * -8, 8), -8);
            mapCopy.style.transform = `translate3d(0, ${shift.toFixed(2)}px, 0)`;
            ticking = false;
        };

        const onScroll = () => {
            if (ticking) return;
            ticking = true;
            requestAnimationFrame(update);
        };

        window.addEventListener('scroll', onScroll, { passive: true });
        window.addEventListener('resize', onScroll, { passive: true });
        onScroll();
    };

    const initStickyMoments = () => {
        if (!mediaQueryDesktop.matches || shouldReduceMotion()) return;

        [
            document.querySelector('.about__visual'),
            document.querySelector('.doctor-intro__visual')
        ].filter(Boolean).forEach((node) => node.classList.add('motion-sticky-moment'));
    };

    initPageEnter();
    initRevealAnimations();
    initButtonGlint();
    initMouseFollow();
    initScrollParallax();
    initMapParallax();
    initStickyMoments();
});
