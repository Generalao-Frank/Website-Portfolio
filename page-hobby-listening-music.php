
<?php
/**
 * Template Name: Hobby - Listening to Music - jay
 * Template Post Type: page
 */

get_header();
?>

<style>
.hobby-music {
    --gold: #c9a45c;
    --ivory: #f4efe5;
    --muted: #aaa49a;
    --dark: #080808;

    background: var(--dark);
    color: var(--ivory);
    min-height: 100vh;
    padding: 35px 7% 80px;
    position: relative;
    overflow: hidden;
    font-family: Arial, sans-serif;
}

.hobby-music * {
    box-sizing: border-box;
}

.hobby-music::before {
    content: "";
    position: absolute;
    inset: 0;
    background-image: radial-gradient(rgba(201,164,92,.13) 1px, transparent 1px);
    background-size: 35px 35px;
    pointer-events: none;
    opacity: .35;
}

.hobby-container {
    max-width: 1100px;
    margin: auto;
    position: relative;
    z-index: 2;
}

/* BACK TO JAY */

.hobby-top-back {
    margin-top: 35px;
}

.hobby-top-back a {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    color: var(--gold);
    text-decoration: none;
    font-size: 12px;
    letter-spacing: 2px;
    text-transform: uppercase;
    transition: .3s ease;
}

.hobby-top-back a:hover {
    color: var(--ivory);
    transform: translateX(-5px);
}

/* FLOATING DECORATIONS */

.floating-music {
    position: absolute;
    color: var(--gold);
    opacity: .15;
    font-size: 30px;
    animation: floatMusic 6s ease-in-out infinite;
    pointer-events: none;
}

.floating-music:nth-child(1) {
    top: 10%;
    left: 5%;
}

.floating-music:nth-child(2) {
    top: 35%;
    right: 7%;
    animation-delay: 1s;
}

.floating-music:nth-child(3) {
    bottom: 15%;
    left: 9%;
    animation-delay: 2s;
}

.floating-music:nth-child(4) {
    bottom: 30%;
    right: 12%;
    animation-delay: 3s;
}

@keyframes floatMusic {
    0%, 100% {
        transform: translateY(0) rotate(0deg);
    }
    50% {
        transform: translateY(-18px) rotate(8deg);
    }
}

/* HERO */

.hobby-hero {
    text-align: center;
    padding: 25px 0 70px;
}

.hobby-icon {
    width: 95px;
    height: 95px;
    margin: 0 auto 25px;
    border: 1px solid rgba(201,164,92,.5);
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    color: var(--gold);
    background: rgba(201,164,92,.06);
}

.hobby-icon svg {
    width: 45px;
    height: 45px;
}

.hobby-label {
    color: var(--gold);
    letter-spacing: 5px;
    font-size: 11px;
    text-transform: uppercase;
    margin-bottom: 5px;
}

.hobby-hero h1 {
    font-family: Georgia, serif;
    font-size: clamp(42px, 7vw, 76px);
    font-weight: 400;
    line-height: 1.1;
    margin: 0;
}

.hobby-hero h1 em {
    color: var(--gold);
    font-weight: 400;
}

.hobby-subtitle {
    color: var(--muted);
    max-width: 600px;
    margin: 22px auto 0;
    line-height: 1.8;
    font-size: 15px;
}

/* QUOTE */

.hobby-quote {
    max-width: 800px;
    margin: 0 auto 85px;
    text-align: center;
    padding: 35px;
    border-top: 1px solid rgba(201,164,92,.3);
    border-bottom: 1px solid rgba(201,164,92,.3);
}

.hobby-quote-mark {
    color: var(--gold);
    font-family: Georgia, serif;
    font-size: 55px;
    line-height: .8;
}

.hobby-quote p {
    color: var(--ivory);
    font-family: Georgia, serif;
    font-size: clamp(18px, 3vw, 25px);
    line-height: 1.7;
    font-style: italic;
    margin: 20px 0 0;
}

/* ABOUT MY HOBBY */

.hobby-content {
    max-width: 850px;
    margin: 0 auto 85px;
}

.hobby-section-label {
    color: var(--gold);
    text-transform: uppercase;
    letter-spacing: 4px;
    font-size: 11px;
    margin-bottom: 15px;
}

.hobby-content h2 {
    font-family: Georgia, serif;
    font-size: 36px;
    font-weight: 400;
    margin: 0 0 25px;
}

.hobby-content p {
    color: var(--muted);
    line-height: 2;
    font-size: 15px;
    margin-bottom: 18px;
}

/* FAVORITE MUSIC */

.music-photo-section {
    margin: 0 auto 90px;
    text-align: center;
}

.favorite-music-heading {
    margin-bottom: 35px;
}

.favorite-music-heading span {
    color: var(--gold);
    text-transform: uppercase;
    letter-spacing: 4px;
    font-size: 11px;
}

.favorite-music-heading h2 {
    color: var(--ivory);
    font-family: Georgia, serif;
    font-size: clamp(30px, 5vw, 42px);
    font-weight: 400;
    margin: 15px 0 0;
}

.favorite-music-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
}

.favorite-music-card {
    text-align: left;
    border: 1px solid rgba(201,164,92,.25);
    background: rgba(255,255,255,.025);
    padding: 12px;
    transition: .35s ease;
}

.favorite-music-card:hover {
    border-color: var(--gold);
    transform: translateY(-7px);
}

.favorite-music-image {
    width: 100%;
    aspect-ratio: 3 / 4;
    overflow: hidden;
    background: #151515;
}

.favorite-music-image img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .5s ease;
}

.favorite-music-card:hover .favorite-music-image img {
    transform: scale(1.06);
}

.favorite-music-info {
    padding: 20px 8px 10px;
}

.favorite-music-info span {
    color: var(--gold);
    font-size: 10px;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.favorite-music-info h3 {
    color: var(--ivory);
    font-family: Georgia, serif;
    font-size: 21px;
    font-weight: 400;
    margin: 10px 0;
}

.favorite-music-info p {
    color: var(--muted);
    font-size: 13px;
    line-height: 1.7;
    margin: 0;
}

/* STATS */

.hobby-stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    margin: 0 auto 70px;
}

.hobby-stat-card {
    text-align: center;
    padding: 30px 15px;
    border: 1px solid rgba(201,164,92,.2);
    background: rgba(255,255,255,.025);
    transition: .3s ease;
}

.hobby-stat-card:hover {
    border-color: var(--gold);
    transform: translateY(-5px);
}

.hobby-stat-icon {
    color: var(--gold);
    margin-bottom: 15px;
}

.hobby-stat-icon svg {
    width: 27px;
    height: 27px;
}

.hobby-stat-card h3 {
    color: var(--ivory);
    font-family: Georgia, serif;
    font-size: 18px;
    font-weight: 400;
    margin: 0 0 8px;
}

.hobby-stat-card p {
    color: var(--muted);
    font-size: 12px;
    letter-spacing: 1px;
    margin: 0;
}

/* REVEAL ANIMATION */

.reveal {
    opacity: 0;
    transform: translateY(25px);
    transition: opacity .8s ease, transform .8s ease;
}

.reveal.visible {
    opacity: 1;
    transform: translateY(0);
}

/* MUSIC PROGRESS */

.music-progress {
    position: fixed;
    top: 0;
    left: 0;
    width: 0;
    height: 3px;
    background: var(--gold);
    z-index: 9999;
}

/* CURSOR GLOW */

.music-cursor-glow {
    position: fixed;
    width: 250px;
    height: 250px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(201,164,92,.07), transparent 70%);
    pointer-events: none;
    transform: translate(-50%, -50%);
    z-index: 1;
}

/* RESPONSIVE */

@media (max-width: 768px) {
    .hobby-music {
        padding: 30px 6% 60px;
    }

    .favorite-music-grid {
        grid-template-columns: 1fr;
        max-width: 420px;
        margin: auto;
    }

    .favorite-music-image {
        aspect-ratio: 4 / 3;
    }

    .hobby-quote {
        padding: 25px 10px;
        margin-bottom: 60px;
    }

    .hobby-content h2 {
        font-size: 29px;
    }

    .hobby-stats {
        grid-template-columns: 1fr;
    }

    .music-cursor-glow {
        display: none;
    }
}
</style>

<div class="music-progress" id="musicProgress"></div>
<div class="music-cursor-glow" id="musicCursorGlow"></div>

<main class="hobby-music">

    <!-- FLOATING MUSIC DECORATIONS -->
    <span class="floating-music">♪</span>
    <span class="floating-music">♫</span>
    <span class="floating-music">🎧</span>
    <span class="floating-music">♬</span>

    <div class="hobby-container">

        <!-- BACK TO JAY -->
        <div class="hobby-top-back reveal">
            <a href="<?php echo esc_url(home_url('/friends/jay/')); ?>">
                <span>←</span> Back to Jay
            </a>
        </div>

        <!-- HERO SECTION -->
        <section class="hobby-hero reveal">

            <div class="hobby-icon">
                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="1.5"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 18V5l12-2v13"/>
                    <circle cx="6" cy="18" r="3"/>
                    <circle cx="18" cy="16" r="3"/>
                </svg>
            </div>

            <div class="hobby-label">My Personal Interest</div>

            <h1>
                Listening to Music
                <em>& Melodies.</em>
            </h1>

            <p class="hobby-subtitle">
                Finding comfort through melodies, enjoying different rhythms,
                and expressing emotions through the power of music.
            </p>

        </section>

        <!-- QUOTE SECTION -->
        <section class="hobby-quote reveal">

            <div class="hobby-quote-mark">“</div>

            <p>
                Music speaks what words cannot express. Every melody
                brings emotions, memories, and moments that make life meaningful.
            </p>

        </section>

        <!-- ABOUT MY HOBBY -->
        <section class="hobby-content reveal">

            <div class="hobby-section-label">Why I Enjoy It</div>

            <h2>More Than Just Listening to Music.</h2>

            <p>
                Listening to music is one of my favorite things to do
                during my free time. It helps me relax, clear my mind,
                and enjoy the moment, especially after a long and busy day.
            </p>

            <p>
                I enjoy listening to different genres of music,
                especially pop, OPM, R&B, and acoustic songs.
                Each song has its own rhythm and message that makes
                listening more enjoyable.
            </p>

            <p>
                For me, music is more than just entertainment.
                It helps me express my emotions, improve my mood,
                and find inspiration in everyday life.
            </p>

        </section>

        <!-- FAVORITE MUSIC GENRES -->
        <section class="music-photo-section reveal">

            <div class="favorite-music-heading">
                <span>My Favorite Songs</span>
                <h2>Some songs that I enjoy listening to.</h2>
            </div>

            <div class="favorite-music-grid">

                <!-- MUSIC 1: POP -->
                <div class="favorite-music-card">

                    <div class="favorite-music-image">
                        <img
                            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/anak.jpg'); ?>"
                            alt="Pop Music"
                            loading="lazy"
                        >
                    </div>

                    <div class="favorite-music-info">
                        <span>01 / FAVORITE SONG</span>
                        <h3>Anak</h3>
                        <p>
                           A meaningful song that reminds me of family,
                            love, and the importance of appreciating the
                            people who are always there for us.
                        </p>
                    </div>

                </div>

                <!-- MUSIC 2: OPM -->
                <div class="favorite-music-card">

                    <div class="favorite-music-image">
                        <img
                            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/mahalmagmahal.jpg'); ?>"
                            alt="OPM Music"
                            loading="lazy"
                        >
                    </div>

                    <div class="favorite-music-info">
                        <span>02 / FAVORITE SONG</span>
                        <h3>Mahal Magmahal</h3>
                        <p>
                            A song about love and emotions that reminds me
                            how beautiful it is to love and give your heart
                            to someone special.
                        </p>
                    </div>

                </div>

                <!-- MUSIC 3: R&B -->
                <div class="favorite-music-card">

                    <div class="favorite-music-image">
                        <img
                            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/maghintaykalamang.jpg'); ?>"
                            alt="R&B Music"
                            loading="lazy"
                        >
                    </div>

                    <div class="favorite-music-info">
                        <span>03 / FAVORITE SONG</span>
                        <h3>Maghintay Ka Lamang</h3>
                        <p>
                            A meaningful song that reminds me to stay
                            patient, keep hoping, and believe that better
                            days will eventually come.
                        </p>
                    </div>

                </div>

            </div>

        </section>

        <!-- HOBBY STATISTICS -->
        <section class="hobby-stats reveal">

            <div class="hobby-stat-card">

                <div class="hobby-stat-icon">
                    <svg viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.5"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 18V5l12-2v13"/>
                        <circle cx="6" cy="18" r="3"/>
                        <circle cx="18" cy="16" r="3"/>
                    </svg>
                </div>

                <h3>Pop & OPM</h3>
                <p>Favorite Genres</p>

            </div>

            <div class="hobby-stat-card">

                <div class="hobby-stat-icon">
                    <svg viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.5"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 10v4h4l5 4V6l-5 4H3z"/>
                        <path d="M16 9a5 5 0 0 1 0 6"/>
                        <path d="M19 5a10 10 0 0 1 0 14"/>
                    </svg>
                </div>

                <h3>Music Lover</h3>
                <p>My Interest</p>

            </div>

            <div class="hobby-stat-card">

                <div class="hobby-stat-icon">
                    <svg viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.5"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 3v18"/>
                        <path d="M8 7h8"/>
                        <path d="M8 17h8"/>
                        <path d="M5 12h14"/>
                    </svg>
                </div>

                <h3>Relax & Enjoy</h3>
                <p>What I Love</p>

            </div>

        </section>

    </div>

</main>

<script>
document.addEventListener("DOMContentLoaded", function () {

    // REVEAL ANIMATION
    const revealElements = document.querySelectorAll(".reveal");

    const revealObserver = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
                revealObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.15
    });

    revealElements.forEach(function(element) {
        revealObserver.observe(element);
    });

    // MUSIC READING PROGRESS
    const progress = document.getElementById("musicProgress");

    window.addEventListener("scroll", function() {
        const scrollTop = window.scrollY;
        const pageHeight = document.documentElement.scrollHeight - window.innerHeight;

        const percentage = pageHeight > 0
            ? (scrollTop / pageHeight) * 100
            : 0;

        progress.style.width = percentage + "%";
    });

    // CURSOR GLOW
    const glow = document.getElementById("musicCursorGlow");

    document.addEventListener("mousemove", function(event) {
        glow.style.left = event.clientX + "px";
        glow.style.top = event.clientY + "px";
    });

});
</script>

<?php get_footer(); ?>
