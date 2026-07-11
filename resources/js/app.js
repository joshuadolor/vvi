// Victor Vanguard International - public front-end entry.
// Styles are loaded via resources/scss/app.scss (separate Vite entry).
// Role dashboards (Vue SPA) will be mounted from resources/js/dashboard/ in a later phase.

function setActiveNav(hash) {
    const links = document.querySelectorAll('[data-nav-link]');
    if (!links.length) return;

    links.forEach((link) => {
        const isActive = link.getAttribute('href') === hash;
        const isMobile = link.hasAttribute('data-mobile-nav-link');

        link.classList.toggle('text-dragon-red', isActive);
        link.classList.toggle('text-on-surface-variant', !isActive);

        if (!isMobile) {
            link.classList.toggle('border-dragon-red', isActive);
            link.classList.toggle('border-transparent', !isActive);
        }
    });
}

function initSectionNav() {
    const links = [...document.querySelectorAll('[data-nav-link]')];
    if (!links.length) return;

    const sections = links
        .map((link) => document.querySelector(link.getAttribute('href')))
        .filter(Boolean);

    // Dedupe sections (desktop + mobile share the same hrefs)
    const uniqueSections = [...new Map(sections.map((section) => [section.id, section])).values()];

    if (!uniqueSections.length) return;

    const observer = new IntersectionObserver(
        (entries) => {
            const visible = entries
                .filter((entry) => entry.isIntersecting)
                .sort((a, b) => b.intersectionRatio - a.intersectionRatio)[0];

            if (visible) {
                setActiveNav(`#${visible.target.id}`);
            }
        },
        { rootMargin: '-20% 0px -60% 0px', threshold: [0, 0.25, 0.5] },
    );

    uniqueSections.forEach((section) => observer.observe(section));

    if (window.location.hash) {
        setActiveNav(window.location.hash);
    }
}

function initMobileNav() {
    const toggle = document.getElementById('nav-toggle');
    const panel = document.getElementById('mobile-nav');
    if (!toggle || !panel) return;

    const iconOpen = toggle.querySelector('[data-nav-icon-open]');
    const iconClose = toggle.querySelector('[data-nav-icon-close]');

    const setOpen = (open) => {
        panel.classList.toggle('hidden', !open);
        panel.hidden = !open;
        toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        toggle.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
        iconOpen?.classList.toggle('hidden', open);
        iconClose?.classList.toggle('hidden', !open);
    };

    toggle.addEventListener('click', () => {
        setOpen(panel.hidden);
    });

    panel.querySelectorAll('[data-mobile-nav-link]').forEach((link) => {
        link.addEventListener('click', () => setOpen(false));
    });
}

document.addEventListener('DOMContentLoaded', () => {
    initSectionNav();
    initMobileNav();
});
