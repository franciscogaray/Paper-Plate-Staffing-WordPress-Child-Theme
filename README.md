# Paper Plate Staffing — WordPress Child Theme

A custom WordPress child theme built on top of the **Bootstrap Component Blox** parent theme (v2.7.1) for [Paper Plate Staffing](https://paperplatestaffing.com/), a New Jersey company providing tailored event staffing — event management, bar staff, security, and culinary professionals.

The theme turns the homepage into a **content-editor-driven page builder**: every section is an ACF Flexible Content layout mapped to a PHP partial, and the entire visual identity (colors, fonts, button shapes, container radius/shadow) is driven from a single ACF options page and injected as CSS custom properties at runtime.

> Built while working as a WordPress Developer at [Colossus Media Group](https://cmg-agency.com/).

---

## Table of contents

- [Requirements](#requirements)
- [Installation](#installation)
- [How it works](#how-it-works)
- [File structure](#file-structure)
- [Component reference](#component-reference)
- [Adding a new component](#adding-a-new-component)
- [Theme settings](#theme-settings)
- [Bundled libraries](#bundled-libraries)
- [Before you deploy](#before-you-deploy)
- [Notes and roadmap](#notes-and-roadmap)
- [Credits and license](#credits-and-license)

---

## Requirements

| Requirement | Version / notes |
|---|---|
| WordPress | 6.0+ |
| PHP | 7.4+ (tested on 8.x) |
| **Bootstrap Component Blox** (parent theme) | **2.7.1** — *required*, see note below |
| Advanced Custom Fields **PRO** | Required — Flexible Content, Options Pages, Repeaters, Group and Gallery fields |
| WPForms | Required for the contact / booking forms |

### ⚠️ The parent theme is required and is **not** included in this repository

This is a child theme. It will not activate — and will fatal on the front end — without its parent installed alongside it.

`style.css` declares the dependency:

```css
Theme Name: Paper Plate Staffing
Template:   bootstrap-component-blox
Version:    1.0
```

Install **Bootstrap Component Blox 2.7.1** first ([theme.componentblox.com](https://theme.componentblox.com/)). The parent ships Bootstrap 5 and Font Awesome, and provides the hooks and helpers this child theme relies on:

- `bcb_before_footer()` — action used to inject the location modal
- `bcb_main_nav()` — renders the registered `main-menu` location
- `bcb_image_url( $id, $size )` / `bcb_image_alt( $id )` — attachment helpers
- Customizer theme mods: `navbar_type`, `navbar_classes`, `navbar_inner_classes`, `footer_classes`, `footer_credit`

---

## Installation

1. Install and activate **Bootstrap Component Blox 2.7.1** (parent).
2. Copy this repository into `wp-content/themes/paper-plate-staffing/`:

   ```bash
   cd wp-content/themes
   git clone https://github.com/<your-user>/paper-plate-staffing.git
   ```

   > The folder name matters — `header-scripts.php` references the font files by the absolute path `/wp-content/themes/paper-plate-staffing/fonts/`.

3. Activate **Paper Plate Staffing** under *Appearance → Themes*.
4. Accept the TGMPA plugin prompt (*Appearance → Install Plugins*) to pull in ACF Pro, WPForms and the recommended support plugins.
5. Field groups sync automatically from `acf-json/`. If they don't appear, go to *Custom Fields → Sync available* and sync all four groups.
6. On first load the theme self-provisions:
   - a page titled **Home** using the `home.php` template;
   - a **Main Menu** with anchor links (`/#cmg-header`, `/#cmg-about`, `/#cmg-services`, `/#cmg-gallery`, `/#cmg-faq`, `/#cmg-reviews`, `/#cmg-contact`) assigned to the `main-menu` location.
7. Set the Home page as the static front page and fill in *Theme Settings*.

---

## How it works

### 1. Component-driven homepage

`home.php` loads a single partial, `component-main.php`, which loops the ACF Flexible Content field `components` and dispatches each row to its own partial:

```
home.php
└── template-parts/components/component-main.php   ← the dispatcher
    ├── component-content-styles.php   ← per-section background / heading / body styling
    ├── component-section-content.php  ← per-section title / subtitle / button
    └── component-<layout>.php         ← the actual section markup
```

Editors reorder, duplicate and remove sections from the WordPress admin; no developer involvement is needed for layout changes.

### 2. Design tokens as CSS custom properties

`header-scripts.php` reads the ACF options page and prints a `:root` block, so the whole palette and typography are editable from the admin without touching CSS:

```css
:root {
  --cmg-primary:     /* ACF: cmg_styles_colors_primary */;
  --cmg-secondary:   /* ACF: cmg_styles_colors_secondary */;
  --cmg-dark:        /* ACF: cmg_styles_colors_dark */;
  --cmg-font-header: /* ACF: cmg_styles_fonts_header */;
  --cmg-font-body:   /* ACF: cmg_styles_fonts_body */;
}
```

`style.css` then consumes those tokens through utility classes (`.cmg-text-primary`, `.cmg-bg-dark`, `.cmg-btn-primary`, …). Button radius, padding, weight, size and case are printed from the same options page, and the values are also fed back into the ACF color picker palette (`acf/input/admin_footer`) so editors only ever see brand-approved swatches.

### 3. Reviews as a custom post type

A `review` CPT (`dashicons-testimonial`, title + editor, REST enabled) backs the testimonial slider. `component-reviews.php` queries it and renders each entry as a Swiper slide with autoplay and clickable pagination.

### 4. Forms

- `WPForms_Template_cmg_contact` registers a reusable **CMG Contact** form template (name / email / phone / message, AJAX submit, anti-spam, time limit) so every site build starts from the same form.
- `templates/forms.php` is a standalone page template — black title bar plus a centered, brand-bordered form card — used for the booking/quote landing pages.

### 5. Dependency bootstrapping

`inc/class-tgm-plugin-activation.php` (TGM Plugin Activation) prompts for ACF Pro, WPForms, Classic Editor, Classic Widgets, Page Scroll to ID, Disable Comments, File Manager, Yoast SEO, HTML Editor Syntax Highlighter and WP Mail SMTP — turning a fresh install into a working site in one step.

---

## File structure

```
paper-plate-staffing/
├── style.css                     # Child theme header + global styles and utilities
├── functions.php                 # Enqueues, TGMPA, options page, CPT, WPForms template,
│                                 # menu/homepage bootstrap, read-more script
├── header-scripts.php            # Runtime :root CSS variables + navbar/button styling
├── footer-scripts.php            # Fancybox gallery init
├── footer.php                    # Footer override (widgets + credit line)
├── footer-widgets.php            # Intentionally empty — overrides the parent partial
├── home.php                      # Page template: "Home"
├── screenshot.png
│
├── templates/
│   └── forms.php                 # Page template: "Forms"
│
├── template-parts/
│   ├── common/
│   │   └── common-header.php     # Black page-title banner
│   ├── components/
│   │   ├── component-main.php    # Flexible Content dispatcher
│   │   ├── component-content-styles.php
│   │   ├── component-section-content.php
│   │   ├── component-section-heading.php
│   │   ├── component-section-button.php
│   │   ├── component-header.php  # Hero slide (inside the Swiper)
│   │   ├── component-about.php
│   │   ├── component-services.php
│   │   ├── component-gallery.php
│   │   ├── component-faq.php
│   │   ├── component-reviews.php
│   │   ├── component-contact.php
│   │   ├── component-video-bg.php
│   │   ├── component-logo-carousel.php
│   │   └── component-logo-carousel-old.php
│   ├── modals/
│   │   └── modal-location.php    # Google Maps embed modal (bcb_before_footer)
│   ├── navbar/
│   │   ├── navbar-nav.php        # Top bar (email/phone/location/social) + main navbar
│   │   ├── navbar-logo.php       # Inline SVG logo fallback
│   │   └── navbar-toggler.php
│   └── pages/
│       └── page-forms.php
│
├── acf-json/                     # Version-controlled ACF field groups (auto-sync)
├── css/                          # swiper.css, fancybox.css, owl.carousel.css
├── js/                           # swiper.js, fancybox.js, owl.carousel.js
├── fonts/                        # Kostic Roc Grotesk (woff / woff2)
└── inc/
    └── class-tgm-plugin-activation.php
```

---

## Component reference

| ACF layout | Partial | What it renders |
|---|---|---|
| `slider` | `component-header.php` | Full-bleed hero slider (Swiper) — background image, title, description, up to two CTAs, optional overlay |
| `about` | `component-about.php` | Two-column intro with image position toggle and image gallery |
| `services` | `component-services.php` | Configurable card grid (columns set per section) with a mobile read-more/read-less clamp |
| `gallery` | `component-gallery.php` | Responsive image grid with Fancybox 5 lightbox and modern thumbnails |
| `faqs` | `component-faq.php` | Bootstrap accordion with per-state (open/closed) background and text colors |
| `reviews` | `component-reviews.php` | Testimonial slider fed by the `review` CPT |
| `contact` | `component-contact.php` | Contact block — icon list plus a styled WPForms embed |
| `custom_template` | `component-{template_name}.php` | Escape hatch: loads any one-off partial by name |

Two one-off partials ship with the site and are loaded through `custom_template`:

- **`video-bg`** — muted, looping, `playsinline` video hero with a dark overlay and the primary CTA.
- **`logo-carousel`** — Owl Carousel client logo strip (2 / 3 / 5 items across breakpoints).

---

## Adding a new component

The `custom_template` layout keeps one-off sections out of the dispatcher's `if` chain. To add one:

1. Create `template-parts/components/component-my-section.php`.
2. On the homepage, add a **Custom Template** row and set *Template Name* to `my-section`.
3. `component-main.php` resolves it as `component-{template_name}.php` and includes it, with `$content_styles` and `$section_content` already in scope.

For a fully editable section instead, add a layout to the `components` Flexible Content group in ACF, then add a matching `get_row_layout()` branch in `component-main.php`. Committing `acf-json/` means the new field group travels with the code.

---

## Theme settings

*Theme Settings* (options page, slug `theme-general-settings`) has three tabs:

| Tab | Group | Controls |
|---|---|---|
| **Styles** | `cmg_styles` | Primary / secondary / dark colors, header and body fonts, custom font `<script>` embeds, button case / radius / weight / size / padding / text colors / font family, container radius and shadow |
| **Navbar** | `cmg_navbar` | Top-bar background, text and icon colors; main navbar background, text color, case, size and weight; desktop and mobile logo sizes |
| **Contact Info** | `cmg_contact_info` | Email, phone, hours, social media repeater (icon + link), locations repeater (address, city, state, ZIP, Google link, Google embed) |

Contact info is reused across the top bar, the location modal and the contact component — one source of truth for NAP data.

---

## Bundled libraries

| Library | Version | Used by |
|---|---|---|
| [Swiper](https://swiperjs.com/) | 10.2.0 | Hero slider, reviews slider |
| [Fancybox](https://fancyapps.com/fancybox/) | 5.0 | Gallery lightbox |
| [Owl Carousel](https://owlcarousel2.github.io/OwlCarousel2/) | 2.3.4 | Logo carousel |
| [TGM Plugin Activation](https://tgmpluginactivation.com/) | bundled | Plugin dependency prompts |
| Bootstrap 5 + Font Awesome | via parent theme | Grid, components, icons |

All three front-end libraries are enqueued in the footer-free `wp_enqueue_scripts` hook with `jquery` as a dependency, alongside the parent stylesheet.

---

## Before you deploy

A short checklist for anyone forking this or reusing it as a starter:

- **Rotate and remove any license keys.** `functions.php` contains a "Plugin Licenses" dashboard widget and TGMPA `source` URLs. Replace these with constants loaded from `wp-config.php` or environment variables before the code goes anywhere public.
- **Replace the notification sender address** in the `cmg_contact` WPForms template with the client's own.
- **Check the font license.** `fonts/kostic-roc-grotesk.*` is a commercial webfont — confirm the license permits redistribution before publishing the files, or swap in a self-hosted alternative.
- **Update the hardcoded menu-item ID.** `#menu-item-528` is targeted in `style.css` and `header-scripts.php` to center the logo in the navbar; that ID changes per install. A menu CSS class is the portable fix.
- **Point the video and logo IDs at the new install.** `component-video-bg.php` references an uploads path, and `component-logo-carousel.php` uses hardcoded attachment IDs.

---

## Notes and roadmap

Honest notes on what I'd change if I revisited this build:

- **Escape all ACF output.** Options-page values are echoed directly into `style` attributes and inline `<style>` blocks. `esc_attr()` / `esc_url()` / `wp_kses_post()` throughout would harden it, even though only trusted admins can reach those fields.
- **Move the bootstrap logic off the front end.** The homepage and menu provisioning currently run on `wp_head` and at file scope, meaning they execute on every request. `after_switch_theme` is the correct one-time hook.
- **`get_page_by_title()` is deprecated** as of WordPress 6.2 — replace with a `WP_Query` title lookup.
- **Extract inline JS and CSS.** Swiper, Owl and the read-more script are printed inline per component; enqueueing them as real assets would allow caching, minification and a proper CSP.
- **Hardcoded copy in `component-video-bg.php`** (headline, subhead, CTA) should be ACF fields.
- Consolidate `component-logo-carousel-old.php` once the current version is confirmed stable.

---

## Credits and license

- Child theme development: [**Francisco Garay**](https://franciscogaray.me/) — Colossus Media Group
- Parent theme: [Bootstrap Component Blox](https://theme.componentblox.com/) (GPL)
- Client: [Paper Plate Staffing](https://paperplatestaffing.com/), New Jersey

Released under the **GPL v2 or later**, inheriting the parent theme's license. Bundled third-party libraries retain their own licenses (Swiper — MIT, Fancybox — commercial/GPL depending on use, Owl Carousel — MIT, TGMPA — GPL). Brand assets, logo, fonts and imagery belong to Paper Plate Staffing and are not covered by this license.
