import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import AutoImport from 'unplugin-auto-import/vite';

export default defineConfig({
  plugins: [
    vue({
      script: {
        propsDestructure: true,
        defineModel: true,
      },
    }),

    AutoImport({
      imports: ['vue'],
      dts: './resources/assets/ts/editor/auto-imports.d.ts',
    }),
  ],
  build: {
    outDir: 'public/themes/shop/visual-debut/editor',
    copyPublicDir: false,
    manifest: 'manifest.json',
    lib: {
      entry: 'resources/assets/ts/editor/index.ts',
      name: 'editor',
      formats: ['umd'],
      fileName: () => `script.[hash].js`,
    },
    rollupOptions: {
      external: ['vue'],
      output: {
        assetFileNames: (chunk) => {
          if (chunk.type === 'asset' && chunk.name!.endsWith('.css')) {
            return 'style.[hash].css';
          }

          return chunk.name!;
        },
        globals: {
          vue: 'Vue',
        },
      },
    },
  },
});
