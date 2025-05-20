import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
  plugins: [
    tailwindcss(),
    laravel({
      input: ['resources/assets/css/index.css', 'resources/assets/ts/shop/index.ts'],
      refresh: true,
      buildDirectory: 'themes/shop/visual-debut',
      hotFile: 'public/themes/shop/visual-debut/visual-debut-vite.hot',
    }),
  ],
});
