/**
 * Compiler configuration
 *
 * @see {@link https://roots.io/sage/docs sage documentation}
 * @see {@link https://bud.js.org/learn/config bud.js configuration guide}
 *
 * @type {import('@roots/bud').Config}
 */
export default async (app) => {
  /**
   * Register common paths
   */
  app
    .setPath("@scripts", "resources/scripts")
    .setPath("@styles", "resources/styles")
    .setPath("@patterns", "resources/views/patterns");

  /**
   * Application assets & entrypoints
   *
   * @see {@link https://bud.js.org/reference/bud.entry}
   * @see {@link https://bud.js.org/reference/bud.assets}
   */
  app
    .entry(
      "parent",
      await app.glob([
        "../northright/resources/scripts/app.js",
        "../northright/resources/styles/app.scss",
        "../northright/resources/patterns/**/*.{scss, css}",
      ]),
    )
    .entry(
      "child",
      await app.glob([
        "@scripts/app.js",
        "@styles/app.scss",
        "@patterns/**/*.{scss, css}",
      ]),
    )
    .entry("editor", ["@scripts/editor", "@styles/editor"])
    .assets(["images"]);

  app.alias({
    '@fonts': app.path('../northright/resources/fonts'),
    '@fonts-child': app.path('resources/fonts'),
  });

  /**
   * Set public path
   *
   * @see {@link https://bud.js.org/reference/bud.setPublicPath}
   */
  app.setPublicPath("../");

  /**
   * Development server settings
   *
   * @see {@link https://bud.js.org/reference/bud.setUrl}
   * @see {@link https://bud.js.org/reference/bud.setProxyUrl}
   * @see {@link https://bud.js.org/reference/bud.watch}
   */
  app
    .setUrl("http://0.0.0.0:3005")
    .setProxyUrl("https://monocore.local")
    .watch(app.globSync(["resources/**/*", "app/**/*"]));

  /**
   * Set global styles
   */
  app.sass.importGlobal(["@styles/_tokens"]);
  app.sass.importGlobal(["../northright/resources/styles/_variables"]);
  app.sass.importGlobal(["../northright/resources/styles/_breakpoints"]);
  app.sass.importGlobal(["../northright/resources/styles/_mixins"]);
  app.sass.importGlobal(["../northright/resources/styles/_grid"]);

  /**
   * Prevent code splitting
   */
  app.splitChunks(false);
};
