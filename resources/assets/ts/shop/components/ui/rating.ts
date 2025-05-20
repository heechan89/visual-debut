import { defineScope, defineComponent } from '../../utils/define-component';

interface RatingState {
  value: number;
  hover: number | null;
  max: number;
  set(value: number): void;
  onHover(value: number | null): void;
  isActive(index: number): boolean;
  isHovered(index: number): boolean;
}

interface RatingStarScope {
  index: number;
  isActive: boolean;
  isHovered: boolean;
  select(): void;
  hover(): void;
  leave(): void;
}

type RatingAPI = RatingState & { $star: RatingStarScope };

export default defineComponent<RatingAPI>({
  name: 'rating',

  setup(props) {
    const initial = Number(props.value ?? 0);
    const max = Number(props.max ?? 5);

    return {
      value: initial,
      hover: null,
      max,

      set(value) {
        this.value = value;
        this.hover = null;
        this.$dispatch('change', value);
      },

      onHover(value) {
        this.hover = value;
      },

      isActive(index) {
        return index <= this.value;
      },

      isHovered(index) {
        return this.hover !== null && index <= this.hover;
      },
    };
  },

  parts: {
    root: () => ({
      role: 'radiogroup',
      'aria-label': 'Star rating',
    }),

    star: defineScope<RatingAPI, 'star', RatingStarScope>({
      name: 'star',

      setup(api, _el, { value }) {
        const index = Number(value);

        return {
          index,

          get isActive() {
            return api.isHovered(index) || (!api.hover && api.isActive(index));
          },

          get isHovered() {
            return api.isHovered(index);
          },

          select() {
            api.set(index);
          },

          hover() {
            api.onHover(index);
          },

          leave() {
            api.onHover(null);
          },
        };
      },

      bindings(_, scope) {
        return {
          'x-bind:data-active': () => (scope.isActive ? 'true' : null),
          'x-bind:data-hovered': () => (scope.isHovered ? 'true' : null),
          'x-on:click': () => scope.select(),
          'x-on:mouseenter': () => scope.hover(),
          'x-on:mouseleave': () => scope.leave(),
          role: 'radio',
          tabindex: '0',
          'x-on:keydown.enter.prevent': () => scope.select(),
          'x-on:keydown.space.prevent': () => scope.select(),
          'x-bind:aria-checked': () => (scope.isActive ? 'true' : 'false'),
          'x-bind:aria-label': () => `Rate ${scope.index} star`,
        };
      },
    }),
  },
});
