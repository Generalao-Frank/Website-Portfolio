
<?php
/**
 * Template Name: Hobby - Watching Movies - jay
 * Template Post Type: page
 */

get_header();
?>

<style>
.hobby-chess {
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

.hobby-chess * {
    box-sizing: border-box;
}

.hobby-chess::before {
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

/* BACK TO FRANK - TOP */

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

.floating-chess {
    position: absolute;
    color: var(--gold);
    opacity: .12;
    font-size: 30px;
    animation: floatMovie 6s ease-in-out infinite;
    pointer-events: none;
}

.floating-chess:nth-child(1) {
    top: 10%;
    left: 5%;
}

.floating-chess:nth-child(2) {
    top: 35%;
    right: 7%;
    animation-delay: 1s;
}

.floating-chess:nth-child(3) {
    bottom: 15%;
    left: 9%;
    animation-delay: 2s;
}

.floating-chess:nth-child(4) {
    bottom: 30%;
    right: 12%;
    animation-delay: 3s;
}

@keyframes floatMovie {
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

/* FAVORITE MOVIES */

.action-photo-section {
    margin: 0 auto 90px;
    text-align: center;
}

.favorite-movie-heading {
    margin-bottom: 35px;
}

.favorite-movie-heading span {
    color: var(--gold);
    text-transform: uppercase;
    letter-spacing: 4px;
    font-size: 11px;
}

.favorite-movie-heading h2 {
    color: var(--ivory);
    font-family: Georgia, serif;
    font-size: clamp(30px, 5vw, 42px);
    font-weight: 400;
    margin: 15px 0 0;
}

.favorite-movies-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
}

.favorite-movie-card {
    text-align: left;
    border: 1px solid rgba(201,164,92,.25);
    background: rgba(255,255,255,.025);
    padding: 12px;
    transition: .35s ease;
}

.favorite-movie-card:hover {
    border-color: var(--gold);
    transform: translateY(-7px);
}

.favorite-movie-image {
    width: 100%;
    aspect-ratio: 3 / 4;
    overflow: hidden;
    background: #151515;
}

.favorite-movie-image img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .5s ease;
}

.favorite-movie-card:hover .favorite-movie-image img {
    transform: scale(1.06);
}

.favorite-movie-info {
    padding: 20px 8px 10px;
}

.favorite-movie-info span {
    color: var(--gold);
    font-size: 10px;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.favorite-movie-info h3 {
    color: var(--ivory);
    font-family: Georgia, serif;
    font-size: 21px;
    font-weight: 400;
    margin: 10px 0;
}

.favorite-movie-info p {
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

/* READING PROGRESS */

.movie-progress {
    position: fixed;
    top: 0;
    left: 0;
    width: 0;
    height: 3px;
    background: var(--gold);
    z-index: 9999;
}

/* CURSOR GLOW */

.movie-cursor-glow {
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
    .hobby-chess {
        padding: 30px 6% 60px;
    }

    .favorite-movies-grid {
        grid-template-columns: 1fr;
        max-width: 420px;
        margin: auto;
    }

    .favorite-movie-image {
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

    .movie-cursor-glow {
        display: none;
    }
}
</style>

<div class="movie-progress" id="movieProgress"></div>
<div class="movie-cursor-glow" id="movieCursorGlow"></div>

<main class="hobby-chess">

    <!-- FLOATING DECORATIONS -->
    <span class="floating-chess">▶</span>
    <span class="floating-chess">✦</span>
    <span class="floating-chess">🎬</span>
    <span class="floating-chess">★</span>

    <div class="hobby-container">

        <!-- BACK TO FRANK - TOP -->
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
                    <rect x="3" y="6" width="18" height="13" rx="2"/>
                    <path d="M10 10l5 2.5-5 2.5z" fill="currentColor" stroke="none"/>
                    <path d="M7 3l3 3M14 3l3 3"/>
                </svg>
            </div>

            <div class="hobby-label">My Personal Interest</div>

            <h1>
                Watching Movies
                <em>& Stories.</em>
            </h1>

            <p class="hobby-subtitle">
                Exploring different worlds, discovering inspiring stories,
                and enjoying every moment through movies.
            </p>

        </section>

        <!-- QUOTE SECTION -->
        <section class="hobby-quote reveal">

            <div class="hobby-quote-mark">“</div>

            <p>
                Every movie opens a window to a different world, filled
                with stories, emotions, and experiences that inspire my imagination.
            </p>

        </section>

        <!-- ABOUT MY HOBBY -->
        <section class="hobby-content reveal">

            <div class="hobby-section-label">Why I Enjoy It</div>

            <h2>More Than Just Watching Movies.</h2>

            <p>
                Watching movies is one of the things I enjoy during my free time.
                It allows me to relax, enjoy different stories, and explore
                different worlds through the screen.
            </p>

            <p>
                I enjoy different movie genres, especially action, adventure,
                comedy, and drama. Each movie gives me a different experience
                and sometimes teaches valuable lessons about life.
            </p>

            <p>
                For me, movies are not only a source of entertainment.
                They also inspire my imagination, help me appreciate storytelling,
                and give me a chance to escape from everyday stress.
            </p>

        </section>

        <!-- MY FAVORITE MOVIES -->
        <section class="action-photo-section reveal">

            <div class="favorite-movie-heading">
                <span>A Collection of Stories</span>
                <h2>My Favorite Movies</h2>
            </div>

            <div class="favorite-movies-grid">

                <!-- MOVIE 1: RUSH HOUR -->
                <div class="favorite-movie-card">

                    <div class="favorite-movie-image">
                        <img
                            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/rushhour.jpg'); ?>"
                            alt="Rush Hour Movie Poster"
                            loading="lazy"
                        >
                    </div>

                    <div class="favorite-movie-info">
                        <span>Action & Comedy</span>
                        <h3>Rush Hour</h3>
                        <p>
                            An entertaining movie filled with action,
                            hilarious teamwork, and exciting adventures.
                        </p>
                    </div>

                </div>

                <!-- MOVIE 2: JOHN WICK -->
                <div class="favorite-movie-card">

                    <div class="favorite-movie-image">
                        <img
                            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/johnwick.jpg'); ?>"
                            alt="John Wick Movie Poster"
                            loading="lazy"
                        >
                    </div>

                    <div class="favorite-movie-info">
                        <span>Action Movie</span>
                        <h3>John Wick</h3>
                        <p>
                            A thrilling action movie filled with intense
                            fights, exciting scenes, and an unforgettable story.
                        </p>
                    </div>

                </div>

                <!-- MOVIE 3: MR. BEAN'S HOLIDAY -->
                <div class="favorite-movie-card">

                    <div class="favorite-movie-image">
                        <img
                            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/mrbeansholiday.jpg'); ?>"
                            alt="Mr. Bean's Holiday Movie Poster"
                            loading="lazy"
                        >
                    </div>

                    <div class="favorite-movie-info">
                        <span>Comedy Movie</span>
                        <h3>Mr. Bean's Holiday</h3>
                        <p>
                            A funny adventure full of hilarious situations,
                            unexpected moments, and entertaining comedy.
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
                         stroke="currentColor" stroke-width="1.5">
                        <path d="M12 3l2.5 5.5L20 11l-5.5 2.5L12 19l-2.5-5.5L4 11l5.5-2.5L12 3z"/>
                    </svg>
                </div>

                <h3>Action & Adventure</h3>
                <p>Favorite Genres</p>

            </div>

            <div class="hobby-stat-card">

                <div class="hobby-stat-icon">
                    <svg viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.5">
                        <circle cx="12" cy="12" r="9"/>
                        <path d="M10 8l6 4-6 4V8z"/>
                    </svg>
                </div>

                <h3>Movie Enthusiast</h3>
                <p>My Interest</p>

            </div>

            <div class="hobby-stat-card">

                <div class="hobby-stat-icon">
                    <svg viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.5">
                        <path d="M4 5h16v14H4z"/>
                        <path d="M8 9h8M8 13h8M8 17h5"/>
                    </svg>
                </div>

                <h3>Story Explorer</h3>
                <p>What I Enjoy</p>

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

    // READING PROGRESS
    const progress = document.getElementById("movieProgress");

    window.addEventListener("scroll", function() {
        const scrollTop = window.scrollY;
        const pageHeight = document.documentElement.scrollHeight - window.innerHeight;

        const percentage = pageHeight > 0
            ? (scrollTop / pageHeight) * 100
            : 0;

        progress.style.width = percentage + "%";
    });

    // CURSOR GLOW
    const glow = document.getElementById("movieCursorGlow");

    document.addEventListener("mousemove", function(event) {
        glow.style.left = event.clientX + "px";
        glow.style.top = event.clientY + "px";
    });

});
</script>

<?php get_footer(); ?>
