const mix = require('laravel-mix');

mix.js('client/src/js/app.js', 'client/dist');

mix.options({
  processCssUrls: false,
});

if (!mix.inProduction()) {
  // linting
  mix.webpackConfig({
    module: {
      rules: [
        {
          test: /\.(js|vue)$/,
          exclude: /node_modules/,
          loader: 'eslint-loader',
        },
      ],
    },
  });

  mix.sourceMaps();
}

