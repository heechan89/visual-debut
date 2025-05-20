/** @type {import('tailwindcss').Config} */
export default {
  safelist: [
    'label-processing',
    'label-active',
    'label-canceled',
    'label-closed',
    'label-pending',
    'label-canceled',
    'icon-eye',
    'line-through',
    'max-sm:leading-4',
  ],
  theme: {
    extend: {
      typography: ({ theme }) => ({
        DEFAULT: {
          css: {
            '--tw-prose-body': 'var(--color-on-background)',
            '--tw-prose-headings': 'var(--color-on-background)',
            '--tw-prose-lead': 'var(--color-on-background)',
            '--tw-prose-links': 'var(--color-primary)',
            '--tw-prose-bold': 'var(--color-on-background)',
            '--tw-prose-bullets': 'var(--color-neutral-300)',
            '--tw-prose-hr': 'var(--color-neutral-200)',
            '--tw-prose-quotes': 'var(--color-on-background)',
            '--tw-prose-quote-borders': 'var(--color-neutral-200)',
            '--tw-prose-captions': 'var(--color-neutral-500)',
            '--tw-prose-kbd': 'var(--color-neutral-900)',
            '--tw-prose-kbd-shadows': 'var(--color-neutral-900)',
            '--tw-prose-code': 'var(--color-neutral-900)',
            '--tw-prose-pre-code': 'var(--color-neutral-200)',
            '--tw-prose-pre-bg': 'var(--color-neutral-800)',
            '--tw-prose-th-borders': 'var(--color-neutral-300)',
            '--tw-prose-td-borders': 'var(--color-neutral-200)',
          },
        },
      }),
    },
  },
};
