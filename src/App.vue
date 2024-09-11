<template>
  <div>
    <!-- Formulario de suma -->
    <div>
      <h3>Suma de dos números</h3>
      <input type="number" v-model.number="num1" placeholder="Número 1">
      <input type="number" v-model.number="num2" placeholder="Número 2">
      <p>Resultado: {{ sumar() }}</p>
    </div>

    <!-- Saludo dinámico -->
    <div>
      <h3>Saludo</h3>
      <label for="nombre">Escribe tu nombre:</label>
      <input type="text" id="nombre" v-model="nombre">
      <p>Hola, {{ nombre }}!</p>
    </div>

    <!-- Botón contador -->
    <div>
      <h3>Contador</h3>
      <button @click="incrementarContador">Presiona para incrementar</button>
      <p>Veces presionadas: {{ contador }}</p>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      num1: 0,
      num2: 0,
      nombre: '',
      contador: 0,
    };
  },
  methods: {
    sumar() {
      return this.num1 + this.num2;
    },
    incrementarContador() {
      this.contador++;
    }
  }
}
</script>
