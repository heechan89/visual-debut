import './style.css';
import RadiusPicker from './components/RadiusPicker.vue';

document.addEventListener('visual:editor:booting', (event) => {
  const { vueApp } = (event as CustomEvent).detail;
  vueApp.component('radius-setting', RadiusPicker);
});
