<template>
<div>
  <div class="backdrop" @click="$emit('close')"></div>
  <dialog open>
    <header class="d-flex justify-content-between align-items-center">
      <slot name="header">
        <h2>Update Citation</h2>
        <button class="btn btn-danger" @click="$emit('close')"><i class="fa fa-times"></i></button>
      </slot>
    </header>
    <section>
      <slot></slot>
    </section>
    <!-- <menu>
      <slot name="actions">
        <button class="btn btn-danger" @click="$emit('close')">Close</button>
      </slot>
    </menu> -->
  </dialog>
</div>
</template>

<script>
export default {
  props: [],
  emits: ['close']
};
</script>

<style scoped>
.backdrop {
  position: fixed;
  top: 0;
  left: 0;
  height: 100vh;
  width: 100%;
  background-color: rgba(0, 0, 0, 0.75);
  z-index: 99999;
}

dialog {
  position: fixed;
  top: 2rem;
  bottom: 8rem;
  left: 10%;
  width: 80%;
  z-index: 999900;
  border-radius: 12px;
  border: none;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.26);
  padding: 0;
  margin: 0;
  overflow: auto;
}

header {
  background-color: #ff9222;
  color: white;
  width: 100%;
  padding: 1rem;
}

header h2 {
  margin: 0;
}

section {
  padding: 1rem;
  background: #fff;
}

menu {
  padding: 1rem;
  display: flex;
  justify-content: flex-end;
  margin: 0;
}

@media (min-width: 768px) {
  dialog {
    left: calc(50% - 20rem);
    width: 40rem;
  }
}

@media (max-width: 500px) {
     dialog {
        left: 2%;
        right: 2%;
        width: 96%;
     }
}
</style>
