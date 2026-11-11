# Vertex Starter Theme

A reusable starter repository for building WordPress themes on the **Vertex framework**. It provides a minimal theme entry point, product lifecycle class, synchronised framework, translation automation, and CI.

## Requirements

- PHP 8.0 minimum, declared in `style.css`.
- WordPress 6.3 minimum, declared in `style.css`.

Keep these minimums aligned with theme metadata, PHPCS, and CI.

## Architecture

WordPress loads `functions.php`, which loads the synchronised `vertex/bootstrap.php` and theme class, then registers the product with `VertexLoader::register()`. The loader registers the `ExampleTheme\` namespace and `src/` directory. `src/Theme.php` registers the theme directory with `Vertex\App::getInstance()` and loads translations. Vertex runs its application on `wp_loaded`; `index.php` delegates request termination to Vertex.

Keep theme-specific code under `src/`. Never make product changes inside `vertex/`.

## Repository structure

- `functions.php`, `index.php`, `src/Theme.php`: theme entry point and lifecycle.
- `vertex/`: synchronised Vertex framework.
- `languages/`: translation catalogues.
- `tests/`: WordPress integration tests.
- `.github/workflows/`: lint, PHPCS, WordPress tests, translations, and framework sync.

Framework changes belong in [vertex-wp/framework](https://github.com/vertex-wp/framework).

## CI coverage

The integration workflow runs 70 combinations across WordPress 6.3–7.1 and `latest`, with PHP 8.0–8.6. There are 49 required combinations based on WordPress Core compatibility ranges and 21 experimental combinations that run without blocking required checks. PHP 8.6 is experimental in integration and syntax workflows.

## Customising the starter

1. Update theme metadata and repository identity in `style.css`.
2. Set a unique namespace in `src/Theme.php` and `VertexLoader::register()`.
3. Keep the Text Domain consistent across metadata, translation calls, catalogue names, and the translation workflow.
4. Keep platform minimums aligned across metadata, documentation, PHPCS, and CI.
5. Implement theme-specific behaviour under `src/`; do not edit `vertex/`.
6. Add integration tests for new behaviour under `tests/`.

The starter uses the `vertex-starter` Text Domain and includes a Persian PO catalogue.

## Development

Install the theme in `wp-content/themes/vertex-starter`, activate **Vertex Starter Theme**, and implement behaviour under `src/`. Run PHP lint, PHPCS, and WordPress integration tests before pushing. Also verify activation and front-end rendering in a real WordPress installation; automated bootstrap tests do not replace visual testing.

## Vertex synchronisation

GitHub Actions synchronises [vertex-wp/framework](https://github.com/vertex-wp/framework) `main` into `vertex/` daily at 09:00 Asia/Tehran and supports manual runs through **Actions → Sync Vertex → Run workflow**. It uses `git subtree` with `--squash`.

Treat `vertex/` as synchronised framework code. Framework changes belong in the framework repository. Sync and translation workflows require repository contents write permission.

## Licence

GPL-2.0-or-later. See [LICENSE](https://www.gnu.org/licenses/old-licenses/gpl-2.0.html).
