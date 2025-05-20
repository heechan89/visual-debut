<script setup lang="ts">
  const options = ['none', 'xs', 'sm', 'md', 'xl', 'full'];
  const model = defineModel({ default: 'none' });

  function select(value: string) {
    model.value = value;
  }
</script>

<template>
  <div class="wrapper">
    <div
      v-for="r in options"
      :data-active="r === model"
      :class="{ active: r === model }"
      @click="model = r"
    >
      <div
        class="radius"
        :class="r"
      ></div>
    </div>
  </div>
</template>