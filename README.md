# Visual Debut Theme

**Visual Debut** is the official reference theme for [Bagisto Visual](https://github.com/bagistoplus/visual), built with performance and developer experience in mind. It leverages Alpine.js and Livewire to deliver a modern, responsive, and customizable storefront.

## ✨ Features

- **Lightweight & Fast**: Optimized for performance with minimal JavaScript and efficient asset loading.
- **Alpine.js & Livewire Integration**: Enhances interactivity without compromising speed.
- **Fully Visual-Editable**: Seamless integration with Bagisto Visual for no-code customization.
- **Responsive Design**: Mobile-first approach ensures a consistent experience across devices.
- **Theme Settings**: Easily configure colors, fonts, and layouts through the visual editor.
- **Accessible**: Built with accessibility best practices in mind.

## 🚀 Getting Started

### 1. Clone the Repository

```bash
composer require bagistoplus/visual-debut
```

### 2. Install Dependencies

```bash
npm install
```

### 3. Build Assets

```bash
npm run build
```

### 4. Publish a assets

Ensure that Bagisto Visual is installed in your Bagisto project. Then, link the theme:

```bash
php artisan vendor:publish --tag=visual-debut-assets
```

You can now enable the theme in admin panel

## 🤝 Contributing

Contributions are welcome! Please read the [contribution guidelines](CONTRIBUTING.md) first.

## Credits

- [Eldo Magan](https://github.com/eldomagan)
- [All Contributors](../../contributors)

## 📄 License

This project is open-sourced under the [MIT license](./LICENSE.md).
