---
name: Industrial Elite
colors:
  surface: '#131313'
  surface-dim: '#131313'
  surface-bright: '#3a3939'
  surface-container-lowest: '#0e0e0e'
  surface-container-low: '#1c1b1b'
  surface-container: '#201f1f'
  surface-container-high: '#2a2a2a'
  surface-container-highest: '#353534'
  on-surface: '#e5e2e1'
  on-surface-variant: '#e6bdb8'
  inverse-surface: '#e5e2e1'
  inverse-on-surface: '#313030'
  outline: '#ad8884'
  outline-variant: '#5d3f3c'
  surface-tint: '#ffb4ab'
  primary: '#ffb4ab'
  on-primary: '#690006'
  primary-container: '#d71920'
  on-primary-container: '#ffece9'
  inverse-primary: '#c00014'
  secondary: '#e9c176'
  on-secondary: '#412d00'
  secondary-container: '#604403'
  on-secondary-container: '#dab36a'
  tertiary: '#c8c6c5'
  on-tertiary: '#313030'
  tertiary-container: '#6e6d6d'
  on-tertiary-container: '#f3f0ef'
  error: '#ffb4ab'
  on-error: '#690005'
  error-container: '#93000a'
  on-error-container: '#ffdad6'
  primary-fixed: '#ffdad6'
  primary-fixed-dim: '#ffb4ab'
  on-primary-fixed: '#410002'
  on-primary-fixed-variant: '#93000d'
  secondary-fixed: '#ffdea5'
  secondary-fixed-dim: '#e9c176'
  on-secondary-fixed: '#261900'
  on-secondary-fixed-variant: '#5d4201'
  tertiary-fixed: '#e5e2e1'
  tertiary-fixed-dim: '#c8c6c5'
  on-tertiary-fixed: '#1c1b1b'
  on-tertiary-fixed-variant: '#474746'
  background: '#131313'
  on-background: '#e5e2e1'
  surface-variant: '#353534'
typography:
  display-lg:
    fontFamily: Bodoni Moda
    fontSize: 72px
    fontWeight: '700'
    lineHeight: 80px
    letterSpacing: -0.02em
  display-lg-mobile:
    fontFamily: Bodoni Moda
    fontSize: 48px
    fontWeight: '700'
    lineHeight: 52px
    letterSpacing: -0.01em
  headline-lg:
    fontFamily: Bodoni Moda
    fontSize: 40px
    fontWeight: '600'
    lineHeight: 48px
    letterSpacing: 0em
  headline-md:
    fontFamily: Bodoni Moda
    fontSize: 32px
    fontWeight: '500'
    lineHeight: 40px
    letterSpacing: 0.02em
  body-lg:
    fontFamily: Hanken Grotesk
    fontSize: 18px
    fontWeight: '400'
    lineHeight: 28px
    letterSpacing: 0.01em
  body-md:
    fontFamily: Hanken Grotesk
    fontSize: 16px
    fontWeight: '400'
    lineHeight: 24px
    letterSpacing: 0.01em
  label-caps:
    fontFamily: Geist
    fontSize: 12px
    fontWeight: '600'
    lineHeight: 16px
    letterSpacing: 0.15em
  mono-data:
    fontFamily: Geist
    fontSize: 14px
    fontWeight: '400'
    lineHeight: 20px
    letterSpacing: 0em
spacing:
  unit: 8px
  container-max: 1440px
  gutter: 32px
  margin-mobile: 20px
  margin-desktop: 64px
---

## Brand & Style
The design system embodies an "Industrial Elite" aesthetic—a fusion of raw structural authority and high-fashion editorial refinement. It is designed for an audience that values precision, heritage, and exclusivity. The UI should evoke the feeling of a bespoke luxury timepiece or a high-performance carbon-fiber vehicle: heavy, intentional, and expensive.

The style leverages **Minimalism** with a **Tactile** edge. We avoid generic "app" patterns in favor of wide tracking, high-contrast typography, and razor-sharp architectural lines. Surfaces feel like physical materials—brushed metal, polished stone, and deep matte lacquers—rather than digital layers.

## Colors
The palette is rooted in the "Obsidian/Gold" and "Dragon Red" triad. 

- **Primary (Dragon Red):** Used sparingly for critical actions, status indicators, and aggressive branding accents. It represents power and urgency.
- **Secondary (Gold):** Used for decorative accents, premium signifiers, and high-level interactive states. This is a muted, metallic gold, not a vibrant yellow.
- **Obsidian (Neutral/Tertiary):** The foundation of the system. Multiple tiers of deep blacks and charcoal grays create depth without losing the "true black" OLED aesthetic.
- **Typography Colors:** Headlines occupy a high-contrast white-gold, while body copy remains a legible silver-gray to maintain an expensive, low-light atmosphere.

## Typography
The typography is the primary driver of the luxury narrative. 

1.  **Headlines (Bodoni Moda):** A high-contrast, editorial serif that communicates heritage and "class." Use this for large display moments and section headings.
2.  **Body (Hanken Grotesk):** A precise, contemporary sans-serif. It provides a technical, clean counterbalance to the serif headings.
3.  **UI & Labels (Geist):** A developer-centric, technical font used for micro-copy, data points, and navigational labels. 

**Formatting Rule:** All labels and small UI identifiers must be in Uppercase with generous letter-spacing (0.15em) to reinforce the industrial-luxury aesthetic.

## Layout & Spacing
The layout follows a **Fixed Grid** philosophy on desktop to ensure a curated, "framed" look, transitioning to a fluid system on mobile. 

- **Symmetry:** Use a 12-column grid with wide gutters (32px) to allow content "room to breathe," mimicking the layout of a luxury magazine.
- **The Golden Ratio:** Use 1.618 as a multiplier for determining vertical spacing between disparate sections.
- **Rhythm:** All spacing must be multiples of 8px. Use large internal padding within components (e.g., cards and buttons) to signify exclusivity—luxury is the luxury of space.

## Elevation & Depth
Depth is created through **Tonal Layers** and **Low-Contrast Outlines**. 

- **Surface 0 (Base):** Deepest Obsidian (#0D0D0D).
- **Surface 1 (Floating):** #1A1A1A with a 1px solid stroke in a muted gold-tinted gray (#333333).
- **Shadows:** Avoid soft, fuzzy ambient shadows. If depth is required, use a sharp "Hard Edge" shadow (4px offset, 0 blur) in pure black to simulate industrial stacking.
- **Accents:** Use thin (1px) gold dividers to separate high-level content blocks.

## Shapes
This design system utilizes **Sharp** edges (0px radius) across all primary components. 

The 0px radius communicates architectural rigidity and industrial precision. In rare instances where a circular element is required (e.g., user avatars or radio buttons), they should be perfectly round to contrast the otherwise rectangular environment. All buttons, inputs, and card containers must remain strictly 90-degree angles.

## Components
- **Buttons:** Primary buttons are solid "Dragon Red" with white-gold text in `label-caps`. Secondary buttons are "Obsidian" with a 1px Gold stroke. Hover states involve a subtle brightness increase rather than a color shift.
- **Cards:** No shadows. Use a 1px border (#333333) and a slight background tint change on hover. Content inside cards should be heavily inset.
- **Inputs:** Underline-only or 1px bordered boxes. Labels must be `label-caps` positioned above the field. Use a "Dragon Red" cursor/caret for a hit of brand color.
- **Lists:** Separated by thin, 1px lines. Use `mono-data` for list metadata to give a technical, "specification sheet" feel.
- **Navigation:** Top-tier navigation uses `label-caps`. The active state is indicated by a 2px "Dragon Red" bar either above or below the menu item.