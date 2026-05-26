(function () {
    'use strict';

    // ─── Gallery client-side render (bypasses LiteSpeed page cache) ──────────
    // Runs before lightbox init so lightbox can attach to rendered elements.
    (function renderGallery() {
        var base = window.location.origin + '/wp-content/uploads/2026/05/';

        // Gallery page — inject grid if stale ("coming soon") or missing
        var gallerySection = document.querySelector('main.sbj-gallery-page .sbj-gallery-full');
        if (gallerySection) {
            var existingImg  = gallerySection.querySelector('img[src*="/gallery-"]');
            var alreadyGood  = existingImg && /\/gallery-[1-9]\.webp/.test(existingImg.getAttribute('src'));
            if (!alreadyGood) {
                var imgs   = [1,2,3,4,5,6,7,8,9,10];
                var videos = ['gallery-video-1.mp4','gallery-video-2.mp4'];
                var grid   = document.createElement('div');
                grid.className = 'sbj-gallery-grid sbj-gallery-grid--full';
                imgs.forEach(function (n, i) {
                    var url = base + 'gallery-' + n + '.webp';
                    var alt = 'Slayd by Jade — style ' + (i + 1);
                    var a   = document.createElement('a');
                    a.href  = url;
                    a.className = 'sbj-gallery-item sbj-reveal';
                    a.setAttribute('data-lightbox', 'gallery');
                    a.setAttribute('aria-label', alt);
                    a.innerHTML = '<img src="' + url + '" alt="' + alt
                        + '" class="sbj-gallery-item__img" loading="lazy" decoding="async">'
                        + '<div class="sbj-gallery-item__overlay" aria-hidden="true">'
                        + '<span class="sbj-gallery-item__view-label">View</span></div>';
                    grid.appendChild(a);
                });
                gallerySection.innerHTML = '';
                gallerySection.appendChild(grid);
                var vWrap = document.createElement('div');
                vWrap.className = 'sbj-gallery-videos';
                vWrap.setAttribute('aria-label', 'Video gallery');
                videos.forEach(function (vid, i) {
                    var d = document.createElement('div');
                    d.className = 'sbj-gallery-video sbj-reveal';
                    d.innerHTML = '<video controls preload="none" class="sbj-gallery-video__player"'
                        + ' aria-label="Slayd by Jade — video ' + (i + 1) + '">'
                        + '<source src="' + base + vid + '" type="video/mp4"></video>';
                    vWrap.appendChild(d);
                });
                gallerySection.appendChild(vWrap);
            }
        }

        // Homepage preview — replace stale old-format images (gallery-01.webp etc.)
        var previewGrid = document.querySelector('.sbj-gallery-grid--preview');
        if (previewGrid) {
            var firstImg     = previewGrid.querySelector('img');
            var previewGood  = firstImg && /\/gallery-[1-6]\.webp/.test(firstImg.getAttribute('src'));
            if (!previewGood) {
                var galleryHref = window.location.origin + '/gallery';
                previewGrid.innerHTML = '';
                [1,2,3,4,5,6].forEach(function (n, i) {
                    var url = base + 'gallery-' + n + '.webp';
                    var alt = 'Slayd by Jade — style ' + (i + 1);
                    var a   = document.createElement('a');
                    a.href  = galleryHref;
                    a.className = 'sbj-gallery-item sbj-reveal';
                    a.setAttribute('aria-label', alt);
                    a.innerHTML = '<img src="' + url + '" alt="' + alt
                        + '" class="sbj-gallery-item__img" loading="lazy" decoding="async">'
                        + '<div class="sbj-gallery-item__overlay" aria-hidden="true">'
                        + '<span class="sbj-gallery-item__view-label">View</span></div>';
                    previewGrid.appendChild(a);
                });
            }
        }
    })();

    // ─── Sticky header ───────────────────────────────────────────────────────
    var header = document.getElementById('sbj-header');
    if (header) {
        window.addEventListener('scroll', function () {
            header.classList.toggle('is-scrolled', window.scrollY > 60);
        }, { passive: true });
    }

    // ─── Mobile nav toggle ───────────────────────────────────────────────────
    var toggle = document.getElementById('sbj-nav-toggle');
    var menu   = document.getElementById('sbj-nav-menu');
    if (toggle && menu) {
        toggle.addEventListener('click', function () {
            var isOpen = menu.classList.toggle('is-open');
            toggle.setAttribute('aria-expanded', String(isOpen));
            document.body.style.overflow = isOpen ? 'hidden' : '';
            if (header) header.classList.toggle('nav-is-open', isOpen);
        });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && menu.classList.contains('is-open')) {
                menu.classList.remove('is-open');
                toggle.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
                if (header) header.classList.remove('nav-is-open');
                toggle.focus();
            }
        });
        menu.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                var href = this.href;
                menu.classList.remove('is-open');
                toggle.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
                if (header) header.classList.remove('nav-is-open');
                if (href) { window.location.href = href; }
            });
        });
    }

    // ─── Gallery lightbox ────────────────────────────────────────────────────
    var galleryLinks = document.querySelectorAll('[data-lightbox="gallery"]');
    if (galleryLinks.length) {
        var lightbox = null;

        function buildLightbox() {
            lightbox = document.createElement('div');
            lightbox.id = 'sbj-lightbox';
            lightbox.setAttribute('role', 'dialog');
            lightbox.setAttribute('aria-modal', 'true');
            lightbox.setAttribute('aria-label', 'Image lightbox');
            lightbox.style.cssText = 'position:fixed;inset:0;z-index:9999;background:rgba(9,9,9,0.97);display:flex;align-items:center;justify-content:center;cursor:zoom-out;opacity:0;transition:opacity 0.3s ease;';

            var img   = document.createElement('img');
            img.id    = 'sbj-lightbox-img';
            img.style.cssText = 'max-width:90vw;max-height:90vh;object-fit:contain;border:1px solid rgba(201,160,80,0.3);transform:scale(0.95);transition:transform 0.3s ease;';

            var close = document.createElement('button');
            close.setAttribute('aria-label', 'Close lightbox');
            close.style.cssText = 'position:absolute;top:1rem;right:1.5rem;color:#C9A050;font-size:2rem;background:none;border:none;cursor:pointer;line-height:1;';
            close.textContent = '×';

            lightbox.appendChild(img);
            lightbox.appendChild(close);
            document.body.appendChild(lightbox);

            lightbox.addEventListener('click', function (e) {
                if (e.target === lightbox || e.target === close) closeLightbox();
            });
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && lightbox && lightbox.dataset.open) closeLightbox();
            });
        }

        function openLightbox(src, alt) {
            if (!lightbox) buildLightbox();
            var img = document.getElementById('sbj-lightbox-img');
            img.src = src;
            img.alt = alt || '';
            lightbox.style.display = 'flex';
            lightbox.dataset.open  = '1';
            requestAnimationFrame(function () {
                lightbox.style.opacity = '1';
                img.style.transform    = 'scale(1)';
            });
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            if (!lightbox) return;
            lightbox.style.opacity = '0';
            document.getElementById('sbj-lightbox-img').style.transform = 'scale(0.95)';
            delete lightbox.dataset.open;
            setTimeout(function () { lightbox.style.display = 'none'; }, 300);
            document.body.style.overflow = '';
        }

        galleryLinks.forEach(function (link) {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                var img = link.querySelector('img');
                openLightbox(link.href, img ? img.alt : '');
            });
        });
    }

    // ─── Scroll-reveal (.sbj-reveal) ─────────────────────────────────────────
    if ('IntersectionObserver' in window) {
        var revealObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

        document.querySelectorAll('.sbj-reveal').forEach(function (el) {
            revealObserver.observe(el);
        });

        // Stagger sibling cards
        document.querySelectorAll('.sbj-services-grid, .sbj-gallery-grid').forEach(function (grid) {
            grid.querySelectorAll('.sbj-reveal').forEach(function (el, i) {
                el.style.transitionDelay = (i * 70) + 'ms';
            });
        });
    }

    // ─── Hero parallax ───────────────────────────────────────────────────────
    var heroModel = document.querySelector('.sbj-hero__model');
    if (heroModel) {
        window.addEventListener('scroll', function () {
            var y = window.scrollY;
            if (y < window.innerHeight * 1.2) {
                heroModel.style.transform = 'translateY(' + (y * 0.12) + 'px)';
            }
        }, { passive: true });
    }

    // ─── Magnetic buttons ────────────────────────────────────────────────────
    var isMobile = window.matchMedia('(pointer: coarse)').matches;
    if (!isMobile) {
        document.querySelectorAll('.sbj-btn').forEach(function (btn) {
            btn.addEventListener('mousemove', function (e) {
                var rect   = btn.getBoundingClientRect();
                var cx     = rect.left + rect.width  / 2;
                var cy     = rect.top  + rect.height / 2;
                var dx     = (e.clientX - cx) * 0.28;
                var dy     = (e.clientY - cy) * 0.28;
                btn.style.transform = 'translate(' + dx + 'px, ' + dy + 'px)';
            });
            btn.addEventListener('mouseleave', function () {
                btn.style.transform = '';
            });
        });
    }

    // ─── Cursor glow ─────────────────────────────────────────────────────────
    if (!isMobile) {
        (function () {
            var glow = document.createElement('div');
            glow.id = 'sbj-cursor-glow';
            glow.setAttribute('aria-hidden', 'true');
            document.body.appendChild(glow);

            var mouseX = -9999, mouseY = -9999;
            var glowX  = -9999, glowY  = -9999;
            var visible = false;

            document.addEventListener('mousemove', function (e) {
                mouseX = e.clientX;
                mouseY = e.clientY;
                if (!visible) {
                    visible = true;
                    glow.style.opacity = '1';
                }
            });
            document.addEventListener('mouseleave', function () {
                visible = false;
                glow.style.opacity = '0';
            });

            (function animateGlow() {
                glowX += (mouseX - glowX) * 0.07;
                glowY += (mouseY - glowY) * 0.07;
                glow.style.left = glowX + 'px';
                glow.style.top  = glowY + 'px';
                requestAnimationFrame(animateGlow);
            })();
        })();
    }

    // ─── Gold particle system ────────────────────────────────────────────────
    // Canvas is position:fixed (viewport-sized). Particles live in viewport-space.
    (function initParticleSystem() {
        var canvas = document.createElement('canvas');
        canvas.id  = 'sbj-particles';
        canvas.setAttribute('aria-hidden', 'true');
        document.body.appendChild(canvas);

        var ctx   = canvas.getContext('2d');
        var W     = 0;
        var H     = 0;
        var dpr   = Math.min(window.devicePixelRatio || 1, 2);
        var COUNT = isMobile ? 22 : 60;
        var particles = [];
        var raf;

        // Gold color palette: deep gold, mid gold, pale gold, warm white-gold
        var PALETTE = [
            [201, 168,  76],  // #C9A84C — deep gold
            [226, 185, 111],  // #E2B96F — mid gold
            [245, 215, 142],  // #F5D78E — pale gold
            [255, 248, 220],  // warm white-gold
            [201, 160,  80],  // base gold
            [218, 196, 130],  // light champagne
        ];

        function resize() {
            W = window.innerWidth;
            H = window.innerHeight;
            canvas.style.width  = W + 'px';
            canvas.style.height = H + 'px';
            canvas.width  = Math.round(W * dpr);
            canvas.height = Math.round(H * dpr);
            ctx.scale(dpr, dpr);
        }

        // Three depth layers: far (distant, faint), mid, near (close, brighter)
        function makeParticle(spawnAtBottom) {
            var r = Math.random();
            var layer = r < 0.25 ? 'far' : r < 0.65 ? 'mid' : 'near';
            var size, alpha, speed;

            if (layer === 'far') {
                size  = Math.random() * 1.0 + 0.4;
                alpha = Math.random() * 0.05 + 0.02;
                speed = Math.random() * 0.12 + 0.04;
            } else if (layer === 'mid') {
                size  = Math.random() * 1.5 + 0.8;
                alpha = Math.random() * 0.09 + 0.04;
                speed = Math.random() * 0.20 + 0.08;
            } else {
                size  = Math.random() * 2.2 + 1.0;
                alpha = Math.random() * 0.13 + 0.06;
                speed = Math.random() * 0.28 + 0.12;
            }

            // Spawn distribution:
            // - initial fill: random across full viewport
            // - respawn: 55% from bottom (rising trail), 45% at random height (fills top)
            var fromBottom = spawnAtBottom && Math.random() > 0.45;
            var startY = fromBottom
                ? H + size + Math.random() * 40
                : Math.random() * H;

            return {
                x:        Math.random() * W,
                y:        startY,
                vx:       (Math.random() - 0.5) * 0.16,
                vy:       -speed,
                size:     size,
                alpha:    alpha,
                life:     0,
                maxLife:  Math.random() * 380 + 200,
                blur:     layer === 'far' && Math.random() < 0.3,
                drift:    Math.random() * Math.PI * 2,
                driftAmp: Math.random() * 0.35 + 0.08,
                color:    PALETTE[Math.floor(Math.random() * PALETTE.length)],
            };
        }

        function spawnAll() {
            particles = [];
            for (var i = 0; i < COUNT; i++) particles.push(makeParticle(false));
        }

        function draw() {
            ctx.clearRect(0, 0, W, H);

            for (var i = 0; i < particles.length; i++) {
                var p = particles[i];
                p.life++;
                p.x += p.vx + Math.sin(p.drift + p.life * 0.007) * p.driftAmp * 0.055;
                p.y += p.vy;

                var fadeIn  = Math.min(1, p.life / 45);
                var fadeOut = Math.min(1, (p.maxLife - p.life) / 45);
                var a = p.alpha * fadeIn * fadeOut;

                if (p.blur) ctx.filter = 'blur(2px)';
                ctx.beginPath();
                ctx.arc(p.x, p.y, p.size, 0, Math.PI * 2);
                var c = p.color;
                ctx.fillStyle = 'rgba(' + c[0] + ',' + c[1] + ',' + c[2] + ',' + a.toFixed(3) + ')';
                ctx.fill();
                if (p.blur) ctx.filter = 'none';

                if (p.life >= p.maxLife || p.y < -p.size || p.x < -p.size || p.x > W + p.size) {
                    particles[i] = makeParticle(true);
                }
            }

            raf = requestAnimationFrame(draw);
        }

        resize();
        spawnAll();
        draw();

        window.addEventListener('resize', function () {
            cancelAnimationFrame(raf);
            resize();
            spawnAll();
            draw();
        });

        document.addEventListener('visibilitychange', function () {
            if (document.hidden) {
                cancelAnimationFrame(raf);
            } else {
                draw();
            }
        });
    })();

})();
