# VD3D shop theme

WordPress block theme for the VD3D WooCommerce shop at
[shop.vd3d.com.au](https://shop.vd3d.com.au). It matches the main site at
[vd3d.com.au](https://vd3d.com.au): same colours, fonts, header and footer. The
brand rules live in `brand.md` in the
[cloudflare-pages-vd3d](https://github.com/vernonvandam/cloudflare-pages-vd3d) repo.

No build step and no page builder: plain block templates, `theme.json` and one
stylesheet.

## Deploying

The theme folder on the server is a git clone of this repo, made with cPanel's
**Git™ Version Control** at:

```
/home/qdtckaxr/shop.vd3d.com.au/wp-content/themes/vd3d
```

To deploy the latest `main`: cPanel → Git™ Version Control → **Manage** → **Pull or
Deploy** → **Update from Remote**. Never edit files on the server; they'd be
overwritten on the next pull.

After a deploy that changes templates, check **Appearance → Editor → Templates**. If
a template shows as customised there, the database copy overrides the file: use
**Reset** to pick up the new version.

## Layout per category

Every product category gets one of three layouts, set in `vd3d_category_layouts()`
in `functions.php`:

| Layout | Category page | Product page | Suits |
| --- | --- | --- | --- |
| `grid` (default) | 3 columns | Gallery beside details | Most categories |
| `showcase` | Dark hero, 2 columns of large images with a summary | Full-width gallery above details | Display pieces and gifts |
| `compact` | 4 columns of smaller cards | Gallery beside details | Small parts and accessories |

Category pages use `templates/taxonomy-product_cat-layout-{layout}.html` and
product pages `templates/single-product-layout-{layout}.html` when the file exists,
otherwise the standard template.

A category can have a fully bespoke design: add
`templates/taxonomy-product_cat-{category-slug}.html` (category page) or
`templates/single-product-cat-{category-slug}.html` (its product pages). A product's
look follows its **first** category.

Pages also get the body classes `vd3d-cat-{slug}` and `vd3d-layout-{layout}` for
small CSS tweaks in `assets/css/theme.css`.

## Product pages read like an article

The product page shows the full description under "About this piece", so write
descriptions as short, scannable sections: what it is, sizes and materials,
colours, how it's used, care. Use headings (H2/H3) inside the description.

## Files

| Path | Contents |
| --- | --- |
| `theme.json` | Colours, fonts, type scale, spacing, button and link styles |
| `assets/css/theme.css` | Header, footer, product cards, category and product page layouts |
| `assets/fonts/` | Space Grotesk and DM Sans (self-hosted, SIL Open Font License) |
| `assets/images/` | Logos and favicon, copied from the main site |
| `patterns/header.php`, `patterns/footer.php` | Header and footer markup |
| `templates/` | Page templates (shop home, shop, categories, products, pages, 404) |
| `functions.php` | Category layout map, template selection, theme setup |
