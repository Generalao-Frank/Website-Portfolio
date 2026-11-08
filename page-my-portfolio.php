<?php
/**
 * Template: My Portfolio
 * Save as page-my-portfolio.php (auto-applies to the page with the slug "my-portfolio").
 * CSS + JS are inline so you can paste it straight in; move them to your theme files later.
 */

add_action('wp_head', function () {
  echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
  echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
  echo '<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,500;12..96,700;12..96,800&family=Figtree:wght@400;500;600&display=swap" rel="stylesheet">' . "\n";
});

get_header(); ?>

<style>
/* ===== Tokens (Ink + Avocado + White system) ===== */
.my-portfolio-page{
  --ink:#0B0F0A; --ink-2:#131A12; --paper:#F4F6EF; --dim:#8A9480;
  --avocado:#A8C66C; --avocado-dim:#7A9448;
  --display:'Bricolage Grotesque',system-ui,sans-serif; --body:'Figtree',system-ui,sans-serif;
  --ease:cubic-bezier(.2,.8,.2,1);
  background:var(--ink); color:var(--paper); font-family:var(--body); overflow-x:hidden;
}
.my-portfolio-page *,.my-portfolio-page *::before,.my-portfolio-page *::after{box-sizing:border-box}
.my-portfolio-page a{color:inherit;text-decoration:none}
.my-portfolio-page :focus-visible{outline:2px solid var(--avocado);outline-offset:4px;border-radius:8px}
.my-portfolio-page .container{max-width:1200px;margin:0 auto;padding:0 clamp(20px,5vw,48px)}
.my-portfolio-page .section{padding:clamp(72px,10vw,130px) 0}
.my-portfolio-page .eyebrow{display:inline-flex;align-items:center;gap:12px;margin:0 0 24px;font-size:.8rem;letter-spacing:.14em;color:var(--dim);font-weight:500}
.my-portfolio-page .status-dot{position:relative;width:9px;height:9px;border-radius:50%;background:var(--avocado)}
.my-portfolio-page .status-dot::after{content:"";position:absolute;inset:-6px;border-radius:50%;border:1px solid var(--avocado);animation:pfPing 2.2s ease-out infinite}
@keyframes pfPing{from{transform:scale(.4);opacity:1}to{transform:scale(1.6);opacity:0}}
.my-portfolio-page .section-heading{font-family:var(--display);font-weight:800;letter-spacing:-.04em;line-height:1;font-size:clamp(2.1rem,5vw,4.2rem);margin:0 0 40px}
.my-portfolio-page .muted{color:var(--dim)}

/* Scroll progress */
.pf-progress{position:fixed;top:0;left:0;right:0;height:3px;z-index:9999;transform:scaleX(0);transform-origin:0 50%;background:var(--avocado)}

/* Buttons */
.my-portfolio-page .button{
  display:inline-flex;align-items:center;gap:10px;padding:17px 28px;border-radius:999px;cursor:pointer;
  background:var(--paper);color:var(--ink);border:1px solid var(--paper);font:600 1rem var(--body);
  transition:background .35s,color .35s,border-color .35s,transform .25s var(--ease);
}
.my-portfolio-page .button:hover{background:var(--avocado);border-color:var(--avocado);color:var(--ink)}
.my-portfolio-page .button-outline{background:transparent;color:var(--paper);border-color:rgba(244,246,239,.3)}
.my-portfolio-page .button-outline:hover{background:var(--avocado);border-color:var(--avocado);color:var(--ink)}
.my-portfolio-page .text-link{font-weight:600;padding-bottom:4px;background:linear-gradient(currentColor,currentColor) 0 100%/100% 1px no-repeat;transition:background-size .4s var(--ease),color .3s}
.my-portfolio-page .text-link:hover{background-size:0 1px;color:var(--avocado)}

/* ===== Hero ===== */
.portfolio-hero{position:relative;min-height:100svh;display:flex;align-items:center;padding-top:140px;overflow:hidden;isolation:isolate}
.pf-blob{position:absolute;z-index:-1;border-radius:50%;filter:blur(90px);opacity:.35;animation:pfDrift 18s ease-in-out infinite alternate}
.pf-blob.b1{width:520px;height:520px;background:var(--avocado);top:-120px;left:-120px}
.pf-blob.b2{width:460px;height:460px;background:var(--avocado-dim);opacity:.25;bottom:-140px;right:-80px;animation-delay:-9s}
@keyframes pfDrift{to{transform:translate(90px,60px) scale(1.15)}}
.portfolio-grid{display:grid;grid-template-columns:1.25fr .75fr;gap:48px;align-items:center}
.portfolio-hero h1{font-family:var(--display);font-weight:800;letter-spacing:-.045em;line-height:1;font-size:clamp(2.4rem,5.4vw,4.9rem);margin:0 0 28px}
.portfolio-hero .line{display:block;overflow:hidden;padding-bottom:.12em;margin-bottom:-.12em}
.portfolio-hero .line>span{display:inline-block;transform:translateY(108%);animation:pfRise 1.1s var(--ease) forwards}
.portfolio-hero .line:nth-child(2)>span{animation-delay:.18s}
.portfolio-hero .accent{
  background:linear-gradient(90deg,var(--avocado),var(--avocado-dim),var(--avocado));background-size:200% 100%;
  -webkit-background-clip:text;background-clip:text;color:transparent;animation:pfShift 7s linear infinite;
}
@keyframes pfShift{to{background-position:200% 0}}
@keyframes pfRise{to{transform:none}}
.hero-description,.hero-actions,.portfolio-hero .eyebrow{opacity:0;animation:pfFade .9s var(--ease) forwards}
.portfolio-hero .eyebrow{animation-delay:.05s}
.hero-description{animation-delay:.6s;max-width:520px;font-size:1.15rem;line-height:1.6;color:#C9D1BE;margin:0 0 36px}
.hero-actions{animation-delay:.8s;display:flex;flex-wrap:wrap;align-items:center;gap:28px}
@keyframes pfFade{from{opacity:0;transform:translateY(14px)}to{opacity:1;transform:none}}

/* Orbit art */
.portfolio-art{position:relative;width:min(100%,380px);aspect-ratio:1;margin:0 auto;display:grid;place-items:center;opacity:0;animation:pfFade 1s var(--ease) .5s forwards}
.portfolio-art::before{content:"";position:absolute;inset:6%;border-radius:50%;border:1px dashed rgba(244,246,239,.25)}
.art-circle{
  --px:0px;--py:0px;position:relative;width:46%;aspect-ratio:1;border-radius:50%;display:grid;place-items:center;
  font:800 clamp(2rem,5vw,3rem) var(--display);letter-spacing:-.04em;color:var(--ink);
  background:linear-gradient(135deg,var(--avocado),var(--avocado-dim));box-shadow:0 0 80px rgba(168,198,108,.3);
  transform:translate(var(--px),var(--py));transition:transform .3s var(--ease);
}
.art-circle span{position:absolute;top:2%;right:6%;font-size:1.2rem;animation:pfSpin 8s linear infinite}
@keyframes pfSpin{to{transform:rotate(360deg)}}
.portfolio-art>p{position:absolute;bottom:-34px;margin:0;font-size:.75rem;letter-spacing:.16em;color:var(--dim)}
.art-tags span{
  --a:0deg;--r:calc(min(190px,46%)); position:absolute;left:50%;top:50%;padding:8px 16px;border-radius:999px;
  background:var(--ink-2);border:1px solid rgba(255,255,255,.18);font-size:.85rem;font-weight:600;white-space:nowrap;
  animation:pfOrbit 24s linear infinite;
}
.art-tags span:nth-child(1){--a:0deg}.art-tags span:nth-child(2){--a:90deg}
.art-tags span:nth-child(3){--a:180deg}.art-tags span:nth-child(4){--a:270deg}
.portfolio-art:hover .art-tags span{animation-play-state:paused}
@keyframes pfOrbit{
  from{transform:translate(-50%,-50%) rotate(var(--a)) translateX(175px) rotate(calc(-1*var(--a)))}
  to{transform:translate(-50%,-50%) rotate(calc(var(--a) + 360deg)) translateX(175px) rotate(calc(-1*(var(--a) + 360deg)))}
}

/* ===== About ===== */
.about-grid{display:grid;grid-template-columns:1fr 1fr;gap:56px;align-items:start}
.about-copy p{font-size:1.15rem;line-height:1.75;color:#C9D1BE;margin:0 0 22px;max-width:52ch}

/* ===== Skills (they also filter the projects) ===== */
.projects-section{background:var(--ink-2)}
.tag-list{display:flex;flex-wrap:wrap;gap:10px}
.tag-list span,.tag-list button{
  padding:10px 18px;border-radius:999px;border:1px solid rgba(255,255,255,.16);background:transparent;color:var(--paper);
  font:500 .95rem var(--body);transition:background .3s,border-color .3s,color .3s,transform .25s var(--ease);
}
.tag-list button{cursor:pointer;font-size:1.05rem;padding:14px 24px}
.tag-list button:hover{border-color:var(--avocado);transform:translateY(-3px)}
.tag-list button[aria-pressed="true"]{background:var(--avocado);border-color:var(--avocado);color:var(--ink)}
.tag-list span.hit{background:var(--avocado);border-color:var(--avocado);color:var(--ink)}
.filter-status{margin:24px 0 0;min-height:1.6em;color:var(--dim);font-size:.95rem}
.filter-status a{color:var(--paper);font-weight:600;margin-left:8px;border-bottom:1px solid var(--avocado)}

/* ===== Projects ===== */
.project-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:24px}
.project-card{
  --mx:50%;--my:50%;--rx:0deg;--ry:0deg;position:relative;padding:20px 20px 28px;border-radius:26px;background:var(--ink-2);
  border:1px solid rgba(255,255,255,.08);overflow:hidden;
  transform:perspective(900px) rotateX(var(--rx)) rotateY(var(--ry));
  transition:transform .25s var(--ease),opacity .45s,filter .45s,border-color .3s;
}
.project-card::before{content:"";position:absolute;inset:0;pointer-events:none;opacity:0;transition:opacity .3s;background:radial-gradient(340px circle at var(--mx) var(--my),rgba(168,198,108,.14),transparent 70%)}
.project-card:hover::before{opacity:1}
.project-card.dim{opacity:.25;filter:grayscale(1)}
.project-card.match{border-color:var(--avocado)}
.project-card>*{position:relative}
.project-art{
  height:210px;border-radius:18px;padding:20px;margin-bottom:24px;display:flex;flex-direction:column;justify-content:space-between;color:var(--ink);
  background-image:repeating-linear-gradient(135deg,rgba(11,15,10,.14) 0 2px,transparent 2px 14px);background-size:200% 200%;transition:background-position 1s var(--ease);
}
.project-card:hover .project-art{background-position:100% 100%}
.art-green{background-color:var(--avocado)}
.art-peach{background-color:var(--avocado-dim)}
.art-blue{background-color:var(--ink);color:var(--paper);border:1px solid rgba(244,246,239,.15)}
.project-art span{font-size:.85rem;font-weight:600;letter-spacing:.1em}
.project-art b{font:800 2rem/.95 var(--display);letter-spacing:-.04em}
.project-card h3{font:700 1.4rem var(--display);letter-spacing:-.025em;margin:0 0 10px}
.project-card p{color:#C9D1BE;line-height:1.6;margin:0 0 20px}

/* ===== Contact ===== */
.contact-section{position:relative;isolation:isolate;overflow:hidden;padding:clamp(90px,12vw,170px) 0;text-align:center;background:var(--ink-2)}
.contact-section .pf-blob.b1{top:auto;bottom:-200px;left:10%}.contact-section .pf-blob.b2{top:-200px;bottom:auto;right:10%}
.contact-section h2{font:800 clamp(2.6rem,8vw,7rem)/.95 var(--display);letter-spacing:-.05em;margin:0 0 28px}
.contact-section h2 em{font-style:normal;background:linear-gradient(90deg,var(--avocado),var(--avocado-dim));-webkit-background-clip:text;background-clip:text;color:transparent}
.contact-section p{color:#C9D1BE;font-size:1.1rem;line-height:1.6;max-width:46ch;margin:0 auto 32px}
.contact-actions{display:flex;flex-wrap:wrap;justify-content:center;gap:14px;margin-bottom:40px}
.contact-section .contact-back{margin:0}

/* Scroll reveal (only when JS runs) */
.pf-js .reveal{opacity:0;transform:translateY(32px);transition:opacity .9s var(--ease),transform .9s var(--ease)}
.pf-js .reveal.in{opacity:1;transform:none}
.pf-js .project-card.reveal.in{transform:perspective(900px) rotateX(var(--rx)) rotateY(var(--ry))}

@media (max-width:900px){
  .portfolio-grid,.about-grid{grid-template-columns:1fr}
  .project-grid{grid-template-columns:1fr}
  .portfolio-art{margin-top:24px;width:min(100%,320px)}
  @keyframes pfOrbit{
    from{transform:translate(-50%,-50%) rotate(var(--a)) translateX(145px) rotate(calc(-1*var(--a)))}
    to{transform:translate(-50%,-50%) rotate(calc(var(--a) + 360deg)) translateX(145px) rotate(calc(-1*(var(--a) + 360deg)))}
  }
}
@media (prefers-reduced-motion:reduce){
  .my-portfolio-page *,.my-portfolio-page *::before,.my-portfolio-page *::after{animation:none!important;transition:none!important}
  .portfolio-hero .line>span,.hero-description,.hero-actions,.portfolio-hero .eyebrow,.portfolio-art{transform:none;opacity:1}
  .art-tags span{transform:translate(-50%,-50%) rotate(var(--a)) translateX(175px) rotate(calc(-1*var(--a)))}
  .pf-js .reveal{opacity:1;transform:none}
}
</style>

<div class="pf-progress" aria-hidden="true"></div>

<main class="my-portfolio-page">

    <!-- HERO / PROFILE -->
    <section class="portfolio-hero section">
        <span class="pf-blob b1" aria-hidden="true"></span>
        <span class="pf-blob b2" aria-hidden="true"></span>
        <div class="container portfolio-grid">

            <div>
                <p class="eyebrow">
                    <span class="status-dot"></span>
                    ASPIRING WEB DEVELOPER
                </p>

                <h1>
                    <span class="line"><span>Hi, I'm <span class="accent">Your Name.</span></span></span>
                    <span class="line"><span>I build websites and digital experiences.</span></span>
                </h1>

                <p class="hero-description">
                    I am an aspiring web developer who enjoys
                    creating responsive websites and learning
                    new technologies.
                </p>

                <div class="hero-actions">
                    <a class="button" href="#my-projects">
                        Explore My Projects ↘
                    </a>

                    <a class="text-link" href="#my-contact">
                        Contact Me ↗
                    </a>
                </div>
            </div>

            <div class="portfolio-art">
                <div class="art-circle">
                    YN
                    <span>✳</span>
                </div>

                <div class="art-tags" aria-hidden="true">
                    <span>HTML</span>
                    <span>CSS</span>
                    <span>JavaScript</span>
                    <span>PHP</span>
                </div>

                <p>DESIGN · CODE · LEARN</p>
            </div>

        </div>
    </section>

    <!-- ABOUT ME -->
    <section class="section">
        <div class="container about-grid">

            <div class="reveal">
                <p class="eyebrow">01 / ABOUT ME</p>

                <h2 class="section-heading">
                    Learning today.<br>
                    <span class="muted">
                        Building for tomorrow.
                    </span>
                </h2>
            </div>

            <div class="about-copy reveal">
                <p>
                    Hello! I'm Your Name. I am passionate about
                    technology and web development. I enjoy
                    learning how websites work and turning
                    ideas into functional web pages.
                </p>

                <p>
                    My goal is to improve my programming skills
                    by creating projects and exploring new tools.
                </p>
            </div>

        </div>
    </section>

    <!-- SKILLS: select one to highlight the projects that use it -->
    <section class="section projects-section">
        <div class="container">

            <p class="eyebrow reveal">02 / MY SKILLS</p>

            <h2 class="section-heading reveal">
                Technologies I'm <span class="muted">learning.</span>
            </h2>

            <div class="tag-list skill-filter reveal" role="group" aria-label="Filter projects by skill">
                <button type="button" aria-pressed="false" data-skill="html">HTML5</button>
                <button type="button" aria-pressed="false" data-skill="css">CSS3</button>
                <button type="button" aria-pressed="false" data-skill="javascript">JavaScript</button>
                <button type="button" aria-pressed="false" data-skill="php">PHP</button>
                <button type="button" aria-pressed="false" data-skill="wordpress">WordPress</button>
                <button type="button" aria-pressed="false" data-skill="mysql">MySQL</button>
                <button type="button" aria-pressed="false" data-skill="git">Git</button>
            </div>
            <p class="filter-status" aria-live="polite">Select a skill to see which projects use it.</p>

        </div>
    </section>

    <!-- PROJECTS -->
    <section class="section" id="my-projects">
        <div class="container">

            <p class="eyebrow reveal">03 / MY PROJECTS</p>

            <h2 class="section-heading reveal">
                Things I've <span class="muted">created.</span>
            </h2>

            <div class="project-grid">

                <article class="project-card reveal" data-tech="html css javascript">
                    <div class="project-art art-green">
                        <span>01</span>
                        <b>DIGITAL<br>CLOCK</b>
                    </div>

                    <h3>Digital Clock & Calendar</h3>

                    <p>
                        A website that displays the current time
                        and a calendar using JavaScript.
                    </p>

                    <div class="tag-list">
                        <span>HTML</span>
                        <span>CSS</span>
                        <span>JavaScript</span>
                    </div>
                </article>

                <article class="project-card reveal" data-tech="html css">
                    <div class="project-art art-peach">
                        <span>02</span>
                        <b>MY WEB<br>PROJECT</b>
                    </div>

                    <h3>Personal Website</h3>

                    <p>
                        A responsive website designed to introduce
                        myself and showcase my skills.
                    </p>

                    <div class="tag-list">
                        <span>HTML</span>
                        <span>CSS</span>
                    </div>
                </article>

                <article class="project-card reveal" data-tech="wordpress php css">
                    <div class="project-art art-blue">
                        <span>03</span>
                        <b>WORD<br>PRESS</b>
                    </div>

                    <h3>Custom WordPress Website</h3>

                    <p>
                        A portfolio website developed with a
                        custom WordPress theme using PHP and CSS.
                    </p>

                    <div class="tag-list">
                        <span>WordPress</span>
                        <span>PHP</span>
                    </div>
                </article>

            </div>
        </div>
    </section>

    <!-- CONTACT -->
    <section class="contact-section" id="my-contact">
        <span class="pf-blob b1" aria-hidden="true"></span>
        <span class="pf-blob b2" aria-hidden="true"></span>
        <div class="container">

            <p class="eyebrow reveal">04 / CONTACT ME</p>

            <h2 class="reveal">
                Let's connect.<br>
                <em>Let's create.</em>
            </h2>

            <p class="reveal">
                Have a question or want to work together?
                Feel free to contact me.
            </p>

            <div class="contact-actions reveal">
                <a class="button button-light"
                    href="mailto:your-email@example.com">
                    Email Me ↗
                </a>
                <button class="button button-outline" type="button" data-copy="your-email@example.com" aria-live="polite">
                    Copy email
                </button>
            </div>

            <p class="contact-back">
                <a class="text-link" href="<?php echo esc_url(home_url('/')); ?>">
                    ← Back to Home
                </a>
            </p>

        </div>
    </section>

</main>

<script>
(function () {
  document.documentElement.classList.add('pf-js');
  var reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;
  var fine = matchMedia('(pointer:fine)').matches;

  /* Scroll progress bar */
  var bar = document.querySelector('.pf-progress');
  function prog() {
    var max = document.documentElement.scrollHeight - innerHeight;
    bar.style.transform = 'scaleX(' + (max > 0 ? Math.min(1, scrollY / max) : 0) + ')';
  }
  addEventListener('scroll', prog, { passive: true }); prog();

  /* Hero monogram follows the cursor slightly */
  var hero = document.querySelector('.portfolio-hero'), disc = document.querySelector('.art-circle');
  if (hero && disc && fine && !reduce) {
    hero.addEventListener('pointermove', function (e) {
      var r = hero.getBoundingClientRect();
      disc.style.setProperty('--px', ((e.clientX - r.left) / r.width - .5) * 40 + 'px');
      disc.style.setProperty('--py', ((e.clientY - r.top) / r.height - .5) * 40 + 'px');
    });
  }

  /* Skills filter the projects */
  var skills = document.querySelectorAll('.skill-filter button'),
      cards = document.querySelectorAll('.project-card'),
      status = document.querySelector('.filter-status'),
      idle = status.textContent;
  skills.forEach(function (btn) {
    btn.addEventListener('click', function () {
      var on = btn.getAttribute('aria-pressed') !== 'true', key = btn.dataset.skill, count = 0;
      skills.forEach(function (b) { b.setAttribute('aria-pressed', 'false'); });
      if (on) btn.setAttribute('aria-pressed', 'true');
      cards.forEach(function (card) {
        var hit = on && card.dataset.tech.split(' ').indexOf(key) > -1;
        if (hit) count++;
        card.classList.toggle('match', hit);
        card.classList.toggle('dim', on && !hit);
        card.querySelectorAll('.tag-list span').forEach(function (t) {
          t.classList.toggle('hit', on && t.textContent.trim().toLowerCase() === key);
        });
      });
      if (!on) { status.textContent = idle; return; }
      status.innerHTML = count
        ? count + (count === 1 ? ' project uses ' : ' projects use ') + btn.textContent + '.<a href="#my-projects">View ↓</a>'
        : 'No projects use ' + btn.textContent + ' yet. It\'s on my learning list.';
    });
  });

  /* Project cards: spotlight + tilt */
  cards.forEach(function (card) {
    card.addEventListener('pointermove', function (e) {
      var r = card.getBoundingClientRect(), x = (e.clientX - r.left) / r.width, y = (e.clientY - r.top) / r.height;
      card.style.setProperty('--mx', x * 100 + '%'); card.style.setProperty('--my', y * 100 + '%');
      if (fine && !reduce) { card.style.setProperty('--ry', (x - .5) * 7 + 'deg'); card.style.setProperty('--rx', (.5 - y) * 7 + 'deg'); }
    });
    card.addEventListener('pointerleave', function () { card.style.setProperty('--rx', '0deg'); card.style.setProperty('--ry', '0deg'); });
  });

  /* Copy email */
  var copy = document.querySelector('[data-copy]');
  if (copy) copy.addEventListener('click', function () {
    var label = copy.textContent;
    var done = function () { copy.textContent = 'Copied ✓'; setTimeout(function () { copy.textContent = label; }, 2000); };
    if (navigator.clipboard) navigator.clipboard.writeText(copy.dataset.copy).then(done, function () { copy.textContent = copy.dataset.copy; });
    else copy.textContent = copy.dataset.copy;
  });

  /* Reveal on scroll */
  var io = new IntersectionObserver(function (items) {
    items.forEach(function (it, i) {
      if (it.isIntersecting) { setTimeout(function () { it.target.classList.add('in'); }, i * 110); io.unobserve(it.target); }
    });
  }, { threshold: .15 });
  document.querySelectorAll('.reveal').forEach(function (el) { io.observe(el); });
})();
</script>

<?php get_footer(); ?>