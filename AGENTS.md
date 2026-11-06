# VD3D shop theme: notes for coding agents

WordPress block theme for the WooCommerce shop at shop.vd3d.com.au. The server
pulls `main` through cPanel Git Version Control, so keep `main` working.

- Follow brand.md in the cloudflare-pages-vd3d repo: one brand green (#78C874), dark
  industrial header and footer, Space Grotesk headings and DM Sans body. Font sizes
  only come from the theme.json presets. No new colours or one-off sizes.
- Categories vary by layout and imagery, never by colour or font. Header, footer,
  buttons and type stay identical everywhere.
- Header and footer live in patterns/ (PHP) because they need theme asset URLs;
  parts/ only reference those patterns.
- Block markup in templates must stay valid: balanced block comments, valid JSON
  attributes, and static blocks whose saved HTML matches their attributes.
- Run `php -l` on PHP files and validate theme.json before committing.
- Store facts (shipping, pickup, custom quotes) must match the main site's terms.
  Never claim products are food safe.
