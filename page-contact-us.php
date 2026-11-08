<?php
/**
 * Template Name: Contact Us
 * Template Post Type: page
 */
get_header(); ?>

<style>
/* ===== CONTACT PAGE — Professional Edition ===== */
.contact-page {
  --ivory:#F7F4EC; --paper:#FBFAF5; --ink:#1A1814; --ink-3:#4A443A;
  --gold:#A8874E; --gold-2:#C4A566; --line:#DED7C7; --muted:#7A7266;
  --serif:'Fraunces',Georgia,serif; --sans:'Inter',system-ui,sans-serif;
  background: var(--ivory); color: var(--ink); font-family: var(--sans);
  -webkit-font-smoothing: antialiased;
}

.read-progress {
  position: fixed; top: 0; left: 0; height: 3px; width: 0%;
  background: linear-gradient(90deg, var(--gold), var(--gold-2));
  z-index: 9999; transition: width 0.1s ease-out;
  box-shadow: 0 0 10px rgba(168,135,78,0.6);
}
.cursor-glow {
  position: fixed; width: 400px; height: 400px; border-radius: 50%;
  background: radial-gradient(circle, rgba(168,135,78,0.08), transparent 70%);
  pointer-events: none; z-index: 1; transform: translate(-50%, -50%);
}
@media (max-width: 768px) { .cursor-glow { display: none; } }

.contact-page .container {
  max-width: 1280px; margin: 0 auto; padding: 0 clamp(24px, 6vw, 96px);
  position: relative; z-index: 2;
}

.contact-hero {
  padding: clamp(160px, 18vw, 220px) 0 clamp(40px, 6vw, 80px);
  position: relative; overflow: hidden;
}
.contact-hero::before {
  content:""; position:absolute; top:-20%; left:-10%; width:60vw; height:60vw;
  max-width:700px; max-height:700px; border-radius:50%;
  background:radial-gradient(circle, rgba(196,165,102,.12), transparent 65%);
  pointer-events:none;
}
.contact-hero .kicker {
  font-size:.72rem; font-weight:500; letter-spacing:.24em; text-transform:uppercase;
  color:var(--gold); margin:0 0 24px; display:flex; align-items:center; gap:16px;
}
.contact-hero .kicker::before { content:""; width:40px; height:1px; background:var(--gold); }
.contact-hero h1 {
  font-family: var(--serif); font-weight: 300; font-size: clamp(3rem, 8vw, 6.5rem);
  line-height: 1; letter-spacing: -0.03em; margin: 0; max-width: 16ch;
}
.contact-hero h1 em { color: var(--gold); font-style: italic; }

.contact-section { padding: 0 0 clamp(100px, 12vw, 160px); }
.contact-grid {
  display: grid; grid-template-columns: 1fr 1.1fr; gap: clamp(48px, 8vw, 120px);
  align-items: start; border-top: 1px solid var(--line); padding-top: clamp(48px, 6vw, 80px);
}

.contact-info .intro {
  font-size: 1.1rem; font-weight: 300; line-height: 1.8; color: var(--ink-3);
  margin: 0 0 56px; max-width: 40ch;
}
.contact-block { margin-bottom: 40px; }
.contact-block h3 {
  font-size: 0.72rem; font-weight: 500; letter-spacing: 0.18em; text-transform: uppercase;
  color: var(--gold); margin: 0 0 12px;
}
.contact-block p, .contact-block a {
  font-family: var(--serif); font-size: 1.5rem; font-weight: 400; color: var(--ink);
  margin: 0; text-decoration: none; line-height: 1.4; transition: color 0.3s;
}
.contact-block a:hover { color: var(--gold); font-style: italic; }

.social-links { display: flex; gap: 24px; margin-top: 48px; flex-wrap: wrap; }
.social-links a {
  font-size: 0.8rem; font-weight: 500; letter-spacing: 0.1em; text-transform: uppercase;
  color: var(--ink); text-decoration: none; padding-bottom: 4px;
  border-bottom: 1px solid var(--line); transition: all 0.3s;
  display: inline-flex; align-items: center; gap: 8px;
}
.social-links a:hover { border-color: var(--gold); color: var(--gold); }
.social-links svg { width: 16px; height: 16px; fill: currentColor; }

.contact-form {
  background: var(--paper); padding: clamp(32px, 5vw, 56px);
  border: 1px solid var(--line); border-radius: 2px;
  box-shadow: 0 20px 40px -20px rgba(26,24,20,.05);
}

/* Success & Error Messages */
.success-msg, .error-msg {
  padding: 16px 20px; border-radius: 4px; margin-bottom: 24px;
  font-size: 0.9rem; display: flex; align-items: center; gap: 12px;
  animation: slideIn 0.5s ease;
}
.success-msg { background: #E6F4EA; border: 1px solid #B7E1CD; color: #1E8E3E; }
.error-msg { background: #FCE8E6; border: 1px solid #F5B7B1; color: #C5221F; }
.success-msg svg, .error-msg svg { width: 20px; height: 20px; fill: currentColor; flex-shrink: 0; }
@keyframes slideIn { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: translateY(0); } }

.form-group { position: relative; margin-bottom: 36px; }
.form-group label {
  display: block; font-size: 0.72rem; font-weight: 500; letter-spacing: 0.14em;
  text-transform: uppercase; color: var(--muted); margin-bottom: 10px;
}
.form-group input, .form-group textarea, .form-group select {
  width: 100%; padding: 12px 0; border: none; border-bottom: 1px solid var(--line);
  background: transparent; font-family: var(--sans); font-size: 1rem; color: var(--ink);
  transition: border-color 0.4s; resize: vertical;
}
.form-group input:focus, .form-group textarea:focus, .form-group select:focus {
  outline: none; border-color: var(--gold);
}
.form-group input::placeholder, .form-group textarea::placeholder { color: #C4BDAD; }
.form-group textarea { min-height: 100px; }

.btn-submit {
  display: inline-flex; align-items: center; gap: 14px;
  background: var(--ink); color: var(--ivory); border: none;
  padding: 18px 36px; font-family: var(--sans); font-weight: 500;
  font-size: 0.8rem; letter-spacing: 0.14em; text-transform: uppercase;
  cursor: pointer; transition: all 0.4s; border-radius: 2px;
  width: 100%; justify-content: center;
}
.btn-submit:hover {
  background: var(--gold); color: var(--ink); transform: translateY(-2px);
  box-shadow: 0 10px 30px -10px rgba(168, 135, 78, 0.4);
}

.reveal { opacity: 0; transform: translateY(40px); transition: opacity 1s cubic-bezier(0.16, 1, 0.3, 1), transform 1s cubic-bezier(0.16, 1, 0.3, 1); }
.reveal.in { opacity: 1; transform: translateY(0); }

@media (max-width: 900px) {
  .contact-grid { grid-template-columns: 1fr; gap: 64px; }
}
</style>

<div class="read-progress" id="readProgress"></div>
<div class="cursor-glow" id="cursorGlow"></div>

<main class="contact-page">
  <section class="contact-hero">
    <div class="container">
      <p class="kicker reveal">Get in Touch</p>
      <h1 class="reveal">Let's build something <em>great</em> together.</h1>
    </div>
  </section>

  <section class="contact-section">
    <div class="container">
      <div class="contact-grid">
        
        <div class="contact-info reveal">
          <p class="intro">
            Whether you have a question about our capstone project, want to collaborate, 
            or just want to say hello — our inbox is always open.
          </p>

          <div class="contact-block">
            <h3>Email Us</h3>
            <!-- PALITAN ITO NG TOTOONG GMAIL MO -->
            <a href="mailto:yourgmail@gmail.com">yourgmail@gmail.com</a>
          </div>

          <div class="contact-block">
            <h3>Location</h3>
            <p>El Salvador City, Misamis Oriental<br>Philippines</p>
          </div>

          <div class="social-links">
            <a href="https://www.facebook.com/frankjames.generalao" target="_blank">
              <svg viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
              Facebook
            </a>
            <a href="https://t.me/yourusername" target="_blank">
              <svg viewBox="0 0 24 24"><path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/></svg>
              Telegram
            </a>
            <a href="https://instagram.com/yourusername" target="_blank">
              <svg viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/></svg>
              Instagram
            </a>
          </div>
        </div>

        <div class="contact-form reveal">
          
          <?php if ( isset($_GET['success']) && $_GET['success'] == 1 ) : ?>
            <div class="success-msg">
              <svg viewBox="0 0 24 24"><path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M11,16.5L18,9.5L16.59,8.09L11,13.67L7.91,10.59L6.5,12L11,16.5Z"/></svg>
              Message sent! We'll get back to you soon.
            </div>
          <?php endif; ?>

          <?php if ( isset($_GET['error']) && $_GET['error'] == 1 ) : ?>
            <div class="error-msg">
              <svg viewBox="0 0 24 24"><path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4M11,16.5L6.5,12L7.91,10.59L11,13.67L16.59,8.09L18,9.5L11,16.5Z"/></svg>
              Oops! Something went wrong. Please try again or email us directly.
            </div>
          <?php endif; ?>

          <form action="" method="POST">
            
            <div class="form-group">
              <label for="name">Your Name</label>
              <input type="text" id="name" name="name" placeholder="Jane Doe" required>
            </div>

            <div class="form-group">
              <label for="email">Email Address</label>
              <input type="email" id="email" name="email" placeholder="jane@example.com" required>
            </div>

            <div class="form-group">
              <label for="subject">Subject</label>
              <select id="subject" name="subject">
                <option value="general">General Inquiry</option>
                <option value="collaboration">Collaboration</option>
                <option value="feedback">Project Feedback</option>
              </select>
            </div>

            <div class="form-group">
              <label for="message">Message</label>
              <textarea id="message" name="message" placeholder="Tell us about your project..." required></textarea>
            </div>

            <input type="hidden" name="custom_contact_submit" value="1">

            <button type="submit" class="btn-submit">
              Send Message
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </button>

          </form>
        </div>

      </div>
    </div>
  </section>
</main>

<script>
document.addEventListener("DOMContentLoaded", function() {
  const reveals = document.querySelectorAll('.reveal');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, i) => {
      if (entry.isIntersecting) {
        setTimeout(() => {
          entry.target.classList.add('in');
        }, i * 100);
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });
  reveals.forEach(reveal => observer.observe(reveal));

  const progressBar = document.getElementById('readProgress');
  window.addEventListener('scroll', () => {
    const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
    const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    progressBar.style.width = (scrollTop / scrollHeight * 100) + '%';
  });

  const cursorGlow = document.getElementById('cursorGlow');
  if (window.innerWidth > 768) {
    document.addEventListener('mousemove', (e) => {
      cursorGlow.style.left = e.clientX + 'px';
      cursorGlow.style.top = e.clientY + 'px';
    });
  }
});
</script>

<?php get_footer(); ?>